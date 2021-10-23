   
         <!-- 
            <div class="headerSpace"></div> -->
         <br>
         <div class="loginBlock" style="height: 150px;">
            <div class="loginTop triggerBlock">
               <div class="orderBlock">
                  <!-- <h3 class="sliderUp50d1">How to Order</h3> -->
                  <div class="orderFlow">
                     <div class="orderFlowRibbon circle-ribbon"></div>
                     <ul class="orderFlowItems">
                        <li class="orderFlowItem1 active" >
                           <p>Address Details</p>
                           <div class="icon">1</div>
                        </li>
                        <li class="orderFlowItem2 ">
                           <p>Shipping Methods</p>
                           <div class="icon">2</div>
                        </li>
                       <!--  <li class="orderFlowItem3">
                           <p>Payment Options</p>
                           <div class="icon">3</div>
                        </li> -->
                        <li class="orderFlowItem4">
                          <p>Place Order</p>
                           <div class="icon">3</div>
                        </li>
                     </ul>
                  </div>
                  <!-- <h4 class="sliderUp50d1">valuble and easy to print</h4> -->
               </div>
            </div>
         </div>
         <div class="contantBlock blockEnd">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-lg-8">
                     <div class="row">
                        <div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
                           <h4 class="mb-0 font-weight-bold">Shipping Address</h4>
                           <!-- <a class="btn mt-md-0 mt-3 conti_shop" href="#" >Continue Shoping</a> -->
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-4 chk-making-radio" >
                           <div  class="lenthdiv adding-address-box address-box3 " style="text-align: left;padding: 14px;height: 200px;">
                              <address>
                                 Ajith Kc<br>
                                 P.O.Box:92351<br>
                                 Riyadh, 11653<br>
                                 Saudi Arabia<br>
                                <a href="tel:580760706">  +966 580760706 </a>                                            
                              </address>
                                <a href="javascript:void(0)" class="btn btn-fill-out ship_here" style="color: #000;padding: 2px 10px 2px 10px;float: right;border: 1px solid black;font-size: 14px;display: none;">Ship Here</a>
                              <input class="radioshipgere" type="radio"  name="shiphere" value="1">

                           </div>
                        </div>
                        <div class="col-md-4 chk-making-radio" >
                           <div  class="lenthdiv adding-address-box address-box3" style="text-align: left;padding: 14px;height: 200px;">
                                <address>
                                 Ajith Kc<br>
                                 P.O.Box:92351<br>
                                 Riyadh, 11653<br>
                                 Saudi Arabia<br>
                                <a href="tel:580760706">  +966 580760706 </a>                                            
                              </address>
                           <a href="javascript:void(0)" class="btn btn-fill-out ship_here" style="color: #000;padding: 2px 10px 2px 10px;float: right;border: 1px solid black;font-size: 14px;">Ship Here</a>
                           <input class="radioshipgere" type="radio"  name="shiphere" value="2">
                           </div>
                        </div>
                        <div class="col-md-4 chk-making-radio" id="add_address_shipping">
                           <div class="adding-address-box address-box3" style="height: 200px;" data-toggle="modal" data-target="#exampleModal">
                              <div class="add-plus-class" id="add_sh_address">
                                 <div class="add-plus-img">
                                    <button type="button" data-country-code="IN" class="delivery-add-new" data-address-type="checkout-del">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    </button>
                                 </div>
                                 <div class="add-plus-title">
                                    <span class="checkout-address-title"><b>Add New Address</b></span>
                                 </div>
                              </div>
                           </div>
                        </div>
              </div>
              <br>
                   <div class="row">
                     <div class="col-md-12">
                        <div class="form-check" style="padding-left: 0;">
     <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
     <label class="form-check-label" for="flexCheckChecked">
      My billing address is the same as my delivery address                        
     </label>
   </div>
                     </div>
                   </div>
   <br>
                     <div class="row">
                           <div class="col-md-12">
                        <div id="billing_address" style="display: none;width: 100%;">

           <h5 class="modal-title" id="">Delivery Address </h5>
           <br>
        <form method="post" class="delivery_add">
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text" required="" class="form-control" name="fname" placeholder="First name" required="">
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" required="" class="form-control" name="lname" placeholder="Last name " required="">
                       </div>
                   </div>
               </div>
                <div class="form-row">
                 <div class="col-12 col-md-12">
                       <div class="form-group">
                          <label>Company Name (Optional)</label>
                           <input class="form-control" required="" type="text" name="cname" placeholder="Company Name">
                       </div>
                   </div>
                     
               </div>

                       <div class="form-group">
                          <label>Address *</label>
                           <input type="text" class="form-control" name="billing_address" required="" placeholder="Address">
                       </div>
                      
                                <div class="form-row">
                         <div class="col-12 col-md-6">
                       <div class="form-group">
                         <label>City *</label>
                           <input class="form-control" required="" type="text" name="city" placeholder="City">
                       </div>
                   </div>
              <div class="col-12 col-md-6">
                       <div class="form-group">
                         <label>State / Province </label>
                           <input class="form-control" required="" type="text" name="state" placeholder="State / Province">
                       </div>
                   </div>
               </div>
                        <div class="form-row">
                     <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>ZIP / Postal Code * </label>
                           <input class="form-control" required="" type="text" name="zipcode" placeholder="ZIP / Postal Code ">
                       </div>
                   </div>
                            <div class="col-12 col-md-6">
                       <div class="form-group">
                                <div class="custom_select">
                                <label>Country * </label> 
                               <select class="form-control first_null not_chosen">
                                   <option value="">Select an option...</option>
                                   <option value="AX">Aland Islands</option>
                                   <option value="AF">Afghanistan</option>
                                   <option value="AL">Albania</option>
                                   <option value="DZ">Algeria</option>
                                   <option value="AD">Andorra</option>
                                   <option value="AO">Angola</option>
                                   <option value="AI">Anguilla</option>
                                   <option value="AQ">Antarctica</option>
                                   <option value="AG">Antigua and Barbuda</option>
                                   <option value="AR">Argentina</option>
                                   <option value="AM">Armenia</option>
                                   <option value="AW">Aruba</option>
                                   <option value="AU">Australia</option>
                                   <option value="AT">Austria</option>
                                   <option value="AZ">Azerbaijan</option>
                                   <option value="BS">Bahamas</option>
                                   <option value="BH">Bahrain</option>
                                   <option value="BD">Bangladesh</option>
                                   <option value="BB">Barbados</option>
                                   <option value="BY">Belarus</option>
                                   <option value="PW">Belau</option>
                                   <option value="BE">Belgium</option>
                                   <option value="BZ">Belize</option>
                                   <option value="BJ">Benin</option>
                                   <option value="BM">Bermuda</option>
                                   <option value="BT">Bhutan</option>
                                   <option value="BO">Bolivia</option>
                                   <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                   <option value="BA">Bosnia and Herzegovina</option>
                                   <option value="BW">Botswana</option>
                                   <option value="BV">Bouvet Island</option>
                                   <option value="BR">Brazil</option>
                                   <option value="IO">British Indian Ocean Territory</option>
                                   <option value="VG">British Virgin Islands</option>
                                   <option value="BN">Brunei</option>
                                   <option value="BG">Bulgaria</option>
                                   <option value="BF">Burkina Faso</option>
                                   <option value="BI">Burundi</option>
                                   <option value="KH">Cambodia</option>
                                   <option value="CM">Cameroon</option>
                                   <option value="CA">Canada</option>
                                   <option value="CV">Cape Verde</option>
                                   <option value="KY">Cayman Islands</option>
                                   <option value="CF">Central African Republic</option>
                                   <option value="TD">Chad</option>
                                   <option value="CL">Chile</option>
                                   <option value="CN">China</option>
                                   <option value="CX">Christmas Island</option>
                                   <option value="CC">Cocos (Keeling) Islands</option>
                                   <option value="CO">Colombia</option>
                                   <option value="KM">Comoros</option>
                                   <option value="CG">Congo (Brazzaville)</option>
                                   <option value="CD">Congo (Kinshasa)</option>
                                   <option value="CK">Cook Islands</option>
                                   <option value="CR">Costa Rica</option>
                                   <option value="HR">Croatia</option>
                                   <option value="CU">Cuba</option>
                                   <option value="CW">CuraÇao</option>
                                   <option value="CY">Cyprus</option>
                                   <option value="CZ">Czech Republic</option>
                                   <option value="DK">Denmark</option>
                                   <option value="DJ">Djibouti</option>
                                   <option value="DM">Dominica</option>
                                   <option value="DO">Dominican Republic</option>
                                   <option value="EC">Ecuador</option>
                                   <option value="EG">Egypt</option>
                                   <option value="SV">El Salvador</option>
                                   <option value="GQ">Equatorial Guinea</option>
                                   <option value="ER">Eritrea</option>
                                   <option value="EE">Estonia</option>
                                   <option value="ET">Ethiopia</option>
                                   <option value="FK">Falkland Islands</option>
                                   <option value="FO">Faroe Islands</option>
                                   <option value="FJ">Fiji</option>
                                   <option value="FI">Finland</option>
                                   <option value="FR">France</option>
                                   <option value="GF">French Guiana</option>
                                   <option value="PF">French Polynesia</option>
                                   <option value="TF">French Southern Territories</option>
                                   <option value="GA">Gabon</option>
                                   <option value="GM">Gambia</option>
                                   <option value="GE">Georgia</option>
                                   <option value="DE">Germany</option>
                                   <option value="GH">Ghana</option>
                                   <option value="GI">Gibraltar</option>
                                   <option value="GR">Greece</option>
                                   <option value="GL">Greenland</option>
                                   <option value="GD">Grenada</option>
                                   <option value="GP">Guadeloupe</option>
                                   <option value="GT">Guatemala</option>
                                   <option value="GG">Guernsey</option>
                                   <option value="GN">Guinea</option>
                                   <option value="GW">Guinea-Bissau</option>
                                   <option value="GY">Guyana</option>
                                   <option value="HT">Haiti</option>
                                   <option value="HM">Heard Island and McDonald Islands</option>
                                   <option value="HN">Honduras</option>
                                   <option value="HK">Hong Kong</option>
                                   <option value="HU">Hungary</option>
                                   <option value="IS">Iceland</option>
                                   <option value="IN">India</option>
                                   <option value="ID">Indonesia</option>
                                   <option value="IR">Iran</option>
                                   <option value="IQ">Iraq</option>
                                   <option value="IM">Isle of Man</option>
                                   <option value="IL">Israel</option>
                                   <option value="IT">Italy</option>
                                   <option value="CI">Ivory Coast</option>
                                   <option value="JM">Jamaica</option>
                                   <option value="JP">Japan</option>
                                   <option value="JE">Jersey</option>
                                   <option value="JO">Jordan</option>
                                   <option value="KZ">Kazakhstan</option>
                                   <option value="KE">Kenya</option>
                                   <option value="KI">Kiribati</option>
                                   <option value="KW">Kuwait</option>
                                   <option value="KG">Kyrgyzstan</option>
                                   <option value="LA">Laos</option>
                                   <option value="LV">Latvia</option>
                                   <option value="LB">Lebanon</option>
                                   <option value="LS">Lesotho</option>
                                   <option value="LR">Liberia</option>
                                   <option value="LY">Libya</option>
                                   <option value="LI">Liechtenstein</option>
                                   <option value="LT">Lithuania</option>
                                   <option value="LU">Luxembourg</option>
                                   <option value="MO">Macao S.A.R., China</option>
                                   <option value="MK">Macedonia</option>
                                   <option value="MG">Madagascar</option>
                                   <option value="MW">Malawi</option>
                                   <option value="MY">Malaysia</option>
                                   <option value="MV">Maldives</option>
                                   <option value="ML">Mali</option>
                                   <option value="MT">Malta</option>
                                   <option value="MH">Marshall Islands</option>
                                   <option value="MQ">Martinique</option>
                                   <option value="MR">Mauritania</option>
                                   <option value="MU">Mauritius</option>
                                   <option value="YT">Mayotte</option>
                                   <option value="MX">Mexico</option>
                                   <option value="FM">Micronesia</option>
                                   <option value="MD">Moldova</option>
                                   <option value="MC">Monaco</option>
                                   <option value="MN">Mongolia</option>
                                   <option value="ME">Montenegro</option>
                                   <option value="MS">Montserrat</option>
                                   <option value="MA">Morocco</option>
                                   <option value="MZ">Mozambique</option>
                                   <option value="MM">Myanmar</option>
                                   <option value="NA">Namibia</option>
                                   <option value="NR">Nauru</option>
                                   <option value="NP">Nepal</option>
                                   <option value="NL">Netherlands</option>
                                   <option value="AN">Netherlands Antilles</option>
                                   <option value="NC">New Caledonia</option>
                                   <option value="NZ">New Zealand</option>
                                   <option value="NI">Nicaragua</option>
                                   <option value="NE">Niger</option>
                                   <option value="NG">Nigeria</option>
                                   <option value="NU">Niue</option>
                                   <option value="NF">Norfolk Island</option>
                                   <option value="KP">North Korea</option>
                                   <option value="NO">Norway</option>
                                   <option value="OM">Oman</option>
                                   <option value="PK">Pakistan</option>
                                   <option value="PS">Palestinian Territory</option>
                                   <option value="PA">Panama</option>
                                   <option value="PG">Papua New Guinea</option>
                                   <option value="PY">Paraguay</option>
                                   <option value="PE">Peru</option>
                                   <option value="PH">Philippines</option>
                                   <option value="PN">Pitcairn</option>
                                   <option value="PL">Poland</option>
                                   <option value="PT">Portugal</option>
                                   <option value="QA">Qatar</option>
                                   <option value="IE">Republic of Ireland</option>
                                   <option value="RE">Reunion</option>
                                   <option value="RO">Romania</option>
                                   <option value="RU">Russia</option>
                                   <option value="RW">Rwanda</option>
                                   <option value="ST">São Tomé and Príncipe</option>
                                   <option value="BL">Saint Barthélemy</option>
                                   <option value="SH">Saint Helena</option>
                                   <option value="KN">Saint Kitts and Nevis</option>
                                   <option value="LC">Saint Lucia</option>
                                   <option value="SX">Saint Martin (Dutch part)</option>
                                   <option value="MF">Saint Martin (French part)</option>
                                   <option value="PM">Saint Pierre and Miquelon</option>
                                   <option value="VC">Saint Vincent and the Grenadines</option>
                                   <option value="SM">San Marino</option>
                                   <option value="SA">Saudi Arabia</option>
                                   <option value="SN">Senegal</option>
                                   <option value="RS">Serbia</option>
                                   <option value="SC">Seychelles</option>
                                   <option value="SL">Sierra Leone</option>
                                   <option value="SG">Singapore</option>
                                   <option value="SK">Slovakia</option>
                                   <option value="SI">Slovenia</option>
                                   <option value="SB">Solomon Islands</option>
                                   <option value="SO">Somalia</option>
                                   <option value="ZA">South Africa</option>
                                   <option value="GS">South Georgia/Sandwich Islands</option>
                                   <option value="KR">South Korea</option>
                                   <option value="SS">South Sudan</option>
                                   <option value="ES">Spain</option>
                                   <option value="LK">Sri Lanka</option>
                                   <option value="SD">Sudan</option>
                                   <option value="SR">Suriname</option>
                                   <option value="SJ">Svalbard and Jan Mayen</option>
                                   <option value="SZ">Swaziland</option>
                                   <option value="SE">Sweden</option>
                                   <option value="CH">Switzerland</option>
                                   <option value="SY">Syria</option>
                                   <option value="TW">Taiwan</option>
                                   <option value="TJ">Tajikistan</option>
                                   <option value="TZ">Tanzania</option>
                                   <option value="TH">Thailand</option>
                                   <option value="TL">Timor-Leste</option>
                                   <option value="TG">Togo</option>
                                   <option value="TK">Tokelau</option>
                                   <option value="TO">Tonga</option>
                                   <option value="TT">Trinidad and Tobago</option>
                                   <option value="TN">Tunisia</option>
                                   <option value="TR">Turkey</option>
                                   <option value="TM">Turkmenistan</option>
                                   <option value="TC">Turks and Caicos Islands</option>
                                   <option value="TV">Tuvalu</option>
                                   <option value="UG">Uganda</option>
                                   <option value="UA">Ukraine</option>
                                   <option value="AE">United Arab Emirates</option>
                                   <option value="GB">United Kingdom (UK)</option>
                                   <option value="US">USA (US)</option>
                                   <option value="UY">Uruguay</option>
                                   <option value="UZ">Uzbekistan</option>
                                   <option value="VU">Vanuatu</option>
                                   <option value="VA">Vatican</option>
                                   <option value="VE">Venezuela</option>
                                   <option value="VN">Vietnam</option>
                                   <option value="WF">Wallis and Futuna</option>
                                   <option value="EH">Western Sahara</option>
                                   <option value="WS">Western Samoa</option>
                                   <option value="YE">Yemen</option>
                                   <option value="ZM">Zambia</option>
                                   <option value="ZW">Zimbabwe</option>
                               </select>
                           </div>
                       </div>
                   </div>
               </div>
                   <div class="form-row">
                     <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>Email ID *</label>
                           <input class="form-control"  type="email" name="email" placeholder="Email ">
                       </div>
                   </div>
                      <div class="col-12 col-md-6">
                       <div class="form-group">
                            <label>Phone Number * </label>
                           <input class="form-control" required="" type="text" name="phone" placeholder="Phone ">
                       </div>
                   </div>

               </div>
                    


                       <div class="heading_s1">
                           <h6>Additional information</h6>
                       </div>
                       <div class="form-group mb-0">
                           <textarea rows="5" class="form-control" placeholder="Order notes"></textarea>
                       </div>
                       <br>
                           <button type="button" class="btn btn-primary">Save</button>
                   </form>
       
   </div>
