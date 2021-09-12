

var token = $('meta[name="csrf-token"]').attr('content');        

var from_countries=[];
var from_countries_names =[];

var delivery_countries=[];
var delivery_countries_names =[];
var pick_up_codes=[];
var delivery_codes=[];
var business_type;
var service;
var checked;
full_custom_lengths = [];
full_custom_widths = [];
full_custom_heights = [];
full_custom_quantitys = [];

full_specify_lengths = [];
full_specify_widths = [];
full_specify_heights = [];
full_specify_quantitys = []

part_custom_lengths =[];
part_custom_widths =[];
part_custom_heights =[];
part_custom_quantitys =[];

part_pallets_lengths = [];
part_pallets_widths =[];
part_pallets_heights= [];
part_pallets_quantitys =[];

business_type = "Express";
service = "S";

// circle variables
var ss = 1;
var ww = 1;
// for google auto complete



// $("#pick_up_country1").change(function() {
//     alert('sss');
// });

function makeid(length) {
    var result           = [];
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < length; i++ ) {
      result.push(characters.charAt(Math.floor(Math.random() * 
 charactersLength)));
   }
   return result.join('');
}

function button_click_event(p1){
    $(".btn-details" ).css( "border", "1px solid #ccc" );
    $(`.btn-details:eq(${p1})`).css({"border": "1px solid #0066ff"});
    if (business_type != "Part_load"){
        if ($(`.btn-details:eq(${p1})`).attr('data-ability') == "enable"){
            $('#start_time_display').text(8 + ":" +"00");
            $('#end_time_display').text(11 + ":" +"00");
            $('#start_time_display').attr('data',8);
            $('#end_time_display').attr('data',11);

        }else{
            if(business_type=='Express'){
                $('#start_time_display').text($('#start_time_display').attr('data-min') + ":" +"00");
                $('#end_time_display').text($('#end_time_display').attr('data-max') + ":" +"00");
                $('#start_time_display').attr('data',$('#start_time_display').attr('data-min'));
                $('#end_time_display').attr('data',$('#end_time_display').attr('data-max'));
            }else{
                $('#start_time_display').text(8 + ":" +"00");
                $('#end_time_display').text(16 + ":" +"00");
                $('#start_time_display').attr('data',8);
                $('#end_time_display').attr('data',16);
            }
        }
        pick_up_date_month = $(`.btn-details:eq(${p1})`).attr('data-month');
        pick_up_date = $(`.btn-details:eq(${p1})`).attr('data');
        window.pick_up_date = pick_up_date;
        window.pick_up_date_month = pick_up_date_month;
    }else {
        pick_up_date_month = $(`.btn-details:eq(${p1})`).attr('data-month');
        pick_up_date = $(`.btn-details:eq(${p1})`).attr('data');
        window.pick_up_date = pick_up_date;
        window.pick_up_date_month = pick_up_date_month;
    }
        
}
$(document ).ready(function() {
    // function postal_code() {
    // var input1 = document.getElementById('pick_up_code1');
    // var input2 = document.getElementById('pick_up_code2');
    // var input3 = document.getElementById('pick_up_code3');
    // var input4 = document.getElementById('delivery_code1');
    // var input5 = document.getElementById('delivery_code2');
    // var input6 = document.getElementById('delivery_code3');
    // var options = {
    //     types: ['(regions)'],
    //     componentRestrictions: { country: ['DE'] },
    // }
    // var autocomplete = new google.maps.places.Autocomplete(input1, options);
    // var autocomplete2 = new google.maps.places.Autocomplete(input2, options);
    // var autocomplete3 = new google.maps.places.Autocomplete(input3, options);
    // var autocomplete4 = new google.maps.places.Autocomplete(input4, options);
    // var autocomplete5 = new google.maps.places.Autocomplete(input5, options);
    // var autocomplete6 = new google.maps.places.Autocomplete(input6, options);
    // }
    
    // window.test = function() {
    //     window.google.maps.event.addDomListener(window, 'load', postal_code);
    
    // }

    $("#pick_up_country1").change(function() {
    
        input1 = $('#pick_up_code1');
        console.log(input1);
        
        var options = {
            types: ['(regions)'],
            componentRestrictions: { country: [$(this).val()] },
        }

        var autocomplete = new google.maps.places.Autocomplete((input1[0]), options);
    });
    $("#pick_up_country2").change(function() {
    
        input2 = $('#pick_up_code2');
        
        
        var options = {
            types: ['(regions)'],
            componentRestrictions: { country: [$(this).val()] },
        }

        var autocomplete2 = new google.maps.places.Autocomplete((input2[0]), options);
    });
    $("#pick_up_country3").change(function() {
    
        input3 = $('#pick_up_code3');
        var options = {
            types: ['(regions)'],
            componentRestrictions: { country: [$(this).val()] },
        }

        var autocomplete3 = new google.maps.places.Autocomplete((input3[0]), options);
    });
     
    $("#delivery_country1").change(function() {
    
        input4 = document.getElementById('delivery_code1');
        var options = {
            types: ['(regions)'],
            componentRestrictions: { country: [$(this).val()] },
        }

        var autocomplete4 = new google.maps.places.Autocomplete((input4), options);
    });
    $("#delivery_country2").change(function() {
    
        input5 = document.getElementById('delivery_code2');
        var options = {
            types: ['(regions)'],
            componentRestrictions: { country: [$(this).val()] },
        }
        console.log(input5);
        var autocomplete5 = new google.maps.places.Autocomplete((input5), options);
    });
    $("#delivery_country3").change(function() {
    
        input6 = document.getElementById('delivery_code3');
        var options = {
            types: ['(regions)'],
            componentRestrictions: { country: [$(this).val()] },
        }

        var autocomplete6 = new google.maps.places.Autocomplete((input6), options);
    });
    
    

    // var for add-pick-up
    var pick_click = 0;
    var delivery_click = 0;
        var d = new Date();
        var weekday = d.getDay();
        var day = d.getDate();
        var month  = d.getMonth();
        var hours = d.getHours();
        var minitus = d.getMinutes();
        var year = d.getFullYear();	
        const data = {
            _token: token,
            weekday:weekday,
            day:day,
            month:month,
            hours:hours,
            minitus:minitus,
            year:year,
        }
        $.ajax({
            type: "POST",
            url:'/get_time',
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
            }
        });
    
    $('#new_shipment').click(function(){
        var d = new Date();
        var weekday = d.getDay();
        var day = d.getDate();
        var month  = d.getMonth();
        var hours = d.getHours();
        var minitus = d.getMinutes();
        var year = d.getFullYear();	
        const data = {
            _token: token,
            weekday:weekday,
            day:day,
            month:month,
            hours:hours,
            minitus:minitus,
            year:year,
        }
        $.ajax({
            type: "POST",
            url:'/get_time',
            data: data,
            dataType: "json",
            success: function (data) {
                console.log(data);
            }
        });

    });

    // add new pick-up 
    $('#add_pick_up').click(function(){
        if(ss<3){
            $('.postal-code-input').eq(ss).css('display','block');
            ss++;
        }
        
        
    //     var htl = '<div class=\"postal-code-input\">'+ 
    //     '<select name="pick_up_country" class="countries">'+
    //         '<option value="DE" >Germany</option>'+
    //         '<option value="PL" >Poland</option>' +
    //         '<option value="NL" >Nolland</option>'+
    //         '<option value="BE">Belgium</option>'+
    //         '<option value="LU">Luxembourg</option>'+
    //         '<option value="FR">France</option>'+
    //         '<option value="ES">Spain</option>'+
    //         '<option value="PT">Portugal</option>'+
    //         '<option value="CH">Switzerland</option>'+
    //         '<option value="AT">Austria</option>'+
    //         '<option value="IT">Italy</option>'+
    //         '<option value="CZ">Czech Republic</option>'+
    //         '<option value="SK">Slovakia</option>'+
    //         '<option value="DK">Denmark</option>'+
    //         '<option value="SE">Sweden</option>'+
    //         '<option value="NO">Norway</option>'+
    //     '</select>'+
    //     '<input type="text" class="postalcode" placeholder="postalcode" name="pick_up_code" value="">'+
    // '</div>'
    
    // if($( "Select[name*='pick_up_country']" ).length<3)
    //     $('.pick-up_country-container').append(htl);

    // for(i=0;i<$( "Select[name*='pick_up_country']";i++)
    });
    
    $('#add_delivery').click(function(){
        if(ww<3){
            $('.postal-code-input').eq(ww+3).css('display','block');
            ww++;
        }
    //     var htl1 = '<div class=\"postal-code-input\">'+ 
    //     '<select name="delivery_country" class="countries">'+
    //         '<option value="DE" >Germany</option>'+
    //         '<option value="PL" >Poland</option>' +
    //         '<option value="NL" >Nolland</option>'+
    //         '<option value="BE">Belgium</option>'+
    //         '<option value="LU">Luxembourg</option>'+
    //         '<option value="FR">France</option>'+
    //         '<option value="ES">Spain</option>'+
    //         '<option value="PT">Portugal</option>'+
    //         '<option value="CH">Switzerland</option>'+
    //         '<option value="AT">Austria</option>'+
    //         '<option value="IT">Italy</option>'+
    //         '<option value="CZ">Czech Republic</option>'+
    //         '<option value="SK">Slovakia</option>'+
    //         '<option value="DK">Denmark</option>'+
    //         '<option value="SE">Sweden</option>'+
    //         '<option value="NO">Norway</option>'+
    //     '</select>'+
    //     '<input type="text" class="postalcode" placeholder="postalcode" name="delivery_code" value="44269">'+
    // '</div>'
    
    // if($( "Select[name*='delivery_country']" ).length<3)
    //     $('.delivery-postal-code-input-container').append(htl1);
    });
    
    // from start 
    $('#details_next').click(function() {
        $('.details').css('display','none');
        $('.services').css('display','block');
        for (z = 0; z < $('select[name=pick_up_country]').length; z++) {
            if($('.postal-code-input').eq(z).css('display')=="block"){
                from_country = $('select[name=pick_up_country]').eq(z).val();
                from_country_name = $(`option[value=${from_country}]`).eq(0).text()
                pick_up_code = $('input[name=pick_up_code]').eq(z).val();
                from_countries.push(from_country);
                from_countries_names.push(from_country_name);
                pick_up_codes.push(pick_up_code);
                window.from_countries = from_countries;
                window.from_countries_names = from_countries_names;
                window.pick_up_codes = pick_up_codes;
            }
                
            
        }
        for (w = 0; w < $('select[name=delivery_country]').length; w++){
            if($('.postal-code-input').eq(3+w).css('display')=="block"){
                delivery_country = $('select[name=delivery_country]').eq(w).val();
                delivery_country_name = $(`option[value=${delivery_country}]`).eq(1).text();
                delivery_countries_names.push(delivery_country_name);
                delivery_code = $('input[name=delivery_code]').eq(w).val();
                delivery_countries.push(delivery_country);
                delivery_codes.push(delivery_code);
                window.delivery_countries = delivery_countries;
                window.delivery_countries_names = delivery_countries_names;
                window.delivery_codes = delivery_codes;
            }
                

        }

        for (w = 0; w < from_countries.length; w++){
            html2 = '<div class="pre-pick-up" style="margin-bottom:0px;">'+
            "<i class='fas fa-arrow-circle-up' style='font-size:15px;color:black'></i>"+
            "<span class='pre-pick-up-place' style='margin-bottom:0px;font-size:14px'></span>"+
            '</div>';
            $('#pick_up_insert').append(html2);
        }
        for (w = 0; w < from_countries.length; w++){
            $('#pick_up_insert .pre-pick-up-place').eq(w).text(from_countries[w]+', '+pick_up_codes[w]);
        }
        for (w = 0; w < delivery_countries.length; w++){
            html3 = '<div class="pre-delivery" style="margin-bottom:0px;">'+
            "<i class='fas fa-arrow-circle-down' style='font-size:15px;color: #4d94ff;'></i>"+
            "<span class='pre-pick-up-place' style='margin-bottom:0px;font-size:14px'></span>"+
            "</div>";
            $('#delivery_insert').append(html3);
        }
        for (w = 0; w < delivery_countries.length; w++){
            $('#delivery_insert .pre-pick-up-place').eq(w).text(delivery_countries[w]+', '+delivery_codes[w]);
        }
        
        
        total_weight= $('.weight').val();
        window.total_weight= total_weight;
        $('#total_weight').text(total_weight+'kg');
        

        // get time and send request
        
        
    });
    // select express
    $('#express_truck').click(function(){
        $('#experss-desc').css('display','block');
        $('#truck-desc').css('display','none');
        $('#part-desc').css('display','none');
        $('.part-load-option').css('display','none');
        $('.full-truck-option').css('display','none');
        $('.express-capacity').css('display','block');
        $('#express_truck').parent().css({"border": "2px solid #0066ff"});
        $('#Full_truck').parent().css({"border": "1px solid #ccc"});
        $('#part_load').parent().css({"border": "1px solid #ccc"});

        business_type = "Express";
        window.business_type=business_type

    });
    // select full truck
    $('#Full_truck').click(function(){
        $('#experss-desc').css('display','none');
        $('#truck-desc').css('display','block');
        $('#part-desc').css('display','none');
        $('.part-load-option').css('display','none');
        $('.full-truck-option').css('display','block');
        $('.express-capacity').css('display','none');

        $('#express_truck').parent().css({"border": "1px solid #ccc"});
        $('#Full_truck').parent().css({"border": "2px solid #0066ff"});
        $('#part_load').parent().css({"border": "1px solid #ccc"});
        $('#full_truck_select_vehicle').click();
        business_type = "Full_truck";
        window.business_type=business_type;

    });
    // select part load
    $('#part_load').click(function(){
        $('#experss-desc').css('display','none');
        $('#truck-desc').css('display','none');
        $('#part-desc').css('display','block');
        $('.part-load-option').css('display','block');
        $('.full-truck-option').css('display','none');
        $('.express-capacity').css('display','none');

        $('#express_truck').parent().css({"border": "1px solid #ccc"});
        $('#Full_truck').parent().css({"border": "1px solid #ccc"});
        $('#part_load').parent().css({"border": "2px solid #0066ff"});

        $('#part_load_specify_customized_select').click();

        business_type = "Part_load";
        window.business_type=business_type;
    });
    // click the express S option
    $('#S_option').click(function(){
        $('#S_desc').css('display','block');
        $('#M_desc').css('display','none');
        $('#L_desc').css('display','none');

        $('#S_option').parent().css({"border": "2px solid #0066ff"});
        $('#M_option').parent().css({"border": "1px solid #ccc"});
        $('#L_option').parent().css({"border": "1px solid #ccc"});
        if(total_weight < 300){
            service = "S";
            window.service=service;
        }else{
            alert('Max weight is 300kg for S option of Express')
        }
        

    });
    // select M option of express
    $('#M_option').click(function(){
        $('#S_desc').css('display','none');
        $('#M_desc').css('display','block');
        $('#L_desc').css('display','none');

        $('#S_option').parent().css({"border": "1px solid #ccc"});
        $('#M_option').parent().css({"border": "2px solid #0066ff"});
        $('#L_option').parent().css({"border": "1px solid #ccc"});

        if(total_weight < 600){
            service = "M";
            window.service=service;
        }else{
            alert('Max weight is 600kg for M option of Express')
        }

        
    });
    // select L option of express
    $('#L_option').click(function(){
        $('#S_desc').css('display','none');
        $('#M_desc').css('display','none');
        $('#L_desc').css('display','block');

        $('#S_option').parent().css({"border": "1px solid #ccc"});
        $('#M_option').parent().css({"border": "1px solid #ccc"});
        $('#L_option').parent().css({"border": "2px solid #0066ff"});
        if(total_weight < 1200){
            service = "L";
            window.service=service;
        }else{
            alert('Max weight is 1200kg for L option of Express')
        }

    });
    // select vehicle of full truck
    $('#full_truck_select_vehicle').click(function(){
        $('#full-truck-options').css('display','block');
        $('.specify-dimension').css('display','none');

        $('#full_truck_select_vehicle').children().css({"border": "2px solid #0066ff"});
        $('#full_truck_select_specify').children().css({"border": "1px solid #ccc"});

        $('#full_truck_van').click();

    });
    // select specify of full truck
    $('#full_truck_select_specify').click(function(){
        $('#full-truck-options').css('display','none');
        $('.specify-dimension').css('display','block');

        $('#full_truck_select_vehicle').children().css({"border": "1px solid #ccc"});
        $('#full_truck_select_specify').children().css({"border": "2px solid #0066ff"});
        $('#full_truck_specify_customized').click();

    });
    // select Van of full truck
    $('#full_truck_van').click(function(){
        $('#van_description').css('display','block');
        $('#truck_description').css('display','none');
        $('#trailer-description').css('display','none');

        $('#full_truck_van').parent().css({"border": "2px solid #0066ff"});
        $('#full_truck_full_truck').parent().css({"border": "1px solid #ccc"});
        $('#full_truck_trailer').parent().css({"border": "1px solid #ccc"});
        if(total_weight<1200){
            service = "Van";
            window.service=service;
        }else{
            alert('Max weight 1200kg for Van')
        }
        



    });

    // select full truck of full truck
    $('#full_truck_full_truck').click(function(){
        $('#van_description').css('display','none');
        $('#truck_description').css('display','block');
        $('#trailer-description').css('display','none');

        $('#full_truck_van').parent().css({"border": "1px solid #ccc"});
        $('#full_truck_full_truck').parent().css({"border": "2px solid #0066ff"});
        $('#full_truck_trailer').parent().css({"border": "1px solid #ccc"});

        $('#truck_600').click();

    });
    // select Van_XL;
    $('#van_xl').click(function(){
        checked = !checked;
        if(checked== true){
            service="Van_XL";
            window.service=service;
        }else{
            service="Van";
            window.service=service;
        }

        
        
    });

    // select truck 600
    $('#truck_600').click(function(){
        $('#trucker_600_desc').css('display','block');
        $('#trucker_720_desc').css('display','none');
        $('#trucker_820_desc').css('display','none');
        if(total_weight<3500){
            service="Truck_600";
            window.service=service;

        }else{
            alert('Max weight 3500kg for Truck-600')
        }
        
    });
    $('#truck_720').click(function(){
        $('#trucker_600_desc').css('display','none');
        $('#trucker_720_desc').css('display','block');
        $('#trucker_820_desc').css('display','none');
        if(total_weight<5000){
            service="Truck_720";
            window.service=service;
        }else{
            alert('Max weight 5000kg for Truck-720')
        }
        
    });
    $('#truck_820').click(function(){
        $('#trucker_600_desc').css('display','none');
        $('#trucker_720_desc').css('display','none');
        $('#trucker_820_desc').css('display','block');
        if(total_weight<9000){
            service="Truck_820";
            window.service=service;
        }else{
            alert('Max weight 9000kg for Truck-820')
        }
        
    });
    // select trailer of full truck
    $('#full_truck_trailer').click(function(){        
        $('#van_description').css('display','none');
        $('#truck_description').css('display','none');
        $('#trailer-description').css('display','block');

        $('#full_truck_van').parent().css({"border": "1px solid #ccc"});
        $('#full_truck_full_truck').parent().css({"border": "1px solid #ccc"});
        $('#full_truck_trailer').parent().css({"border":  "2px solid #0066ff"});

        if(total_weight<24000){
            service="Trailer";
            window.service=service;
        }else{
            alert('Max weight 24000kg for Truck&Trailer')
        }

    });
    // select customized of specify
    $('#full_truck_specify_customized').click(function(){        
        $('#full_truck_customized').css('display','block');
        $('#full_truck_pallets').css('display','none');

        $('#full_truck_specify_customized').css({"border": "2px solid #0066ff"});
        $('#full_truck_specify_pallets').css({"border": "1px solid #ccc"});
        
        // set total weight
        $('#tatal_weight_full_truck').val(total_weight);
        business_type="Truck_specify";
        window.service=business_type;

    });
    $('#full_truck_specify_pallets').click(function(){        
        $('#full_truck_customized').css('display','none');
        $('#full_truck_pallets').css('display','block');

        $('#full_truck_specify_customized').css({"border": "1px solid #ccc"});
        $('#full_truck_specify_pallets').css({"border": "2px solid #0066ff"});

        $('#full_specify_euro').click();
        business_type="Truck_specify";
        window.service=business_type;
    });
    // select customized of part load
    $('#part_load_specify_customized_select').click(function(){        
        $('#part_load_customize').css('display','block');
        $('#part_load_pallets').css('display','none');

        $('#part_load_specify_customized_select').css({"border": "2px solid #0066ff"});
        $('#part_load_specify_pallets_select').css({"border": "1px solid #ccc"});

        $('#part_custom_weight').val(total_weight);
    });
    $('#part_load_specify_pallets_select').click(function(){        
        $('#part_load_customize').css('display','none');
        $('#part_load_pallets').css('display','block');

        $('#part_load_specify_customized_select').css({"border": "1px solid #ccc"});
        $('#part_load_specify_pallets_select').css({"border": "2px solid #0066ff"});

        $('#part_pallets_euro').click();
    });

    $('#full_specify_euro').click(function(){
        $('#full_specify_euro').css({"border": "2px solid #0066ff"});
        $('#full_specify_indu').css({"border": "1px solid #ccc"});
        $('#full_specify_other').css({"border": "1px solid #ccc"});

        $('#full_specify_pallets_weight').val(total_weight);
        $('#full_specify_pallets_length').val(120);
        $('#full_specify_pallets_width').val(80);

    });
    $('#full_specify_indu').click(function(){
        $('#full_specify_euro').css({"border": "1px solid #ccc"});
        $('#full_specify_indu').css({"border": "2px solid #0066ff"});
        $('#full_specify_other').css({"border": "1px solid #ccc"});

        $('#full_specify_pallets_weight').val(total_weight);
        $('#full_specify_pallets_length').val(48);
        $('#full_specify_pallets_width').val(40);
    });
    $('#full_specify_other').click(function(){
        $('#full_specify_euro').css({"border": "1px solid #ccc"});
        $('#full_specify_indu').css({"border": "1px solid #ccc"});
        $('#full_specify_other').css({"border": "2px solid #0066ff"});
        $('#full_specify_pallets_weight').val(total_weight);
        

    });
// part load pallets
    $('#part_pallets_euro').click(function(){
        $('#part_pallets_euro').css({"border": "2px solid #0066ff"});
        $('#part_pallets_indus').css({"border": "1px solid #ccc"});
        $('#part_pallets_other').css({"border": "1px solid #ccc"});

        $('#part_pallets_weight').val(total_weight);
        $('#part_pallets_length').val(120);
        $('#part_pallets_width').val(80);

    });
    $('#part_pallets_indus').click(function(){
        $('#part_pallets_euro').css({"border": "1px solid #ccc"});
        $('#part_pallets_indus').css({"border": "2px solid #0066ff"});
        $('#part_pallets_other').css({"border": "1px solid #ccc"});

        $('#part_pallets_weight').val(total_weight);
        $('#part_pallets_length').val(48);
        $('#part_pallets_width').val(40);
    });
    $('#part_pallets_other').click(function(){
        $('#part_pallets_euro').css({"border": "1px solid #ccc"});
        $('#part_pallets_indus').css({"border": "1px solid #ccc"});
        $('#part_pallets_other').css({"border": "2px solid #0066ff"});
        $('#part_pallets_weight').val(total_weight);
        

    });
    // click add button of full truck customized
    $('#full_truck_customized_add').click(function(){
        
        full_custom_length = $('#full_custom_length').val();
        full_custom_width = $('#full_custom_width').val();
        full_custom_height = $('#full_custom_height').val();
        full_custom_quantity = $('#full_custom_quantity').val();
        full_custom_lengths.push(full_custom_length);
        full_custom_widths.push(full_custom_width);
        full_custom_heights.push(full_custom_height);
        full_custom_quantitys.push(full_custom_quantity);
        body = '';

        var full_lmd = 0;

        for (xx in full_custom_lengths) {
            head = '<table style="width:100%"><tr><th>Nr.</th><th>Lenght</th><th>Width</th><th>Height</th><th>Quantity</th><th>Options</th></tr>';
            currency = '<tr><td>1</td><td>150</td><td>100</td><td>200</td><td>1</td><td><a>Remove</a></td></tr>';
            body += currency;
            html = head + body + '</table>';
        }
        $('#full_truck_customized_table').html(html);
        for (yy = 1; yy < full_custom_heights.length+1; yy++) {
            const $row = $(`#full_truck_customized_table table tbody tr:eq(${yy})`)
            
            $('td:eq(0)', $row).text(yy)
            $('td:eq(1)', $row).text(full_custom_lengths[yy-1])
            $('td:eq(2)', $row).text(full_custom_widths[yy-1])
            $('td:eq(3)', $row).text(full_custom_heights[yy-1])
            $('td:eq(4)', $row).text(full_custom_quantitys[yy-1])

            lmd = (full_custom_lengths[yy-1]/100)*(full_custom_widths[yy-1]/100)*(full_custom_quantitys[yy-1])/(2.4)
            full_lmd += lmd;
            
        }
        
        $('#item_variable').text(full_lmd);
        total_weight_pre= $('#tatal_weight_full_truck').val();
        if(total_weight_pre < 25000){
            total_weight = total_weight_pre;
            window.total_weight= total_weight;
        }else{
            alert('Max weight is 25000kg');
        }
        
        
        
        window.full_lmd = full_lmd;

    });
    $('#full_specify_pallets_add').click(function(){
        
        full_specify_length = $('#full_specify_pallets_length').val();
        full_specify_width = $('#full_specify_pallets_width').val();
        full_specify_height = $('#full_specify_pallets_height').val();
        full_specify_quantity = $('#full_specify_pallets_quantity').val();
        full_specify_lengths.push(full_specify_length);
        full_specify_widths.push(full_specify_width);
        full_specify_heights.push(full_specify_height);
        full_specify_quantitys.push(full_specify_quantity);
        body = '';

        var full_lmd = 0;

        for (xx in full_specify_lengths) {
            head = '<table style="width:100%"><tr><th>Nr.</th><th>Lenght</th><th>Width</th><th>Height</th><th>Quantity</th><th>Options</th></tr>';
            currency = '<tr><td>1</td><td>150</td><td>100</td><td>200</td><td>1</td><td><a>Remove</a></td></tr>';
            body += currency;
            html = head + body + '</table>';
        }
        $('#full_specify_pallets_table').html(html);
        for (yy = 1; yy < full_specify_lengths.length+1; yy++) {
            const $row = $(`#full_specify_pallets_table table tbody tr:eq(${yy})`)
            
            $('td:eq(0)', $row).text(yy)
            $('td:eq(1)', $row).text(full_specify_lengths[yy-1])
            $('td:eq(2)', $row).text(full_specify_widths[yy-1])
            $('td:eq(3)', $row).text(full_specify_heights[yy-1])
            $('td:eq(4)', $row).text(full_specify_quantitys[yy-1])

            lmd = (full_specify_lengths[yy-1]/100)*(full_specify_widths[yy-1]/100)*(full_specify_quantitys[yy-1])/(2.4)
            full_lmd += lmd;
            
        }
        
        $('#item_variable_full').text(full_lmd);
        total_weight_pre= $('#full_specify_pallets_weight').val();
        if(total_weight_pre < 25000){
            total_weight = total_weight_pre;
            window.total_weight= total_weight;
        }else{
            alert('Max weight is 25000kg');
        }
      
        
        window.full_lmd = full_lmd;

    });

    $('#part_load_custom_add').click(function(){
            
        part_custom_length = $('#part_custom_length').val();
        part_custom_width = $('#part_custom_width').val();
        part_custom_height = $('#part_custom_height').val();
        part_custom_quantity = $('#part_custom_quantity').val();
        part_custom_lengths.push(part_custom_length);
        part_custom_widths.push(part_custom_width);
        part_custom_heights.push(part_custom_height);
        part_custom_quantitys.push(part_custom_quantity);
        body = '';

        var part_lmd_pre = 0;

        for (xx in part_custom_lengths) {
            head = '<table style="width:100%"><tr><th>Nr.</th><th>Lenght</th><th>Width</th><th>Height</th><th>Quantity</th><th>Options</th></tr>';
            currency = '<tr><td>1</td><td>150</td><td>100</td><td>200</td><td>1</td><td><a>Remove</a></td></tr>';
            body += currency;
            html = head + body + '</table>';
        }
        $('#part_load_custom_table').html(html);
        for (yy = 1; yy < part_custom_heights.length+1; yy++) {
            const $row = $(`#part_load_custom_table table tbody tr:eq(${yy})`)
            
            $('td:eq(0)', $row).text(yy)
            $('td:eq(1)', $row).text(part_custom_lengths[yy-1])
            $('td:eq(2)', $row).text(part_custom_widths[yy-1])
            $('td:eq(3)', $row).text(part_custom_heights[yy-1])
            $('td:eq(4)', $row).text(part_custom_quantitys[yy-1])

            lmd = (part_custom_lengths[yy-1]/100)*(part_custom_widths[yy-1]/100)*(part_custom_quantitys[yy-1])/(2.4)
            part_lmd_pre += lmd;
            
        }
        
        $('#item_variable_part_custom').text(part_lmd_pre);
        if(part_lmd_pre < 4){
            $('#item_variable_part_custom').text(part_lmd_pre);
            part_lmd = part_lmd_pre;
            window.part_lmd = part_lmd;
            
        }else{
            alert('Max LMD is 4. please select full truck option');
        };
        total_weight_pre= $('#part_custom_weight').val();
        if(total_weight < 5000){
            total_weight = total_weight_pre;

            window.total_weight= total_weight;
        }else{
            alert('Max weight is 5000kg for Part load');
        }
        
        
    

    });


    $('#part_pallets_add').click(function(){
        
        part_pallets_length = $('#part_pallets_length').val();
        part_pallets_width = $('#part_pallets_width').val();
        part_pallets_height = $('#part_pallets_height').val();
        part_pallets_quantity = $('#part_pallets_quantity').val();
        part_pallets_lengths.push(part_pallets_length);
        part_pallets_widths.push(part_pallets_width);
        part_pallets_heights.push(part_pallets_height);
        part_pallets_quantitys.push(part_pallets_quantity);
        body = '';

        var part_lmd_pre= 0;

        for (xx in part_pallets_lengths) {
            head = '<table style="width:100%"><tr><th>Nr.</th><th>Lenght</th><th>Width</th><th>Height</th><th>Quantity</th><th>Options</th></tr>';
            currency = '<tr><td>1</td><td>150</td><td>100</td><td>200</td><td>1</td><td><a>Remove</a></td></tr>';
            body += currency;
            html = head + body + '</table>';
        }
        $('#part_pallets_table').html(html);
        for (yy = 1; yy < part_pallets_lengths.length+1; yy++) {
            const $row = $(`#part_pallets_table table tbody tr:eq(${yy})`)
            
            $('td:eq(0)', $row).text(yy)
            $('td:eq(1)', $row).text(part_pallets_lengths[yy-1])
            $('td:eq(2)', $row).text(part_pallets_widths[yy-1])
            $('td:eq(3)', $row).text(part_pallets_heights[yy-1])
            $('td:eq(4)', $row).text(part_pallets_quantitys[yy-1])

            lmd = (part_pallets_lengths[yy-1]/100)*(part_pallets_widths[yy-1]/100)*(part_pallets_quantitys[yy-1])/(2.4)
            part_lmd_pre += lmd;
            
        }
        
        $('#item_variable_part_pallets').text(part_lmd_pre);
        if(part_lmd_pre < 4){
            part_lmd = part_lmd_pre;
            window.part_lmd = part_lmd;
            
        }else{
            alert('Max LMD is 4. please select full truck option');
        };
        total_weight_pre= $('#part_pallets_weight').val();
        if(total_weight < 5000){
            total_weight = total_weight_pre
            window.total_weight= total_weight;
        }else{
            alert('Max weight is 5000kg for Part load');
        }
        
        

    });



    // click next button of service
    $('#service_next').click(function() {
        $('.modal').modal('show');
        

        var d = new Date();
        var weekday = d.getDay();
        var day = d.getDate();
        var month  = d.getMonth();
        var hours = d.getHours();
        var minitus = d.getMinutes();
        var year = d.getFullYear();	
        if(business_type == "Express"){

            const data = {
                _token: token,
                from_countries:from_countries_names,
                delivery_countries:delivery_countries_names,
                from: from_countries,
                to: delivery_countries,
                pick_up_codes:pick_up_codes,
                delivery_codes:delivery_codes,
                weight:total_weight,
                service:service,
            }
            
            $.ajax({
                type: "POST",
                url:'/cal_price_express',
                data: data,
                dataType: "json",
                error: function (error) {
                    $('.modal').modal('hide');
                    alert(" Can't calculate because google map api is not working!");
                },
                success: function (data) {
                    $('.date_time').css('display','none');
                    $('.services').css('display','none');
                    $('.date-time').css('display','block');
                    $('.modal').modal('hide');
                    $('#total_price_display').text(data);
                    total_price = data;
                    window.total_price = total_price;

                    
                }
            });
            // for pick-up date
            const data1 = {
                _token: token,
                weekday:weekday,
                day:day,
                month:month,
                hours:hours,
                minitus:minitus,
                year:year,
                service:service,

            }
            $.ajax({
                type: "POST",
                url:'/cal_pick_up_date_express',
                data: data1,
                dataType: "json",
                success: function (data) {
                    objects = $(".btn-details")
                    for(i=0;i<objects.length;i++){
                        // if($(`.btn-details:eq(${i})`).attr('data') >data.pick_up_date+13){
                        //     $(`.btn-details:eq(${i})`).attr("disabled","disabled");
                        // }else if($(`.btn-details:eq(${i})`).attr('data') == data.pick_up_date){
                        //     $(`.btn-details:eq(${i})`).click();
                        //     pick_up_date_start = data.pick_up_date;
                        //     window.pick_up_date_start =pick_up_date_start;
                        // } else if($(`.btn-details:eq(${i})`).attr('data')<data.pick_up_date){
                        //     $(`.btn-details:eq(${i})`).attr("disabled","disabled");
                        // } else if($(`.btn-details:eq(${i})`).attr('data')>data.pick_up_date){
                        //     $(`.btn-details:eq(${i})`).attr("data-ability","enable");
                        // }
                        if ($(`.btn-details:eq(${i})`).attr('data') == data.pick_up_date) {
                            $(`.btn-details:eq(${i})`).click();
                            pick_up_date_start = data.pick_up_date;
                            window.pick_up_date_start =pick_up_date_start;
                        }else {
                            $(`.btn-details:eq(${i})`).attr("disabled","disabled");
                        }
                    }
                    $('#start_time_display').text(data.pick_up_time_start + ":" +"00");
                    $('#end_time_display').text(data.pick_up_time_end + ":" +"00");
                    $('#start_time_display').attr('data-min',data.pick_up_time_start);
                    $('#start_time_display').attr('data',data.pick_up_time_start);
                    $('#end_time_display').attr('data-max',data.pick_up_time_end);
                    $('#end_time_display').attr('data',data.pick_up_time_end);
                    
                    

                    
                }
            });
        }
        if(business_type == "Full_truck") {
            const data = {
                _token: token,
                from_countries:from_countries_names,
                delivery_countries:delivery_countries_names,
                from: from_countries,
                to: delivery_countries,
                pick_up_codes:pick_up_codes,
                delivery_codes:delivery_codes,
                weight:total_weight,
                service:service,

            }
            
            $.ajax({
                type: "POST",
                url:'/cal_price_full_truck',
                data: data,
                dataType: "json",
                error: function (error) {
                    $('.modal').modal('hide');
                    alert(" Can't calculate because google map is not working!" );
                },
                success: function (data) {
                    $('.modal').modal('hide');
                    $('.date_time').css('display','none');
                    $('.services').css('display','none');
                    $('.date-time').css('display','block');
                    $('#total_price_display').text(data);
                    total_price = data;
                    window.total_price = total_price;
                }
            });

            // pick up time
            const data1 = {
                _token: token,
                weekday:weekday,
                day:day,
                month:month,
                hours:hours,
                minitus:minitus,
                year:year,
                service:service,

            }
            $.ajax({
                type: "POST",
                url:'/cal_pick_up_date_full_truck',
                data: data1,
                dataType: "json",
                success: function (data) {
                    objects = $(".btn-details")
                    for(i=0;i<objects.length;i++){
                        if($(`.btn-details:eq(${i})`).attr('data') == data.pick_up_date){
                            $(`.btn-details:eq(${i})`).click();
                            pick_up_date_start = data.pick_up_date;
                            window.pick_up_date_start =pick_up_date_start;
                        } else if($(`.btn-details:eq(${i})`).attr('data')<data.pick_up_date && $(`.btn-details:eq(${i})`).attr('data-month') == month){
                            $(`.btn-details:eq(${i})`).attr("disabled","disabled");
                        }
                        
                    }
                    $('#start_time_display').text(data.pick_up_time_start + ":" +"00");
                    $('#end_time_display').text(data.pick_up_time_end + ":" +"00");
                    $('#start_time_display').attr('data-min',5);
                    $('#start_time_display').attr('data',data.pick_up_time_start);
                    $('#end_time_display').attr('data-max',24);
                    $('#end_time_display').attr('data',data.pick_up_time_end);
                }
            });

        }
        if(business_type == "Part_load") {
            $('.pick-up-time-container').css('display','none');
            $('.possibility-container').css('display','none');
            const data = {
                _token: token,
                from_countries:from_countries_names,
                delivery_countries:delivery_countries_names,
                from: from_countries,
                to: delivery_countries,
                pick_up_codes:pick_up_codes,
                delivery_codes:delivery_codes,
                weight:total_weight,
                lmd:part_lmd,

            }
            
            $.ajax({
                type: "POST",
                url:'/cal_price_part_load',
                data: data,
                dataType: "json",
                error: function (error) {
                    $('.modal').modal('hide');
                    alert(" Can't calculate because google map is not working!" );
                },
                success: function (data) {
                    $('.modal').modal('hide');
                    $('.date_time').css('display','none');
                    $('.services').css('display','none');
                    $('.date-time').css('display','block');
                    $('#total_price_display').text(data);
                    total_price = data;
                    window.total_price = total_price;
                    
                    
                }
            });
            const data1 = {
                _token: token,
                weekday:weekday,
                day:day,
                month:month,
                hours:hours,
                minitus:minitus,
                year:year,
                service:service,

            }
            $.ajax({
                type: "POST",
                url:'/cal_pick_up_date_part_load',
                data: data1,
                dataType: "json",
                success: function (data) {
                    objects = $(".btn-details")
                    for(i=0;i<objects.length;i++){
                        if($(`.btn-details:eq(${i})`).attr('data') == data.pick_up_date){
                            $(`.btn-details:eq(${i})`).click();
                            pick_up_date_start = data.pick_up_date;
                            window.pick_up_date_start =pick_up_date_start;
                        } else if($(`.btn-details:eq(${i})`).attr('data')<data.pick_up_date && $(`.btn-details:eq(${i})`).attr('data-month') == month){
                            $(`.btn-details:eq(${i})`).attr("disabled","disabled");
                        }
                        
                    }
                    $('#pick_up_description').text("Select Pick-up start day (duration will be 5 days)")
                    // $('#start_time_display').text(data.pick_up_time_start + ":" +"00");
                    // $('#end_time_display').text(data.pick_up_time_end + ":" +"00");
                    // $('#start_time_display').attr('data-min',5);
                    // $('#start_time_display').attr('data',data.pick_up_time_start);
                    // $('#end_time_display').attr('data-max',24);
                    // $('#end_time_display').attr('data',data.pick_up_time_end);

                    
                }
            });

        }
        if(business_type == "Truck_specify") {
            const data = {
                _token: token,
                from_countries:from_countries_names,
                delivery_countries:delivery_countries_names,
                from: from_countries,
                to: delivery_countries,
                pick_up_codes:pick_up_codes,
                delivery_codes:delivery_codes,
                weight:total_weight,
                lmd:full_lmd,

            }
            
            $.ajax({
                type: "POST",
                url:'/cal_price_full_specify',
                data: data,
                dataType: "json",
                error: function (error) {
                    $('.modal').modal('hide');
                    alert(" Can't calculate because  google map api is not working!");
                },
                success: function (data) {
                    $('.modal').modal('hide');
                    $('.date_time').css('display','none');
                    $('.services').css('display','none');
                    $('.date-time').css('display','block');
                    $('#total_price_display').text(data);
                    total_price = data;
                    window.total_price = total_price;
                    
                    
                }
            });

            const data1 = {
                weight:total_weight,
                lmd:full_lmd,
                _token: token,
                weekday:weekday,
                day:day,
                month:month,
                hours:hours,
                minitus:minitus,
                year:year,
                service:service,

            }
            $.ajax({
                type: "POST",
                url:'/cal_pick_up_date_full_truck_specify',
                data: data1,
                dataType: "json",
                success: function (data) {
                    objects = $(".btn-details")
                    for(i=0;i<objects.length;i++){
                        if($(`.btn-details:eq(${i})`).attr('data') == data.pick_up_date){
                            $(`.btn-details:eq(${i})`).click();
                            pick_up_date_start = data.pick_up_date;
                            window.pick_up_date_start =pick_up_date_start;
                        } else if($(`.btn-details:eq(${i})`).attr('data')<data.pick_up_date && $(`.btn-details:eq(${i})`).attr('data-month') == month){
                            $(`.btn-details:eq(${i})`).attr("disabled","disabled");
                        }
                        
                    }
                    $('#start_time_display').text(data.pick_up_time_start + ":" +"00");
                    $('#end_time_display').text(data.pick_up_time_end + ":" +"00");
                    $('#start_time_display').attr('data-min',5);
                    $('#start_time_display').attr('data',data.pick_up_time_start);
                    $('#end_time_display').attr('data-max',24);
                    $('#end_time_display').attr('data',data.pick_up_time_end);
                }
            });

        }
        
    });
 
    
    
    
    $('#prev_time_start').click(function(){
        if(business_type=='Express'){
            if(pick_up_date>pick_up_date_start){
                $('#start_time_display').text((parseInt($('#start_time_display').attr('data'))-1) + ":" +"00");
                $('#start_time_display').attr('data',(parseInt($('#start_time_display').attr('data'))-1))
            }else{
                if(parseInt($('#start_time_display').attr('data'))>parseInt($('#start_time_display').attr('data-min'))){
                    $('#start_time_display').text((parseInt($('#start_time_display').attr('data'))-1) + ":" +"00");
                    $('#start_time_display').attr('data',(parseInt($('#start_time_display').attr('data'))-1))
                }
            }
            
        }else{
            if(parseInt($('#start_time_display').attr('data'))>5){
                $('#start_time_display').text((parseInt($('#start_time_display').attr('data'))-1) + ":" +"00");
                $('#start_time_display').attr('data',(parseInt($('#start_time_display').attr('data'))-1))

            }
        }
    });
    $('#prev_time_end').click(function(){
        if(business_type=='Express'||business_type=='Full_truck'||business_type=='Truck_specify'){
            if (parseInt($('#start_time_display').attr('data'))+3<parseInt($('#end_time_display').attr('data'))){
                $('#end_time_display').text((parseInt($('#end_time_display').attr('data'))-1) + ":" +"00");
                $('#end_time_display').attr('data',(parseInt($('#end_time_display').attr('data'))-1));
            }
        }
    });
    $('#next_time_start').click(function(){
        if (parseInt($('#start_time_display').attr('data'))+3<parseInt($('#end_time_display').attr('data'))){
            $('#start_time_display').text((parseInt($('#start_time_display').attr('data'))+1) + ":" +"00");
            $('#start_time_display').attr('data',(parseInt($('#start_time_display').attr('data'))+1));
        }
        
    });
    $('#next_time_end').click(function(){
        if(business_type=='Express'){
            if(pick_up_date>pick_up_date_start){
                $('#end_time_display').text((parseInt($('#end_time_display').attr('data'))+1) + ":" +"00");
                $('#end_time_display').attr('data',(parseInt($('#end_time_display').attr('data'))+1));
            }else{
                if(parseInt($('#end_time_display').attr('data'))<parseInt($('#end_time_display').attr('data-max'))){
                    $('#end_time_display').text((parseInt($('#end_time_display').attr('data'))+1) + ":" +"00");
                    $('#end_time_display').attr('data',(parseInt($('#end_time_display').attr('data'))+1));
                }
            }

        }else{
            if(parseInt($('#end_time_display').attr('data'))<24){
                $('#end_time_display').text((parseInt($('#end_time_display').attr('data'))+1) + ":" +"00");
                $('#end_time_display').attr('data',(parseInt($('#end_time_display').attr('data'))+1));
            }
        }
        
    });
    $('#date_next').click(function() {
        $('.date-time').css('display','none');
        $('.summary-pay').css('display','block');
        $('#before_final').css('display','none');
        $('#final').css('display','block');
        var reference_nr = makeid(9);
        
        var current_year = new Date().getFullYear();
        var lastDay = new Date(current_year, pick_up_date_month, 0).getDate();
        var pick_up_time_start = $('#start_time_display').attr('data');
        var pick_up_time_end = $('#end_time_display').attr('data');
        if ((parseInt(pick_up_date) + 5) % parseInt(lastDay) < 1) {
            var pick_up_end_month =  pick_up_date_month;
        }else {
            var pick_up_end_month =  parseInt(pick_up_date_month) + 1;
        }
        var pick_up_end_date = (parseInt(pick_up_date) + 5) % parseInt(lastDay);
        if (business_type == "Part_load"){
            $('#pick_up_time').text(pick_up_date_month+'/'+pick_up_date+' - '+pick_up_end_month+"/"+pick_up_end_date);
        }else{
            $('#pick_up_time').text(pick_up_date_month +'.'+pick_up_date+'.'+pick_up_time_start+':00'+'-'+pick_up_time_end+':00');
        }
        
        window.pick_up_time_start = pick_up_time_start;
        window.pick_up_time_end = pick_up_time_end;

        var html4 = 
        '<div class="pick-up-details">'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Facility Type</p>'+
                '<select name="facility_type[]" id="facility_type" class="right-input">'+
                    '<option value="individual">Individual</option>'+
                    '<option value="company">Company</option>'+
                '</select>'+
            '</div>'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Company</p>'+
                '<input type="text" class="right-input" id="company_name" name="company_name[]" required>'+
            '</div>'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Contact Person</p>'+
                '<input type="text" class="right-input" id="contact_person" name="contact_person[]" required>'+
            '</div>'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Street & Nr</p>'+
                '<input type="text" class="right-input" id="street_nr" name="street_nr[]" required>'+
            '</div>'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Country and Postcode</p>'+
                '<input type="text" class="right-input" id="country_postcode" name="country_postcode[]" required>'+
            '</div>'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Telephone Number</p>'+
                '<input type="text" class="right-input" id="telephone" name="telephone[]" required>'+
            '</div>'+
            '<div class="container-summary">'+
                '<p class="sub-title-label">Pick-up Reference Nr</p>'+
                '<input type="text" class="right-input" id="reference_nr" name="reference_nr[]" required>'+
            '</div>'+

        '</div>';
        for(i=0;i<pick_up_codes.length;i++){
            let title_number = i + 1;
            $('#pick_up_details').append(`<p style="font-weight:bold">Pick-up ${title_number} </p>`);
            $('#pick_up_details').append(html4);
        }
        for(i=0;i<delivery_codes.length;i++){
            let title_number = i + 1;
            $('#delivery_details').append(`<p style="font-weight:bold">Delivery ${title_number} </p>`);
            $('#delivery_details').append(html4);
        }
        for(i=0;i<pick_up_codes.length;i++){
            $('#pick_up_details #country_postcode').eq(i).val(pick_up_codes[i]);
            $('#pick_up_details #country_postcode').eq(i).attr('readonly',true);
            $('#pick_up_details #reference_nr').eq(i).val(reference_nr);
            $('#pick_up_details #reference_nr').eq(i).attr('readonly',true);
            
        }
        for(i=0;i<delivery_codes.length;i++){
            $('#delivery_details #country_postcode').eq(i).val(delivery_codes[i]);
            $('#delivery_details #country_postcode').eq(i).attr('readonly',true);
            $('#delivery_details #reference_nr').eq(i).val(reference_nr);
            $('#delivery_details #reference_nr').eq(i).attr('readonly',true);
          
        }
        if(business_type == "Express") {
            const data = {
                _token: token,
            }
            
            $.ajax({
                type: "POST",
                url:'/cal_time_express',
                data: data,
                dataType: "json",
                success: function (data) {
                    window.transit_time = data.delivery_time;
                    window.total_distance = data.total_distance;
                    $('#transit_time').text(transit_time + 'h');
                    $('#total_distance').text(total_distance + 'km');
                    $('#cargo_distance').text(total_distance + 'km');
                    $('#cargo_transit').text(transit_time + 'h');
                }
            });

        }
        if(business_type == "Full_truck") {
            const data = {
                _token: token,
                service:service,
            }
            
            $.ajax({
                type: "POST",
                url:'/cal_time_full_truck',
                data: data,
                dataType: "json",
                success: function (data) {
                    window.transit_time = data.delivery_time;
                    window.total_distance = data.total_distance;
                    $('#transit_time').text(transit_time + 'h');
                    $('#total_distance').text(total_distance + 'km');
                }
            });

        }
        if(business_type == "Part_load") {
            const data = {
                _token: token,
            }
            
            $.ajax({
                type: "POST",
                url:'/cal_time_part',
                data: data,
                dataType: "json",
                success: function (data) {
                    window.transit_time = data.delivery_time;
                    window.total_distance = data.total_distance;
                    $('#transit_time').text(transit_time + 'h');
                    $('#total_distance').text(total_distance + 'km');
                }
            });

        }
        if(business_type == "Truck_specify") {
            const data = {
                _token: token,
                weight:total_weight,
                lmd:full_lmd,
            }
            
            $.ajax({
                type: "POST",
                url:'/cal_time_truck_specify',
                data: data,
                dataType: "json",
                success: function (data) {
                    window.transit_time = data.delivery_time;
                    window.total_distance = data.total_distance;
                    $('#transit_time').text(transit_time + 'h');
                    $('#total_distance').text(total_distance + 'km');
                    $('#cargo_distance').text(total_distance + 'km');
                    $('#cargo_transit').text(transit_time + 'h');
                }
            });

        }

        $('#cargo_service').text('Express');
        let vehicle = 'Express' + ' ' + service;

        $('#cargo_vehicle').text(vehicle);
        $('#cargo_weight').text(total_weight);
       
        $('#cargo_pick-up').text(pick_up_date_month +'.'+pick_up_date+'.'+pick_up_time_start+':00'+'-'+pick_up_time_end+':00');
        
    });
    $('#draft').click(function(){
        $("input[name='payment_status']").val('draft');
        $("input[name='service']").val(service);
        $("input[name='weight']").val(total_weight);
        $("input[name='distance']").val(total_distance);
        $("input[name='transit_time']").val(transit_time);
        $("input[name='pick_up_date']").val(year+'-'+pick_up_date_month+"-"+pick_up_date);
        $("input[name='pick_up_time']").val(pick_up_time_start+'-'+pick_up_time_end);

        $("input[name='pick_up_places']").val(transit_time);

        $('form').submit();
    });
    $('#order_pay').click(function(){
        $("input[name='payment_status']").val('pay');
        $("input[name='service']").val(service);
        $("input[name='weight']").val(total_weight);
        $("input[name='distance']").val(total_distance);
        $("input[name='transit_time']").val(transit_time);
        $("input[name='pick_up_date']").val(year+'-'+pick_up_date_month+"-"+pick_up_date);
        $("input[name='pick_up_time']").val(pick_up_time_start+'-'+pick_up_time_end);
        $("input[name='pick_up_places']").val(pick_up_codes.length);
        $('form').submit();
    });


    
});