@extends('layouts.app')

@section('content')
<div class="contain-section">
    <div class="row">
        <div class="col-sm-3 left-pannel" style="padding:inherit">
            <div class="prev-quotes">
                <i class='fas fa-undo-alt' style='font-size:18px'></i>
                <span class ="prev-title">Previous Quotes</span>
            </div>
            <div class="prev">
                <div class="pre-pick-up">
                    <i class='fas fa-arrow-circle-up' style='font-size:17px;color:black'></i>
                    <span class='pre-pick-up-place'>DE, 51149 Kolle</span>
                </div>
                <div class="pre-delivery">
                    <i class='fas fa-arrow-circle-down' style='font-size:17px;color: #4d94ff;'></i>
                    <span class='pre-pick-up-place'>BE, 9000 </span>
                </div>
                <div class="delivery-details">
                    <span>Total-weight: 24000kg</span>
                    <span class="quote-again">Quote Again</span>
                </div>
                    
            </div>
        </div>
        <div class="col-sm-5 center-pannel">
            <div class="details">
                <div class="sub-titles">
                    <span class="subtitle-1">Details</span>
                    <span class="subtitle">Service</span>
                    <span class="subtitle">Date & time</span>
                    <span class="subtitle">Summary & Pay</span>
                </div>
                <div class="small-title">
                    <p class="small-title-letter">New Shipment</p>
                    <p class="small-title-desc">Please enter the postal code or city and the total weight of your load.</br>You will provide the exact address and other details at a later stage.
                    </p>
                </div>
                <div class="pick-up-postal-code">
                    <p class="label">Pick-up Postalcode/City</p>
                    <div class="pick-up_country-container">
                        <div class="postal-code-input">
                            <select name="pick_up_country" class="countries" id="pick_up_country1">
                                <option value="DE" >Germany</option>
                                <option value="PL" >Poland</option>
                                <option value="NL" >Nolland</option>
                                <option value="BE">Belgium</option>
                                <option value="LU">Luxembourg</option>
                                <option value="FR">France</option>
                                <option value="ES">Spain</option>
                                <option value="PT">Portugal</option>
                                <option value="CH">Switzerland</option>
                                <option value="AT">Austria</option>
                                <option value="IT">Italy</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="SK">Slovakia</option>
                                <option value="DK">Denmark</option>
                                <option value="SE">Sweden</option>
                                <option value="NO">Norway</option>
                            </select>
                            <input type="text" class="postalcode" placeholder="postalcode" name="pick_up_code" value="" id="pick_up_code1">
                        </div>
                        <div class="postal-code-input" style="display:none;">
                            <select name="pick_up_country" class="countries" id="pick_up_country2">
                                <option value="DE" >Germany</option>
                                <option value="PL" >Poland</option>
                                <option value="NL" >Nolland</option>
                                <option value="BE">Belgium</option>
                                <option value="LU">Luxembourg</option>
                                <option value="FR">France</option>
                                <option value="ES">Spain</option>
                                <option value="PT">Portugal</option>
                                <option value="CH">Switzerland</option>
                                <option value="AT">Austria</option>
                                <option value="IT">Italy</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="SK">Slovakia</option>
                                <option value="DK">Denmark</option>
                                <option value="SE">Sweden</option>
                                <option value="NO">Norway</option>
                            </select>
                            <input type="text" class="postalcode" placeholder="postalcode" name="pick_up_code" value="" id="pick_up_code2">
                        </div>
                        <div class="postal-code-input" style="display:none;">
                            <select name="pick_up_country" class="countries" id="pick_up_country3">
                                <option value="DE" >Germany</option>
                                <option value="PL" >Poland</option>
                                <option value="NL" >Nolland</option>
                                <option value="BE">Belgium</option>
                                <option value="LU">Luxembourg</option>
                                <option value="FR">France</option>
                                <option value="ES">Spain</option>
                                <option value="PT">Portugal</option>
                                <option value="CH">Switzerland</option>
                                <option value="AT">Austria</option>
                                <option value="IT">Italy</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="SK">Slovakia</option>
                                <option value="DK">Denmark</option>
                                <option value="SE">Sweden</option>
                                <option value="NO">Norway</option>
                            </select>
                            <input type="text" class="postalcode" placeholder="postalcode" name="pick_up_code" value="" id="pick_up_code3">
                        </div>
                    </div>
                    <div style="height:35px;">
                        <div class="pick-up-botton-container">
                            <span>+</span>
                            <button class="pick-up-button" id="add_pick_up">Add another pick-up</button>
                        </div>
                    </div>
                   
                        
                    <p class="label">Delivery Postalcode/City</p>
                    <div class="delivery-postal-code-input-container">
                        <div class="postal-code-input">
                            <select name="delivery_country" class="countries" id="delivery_country1"> 
                                <option value="DE" >Germany</option>
                                <option value="PL" >Poland</option>
                                <option value="NL" >Nolland</option>
                                <option value="BE">Belgium</option>
                                <option value="LU">Luxembourg</option>
                                <option value="FR">France</option>
                                <option value="ES">Spain</option>
                                <option value="PT">Portugal</option>
                                <option value="CH">Switzerland</option>
                                <option value="AT">Austria</option>
                                <option value="IT">Italy</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="SK">Slovakia</option>
                                <option value="DK">Denmark</option>
                                <option value="SE">Sweden</option>
                                <option value="NO">Norway</option>
                            </select>
                            <input type="text" class="postalcode" placeholder="postalcode" name="delivery_code" value="" id='delivery_code1'>
                        </div>
                        <div class="postal-code-input" style="display:none;">
                            <select name="delivery_country" class="countries" id="delivery_country2">
                                <option value="DE" >Germany</option>
                                <option value="PL" >Poland</option>
                                <option value="NL" >Nolland</option>
                                <option value="BE">Belgium</option>
                                <option value="LU">Luxembourg</option>
                                <option value="FR">France</option>
                                <option value="ES">Spain</option>
                                <option value="PT">Portugal</option>
                                <option value="CH">Switzerland</option>
                                <option value="AT">Austria</option>
                                <option value="IT">Italy</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="SK">Slovakia</option>
                                <option value="DK">Denmark</option>
                                <option value="SE">Sweden</option>
                                <option value="NO">Norway</option>
                            </select>
                            <input type="text" class="postalcode" placeholder="postalcode" name="delivery_code" value="" id='delivery_code2'>
                        </div>
                        <div class="postal-code-input" style="display:none;">
                            <select name="delivery_country" class="countries" id="delivery_country3">
                                <option value="DE" >Germany</option>
                                <option value="PL" >Poland</option>
                                <option value="NL" >Nolland</option>
                                <option value="BE">Belgium</option>
                                <option value="LU">Luxembourg</option>
                                <option value="FR">France</option>
                                <option value="ES">Spain</option>
                                <option value="PT">Portugal</option>
                                <option value="CH">Switzerland</option>
                                <option value="AT">Austria</option>
                                <option value="IT">Italy</option>
                                <option value="CZ">Czech Republic</option>
                                <option value="SK">Slovakia</option>
                                <option value="DK">Denmark</option>
                                <option value="SE">Sweden</option>
                                <option value="NO">Norway</option>
                            </select>
                            <input type="text" class="postalcode" placeholder="postalcode" name="delivery_code" value="" id='delivery_code3'>
                        </div>
                    </div>
                    <div style="height:35px;">
                        <div class="pick-up-botton-container">
                            <span>+</span>
                            <button class="pick-up-button" id="add_delivery">Add another delivery</button>
                        </div>
                    </div>
                        
                    <p class="label">Total weight</p>
                    <div class="weight-input">
                        <input type="number" class="weight" value="90">
                        <span class="weight-number">kg</span>
                    </div>
                    <div class="Details-next">
                        <button class='next-button' id='details_next'>continue</button>
                    </div>
                </div>
            </div>
            <div class="services">
                <div class="sub-titles">
                    <span class="subtitle-1">Details</span>
                    <span class="subtitle-1">Service</span>
                    <span class="subtitle">Date & time</span>
                    <span class="subtitle">Summary & Pay</span>
                </div>
                <div class="small-title">
                    <p class="small-title-letter">Service</p>
                    <p class="small-title-desc">Choose a vehicle from the list or enter the dimensions of your load and</br>we will select the right vehicle for you.
                    </p>
                </div>
                <div class="options">
                    <p class="label">Select the option</p>
                    <div class="option-logo-container">
                        <div class="option-container active-border">
                            <a class="express-truck" id="express_truck">
                                <img src="/img/express.png" alt="" class='option-image'>
                                <p class="logo-description">Express</p>
                            </a>
                        </div>
                        <div class="option-container" >
                            <a class="express-truck" id="Full_truck">
                                <img src="/img/truck.png" alt="" class='option-image'>
                                <p class="logo-description">Full Truck</p>
                            </a>
                        </div>
                        <div class="option-container">
                            <a class="express-truck" id="part_load">
                                <img src="/img/express.png" alt="" class='option-image'>
                                <p class="logo-description">Part Load</p>
                            </a>
                        </div>
                        <p class="small-title-desc" id="experss-desc">Choose express if you need to delivery something urgent. Maximum weight</br>up to 1200 kg and maximum dimensions of 480 x 220 x 220 cm
                        </p>
                        <p class="small-title-desc" id="truck-desc">Choose express if you need to delivery something urgent. Maximum weight</br>up to 1200 kg and maximum dimensions of 480 x 220 x 220 cm
                        </p>
                        <p class="small-title-desc" id="part-desc">Choose express if you need to delivery something urgent. Maximum weight</br>up to 1200 kg and maximum dimensions of 480 x 220 x 220 cm
                        </p>
                    </div>

                </div>
                <div class="express-capacity">
                    <p class="label">Select capacity</p>
                    <div class="capacity-logo-container">
                        <div class="option-container active-border">
                            <a class="express-truck" id="S_option">
                                <img src="/img/express.png" alt="" class='option-image'>
                                <p class="logo-description">S<br>up to <br>2 pallets</p>
                            </a>
                        </div>
                        <div class="option-container">
                            <a class="express-truck" id="M_option">
                                <img src="/img/truck.png" alt="" class='option-image'>
                                <p class="logo-description">M <br>up to <br>4 pallets</p>
                            </a>
                        </div>
                        <div class="option-container">
                            <a class="express-truck" id="L_option">
                                <img src="/img/express.png" alt="" class='option-image'>
                                <p class="logo-description">L<br>up to <br>8 pallets</p>
                            </a>
                        </div>
                        <p class="small-title-desc" id="S_desc">Your cargo must fit in area of 1.92 m<sup>2</sup>/ 4.22 m<sup>3</sup><br>E.g.:160 x 120 x 220(h) cm <br>Max weight:300 kg <br>No dimension shall exceed:: Lenght 420 cm, Width 220 cm, Height 220 cm <br>Lenght + width must be less or equal 280 cm
                        </p>
                        <p class="small-title-desc" id="M_desc">Your cargo must fit in area of 3.84 m<sup>2</sup>/ 8.45 m<sup>3</sup><br>E.g.:320 x 120 x 220(h) cm <br>Max weight:600 kg <br>No dimension shall exceed:: Lenght 420 cm, Width 220 cm, Height 220 cm <br>Lenght + width must be less or equal 440 cm
                        </p>
                        <p class="small-title-desc" id="L_desc">Your cargo must fit in area of 9.24 m<sup>2</sup>/ 20.33 m<sup>3</sup><br>E.g.:420 x 120 x 220(h) cm <br>Max weight:1200 kg <br>No dimension shall exceed:: Lenght 420 cm, Width 220 cm, Height 220 cm <br>Lenght + width must be less or equal 640 cm
                        </p>
                    </div>
                </div>
                <div class="full-truck-option">
                    <p class="label">Choose a option</p>
                    <div class="choose-option-container">
                        <a  class="choose-option" id="full_truck_select_vehicle"><div class='choose-vehicle active-border'>Select<br>vehicle</div></a> 
                        <span style= "vertical-align:super;">or</span> 
                        <a class="choose-option" id="full_truck_select_specify"><div class='choose-vehicle'>Specify<br>dimensions</div></a>
                    </div>
                    <div class="option-logo-container" id="full-truck-options">
                        <div class="option-container active-border">
                            <a class="express-truck" id="full_truck_van">
                                <img src="/img/van.png" alt="" class='option-image'>
                                <p class="logo-description">Van</p>
                            </a>
                        </div>
                        <div class="option-container">
                            <a class="express-truck" id="full_truck_full_truck">
                                <img src="/img/truck.png" alt="" class='option-image'>
                                <p class="logo-description">Full Truck</p>
                            </a>
                        </div>
                        <div class="option-container">
                            <a class="express-truck" id="full_truck_trailer">
                                <img src="/img/trainer.jpg" alt="" class='option-image'>
                                <p class="logo-description">Truck with trailer</p>
                            </a>
                        </div>
                        <div class="express-description" id="van_description">
                            <input type="checkbox" class="custom_checkbox" id="van_xl" value="Van_XL"><span class="checkbox-desc">Van XL(Length 480 cm)</span>
                            <p class="small-title-desc" id="van-desc">Van dimensions: Lenght 420 cm, Width 220 cm, Height 220 cm</br>Max weight: 1200 kg<br>Curtain van, side or back loading.No rampheight
                            </p>
                        </div>
                        <div class="express-description" id="truck_description">
                            <input type="radio" name="gender" class="custom_checkbox" id="truck_600" value="Truck_600"><label class="checkbox_label" for="truck_600">Length >= 600 cm</label><br>
                            <input type="radio" name="gender" class="custom_checkbox" id="truck_720" value="Truck_720"><label class="checkbox_label" for="truck_720">Length >= 720 cm</label><br>
                            <input type="radio" name="gender" class="custom_checkbox" id="truck_820" value="Truck_820"><label class="checkbox_label" for="truck_820">Length >= 600 cm</label>
                            
                            <p class="small-title-desc" id="trucker_600_desc">Truck dimensions: Lenght 600 cm, Width 245 cm, Height 245 cm</br>Max weight: 3500 kg<br>Curtain van, side or back loading.Rampheight 110 cm
                            </p>
                            <p class="small-title-desc" id="trucker_720_desc">Truck dimensions: Lenght 720 cm, Width 245 cm, Height 245 cm</br>Max weight: 5000 kg<br>Curtain van, side or back loading.Rampheight
                            </p>
                            <p class="small-title-desc" id="trucker_820_desc">Truck dimensions: Lenght 820 cm, Width 220 cm, Height 220 cm</br>Max weight: 9000 kg<br>Curtain van, side or back loading.Rampheight
                            </p>
                        </div>
                        <div class="express-description" id="trailer-description">
                            <p class="small-title-desc" id="trailer-desc">Trailer dimensions: Lenght 1360 cm, Width 245 cm, Height 270 cm</br>Max weight: 24000 kg<br>Curtain van, side or back loading.Rampheight 120 cm
                            </p>
                        </div>
                        
                    </div>
                    <div class="specify-dimension">
                        <div class="dimensions">
                            <button class="customized active-border" id="full_truck_specify_customized">Customized</button>
                            <button class="customized" id="full_truck_specify_pallets">Pallets</button>
                        </div>
                        <div class="customized-container" id="full_truck_customized">
                            <p class="enter-label">Enter lenght, width and height of each item and total<br>weight of all items
                            </p>
                            <div class="weight-input-container">
                                <div class="input-label">Total weight</div>
                                <div class="input-group-container">
                                    <input type="number" class="input-form" id='tatal_weight_full_truck'>
                                    <span class="currency_input">kg</span>
                                </div>
                            </div>

                            <div class="dimension-input-container">
                                <div class="weight-input-container-1">
                                    <div class="input-label">Lenght</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form" id='full_custom_length'>
                                        <span class="currency_input">cm</span>
                                    </div>
                                </div>
                                <div class="weight-input-container-1">
                                    <div class="input-label">Width</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form"  id='full_custom_width'>
                                        <span class="currency_input">cm</span>
                                    </div>
                                </div>
                                <div class="weight-input-container-1">
                                    <div class="input-label">Height</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form"  id='full_custom_height'>
                                        <span class="currency_input">cm</span>
                                    </div>
                                </div>
                                <div class="weight-input-container-1" style="margin-right:0px">
                                    <div class="input-label">Quantity</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form"  id='full_custom_quantity'>
                                        <span class="currency_input">pcs</span>
                                    </div>
                                </div>
                                <div>
                                    <button class="dimension-add" id="full_truck_customized_add">Add</button>
                                </div>
                                
                            </div>
                            <div class="item-list-container">
                                <div class="item-list-title">
                                    <div class="item-list-content">Item list</div>
                                    <div class="item-variable-container">
                                        <span>Total</span>
                                        <span id="item_variable"></span>
                                        <span>LDM</span>
                                    </div>
                                </div>
                                <div class="table" id='full_truck_customized_table'>
                                    <table style="width:100%">
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Lenght</th>
                                            <th>Width</th>
                                            <th>Height</th>
                                            <th>Quantity</th>
                                            <th>Options</th>
                                        </tr>
                                    
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="pallets-container" id="full_truck_pallets">
                            <div class="pallets-options-container" style="padding-top:25px">
                                <button class="customized" id="full_specify_euro">Euro Pallets</button>
                                <button class="customized" id="full_specify_indu">Industrial Pallets</button>
                                <button class="customized" id="full_specify_other">Other Pallets</button>
                                <div class="weight-input-container" id="pallets_weight_container">
                                    <div class="input-label">Total weight</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form" id='full_specify_pallets_weight'>
                                        <span class="currency_input">kg</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pallets-input-options">

                                <div class="dimension-input-container">
                                    <div class="weight-input-container-1">
                                        <div class="input-label">Lenght</div>
                                        <div class="input-group-container">
                                            <input type="number" class="input-form" id="full_specify_pallets_length">
                                            <span class="currency_input">cm</span>
                                        </div>
                                    </div>
                                    <div class="weight-input-container-1">
                                        <div class="input-label">Width</div>
                                        <div class="input-group-container">
                                            <input type="number" class="input-form" id="full_specify_pallets_width">
                                            <span class="currency_input">cm</span>
                                        </div>
                                    </div>
                                    <div class="weight-input-container-1">
                                        <div class="input-label">Height</div>
                                        <div class="input-group-container">
                                            <input type="number" class="input-form">
                                            <span class="currency_input">cm</span>
                                        </div>
                                    </div>
                                    <div class="weight-input-container-1" style="margin-right:0px;">
                                        <div class="input-label">Quantity</div>
                                        <div class="input-group-container">
                                            <input type="number" class="input-form" id="full_specify_pallets_quantity">
                                            <span class="currency_input">pcs</span>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="dimension-add" id="full_specify_pallets_add">Add</button>
                                    </div>
                                </div>
                            </div>
                            <div class="item-list-container">
                                <div class="item-list-title">
                                    <div class="item-list-content">Item list</div>
                                    <div class="item-variable-container">
                                        <span>Total</span>
                                        <span id="item_variable_full"></span>
                                        <span>LDM</span>
                                    </div>
                                </div>
                                <div class="table" id="full_specify_pallets_table">
                                    <table style="width:100%">
                                        <tr>
                                            <th>Nr.</th>
                                            <th>Lenght</th>
                                            <th>Width</th>
                                            <th>Height</th>
                                            <th>Quantity</th>
                                            <th>Options</th>
                                        </tr>
                                        
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="part-load-option">
                    <p class="label">Choose the option</p>

                    <div class="dimensions">
                        <button class="customized active-border" id="part_load_specify_customized_select">Customized</button>
                        <button class="customized" id="part_load_specify_pallets_select">Pallets</button>
                    </div>
                    <div class="customized-container" id="part_load_customize">
                        <p class="enter-label">Enter lenght, width and height of each item and total<br>weight of all items
                        </p>
                        <div class="weight-input-container">
                            <div class="input-label">Total weight</div>
                            <div class="input-group-container">
                                <input type="number" class="input-form" id="part_custom_weight">
                                <span class="currency_input">kg</span>
                            </div>
                        </div>

                        <div class="dimension-input-container">
                            <div class="weight-input-container-1">
                                <div class="input-label">Lenght</div>
                                <div class="input-group-container">
                                    <input type="number" class="input-form" id="part_custom_length" >
                                    <span class="currency_input">cm</span>
                                </div>
                            </div>
                            <div class="weight-input-container-1">
                                <div class="input-label">Width</div>
                                <div class="input-group-container">
                                    <input type="number" class="input-form" id="part_custom_width">
                                    <span class="currency_input">cm</span>
                                </div>
                            </div>
                            <div class="weight-input-container-1">
                                <div class="input-label">Height</div>
                                <div class="input-group-container">
                                    <input type="number" class="input-form" id="part_custom_height">
                                    <span class="currency_input">cm</span>
                                </div>
                            </div>
                            <div class="weight-input-container-1" style="margin-right:0px;">
                                <div class="input-label">Quantity</div>
                                <div class="input-group-container">
                                    <input type="number" class="input-form" id="part_custom_quantity">
                                    <span class="currency_input">pcs</span>
                                </div>
                            </div>
                            <div>
                                <button class="dimension-add" id="part_load_custom_add">Add</button>
                            </div>
                            
                        </div>
                        <div class="item-list-container">
                            <div class="item-list-title">
                                <div class="item-list-content">Item list</div>
                                <div class="item-variable-container">
                                    <span>Total</span>
                                    <span id="item_variable_part_custom">*</span>
                                    <span>LDM</span>
                                </div>
                            </div>
                            <div class="table" id="part_load_custom_table">
                                <table style="width:100%">
                                    <tr>
                                        <th>Nr.</th>
                                        <th>Lenght</th>
                                        <th>Width</th>
                                        <th>Height</th>
                                        <th>Quantity</th>
                                        <th>Options</th>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="pallets-container" id="part_load_pallets">
                        <div class="pallets-options-container" style="padding-top:25px">
                            <button class="customized" id="part_pallets_euro">Euro Pallets</button>
                            <button class="customized" id="part_pallets_indus">Industrial Pallets</button>
                            <button class="customized" id="part_pallets_other">Other Pallets</button>
                            <div class="weight-input-container" id="pallets_weight_container">
                                <div class="input-label">Total weight</div>
                                <div class="input-group-container">
                                    <input type="number" class="input-form" id="part_pallets_weight">
                                    <span class="currency_input">kg</span>
                                </div>
                            </div>
                        </div>
                        <div class="pallets-input-options">

                            <div class="dimension-input-container">
                                <div class="weight-input-container-1">
                                    <div class="input-label">Lenght</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form" id="part_pallets_length">
                                        <span class="currency_input">cm</span>
                                    </div>
                                </div>
                                <div class="weight-input-container-1">
                                    <div class="input-label">Width</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form" id="part_pallets_width">
                                        <span class="currency_input">cm</span>
                                    </div>
                                </div>
                                <div class="weight-input-container-1">
                                    <div class="input-label">Height</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form" id="part_pallets_height">
                                        <span class="currency_input">cm</span>
                                    </div>
                                </div>
                                <div class="weight-input-container-1" style="margin-right:0px;">
                                    <div class="input-label">Quantity</div>
                                    <div class="input-group-container">
                                        <input type="number" class="input-form" id="part_pallets_quantity">
                                        <span class="currency_input">pcs</span>
                                    </div>
                                </div>
                                <div>
                                    <button class="dimension-add" id="part_pallets_add">Add</button>
                                </div>
                            </div>
                        </div>
                        <div class="item-list-container">
                            <div class="item-list-title">
                                <div class="item-list-content">Item list</div>
                                <div class="item-variable-container">
                                    <span>Total</span>
                                    <span id="item_variable_part_pallets">2.21</span>
                                    <span>LDM</span>
                                </div>
                            </div>
                            <div class="table" id="part_pallets_table">
                                <table style="width:100%">
                                    <tr>
                                        <th>Nr.</th>
                                        <th>Lenght</th>
                                        <th>Width</th>
                                        <th>Height</th>
                                        <th>Quantity</th>
                                        <th>Options</th>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="add-service">

                </div>
                <div class="Details-next">
                    <button class='next-button' id='service_next' >continue</button>
                </div>
                <div class="modal fade bd-example-modal-lg" data-backdrop="static" data-keyboard="false" tabindex="-1">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content" style="width: 48px">
                            <span class="fa fa-spinner fa-spin fa-3x"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="date-time">
                <div class="sub-titles">
                    <span class="subtitle-1">Details</span>
                    <span class="subtitle-1">Service</span>
                    <span class="subtitle-1">Date & time</span>
                    <span class="subtitle">Summary & Pay</span>
                </div>
                <div class="small-title">
                    <p class="small-title-letter">Date & Time</p>
                    <p class="small-title-desc">The earliest pick-up date and time are given below. If you wish your cargo</br>to be collected at a different time-change the date.
                    </p>
                </div>
                <div class="pick-up-date-container">
                    <p class="label" id="pick_up_description">Pick-up Date</p>
                    <button id="prev_btn" class="prev-button"><</button>
                    <div class="date-container" style="width: calc(100% - 47px);;display:inline-block">
                        <div class="owl-carousel owl-theme">
                        <?php $weekdays = ['Sunday','Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                            $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        
                        
                            $date = Session::get('year')."-".Session::get('month')."-".Session::get('day');
                            $lastday = (int)date('t',strtotime($date));
                            
                        ?>
                        @for ($i = 0; $i < 21; $i++)
                            <?php if ((Session::get('day')+$i) > $lastday) {$days = ((Session::get('day')+$i) % $lastday); $month = (Session::get('month') + 1);} else { $days = Session::get('day')+$i; $month = (Session::get('month'));}?>
                            <div class="item">
                                <button class="btn-details" data= <?php echo $days;?> data-month=<?php echo $month?> onclick=<?php echo 'button_click_event('.$i.')'?>>{{$weekdays[(Session::get('weekday')+$i)%7]}}<br>{{$days}}<br>{{$months[$month]}}
                                </button>
                            </div>
                        @endfor
                        </div>
                    </div>
                    <button id="next_btn" class="prev-button">></button>
                </div>
                <div class="pick-up-time-container">
                    <p class="label">Pick-up Time</p>
                    <div class="d-inline-block button-group">
                        <button id="prev_time_start" class="pick-up-time-button" style="padding-left:10px">-</button>
                        <p class="d-inline-block time-display" style="padding-left:10px;padding-right:10px" id="start_time_display">17:00</p>
                        <button id="next_time_start" class="pick-up-time-button" style="padding-right:10px">+</button>
                    </div>
                    <span style="margin-left:30px;margin-right:30px;font-size:20px;">to</span>
                    <div class="d-inline-block button-group">
                        <button id="prev_time_end" class="pick-up-time-button" style="padding-left:10px">-</button>
                        <p class="d-inline-block time-display" style="padding-left:10px;padding-right:10px" id="end_time_display">20:00</p>
                        <button id="next_time_end" class="pick-up-time-button" style="padding-right:10px">+</button>
                    </div>
                    
                </div>
                <br>
                <div class="possibility-container">
                    <input type="checkbox" class="custom_checkbox" id="van_xl" value="Van_XL"><span class="checkbox-desc">Pick up possible 24h</span>
                </div>
                
                
                <p class="label" style="margin-top:20px;">Delivery Date & Time</p>
                <input type="checkbox" class="custom_checkbox" id="" value="" checked><span class="checkbox-desc" style="margin-right:20px;">Delivery as soon as possible</span>
                <input type="checkbox" class="custom_checkbox" id="" value=""><span class="checkbox-desc">Specify the delivery date<span>
                <div class="date-next" style="margin-top:30px;">
                    <button class='next-button' id='date_next'>continue</button>
                </div>
            </div>
            <div class="summary-pay">
                <div class="sub-titles">
                    <span class="subtitle-1">Details</span>
                    <span class="subtitle-1">Service</span>
                    <span class="subtitle-1">Date & time</span>
                    <span class="subtitle-1">Summary & Pay</span>
                </div>
                <div class="small-title">
                    <p class="small-title-letter">Summary</p>
                    <p class="small-title-desc">Enter the details of the sender and recipient and check</br>the correctness of the entered data.
                    </p>
                </div>
                <form action="{{ route('register_shipment') }}" method="POST">
                @csrf
                    <input type="hidden" name="service">
                    <input type="hidden" name="weight">
                    <input type="hidden" name="distance">
                    <input type="hidden" name="transit_time">
                    <input type="hidden" name="payment_status">
                    <input type="hidden" name="pick_up_places">
                    <input type="hidden" name="pick_up_date">
                    <input type="hidden" name="pick_up_time">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <p class="label">Pick-up details</p>
                    <div id="pick_up_details"></div>
                    <p class="label">Delivery details</p>
                    <div id="delivery_details"></div>
                    <p class="label">Cargo Details</p>
                    <div class="cargo-container">
                        <div><p class="cargo-label">services</p><span id="cargo_service">Express</span></div> 
                        <div><p class="cargo-label">Vehicle type</p><span id="cargo_vehicle"></span></div> 
                        <div><p class="cargo-label">Total weight</p><span id="cargo_weight"></span></div> 
                        <div><p class="cargo-label">Distance</p><span id="cargo_distance"></span></div> 
                        <div><p class="cargo-label">Pick-up</p><span id="cargo_pick-up"></span></div> 
                        <div><p class="cargo-label">Est. transit time</p><span id="cargo_transit"></span></div> 

                    </div>
                    <input type="checkbox" class="custom_checkbox" id="" value=""><span class="checkbox-desc">I accept terms</span>
                    </br>
                    <input type="checkbox" class="custom_checkbox" id="" value=""><span class="checkbox-desc">I accept another terms</span>
                </form>
                
            </div>

        </div>
        <div class="col-sm-3">
            <div id="before_final">
                <div class="right-desc" style="margin-top:80px;">
                    <div class="sub-right-titile">
                        <i class="far fa-hand-paper" style="font: size 20px;margin-right:5px"></i>
                        <span style="margin-right:5px;">Free insurance!</span>
                        <a href="">For every load</a>
                    </div>
                    <p style="margin-bottom:0px;">Your cargo is always insured up to &euro; 50 000 for free.</br>The unsurance covers, among other things, damage in tansit.</p>
                    
                </div>
                <div class="right-desc">
                    <div class="sub-right-titile">
                        <i class="far fa-hand-spock" style="font: size 20px;margin-right:5px;"></i>
                        <span style="margin-right:5px;">Need help?</span>
                        <a href="">We answer immediately</a>
                    </div>
                    <p style="margin-bottom:0px;">The fastest way to get help is through our live chat.</br>We work 7 days a week 7:00 - 21:00</p>
                    
                </div>
                <div class="right-desc">
                    <p class="sub-title-class">Pick-up Postcode/City</p>
                    <div id="pick_up_insert">
                        
                    </div>
                    <p class="sub-title-class">Delivery Postcode/City</p>
                    <div id="delivery_insert"></div>
                </div>
                <div class="right-desc">
                    <div class="row">
                        <div class="col-md-8" style="font-size:13px;">
                            <p class="sub-title-class">Total weight: <span style="margin-left:5px" class='input-field' id="total_weight"></span></p>
                            <p class="sub-title-class">Distance:<span  style="margin-left:5px" class='input-field' id="total_distance"></span></p>
                            <p class="sub-title-class">Earliest pick-up:</p><span class='input-field' id="pick_up_time"></span>
                            <p class="sub-title-class">Est. transit time:<span style="margin-left:5px" class='input-field' id="transit_time"></span></p>
                        </div>
                        <div class="col-md-4">
                            <p style="margin-bottom:0px;font-size:10px;">From</p>
                            <p style="margin-bottom:0px;font-size:16px;font-weight:bold">&euro;<span id='total_price_display'></span></p>
                            <p style="margin-bottom:0px;font-size:10px;">netto (VAT excl.)</p>
                        </div>
                    </div>
                    
                </div>

            </div>
            <div id="final">
                <div class="right-desc">
                    <button class="draft" id="draft">Save as Draft</button>
                    <button class="buttn-style" id="order_pay">Order & Pay</button>
                
                </div>
            </div>
                
            
        </div>
    </div>
</div>

    
@endsection