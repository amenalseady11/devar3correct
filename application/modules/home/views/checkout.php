   
         <!-- 
            <div class="headerSpace"></div> -->
         <br>
         <div class="loginBlock" style="height: 150px;">
            <div class="loginTop triggerBlock">
               <div class="orderBlock">
               
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
                    
                        <li class="orderFlowItem4">
                          <p>Place Order</p>
                           <div class="icon">3</div>
                        </li>
                     </ul>
                  </div>
                 
               </div>
            </div>
         </div>
         <div class="contantBlock blockEnd">
            <div class="container">
               <div class="row">
                  <div class="col-md-8 col-lg-8">
              <div class="box_newcheck">
                       <div class="row">
                        <div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
                           <h4 class="mb-0 font-weight-bold h4new_size">Shipping Address</h4>
                          
                        </div>
                     </div>
          <form method="post" class="delivery_add" action="<?php echo base_url()?>checkout_shipping" >  

                     <div class="row">
             <?php
            $i="0";
              $addresscount=count($adshipping);
              
            foreach ($adshipping as $ad){
  
  $i=$i+1;
              
            $countrycode= $ad['country_code'];
  
  ?>
                        <div class="col-md-4 chk-making-radio" >
                           <div  class="lenthdiv adding-address-box address-box3 " style="text-align: left;min-height: 210px;">
                              <address>
                                 <?php echo $ad['first_name']?>&nbsp;<?php echo $ad['last_name']?><br>
                                 <?php echo $ad['address']?><br>
                                 <?php //echo $ad['address2']?>
                                <?php echo $allname[$countrycode]['country_name'];?><br>
                                <a href="tel:<?php echo $ad['phone_number']?>">  <?php echo $ad['phone_number']?> </a>                                            
                              </address>
                               <div class="btn_styleaddress"> <a href="javascript:void(0)" class="btn btn-fill-out ship_here" style="<?php if($i=="1"){?>display:none<?php } ?>">Ship Here</a>
                                <a href="javascript:void(0)" class="slected_address" style="">Selected</a>
                              <input class="radioshipgere" type="radio"  name="shiphere" value="<?php echo $ad['id']?>" ></div>
                           </div>
               
                        </div>
              <?php } ?>     
                  
                       <!--div class="col-md-4 chk-making-radio" >
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
                        </div>-->
             
                        <div class="col-md-4 chk-making-radio" id="add_address_shipping">
              <?php //if($addresscount=="0"){ echo "Add Address For Further Move";} ?>
                           <div class="adding-address-box address-box3" style="height: 210px;" data-toggle="modal" data-target="#exampleModal">
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
            <?php if($addresscount>="1"){
  
?>
                   <div class="row">
                     <div class="col-md-12">
                        <div class="form-check" style="padding-left: 0;">
     <input class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" name="billing" >
     <label class="form-check-label" for="flexCheckChecked"  autocomplete='off'>
      My billing address is the same as my shipping address                        
     </label>
   </div>
                     </div>
                   </div>
            
        <div class="row">
                     <div class="col-md-12">
                        <div class="form-check" style="padding-left: 0;">
              <select name="billingaddress" id="billingaddress" class="form-control" data-toggle="floatLabel"  onChange="change_address()">
                                                  
                                   <option value="">Select Billing Address</option>
                   <?php foreach ($adshipping as $ad){
                
                $countrycode=$ad['country_code'];
                ?>
                                   <option value="<?php echo $ad['id']?>" ><?php echo $ad['address']?>&nbsp;<?php echo $allname[$countrycode]['country_name'];?></option>
                
                                   <?php } ?>
                                  
                                   <option value="-1">New Address</option>
                              
                                                </select>
                          
    
   </div>
                     </div>
                   </div>   
            
   <br>
                     <div class="row" style="display:none" id="billid">
                           <div class="col-md-12">
                        <div id="billing_address" style="width: 100%;">

           <h5 class="modal-title" id="">Billing Address </h5>
           <br>
        
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text"  class="form-control" name="firstname" id="firstname" placeholder="First name"  required>
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name"  required>
                       </div>
                   </div>
               </div>
                
                       <div class="form-group">
                          <label>Address *</label>
                           <input type="text" class="form-control" id="address" name="address"  placeholder="Address" required>
                       </div>
                      
                                <div class="form-row">
                         <div class="col-12 col-md-6">
                 <div class="form-group">
                                <div class="custom_select">
                                <label>Country * </label> 
                               <select class="form-control first_null not_chosen" name="country" id="country" required> 
                                   <option value="">Select an option...</option>
                   <?php foreach ($countries as $co){?>
                                   <option value="<?php echo $co['country_code']?>" <?php if($co['country_code']=="SA") echo "selected";?>><?php echo $co['country_name']?></option>
                                   <?php } ?>
                                  
                                   
                               </select>
                           </div>
                       </div>
                      
                   </div>
              <div class="col-12 col-md-6">
                       <div class="form-group">
                         <label>State / Province </label>
                           <input class="form-control"  type="text" id="state" name="state" placeholder="State / Province" required>
                       </div>
                   </div>
               </div>
                        <div class="form-row">
                     <div class="col-12 col-md-6">
              <div class="form-group">
                         <label>City *</label>
                           <input class="form-control"  type="text"  id="city" name="city" placeholder="City" required>
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
                 <div class="form-group">
                          <label>ZIP / Postal Code * </label>
                           <input class="form-control"  type="text"  id="zip" name="zip" placeholder="ZIP / Postal Code " required>
                       </div>
                      
                   </div>
               </div>
                   <div class="form-row">
                     
                      <div class="col-12 col-md-6">
                       <div class="form-group">
                            <label>Phone Number * </label>
                           <input class="form-control"  type="text" id="phone" name="phone" placeholder="Phone " required>
                       </div>
                   </div>

               </div>
                    


                       <!--<div class="heading_s1">
                           <h6>Additional information</h6>
                       </div>
                       <div class="form-group mb-0">
                           <textarea rows="5" class="form-control" placeholder="Order notes"></textarea>
                       </div>-->
                       <br>
<!--<button type="button" class="btn btn-primary">Save</button>-->
                  
       
   </div>
</div>
                     </div>
                     <div class="row text-right">
                        <div class="col-lg-12">
        <!--                    <a class="btn animatedBtn darckBtn" href="https://www.deyar.demoatcrayotech.com/checkout-shipping.php" role="button">Next</a> -->
                             <button type="submit" class="pinkcss animatedBtn darckBtn btn_style1" id="next"  onClick="return sub()">Next</button>
                        </div>
                     </div>
            <?php } ?>
