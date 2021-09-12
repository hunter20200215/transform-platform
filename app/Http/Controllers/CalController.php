<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use GuzzleHttp\Client;

class Calcontroller extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function express (Request $request) {
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://maps.googleapis.com/maps/api/distancematrix/',
			// You can set any number of default request options.
			
		]);
		$final_price = 0;
		$total_distance = 0;
		$countries = array_merge($request->from,$request->to);
		$countries_name = array_merge($request->from_countries,$request->delivery_countries);
		$codes = array_merge($request->pick_up_codes,$request->delivery_codes);
		$weight = $request->weight;
		$service = $request->service;
		$baseprice = DB::table('express_price')
				->where('transfer_type', '=', $service)
				->pluck('price')
				->first();
		for ($i=0; $i<(count($countries)-1); $i++) {
			$uri = 'json?origins=postalcode:'.$codes[$i].'&destinations=postalcode:'.$codes[$i+1].'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
			$res = $client->request('GET', $uri);
			$response = $res->getBody();
			$response = json_decode($response);
			$distance = $response->rows[0]->elements[0]->distance->value;
			$from_table = strtolower($countries[$i]) .'_price';
			$code_num_from = explode(" ",$codes[$i])[0];
			$code_num_to = explode(" ",$codes[$i+1])[0];
			$from_table_object = DB::table($from_table)
				->where('pre_postcode', '=', str_split($code_num_from,2)[0])
				->first();
			// if(is_null($from_table_object) == 1){
			// $from_table_object = DB::table($from_table)
			// 		->where('pre_postcode', '=', substr($code_num_from,-2,2))
			// 		->first();
			// }
			if(is_null($from_table_object) == 1){
				$from_table_object = DB::table($from_table)
				->where('type','=','A')
				->first();
			}
			$from_price = $from_table_object->price;
			
			
			$to_table = strtolower($countries[$i+1]) .'_price';
			
			$to_table_object = DB::table($to_table)
				->where('pre_postcode', '=', str_split($code_num_to,2)[0])
				->first();
			// if(is_null($to_table_object) == 1){
			// 	$to_table_object = DB::table($to_table)
			// 		->where('pre_postcode', '=', substr($code_num_to,-2,2))
			// 		->first();
			// }
			if(is_null($to_table_object) == 1){ 
				$to_table_object = DB::table($to_table)
						->where('type','=','A')
						->first();
			}
			$to_price = $to_table_object->price;
			
			
			$route_object = DB::table('route_price')
				->where('from', '=', $countries[$i])
				->where('to', '=', $countries[$i+1])
				->first();
			$route_price = $route_object->price;
			$route_min_price = $route_object->min_price;
			$from_fixed_price = DB::table('add_fix_price_truck')
				->where('country','=', $countries[$i])
				->where('type','=',$from_table_object->type)
				->where('transfer_type','=', $service)
				->pluck('price')
				->first();
			$to_fixed_price = DB::table('add_fix_price_truck')
				->where('country','=', $countries[$i+1])
				->where('type','=',$to_table_object->type)
				->where('transfer_type','=', $service)
				->pluck('price')
				->first();
			$price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
			$price = $price + $from_fixed_price + $to_fixed_price;
			$price = round($price,2);
			if($price<$route_min_price){
				$price=$route_min_price;
			};
			$final_price += $price;
			$total_distance += $distance;
			
		}
		
		// $weight = $request->weight;
		// $from_code = $request->pick_up_code;
		// $to_code = $request->delivery_code;
		// $service = $request->service;
		// $from_country = $request->from_country;
		// $delivery_country = $request->delivery_country;
		// $uri = 'json?origins=postalcode:'.$from_code.$from_country.'&destinations=postalcode:'.$to_code.$delivery_country.'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
		// $res = $client->request('GET', $uri);
		// $response = $res->getBody();
		// $response = json_decode($response);
		// $distance = $response->rows[0]->elements[0]->distance->value;
		// $baseprice = DB::table('express_price')
		// 		->where('transfer_type', '=', $service)
		// 		->pluck('price')
		// 		->first();
		// $from_table = strtolower($from) .'_price';
		// $from_table_object = DB::table($from_table)
		// 		->where('pre_postcode', '=', str_split($from_code,2)[0])
		// 		->first();
		// if(is_null($from_table_object) == 1){
		// 		$from_table_object = DB::table($from_table)
		// 				->where('pre_postcode', '=', substr($from_code,-2,2))
		// 				->first();        
		// }
		// $from_price = $from_table_object->price;
		
		// $to_table = strtolower($to) .'_price';
		// $to_table_object = DB::table($to_table)
		// 		->where('pre_postcode', '=', str_split($to_code,2)[0])
		// 		->first();
		// if(is_null($to_table_object) == 1){
		// 		$to_table_object = DB::table($to_table)
		// 				->where('pre_postcode', '=', substr($to_code,-2,2))
		// 				->first();
		// }
		// $to_price = $to_table_object->price;
		// $route_object = DB::table('route_price')
		// 		->where('from', '=', $from)
		// 		->where('to', '=', $to)
		// 		->first();
		// $route_price = $route_object->price;
		// $route_min_price = $route_object->min_price;
		// $from_fixed_price = DB::table('add_fix_price_truck')
		// 		->where('country','=', $from)
		// 		->where('type','=',$from_table_object->type)
		// 		->where('transfer_type','=', $service)
		// 		->pluck('price')
		// 		->first();
		// $to_fixed_price = DB::table('add_fix_price_truck')
		// 		->where('country','=', $from)
		// 		->where('type','=',$to_table_object->type)
		// 		->where('transfer_type','=', $service)
		// 		->pluck('price')
		// 		->first();
		// $price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
		// $price = $price + $from_fixed_price + $to_fixed_price;
		// $price = round($price,2);
		// if($price<$route_min_price){
		// 	$price=$route_min_price;
		// };
		$request->session()->put('total_distance', $total_distance);
		$length_price = DB::table('express_route_length_price')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->pluck('price')
				->first();
		
		$final_price = (100 + $length_price)/100 * $final_price;
		
		return $final_price;
	}
	public function full_truck (Request $request) {
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://maps.googleapis.com/maps/api/distancematrix/',
			// You can set any number of default request options.
			
		]);
		$final_price = 0;
		$total_distance = 0;
		$countries = array_merge($request->from,$request->to);
		$countries_name = array_merge($request->from_countries,$request->delivery_countries);
		$codes = array_merge($request->pick_up_codes,$request->delivery_codes);
		$weight = $request->weight;
		$service = $request->service;
		$baseprice = DB::table('full_truck_price')
				->where('type', '=', $service)
				->pluck('price')
				->first();
		for ($i=0; $i<(count($countries)-1); $i++) {
			$uri = 'json?origins=postalcode:'.$codes[$i].'&destinations=postalcode:'.$codes[$i+1].'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
			$res = $client->request('GET', $uri);
			$response = $res->getBody();
			$response = json_decode($response);
			$distance = $response->rows[0]->elements[0]->distance->value;
			$from_table = strtolower($countries[$i]) .'_price';
			$code_num_from = explode(" ",$codes[$i])[0];
			$code_num_to = explode(" ",$codes[$i+1])[0];
			$from_table_object = DB::table($from_table)
				->where('pre_postcode', '=', str_split($code_num_from,2)[0])
				->first();
			// if(is_null($from_table_object) == 1){
			// 	$from_table_object = DB::table($from_table)
			// 		->where('pre_postcode', '=', substr($code_num_from,-2,2))
			// 		->first();
			// }
			if(is_null($from_table_object) == 1) {
				$from_table_object = DB::table($from_table)
				->where('type','=','A')
				->first();
			}
			$from_price = $from_table_object->price;
			
			
			$to_table = strtolower($countries[$i+1]) .'_price';
			$to_table_object = DB::table($to_table)
				->where('pre_postcode', '=', str_split($code_num_to,2)[0])
				->first();
			// if(is_null($to_table_object) == 1){
			// $to_table_object = DB::table($to_table)
			// 		->where('pre_postcode', '=', substr($code_num_to,-2,2))
			// 		->first();
			// }
			if(is_null($to_table_object) == 1){
				$to_table_object = DB::table($to_table)
				->where('type','=','A')
				->first();
			}
			$to_price = $to_table_object->price;
			
			
			$route_object = DB::table('route_price')
				->where('from', '=', $countries[$i])
				->where('to', '=', $countries[$i+1])
				->first();
			$route_price = $route_object->price;
			$route_min_price = $route_object->min_price;
			$from_fixed_price = DB::table('add_fix_price_truck')
				->where('country','=', $countries[$i])
				->where('type','=',$from_table_object->type)
				->where('transfer_type','=', $service)
				->pluck('price')
				->first();
			$to_fixed_price = DB::table('add_fix_price_truck')
				->where('country','=', $countries[$i+1])
				->where('type','=',$to_table_object->type)
				->where('transfer_type','=', $service)
				->pluck('price')
				->first();
			$price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
			$price = $price + $from_fixed_price + $to_fixed_price;
			$price = round($price,2);
			if($price<$route_min_price){
				$price=$route_min_price;
			};
			$final_price += $price;
			$total_distance += $distance;
			
		}


		// $from = $request->from;
		// $to = $request->to;
		// $weight = $request->weight;
		// $from_code = $request->pick_up_code;
		// $to_code = $request->delivery_code;
		// $service = $request->service;
		// $from_country = $request->from_country;
		// $delivery_country = $request->delivery_country;
		
		// $uri = 'json?origins=postalcode:'.$from_code.$from_country.'&destinations=postalcode:'.$to_code.$delivery_country.'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
		// $res = $client->request('GET', $uri);
		// $response = $res->getBody();
		// $response = json_decode($response);
		// $distance = $response->rows[0]->elements[0]->distance->value;
		// $baseprice = DB::table('full_truck_price')
		// 		->where('type', '=', $service)
		// 		->pluck('price')
		// 		->first();
		// $from_table = strtolower($from) .'_price';
		// $from_table_object = DB::table($from_table)
		// 		->where('pre_postcode', '=', str_split($from_code,2)[0])
		// 		->first();
		// if(is_null($from_table_object) == 1){
		// 		$from_table_object = DB::table($from_table)
		// 				->where('pre_postcode', '=', substr($from_code,-2,2))
		// 				->first();        
		// }
		// $from_price = $from_table_object->price;
		
		// $to_table = strtolower($to) .'_price';
		// $to_table_object = DB::table($to_table)
		// 		->where('pre_postcode', '=', str_split($to_code,2)[0])
		// 		->first();
		// if(is_null($to_table_object) == 1){
		// 		$to_table_object = DB::table($to_table)
		// 				->where('pre_postcode', '=', substr($to_code,-2,2))
		// 				->first();
		// }
		// $to_price = $to_table_object->price;
		// $route_object = DB::table('route_price')
		// 		->where('from', '=', $from)
		// 		->where('to', '=', $to)
		// 		->first();
		// $route_price = $route_object->price;
		// $route_min_price = $route_object->min_price;
		// $from_fixed_price = DB::table('add_fix_price_truck')
		// 		->where('country','=', $from)
		// 		->where('type','=',$from_table_object->type)
		// 		->where('transfer_type','=', $service)
		// 		->pluck('price')
		// 		->first();
		// $to_fixed_price = DB::table('add_fix_price_truck')
		// 		->where('country','=', $from)
		// 		->where('type','=',$to_table_object->type)
		// 		->where('transfer_type','=', $service)
		// 		->pluck('price')
		// 		->first();
		// $price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
		// $price = $price + $from_fixed_price + $to_fixed_price;
		// $price = round($price,2);
		// if($price<$route_min_price){
		// 		$price=$route_min_price;
		// };
		$request->session()->put('total_distance', $total_distance);
		$length_price = DB::table('full_route_length_price')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->pluck('price')
				->first();
		$final_price = (100 + $length_price)/100 * $final_price;
		
		return $final_price;
	}

	public function part_load (Request $request) {
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://maps.googleapis.com/maps/api/distancematrix/',
			// You can set any number of default request options.
			
		]);
		$final_price = 0;
		$total_distance = 0;
		$countries = array_merge($request->from,$request->to);
		$countries_name = array_merge($request->from_countries,$request->delivery_countries);
		$codes = array_merge($request->pick_up_codes,$request->delivery_codes);
		$weight = $request->weight;
		$lmd = $request->lmd;
		$baseprice = DB::table('part_load_price')
				->where('ldm_start', '>=', $lmd)
				->where('ldm_end', '<=', $lmd)
				->pluck('price')
				->first();
		for ($i=0; $i<(count($countries)-1); $i++) {
			$uri = 'json?origins=postalcode:'.$codes[$i].'&destinations=postalcode:'.$codes[$i+1].'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
			$res = $client->request('GET', $uri);
			$response = $res->getBody();
			$response = json_decode($response);
			$distance = $response->rows[0]->elements[0]->distance->value;
			$from_table = strtolower($countries[$i]) .'_price';
			$code_num_from = explode(" ",$codes[$i])[0];
			$code_num_to = explode(" ",$codes[$i+1])[0];
			$from_table_object = DB::table($from_table)
				->where('pre_postcode', '=', str_split($code_num_from,2)[0])
				->first();
			if(is_null($from_table_object) == 1){
			$from_table_object = DB::table($from_table)
					->where('type', '=', 'A')
					->first();
			}
			$from_price = $from_table_object->price;
			$to_table = strtolower($countries[$i+1]) .'_price';
			$to_table_object = DB::table($to_table)
				->where('pre_postcode', '=', str_split($code_num_to,2)[0])
				->first();
			if(is_null($to_table_object) == 1){
			$to_table_object = DB::table($to_table)
					->where('type', '=', 'A')
					->first();
			}
			$to_price = $to_table_object->price;
			$route_object = DB::table('route_price')
				->where('from', '=', $countries[$i])
				->where('to', '=', $countries[$i+1])
				->first();
			$route_price = $route_object->price;
			$route_min_price = $route_object->min_price;
			$from_fixed_price = DB::table('add_fix_price_part_load')
				->where('country','=', $countries[$i])
				->where('type','=',$from_table_object->type)
				->where('ldm_start','<=', $lmd)
				->where('ldm_end','>', $lmd)
				->pluck('price')
				->first();
			$to_fixed_price = DB::table('add_fix_price_part_load')
					->where('country','=', $countries[$i+1])
					->where('type','=',$to_table_object->type)
					->where('ldm_start','<=', $lmd)
					->where('ldm_end','>', $lmd)
					->pluck('price')
					->first();
			$price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
			$price = $price + $from_fixed_price + $to_fixed_price;
			$price = round($price,2);
			if($price<$route_min_price){
				$price=$route_min_price;
			};
			$final_price += $price;
			$total_distance += $distance;
			
		}
		


		// $from = $request->from;
		// $to = $request->to;
		// $weight = $request->weight;
		// $from_code = $request->pick_up_code;
		// $to_code = $request->delivery_code;
		// $lmd = $request->lmd;
		// $from_country = $request->from_country;
		// $delivery_country = $request->delivery_country;
		
		// $uri = 'json?origins=postalcode:'.$from_code.$from_country.'&destinations=postalcode:'.$to_code.$delivery_country.'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
		// $res = $client->request('GET', $uri);
		// $response = $res->getBody();
		// $response = json_decode($response);
		// $distance = $response->rows[0]->elements[0]->distance->value;
		// $baseprice = DB::table('part_load_price')
		// 		->where('ldm_start', '>=', $lmd)
		// 		->where('ldm_end', '<=', $lmd)
		// 		->pluck('price')
		// 		->first();
		// $from_table = strtolower($from) .'_price';
		// $from_table_object = DB::table($from_table)
		// 		->where('pre_postcode', '=', str_split($from_code,2)[0])
		// 		->first();
		// if(is_null($from_table_object) == 1){
		// 		$from_table_object = DB::table($from_table)
		// 				->where('pre_postcode', '=', substr($from_code,-2,2))
		// 				->first();        
		// }
		// $from_price = $from_table_object->price;
		
		// $to_table = strtolower($to) .'_price';
		// $to_table_object = DB::table($to_table)
		// 		->where('pre_postcode', '=', str_split($to_code,2)[0])
		// 		->first();
		// if(is_null($to_table_object) == 1){
		// 		$to_table_object = DB::table($to_table)
		// 				->where('pre_postcode', '=', substr($to_code,-2,2))
		// 				->first();
		// }
		// $to_price = $to_table_object->price;
		// $route_object = DB::table('route_price')
		// 		->where('from', '=', $from)
		// 		->where('to', '=', $to)
		// 		->first();
		// $route_price = $route_object->price;
		// $route_min_price = $route_object->min_price;
		// $from_fixed_price = DB::table('add_fix_price_part_load')
		// 		->where('country','=', $from)
		// 		->where('type','=',$from_table_object->type)
		// 		->where('ldm_start','<=', $lmd)
		// 		->where('ldm_end','>', $lmd)
		// 		->pluck('price')
		// 		->first();
		// $to_fixed_price = DB::table('add_fix_price_part_load')
		// 		->where('country','=', $from)
		// 		->where('type','=',$to_table_object->type)
		// 		->where('ldm_start','<=', $lmd)
		// 		->where('ldm_end','>', $lmd)
		// 		->pluck('price')
		// 		->first();
		// $price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
		// $price = $price + $from_fixed_price + $to_fixed_price;
		// $price = round($price,2);
		// if($price<$route_min_price){
		// 		$price=$route_min_price;
		// };
		$request->session()->put('total_distance', $total_distance);
		$length_price = DB::table('part_route_length_price')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->pluck('price')
				->first();
		$final_price = (100 + $length_price)/100 * $final_price;
		
		return $final_price;
	}
	public function full_specify (Request $request) {
		$client = new Client([
			// Base URI is used with relative requests
			'base_uri' => 'https://maps.googleapis.com/maps/api/distancematrix/',
			// You can set any number of default request options.
			
		]);

		$final_price = 0;

		$total_distance = 0;
		$countries = array_merge($request->from,$request->to);
		$countries_name = array_merge($request->from_countries,$request->delivery_countries);
		$codes = array_merge($request->pick_up_codes,$request->delivery_codes);
		$weight = $request->weight;
		$lmd = $request->lmd;
		$transfer_service = DB::table('full_truck_price')
				->where('lmd_start', '>=', $lmd)
				->where('lmd_end', '<=', $lmd)
				->where('max_weight', '>=', $weight)
				->pluck('type')
				->first();
		if(empty($transfer_service)){
			$transfer_service = DB::table('full_truck_price')
					->where('max_weight','>=', $weight)
					->pluck('type')
					->first();
		}
		$baseprice = DB::table('full_truck_price')
				->where('lmd_start', '>=', $lmd)
				->where('lmd_end', '<=', $lmd)
				->where('max_weight', '>=', $weight)
				->pluck('price')
				->first();
		if(empty($baseprice)){
		$baseprice = DB::table('full_truck_price')
			->where('max_weight','>=', $weight)
			->pluck('price')
			->first();
		}
		for ($i=0; $i<(count($countries)-1); $i++) {
			$uri = 'json?origins=postalcode:'.$codes[$i].'&destinations=postalcode:'.$codes[$i+1].'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
			$res = $client->request('GET', $uri);
			$response = $res->getBody();
			$response = json_decode($response);
			$distance = $response->rows[0]->elements[0]->distance->value;
			$from_table = strtolower($countries[$i]) .'_price';
			$code_num_from = explode(" ",$codes[$i])[0];
			$code_num_to = explode(" ",$codes[$i+1])[0];
			$from_table_object = DB::table($from_table)
				->where('pre_postcode', '=', str_split($code_num_from,2)[0])
				->first();
			if(is_null($from_table_object) == 1){
			$from_table_object = DB::table($from_table)
					->where('type', '=', 'A')
					->first();
			}
			$from_price = $from_table_object->price;
			$to_table = strtolower($countries[$i+1]) .'_price';
			$to_table_object = DB::table($to_table)
				->where('pre_postcode', '=', str_split($code_num_to,2)[0])
				->first();
			if(is_null($to_table_object) == 1){
			$to_table_object = DB::table($to_table)
					->where('type', '=', 'A')
					->first();
			}
			$to_price = $to_table_object->price;
			$route_object = DB::table('route_price')
				->where('from', '=', $countries[$i])
				->where('to', '=', $countries[$i+1])
				->first();
			$route_price = $route_object->price;
			$route_min_price = $route_object->min_price;

			$from_fixed_price = DB::table('add_fix_price_truck')
				->where('country','=', $countries[$i])
				->where('type','=',$from_table_object->type)
				->where('transfer_type','=', $transfer_service)
				->pluck('price')
				->first();
			$to_fixed_price = DB::table('add_fix_price_truck')
					->where('country','=', $countries[$i+1])
					->where('type','=',$to_table_object->type)
					->where('transfer_type','=', $transfer_service)
					->pluck('price')
					->first();
			$price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
			$price = $price + $from_fixed_price + $to_fixed_price;
			$price = round($price,2);
			if($price<$route_min_price){
				$price=$route_min_price;
			};
			$final_price += $price;
			$total_distance += $distance;
			
		}


		// $from = $request->from;
		// $to = $request->to;
		// $weight = $request->weight;
		// $from_code = $request->pick_up_code;
		// $to_code = $request->delivery_code;
		// $lmd = $request->lmd;
		// $from_country = $request->from_country;
		// $delivery_country = $request->delivery_country;
		
		// $uri = 'json?origins=postalcode:'.$from_code.$from_country.'&destinations=postalcode:'.$to_code.$delivery_country.'&key=AIzaSyBbKOjegN6gg6IAnqPHrIGPZlvztrUqL6M';
		// $res = $client->request('GET', $uri);
		// $response = $res->getBody();
		// $response = json_decode($response);
		// $distance = $response->rows[0]->elements[0]->distance->value;
		// $transfer_service = DB::table('full_truck_price')
		// 		->where('lmd_start', '>=', $lmd)
		// 		->where('lmd_end', '<=', $lmd)
		// 		->where('max_weight', '>=', $weight)
		// 		->pluck('type')
		// 		->first();
		// if(empty($transfer_service)){
		// 		$transfer_service = DB::table('full_truck_price')
		// 				->where('max_weight','>=', $weight)
		// 				->pluck('type')
		// 				->first();
		// }
		// $baseprice = DB::table('full_truck_price')
		// 		->where('lmd_start', '>=', $lmd)
		// 		->where('lmd_end', '<=', $lmd)
		// 		->where('max_weight', '>=', $weight)
		// 		->pluck('price')
		// 		->first();
		// if(empty($baseprice)){
		// 	$baseprice = DB::table('full_truck_price')
		// 		->where('max_weight','>=', $weight)
		// 		->pluck('price')
		// 		->first();
		// }
		// // dd($baseprice);
		// $from_table = strtolower($from) .'_price';
		// $from_table_object = DB::table($from_table)
		// 		->where('pre_postcode', '=', str_split($from_code,2)[0])
		// 		->first();
		// if(is_null($from_table_object) == 1){
		// 		$from_table_object = DB::table($from_table)
		// 				->where('pre_postcode', '=', substr($from_code,-2,2))
		// 				->first();        
		// }
		// $from_price = $from_table_object->price;
		
		// $to_table = strtolower($to) .'_price';
		// $to_table_object = DB::table($to_table)
		// 		->where('pre_postcode', '=', str_split($to_code,2)[0])
		// 		->first();
		// if(is_null($to_table_object) == 1){
		// 		$to_table_object = DB::table($to_table)
		// 				->where('pre_postcode', '=', substr($to_code,-2,2))
		// 				->first();
		// }
		// $to_price = $to_table_object->price;
		// $route_object = DB::table('route_price')
		// 		->where('from', '=', $from)
		// 		->where('to', '=', $to)
		// 		->first();
		// $route_price = $route_object->price;
		// $route_min_price = $route_object->min_price;
		// $from_fixed_price = DB::table('add_fix_price_truck')
		// 		->where('country','=', $from)
		// 		->where('type','=',$from_table_object->type)
		// 		->where('transfer_type','=', $transfer_service)
		// 		->pluck('price')
		// 		->first();
		// $to_fixed_price = DB::table('add_fix_price_truck')
		// 		->where('country','=', $from)
		// 		->where('type','=',$to_table_object->type)
		// 		->where('transfer_type','=', $transfer_service)
		// 		->pluck('price')
		// 		->first();
		// $price = ($distance * $baseprice * (($from_price + $to_price)+$route_price + 100)/100)/1000;
		// $price = $price + $from_fixed_price + $to_fixed_price;
		// $price = round($price,2);
		// if($price<$route_min_price){
		// 		$price=$route_min_price;
		// };
		$request->session()->put('total_distance', $total_distance);
		$length_price = DB::table('full_route_length_price')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->pluck('price')
				->first();
		$final_price = (100 + $length_price)/100 * $final_price;
		
		return $final_price;
	}
	public function pick_up_express(Request $request){
		$object = DB::table('pick_up_time_express')
			->where('weekday' ,'=', $request->weekday)
			->where('time_now_start','<=',$request->hours)
			->where('time_now_end','>', $request->hours)
			->first();
		$pick_up_date = $request->day + $object->day_add;
		if(!empty($object->time_start)){
			$pick_up_time_start = $object->time_start;
			$pick_up_time_end = $object->time_end;
		}else{
			$pick_up_time_start = $request->hours + $object->time_add_min;
			$pick_up_time_end = $request->hours + $object->time_add_max;
		}
		return response()->json([
			'pick_up_date' => $pick_up_date,
			'pick_up_time_start' => $pick_up_time_start,
			'pick_up_time_end' => $pick_up_time_end,
		]);
	}
	public function pick_up_truck(Request $request){
		$object = DB::table('pick_up_time_truck')
			->where('type' ,'=', $request->service)
			->first();
		
		if($request->service=='Van'||$request->service=='Van_XL'){
			$pick_up_date=$request->day+$object->pick_up_day;
			$pick_up_time_start = $object->pick_up_time_start;
			$pick_up_time_end = $object->pick_up_time_end;

		}else{
			if($request->weekday==4||$request->weekday==5||$request->weekday==6){
				$pick_up_date=$request->day+$object->pick_up_day+1;
				$pick_up_time_start = $object->pick_up_time_start;
				$pick_up_time_end = $object->pick_up_time_end;

			}else{
				$pick_up_date=$request->day+$object->pick_up_day;
				$pick_up_time_start = $object->pick_up_time_start;
				$pick_up_time_end = $object->pick_up_time_end;
			}
		}
		
		
		return response()->json([
			'pick_up_date' => $pick_up_date,
			'pick_up_time_start' => $pick_up_time_start,
			'pick_up_time_end' => $pick_up_time_end,
		]);
	}
	public function pick_up_part(Request $request){
		$object = DB::table('pick_up_time_part')
				->first();
		if($request->weekday==4||$request->weekday==5||$request->weekday==6){
			$pick_up_date=$request->day+$object->add_day_min+1;
			$pick_up_time_start = $object->pick_up_time_start;
			$pick_up_time_end = $object->pick_up_time_end;

		}else{
			$pick_up_date=$request->day+$object->add_day_min;
			$pick_up_time_start = $object->pick_up_time_start;
			$pick_up_time_end = $object->pick_up_time_end;
		}
		
		
		return response()->json([
			'pick_up_date' => $pick_up_date,
			'pick_up_time_start' => $pick_up_time_start,
			'pick_up_time_end' => $pick_up_time_end,
		]);
	}
	public function pick_up_truck_specify(Request $request){
		$transfer_service = DB::table('full_truck_price')
				->where('lmd_start', '>=', $request->lmd)
				->where('lmd_end', '<=', $request->lmd)
				->where('max_weight', '>=', $request->weight)
				->pluck('type')
				->first();
		if(empty($transfer_service)){
				$transfer_service = DB::table('full_truck_price')
						->where('max_weight','>=', $request->weight)
						->pluck('type')
						->first();
		}
		$object = DB::table('pick_up_time_truck')
			->where('type' ,'=', $transfer_service)
			->first();
		
		if($request->service=='Van'||$request->service=='Van_XL'){
			$pick_up_date=$request->day+$object->pick_up_day;
			$pick_up_time_start = $object->pick_up_time_start;
			$pick_up_time_end = $object->pick_up_time_end;

		}else{
			if($request->weekday==4||$request->weekday==5||$request->weekday==6){
				$pick_up_date=$request->day+$object->pick_up_day+1;
				$pick_up_time_start = $object->pick_up_time_start;
				$pick_up_time_end = $object->pick_up_time_end;

			}else{
				$pick_up_date=$request->day+$object->pick_up_day;
				$pick_up_time_start = $object->pick_up_time_start;
				$pick_up_time_end = $object->pick_up_time_end;
			}
		}
		
		
		return response()->json([
			'pick_up_date' => $pick_up_date,
			'pick_up_time_start' => $pick_up_time_start,
			'pick_up_time_end' => $pick_up_time_end,
		]);

	}
	public function cal_time_express(Request $request){
		$total_distance = $request->session()->get('total_distance')/1000;
		
		$delivery_time_table = DB::table('time_express_table')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->first();
		$delivery_time = $total_distance/$delivery_time_table->velocity + $delivery_time_table->adding_fix_time;
		return response()->json([
			'delivery_time' => round($delivery_time,1),
			'total_distance' => round($total_distance,1),
		]);
	}
	public function cal_time_full_truck(Request $request){
		$total_distance = $request->session()->get('total_distance')/1000;
		if ($request->service=='Van'||$request->service=='Van_XL'){
			$delivery_time_table = DB::table('time_full_truck_van')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->first();
			$delivery_time = $total_distance/$delivery_time_table->velocity + $delivery_time_table->add_time;
		}else{
			$delivery_time_table = DB::table('time_full_truck_truck')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->first();
			$delivery_time = $total_distance/$delivery_time_table->velocity + $delivery_time_table->adding_fix_time;
		}
		
		
		return response()->json([
			'delivery_time' => round($delivery_time,1),
			'total_distance' => round($total_distance,1),
		]);
	}
	public function cal_time_part(Request $request){
		$total_distance = $request->session()->get('total_distance')/1000;
		$delivery_time_table = DB::table('time_part_load_table')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->first();
		$delivery_time = $total_distance/$delivery_time_table->velocity + $delivery_time_table->adding_fix_time;
		return response()->json([
			'delivery_time' => round($delivery_time,1),
			'total_distance' => round($total_distance,1),
		]);
	}
	public function cal_time_truck_specify(Request $request){
		$lmd = $request->lmd;
		$weight = $request->weight;
		$transfer_service = DB::table('full_truck_price')
				->where('lmd_start', '>=', $lmd)
				->where('lmd_end', '<=', $lmd)
				->where('max_weight', '>=', $weight)
				->pluck('type')
				->first();
		if(empty($transfer_service)){
			$transfer_service = DB::table('full_truck_price')
					->where('max_weight','>=', $weight)
					->pluck('type')
					->first();
		}
		$total_distance = $request->session()->get('total_distance')/1000;
		
		if ($transfer_service=='Van'||$transfer_service=='Van_XL'){
			$delivery_time_table = DB::table('time_full_truck_van')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->first();
			$delivery_time = $total_distance/$delivery_time_table->velocity + $delivery_time_table->add_time;
		}else{
			$delivery_time_table = DB::table('time_full_truck_truck')
				->where('route_start','<',$total_distance)
				->where('route_end','>=',$total_distance)
				->first();
			$delivery_time = $total_distance/$delivery_time_table->velocity + $delivery_time_table->adding_fix_time;
		}
		
		
		return response()->json([
			'delivery_time' => round($delivery_time,1),
			'total_distance' => round($total_distance,1),
		]);

	}
	public function create_db(Request $request){

		$validatedData = $request->validate([
			'company_name' => 'required',
			'contact_person' => 'required',
			'street_nr' => 'required',
			'telephone' => 'required',			
		]);

		$distance = $request->distance;
		$payment_status = $request->payment_status;
		$service = $request->service;
		$weight = $request->weight;
		$transit_time =$request->transit_time;
		$pick_up_places = $request->pick_up_places;
		$pick_up_date = $request->pick_up_date;
		$pick_up_time = $request->pick_up_time;
		$reference_nr =$request->reference_nr[0];
		
		$get_shipping_id = DB::table('shipping_tables')
							->orderBy('id','desc')
							->first();
							// ->pluck('shipping_id');
		if($get_shipping_id == null){
			$shipping_id = intval(date("Y").date('m').strval(1));
		}else{
			
			$shipment_id_status = strval($get_shipping_id->shipping_id);
			$current_string = date("Y").date('m');
			if (strpos($shipment_id_status, $current_string) !== false) {
				$shipping_id = $get_shipping_id->shipping_id + 1;
			}else{
				$shipping_id = intval(date("Y").date('m').strval(1));
			}
		}
		DB::table('shipping_tables')->insert(
			['payment_status' => $payment_status, 'service' => $service,'weight' => $weight, 'transit_time'=>$transit_time,'shipping_id'=>$shipping_id,'pick_up_date'=>$pick_up_date,'pick_up_time'=>$pick_up_time,'reference_nr'=>$reference_nr,'status'=>'New order','user_id'=>Auth::user()->id]
		);

		
		for ($i=0; $i<(count($request->company_name)); $i++) {
			if($i<$request->pick_up_places){
				$facility_type = $request->facility_type[$i];
				$company_name = $request->company_name[$i];
				$contact_person = $request->contact_person[$i];
				$street_nr = $request->street_nr[$i];
				$country_postcode = $request->country_postcode[$i];
				
				$telephone = $request->telephone[$i];
				$reference_nr =$request->reference_nr[$i];
				DB::table('pick_up_details')->insert(
					['facility_type' => $facility_type, 'company' => $company_name,'contact_person' => $contact_person, 'street'=>$street_nr,'postcodes'=>$country_postcode,'tel'=>$telephone,'reference_number'=>$reference_nr,'destination'=>'pick-up','shipping_id'=>$shipping_id]
				);

			}else{
				$facility_type = $request->facility_type[$i];
				$company_name = $request->company_name[$i];
				$contact_person = $request->contact_person[$i];
				$street_nr = $request->street_nr[$i];
				$country_postcode = $request->country_postcode[$i];
				$telephone = $request->telephone[$i];
				$reference_nr =$request->reference_nr[$i];
				DB::table('pick_up_details')->insert(
					['facility_type' => $facility_type, 'company' => $company_name,'contact_person' => $contact_person, 'street'=>$street_nr,'postcodes'=>$country_postcode,'tel'=>$telephone,'reference_number'=>$reference_nr,'destination'=>'delivery','shipping_id'=>$shipping_id]
				);
			}
		}
		return redirect()->url('new_shipment');
		// $shipping_tables = 
	}
}