
@foreach ($shipping_datas as $shipping_data)
    <?php 
    // use DB;
    $details = DB::table('pick_up_details')
                    ->where('shipping_id', $shipping_data->shipping_id)
                    ->get();
    $pick_up_places = DB::table('pick_up_details')
                    ->where('shipping_id', $shipping_data->shipping_id)
                    ->where('destination','pick-up')
                    ->get();
    $delivery_places = DB::table('pick_up_details')
                    ->where('shipping_id', $shipping_data->shipping_id)
                    ->where('destination','delivery')
                    ->get();
    
    ?>
    <div class="row block" style="margin:0;margin-bottom:15px;">
        <div class="col-lg-10 row">
            <div class="col-lg-3">
                <p class="sub-small-title">status</p>
                <p class="title-desc">{{$shipping_data->status}}</p>
                <p class="sub-small-title">Pick-up address</p>
                @foreach ($pick_up_places as $place)
                    <div class="pick-up-address-list">
                        <i class="fas fa-arrow-circle-up" style="font-size:15px;color:black" aria-hidden="true"></i>
                        <span class="pre-pick-up-place" style="margin-bottom:0px;font-size:14px">{{ $place->postcodes }}</span>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-2">
                <p class="sub-small-title">Order date</p>
                <p class="title-desc">
                    <?php if($shipping_data->order_date){echo $shipping_data->order_date; }else{echo "---"; }?>
                    
                </p>
                <p class="sub-small-title">Delivery address</p>
                @foreach ($delivery_places as $place)
                    <div class="pick-up-address-list">
                        <i class="fas fa-arrow-circle-down" style="font-size:15px;color:blue" aria-hidden="true"></i>
                        <span class="pre-pick-up-place" style="margin-bottom:0px;font-size:14px">{{ $place->postcodes }}</span>
                    </div>
                @endforeach
            </div>
            <div class="col-lg-2">
                <p class="sub-small-title">Shipping ID</p>
                <p class="title-desc">{{ $shipping_data->shipping_id }}</p>
                <p class="sub-small-title">Pick-up date</p>
                <p class="content-desc">{{ $shipping_data->pick_up_date }}</p>
                <p class="content-desc">{{ $shipping_data->pick_up_time }}</p>

            </div>
            <div class="col-lg-2">
                <p class="sub-small-title">Type</p>
                <p class="title-desc">Express {{ $shipping_data->service }} </p>
                <p class="sub-small-title">Delivery date</p>
                <p class="content-desc">Director delivery</p>
                <p class="content-desc">{{ $shipping_data->transit_time }}h</p>
            </div>
            
            <div class="col-lg-3">
                <p class="sub-small-title">Loding Reference</p>
                <p class="title-desc">{{ $shipping_data->reference_nr }}</p>
                <div class="row">
                    <div class="col-sm-6">
                        <p class="sub-small-title">Driver's name</p>
                        <p class="content-desc">
                            <?php if($shipping_data->driver_name){echo $shipping_data->driver_name; }else{echo "---"; }?>
                        </p>

                    </div>
                    <div class="col-sm-6">
                        <p class="sub-small-title">License plates</p>
                        <p class="content-desc">
                        <?php if($shipping_data->license_plates){echo $shipping_data->license_plates; }else{echo "---"; }?>
                        </p>


                    </div>
                </div>
                    

            </div>
            

        </div>
        <div class="col-lg-2">
            <button class="details-style" data-toggle="modal" data-target="#myModal">Details</button>
            <button class="details-style">Reoder</button>
            <button class="details-style">Cancel</button>

        </div>

        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-lg" style="max-width:1000px !important">
            
        
                <div class="modal-content">
                    
                    <div class="modal-body">
                        <div class="row" style="margin-bottom:10px;">
                            <div class="col-lg-3">
                                <p class="sub-small-title">status</p>
                                <p class="title-desc">{{ $shipping_data->status }}</p>
                                
                                

                            </div>
                            <div class="col-lg-2">
                                <p class="sub-small-title">Order date</p>
                                <p class="title-desc"><?php if($shipping_data->order_date){echo $shipping_data->order_date; }else{echo "---"; }?></p>
                                
                                

                            </div>
                            <div class="col-lg-2">
                                <p class="sub-small-title">Shipping ID</p>
                                <p class="title-desc">{{$shipping_data->shipping_id}}</p>
                                <p class="sub-small-title">Pick-up date</p>
                                <p class="content-desc">{{$shipping_data->pick_up_date}}</p>
                                <p class="content-desc">{{$shipping_data->pick_up_time}}</p>

                            </div>
                            <div class="col-lg-2">
                                <p class="sub-small-title">Type</p>
                                <p class="title-desc">Express {{$shipping_data->service}}</p>
                                <p class="sub-small-title">Delivery date</p>
                                <p class="content-desc">Director delivery</p>
                                <p class="content-desc">{{$shipping_data->transit_time}}h</p>
                            </div>
                            
                            <div class="col-lg-3">
                                <p class="sub-small-title">Loding Reference</p>
                                <p class="title-desc">{{$shipping_data->reference_nr}}</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <p class="sub-small-title">Driver's name</p>
                                        <p class="content-desc"><?php if($shipping_data->driver_name){echo $shipping_data->driver_name; }else{echo "---"; }?></p>

                                    </div>
                                    <div class="col-sm-6">
                                        <p class="sub-small-title">License plates</p>
                                        <p class="content-desc"><?php if($shipping_data->license_plates){echo $shipping_data->license_plates; }else{echo "---"; }?></p>


                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach ($details as $data)
                            
                            <div class="row" >
                                <div class="col-md-3">
                                    <p class="sub-small-title">Postcodes</p>
                                    @if ($data->destination == "pick-up")
                                        <div class="pick-up-address-list">
                                            <i class="fas fa-arrow-circle-up" style="font-size:15px;color:black" aria-hidden="true"></i>
                                            <span class="pre-pick-up-place" style="margin-bottom:0px;font-size:14px">{{ $data->postcodes }}</span>
                                        </div>
                                    @elseif ($data->destination == "delivery")
                                        <div class="pick-up-address-list">
                                            <i class="fas fa-arrow-circle-down" style="font-size:15px;color:blue" aria-hidden="true"></i>
                                            <span class="pre-pick-up-place" style="margin-bottom:0px;font-size:14px">{{ $data->postcodes }}</span>
                                        </div>

                                    @endif

                                </div>
                                <div class="col-md-2">
                                    <p class="sub-small-title">Facility type</p>
                                    <p class="content-desc">{{ $data->facility_type }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="sub-small-title">Company</p>
                                    <p class="content-desc">{{ $data->company }}</p>
                                </div>
                                <div class="col-md-2">
                                    <p class="sub-small-title">contact person</p>
                                    <p class="content-desc">{{ $data->contact_person }}</p>
                                </div>
                                <div class="col-md-3 row">
                                    <div class="col-md-6">
                                        <p class="sub-small-title">Street</p>
                                        <p class="content-desc">{{ $data->street }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="sub-small-title">phone</p>
                                        <p class="content-desc">{{ $data->tel }}</p>
                                    </div>
                                </div>
                                    
                            </div>
                        @endforeach
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
@endforeach
    
  