<br> </form>
              </div>
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
								   <?php 
				$total="0";
				foreach ($this->cart->contents() as $items)
{
					
					if($items['type_price'])
					{
						
						$items['subtotal']=$items['price'];
					$total=$total+$items['price'];	
					}
					else
					{
						 $total=$total+$items['subtotal'];
						
					}
					
					 
					$totaldisp=number_format($total,2);
								   
								   ?>
					
                                   <tr>
                                       <td><?php echo $items['name']?> <span class="product-qty">x <?php echo $items['qty']?></span></td>
                                       <td class="text-righta">SAR <?php echo number_format($items['subtotal'],2);?></td>
                                   </tr>
									   
									   <?php } ?>
                                    
                                
                               </tbody>
                               <tfoot>
                                   <tr>
                                       <th>SubTotal</th>
                                       <td class="product-subtotal text-righta"><b>SAR <?php echo $totaldisp?></b></td>
                                   </tr>
								   <?php
								   $vat=number_format($total*(15/100),2);
										   $vatprice=$total*(15/100);
								   
				$grandtotal=$total+$vatprice;
				$grandtotal=number_format($grandtotal,2);
										   ?>
                                  
                                    <tr>
                                    <th class="cart_total_label">VAT (15%)</th>
                                    <td class="cart_total_amounta text-righta">SAR <?php echo $vat;?></td>
                                 </tr>
								   
                                   <tr>
                                       <th>Total</th>
                                       <td class="product-subtotal text-righta"><b>SAR <?php echo $grandtotal;?></b></td>
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
               <form method="POST" action="<?php echo base_url()?>checkout_save_address" id="save_shipping_address">
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
                                                   <input type="text" value="" required  name="firstname" id="shipping_first_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="First Name *">
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-6">
                                             <div class="form-group">
                                                <div class="form-group">
                                                   <input type="text" value="" required name="lastname" id="shipping_last_name" class="form-control form-control" data-toggle="floatLabel" data-value="no-js" placeholder="Last Name *">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <div class="form-group">
                                             <input required name="phone" value="" id="shipping_phone_number" class="form-control form-control" data-toggle="floatLabel" placeholder="Phone Number *" type="text">
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
                                                <select name="country" id="shipping_country" class="form-control" data-toggle="floatLabel" required>
                                                  
                                   <option value="">Select Country</option>
								   <?php foreach ($countries as $co){?>
                                   <option value="<?php echo $co['country_code']?>" <?php if($co['country_code']=="SA") echo "selected";?>><?php echo $co['country_name']?></option>
                                   <?php } ?>
                                  
                                   
                              
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
                                                   <input required name="zip" value="" id="shipping_zip_code" class="form-control form-control" data-toggle="floatLabel" placeholder="Zip Code *" type="text">
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                  <!--<div class="col-md-12">
                                       <div class="chek-form">
                                          <div class="custome-checkbox">
                                             <input class="form-check-input" type="checkbox" checked name="save_address" id="exampleCheckbox1">
                                             <label class="form-check-label" for="exampleCheckbox1"><span>Save Address</span></label>
                                          </div>
                                       </div>
                                    </div>-->
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
		  
		  
		<script>
			function sub()
			{
				
		
			
			var ele = document.getElementsByName('shiphere'); 
			
			var ab=ele.length;
			
			if(ab=="0")
				
				{
					
				alert("Plz add Shipping Address");
					return false;
					exit;
					
				}
				
				
				if($("#flexCheckChecked").prop('checked') == true){
    //alert("checked");
}
				else{
					
					
			
				
			if(document.getElementById('billingaddress').value=="")	
				
				{
					
					alert("select Billing Address");
					return false;
					
				}
				
					}
				
				
				
				
			}
			
			document.getElementById('flexCheckChecked').onchange = function() {
				
			
    document.getElementById('firstname').disabled = this.checked;
	document.getElementById('lastname').disabled = this.checked;
	document.getElementById('city').disabled = this.checked;
	document.getElementById('state').disabled = this.checked;
	document.getElementById('zip').disabled = this.checked;
	document.getElementById('address').disabled = this.checked;
	document.getElementById('country').disabled = this.checked;
	document.getElementById('phone').disabled = this.checked;
				
	document.getElementById('billingaddress').disabled=this.checked;
				
				 document.getElementById('firstname').enabled = !this.checked;
	document.getElementById('lastname').enabled = !this.checked;
	document.getElementById('city').enabled = !this.checked;
	document.getElementById('state').enabled = !this.checked;
	document.getElementById('zip').enabled = !this.checked;
	document.getElementById('address').enabled = !this.checked;
	document.getElementById('country').enabled = !this.checked;
	document.getElementById('phone').enabled = !this.checked;
				document.getElementById('billingaddress').enabled=!this.checked;
				
				
				
};
		  
			
			function change_address()
			{
				
		
			
			if(document.getElementById('billingaddress').value=="-1")
				
				{
					
					//alert("kkkkk");
					//alert(document.getElementById('billingaddress').value);
					
					
					
				 document.getElementById('billid').style.display="";
					
					document.getElementById('firstname').disabled =false;
					
	document.getElementById('lastname').disabled =false;
	document.getElementById('city').disabled =false;
	document.getElementById('state').disabled =false;
	document.getElementById('zip').disabled =false;
	document.getElementById('address').disabled =false;
	document.getElementById('country').disabled =false;
	document.getElementById('phone').disabled =false;
						
	
						//document.getElementById("flexCheckChecked").checked = false;
						
				}
				else
					{
						
						document.getElementById('billid').style.display="none";
						
						document.getElementById('firstname').disabled ="true";
	document.getElementById('lastname').disabled ="true";
	document.getElementById('city').disabled  ="true";
	document.getElementById('state').disabled ="true";
	document.getElementById('zip').disabled ="true";
	document.getElementById('address').disabled ="true";
	document.getElementById('country').disabled ="true";
	document.getElementById('phone').disabled ="true";
						
	
						//document.getElementById("flexCheckChecked").checked = true;
						
						
								
						
						
					}
				
				
			}
		  </script>  
<script>
	
	if(performance.navigation.type == 2){
   location.reload(true);
}
	
	
	</script>
	
        