</div>
                     </div>
                     <div class="row text-right">
                        <div class="col-lg-12">
        <!--                    <a class="btn animatedBtn darckBtn" href="https://www.deyar.demoatcrayotech.com/checkout-shipping.php" role="button">Next</a> -->
                             <a class="btn animatedBtn darckBtn"   href="checkout-shipping"  role="button" id="check_address">Next</a>
                        </div>
                     </div>
<br>
                  </div>
                  <div class="col-md-4 col-lg-4">
                     <div class="cart_summary sticky_new">
                        <div class="justify-content-md-between ">
                           <h5 class="mb-0 head_sum"><b>Your Orders</b> </h5>
                        </div>
                        <div>
                       
                           <table class="table">
                               <thead>
                                   <tr>
                                       <th>Product</th>
                                       <th class="text-righta" style="width: 130px;">Total</th>
                                   </tr>
                               </thead>
                               <tbody class="body_table">
                                   <tr>
                                       <td>Document Print <span class="product-qty">x 100</span></td>
                                       <td class="text-righta">SAR 500.00</td>
                                   </tr>
                                    <tr>
                                       <td>Document Print <span class="product-qty">x 200</span></td>
                                       <td class="text-righta">SAR 900.00</td>
                                   </tr>
                                
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <th>SubTotal</th>
                                       <td class="product-subtotal text-righta"><b>SAR 1400.00</b></td>
                                   </tr>
                                   <tr>
                                       <th>Shipping</th>
                                       <td class="text-righta">Free Shipping</td>
                                   </tr>
                                    <tr>
                                    <th class="cart_total_label">VAT (15%)</th>
                                    <td class="cart_total_amounta text-righta">SAR 210.00</td>
                                 </tr>
                                   <tr>
                                       <th>Total</th>
                                       <td class="product-subtotal text-righta"><b>SAR 1610.00</b></td>
                                   </tr>
                               </tfoot>
                           </table>
                          
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form method="POST" action="" id="save_shipping_address">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> SHIPPING ADDRESS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div>
                              <div id="form-sec" class="col-md-12">
                                 <div class="row">
                                    <div class="col-md-12 clearfix">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <div class="form-group">
                                                   <input type="text" value="" required  name="first_name" id="shipping_first_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="First Name *">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <div class="form-group">
                                                   <input type="text" value="" required name="last_name" id="shipping_last_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Last Name *">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-group">
                                             <input required name="phone_number" value="" id="shipping_phone_number" class="form-control form-control" data-toggle="floatLabel" placeholder="Phone Number *" type="text">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-group">
                                             <textarea style="height: 100px" rows="5" class="form-control" placeholder="Address *" required name="address" id="shipping_address" spellcheck="false"></textarea>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-group">
                                             <div class="control">
                                                <select name="country_code" id="shipping_country" class="form-control" data-toggle="floatLabel">
                                                   <option value="">---Select Country---</option>
                                                     <option  value="TH">Saudi Arabia</option>
                                                   <option  value="BH">Bahrain</option>
                                                   <option  value="TH">UAE</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-group">
                                             <input required name="state" value="" id="shipping_state" class="form-control form-control" data-toggle="floatLabel" placeholder="State *" type="text">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12 clearfix">
                                       <div class="row">
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <div class="form-group">
                                                   <input required name="city" value="" id="shipping_city" class="form-control form-control" data-toggle="floatLabel" placeholder="City *" type="text">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <div class="form-group">
                                                   <input required name="zip_code" value="" id="shipping_zip_code" class="form-control form-control" data-toggle="floatLabel" placeholder="Zip Code *" type="text">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="chek-form">
                                          <div class="custome-checkbox">
                                             <input class="form-check-input" type="checkbox" checked name="save_address" id="exampleCheckbox1">
                                             <label class="form-check-label" for="exampleCheckbox1"><span>Save Address</span></label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
        