<style type="text/css">
  .box_borderadmin{
        margin-bottom: 20px;
    border: 1px solid #dee5e7;
padding: 15px 20px;
  }
.cart_summary.sticky_new {
    border: 1px solid #dee5e7;
    padding: 15px 15px;
}
h5.mb-0.head_sum {
    padding-top: 10px;
    font-size: 20px;
    padding-bottom: 15px;
}
  .bor_bot {
    /* padding: 4px 0px; */
    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid #d0d0d0;
}
.bor_bot h4 {
    font-size: 20px;
}
.conti_shop {
      font-size: 12px;
    font-weight: 600;
    background-color: #ec1d8c;
    color: #fff;
}
.conti_shop:hover {
    font-weight: 600;
    background-color: #ec216c;
    color: #fff;
}
.name_item {
    display: inline-block;
}
.name_item b a {
    color: #333;
}
.edit_delete {
    text-align: right;
}
.price_div {
    text-align: center;
}
a.Delete_class {
    font-weight: 700;
    font-size: 12px;
    padding: 2px 10px;
    color: #ec1d8c;
    border: 2px solid #ec1d8c;
}
a.Delete_class:hover {
    font-weight: 700;
    font-size: 12px;
    padding: 2px 10px;
    color: #fff;
    background-color: #ec1d8c;
    border: 2px solid #ec1d8c;
}
.row.box_div {
    padding: 8px 0px;
}
.at_box div.show_hide {
    display: inline-block;
    color: #da2273;
    font-size: 12px;
    font-weight: 600;
    cursor: pointer;
}
.show_customerchange {
    margin-bottom: 10px;
}
div#checkbox-billing {
    padding: 0px 8px;
    margin-bottom: 10px;
}
div#shipping_address {
  border: 1px solid #dee5e7;
    padding: 20px;
    margin-bottom: 15px;
}
div#billing_address{
 border: 1px solid #dee5e7;
    padding: 20px; 
    margin-bottom: 15px;
}
</style>

<!-- main-content opened -->
      <div class="main-content horizontal-content">

        <!-- container opened -->
        <div class="container">

          <!-- breadcrumb -->
          <div class="breadcrumb-header justify-content-between">
            <div>
              <h4 class="content-title mb-2">Hi, welcome back!</h4>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Category</li>
                  <li class="breadcrumb-item active" aria-current="page">Product</li>
                </ol>
              </nav>
            </div>
            
          </div>
          <!-- /breadcrumb -->
    <!-- main-content-body -->
          <div class="main-content-body">
            <div class="row row-sm">
                <!--div-->
          <div class="col-xl-12">
            <div class="card mg-b-20">
              <div class="card-header pb-0">
                <div class="justify-content-between" style="display: inline-block;">
                  <h3 class="card-title mg-b-2 mt-2"> Product(New order)</h3>
                  <i class="mdi mdi-dots-horizontal text-gray"></i>
                         </div>
            
                          </div>

          <div class="card-body">                
               <form role="form" action="<?php echo base_url()?>ad_order/new_cart"  method="post" enctype="multipart/form-data" id="orgproducts">
           <input type="hidden" name="custom" id="custom" value="0">
           
        
                  <div class="row">
        
 
      <div class="col-md-8 col-lg-8"> 
        
        <div class="box_borderadmin">
        <div class="row">
      <div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
          <h4 class="mb-0 font-weight-bold"><span class="item_num"><?php echo count($cart);?> Items </span></h4> 
          <a class="btn mt-md-0 mt-3 conti_shop" href="<?php echo base_url()?>ad_order/product_select" >Continue Product Add</a>
        </div>  
      </div>
        
        <?php $countcart=count($cart);
             
            
             
             ?>
            
              
              <?php foreach ($cart as $items) {
  
  $options=json_decode($items['options']);
	
	if($items['type_price']=="1")
	{
		
		$subtotal=$items['price'];
		
	}
	else{
		
		$subtotal=$items['qty']*$items['price'];
	}
  
  
?>
        
        <div class="row box_div" >
          
          <div class="col-md-4  col-lg-4">
            <div class="name_item"><b> <a href="#"><?php echo $items['product_name']?></a></b></div>

          <div class="at_box show_3" >
          <div class="attribute_box" >
            
            <?php   foreach ($options as $key=>$value)
               {
                 
            ?>
            
              <div class="dependable-attribute" >
                <?php
            echo $value->name." : <b>".$value->value."</b>";
              ?>
            </div>
                
          
            
          <?php } ?>
            
          
            
              
          </div>
          <div class="show_hide">View More</div>
        </div>
          </div>
          <div class="col-md-4  col-lg-3  ">
             
    <label for="quantity" class="qty_css">Qty :</label>
  <?php echo $items['qty']?>
 
          
            
          </div>
          <div class="col-md-4  col-lg-2">
          <div class="price_div">SAR&nbsp;<?php echo $subtotal?></div>

          </div>
          <div class="col-md-4  col-lg-3">
        <div class="edit_delete">
            <!--<a href="#" class="edit_class">Update  </a>-->
          <!--<button type="submit" class="edit_class">Update</button>-->
          <?php if($countcart!="1"){?>
    
  
              <a href="<?php echo base_url()?>ad_order/newcart_delete/<?php echo $items['admin_cart_id']?>" class="Delete_class"  onClick="return confirm('Are you sure you want to delete this item')"><i class="typcn typcn-delete"></i> Delete</a>
                <?php } ?>
        </div>
          </div>
          <!--<div class="edit_csstext"><a href="<?php echo base_url()?>prd_edit/<?php //echo $items['rowid']?>" class="btn animatedBtn darckBtn">Edit</a></div>-->
        </div>
        

        <?php 

             $total=$total+$subtotal;
          
             } 
        ?>

      <?php 
        
        $vat=number_format($total*(15/100),2);
        $vatprice=$total*(15/100);
                   
        $grandtotal=$total+$vatprice;          
        
        ?>    
        </div>

        </div>
                    
      
          
        
        <div class="col-md-4 col-lg-4">   
          <div class="cart_summary sticky_new">
              <div class="justify-content-md-between ">
                <h5 class="mb-0 head_sum"><b>Order Summary</b> </h5>
              </div>
              <div>
              <table class="table">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">Subtotal</td>
                                    <td class="cart_total_amount">SAR&nbsp;<?php echo $total?></td>
                                </tr>
                                <!--<tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>-->
                                <tr>
                                    <td class="cart_total_label">VAT (15%)</td>
                                    <td class="cart_total_amount">SAR&nbsp;<?php echo $vat?></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label"><strong>Estimate Total </strong></td>
                                    <td class="cart_total_amount"><strong>SAR&nbsp;<?php echo number_format($grandtotal,2)?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--<div class="text-center"> 
                          <a class="btn animatedBtn darckBtn" href="<?php echo base_url()?>checkout" role="button">Proceed To Checkout</a>
                        </div>-->
              </div>
            </div>
        </div>
                    
          
      
            </div>  
           
           
           <div class="row" >
             <div class="col-md-12">
                   <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>Customers *</label>
                           <select name="customer" class="form-control"  id="customerid">
                    <!--placeholder-->
                    <option value="0">Select Customer</option>
                    <?php
    $i = 0;
  foreach ($customers as $cust) {?>
                             
                <option value="<?php echo $cust->customer_id?>" ><?php echo $cust->customer_firstname?>&nbsp;<?php echo $cust->customer_lastname?></option>         
                          
  <?php 
  }
                          ?>
                  </select> 
                       </div>
                   </div>
                          <div class="col-12 col-md-6" style="margin-top:30px;">
                       <div class="form-group">
                          <label>&nbsp;</label>
                           <button  class="btn btn-primary btn_stylefull" name="newcust" id="newcust" value="Show">New Customer</button>
                       </div>
                   </div>
               </div>
             </div>
                
                     </div> 


                    
            <div class="row" style="display:none" id="cuid">
                           <div class="col-md-12">
                        <div id="billing_address" style="width: 50%;">

           <h5 class="modal-title" id="">Customer Details </h5>
           <br>
        
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text"  class="form-control" name="firstname" id="firstname" placeholder="First name"  >
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last name"  >
                       </div>
                   </div>
               </div>
                
                       <div class="form-group">
                          <label>Email *</label>
                           <input type="email" class="form-control" id="email" name="email"  placeholder="Email" >
                       </div>
                      
                               
                        <div class="form-row">
                     <div class="col-12 col-md-6">
              <div class="form-group">
                         <label>Password *</label>
                           <input class="form-control"  type="password"  id="password" name="password" placeholder="Password" >
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
                 <div class="form-group">
                          <label>Confirm Password * </label>
                           <input class="form-control"  type="password"  id="conpassword" name="conpassword" placeholder="Confirm Password" >
                       </div>
                      
                   </div>
               </div>
                   
       
   </div>
</div>
                     </div> 


                    
            <div class="row show_customerchange" id="shipping_selectrow" style="display: none;" >
             <div class="col-md-12">
                   <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>Shipping Address</label>
                           <select name="shippingcustomer" class="form-control"  id="shipping_select">
                         </select>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
           
           <div class="row"  id="shipid" style="display:none">
                           <div class="col-md-12">
                        <div id="shipping_address" style="width: 50%;">

           <h5 class="modal-title" id="">Shipping Address </h5>
           <br>
        
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text"  class="form-control" name="sh_firstname" id="sh_firstname" placeholder="First name"  >
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" class="form-control" id="sh_lastname" name="sh_lastname" placeholder="Last name"  >
                       </div>
                   </div>
               </div>
                
                       <div class="form-group">
                          <label>Address *</label>
                           <input type="text" class="form-control" id="sh_address" name="sh_address"  placeholder="Address" >
                       </div>
                      
                                <div class="form-row">
                         <div class="col-12 col-md-6">
                 <div class="form-group">
                                <div class="custom_select">
                                <label>Country * </label> 
                               <select class="form-control first_null not_chosen" name="sh_country" id="sh_country" > 
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
                         <label>State / Province * </label>
                           <input class="form-control"  type="text" id="sh_state" name="sh_state" placeholder="State / Province" >
                       </div>
                   </div>
               </div>
                        <div class="form-row">
                     <div class="col-12 col-md-6">
              <div class="form-group">
                         <label>City *</label>
                           <input class="form-control"  type="text"  id="sh_city" name="sh_city" placeholder="City" >
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
                 <div class="form-group">
                          <label>ZIP / Postal Code * </label>
                           <input class="form-control"  type="text"  id="sh_zip" name="sh_zip" placeholder="ZIP / Postal Code " >
                       </div>
                      
                   </div>
               </div>
                   <div class="form-row">
                     
                      <div class="col-12 col-md-6">
                       <div class="form-group">
                            <label>Phone Number * </label>
                           <input class="form-control"  type="text" id="sh_phone" name="sh_phone" placeholder="Phone " >
                       </div>
                   </div>

               </div>
                    


                       <!--<div class="heading_s1">
                           <h6>Additional information</h6>
                       </div>
                       <div class="form-group mb-0">
                           <textarea rows="5" class="form-control" placeholder="Order notes"></textarea>
                       </div>-->
                 
<!--<button type="button" class="btn btn-primary">Save</button>-->
                  
       
   </div>
</div>
                     </div> 
           
           
           <div class="row" style="display: none;" id="checkbox-billing">
                     <div class="col-md-12">
             <div class="form-row">
                        <div class="form-check" >
     <input class="form-check-input" type="checkbox" value="1" id="billchk" name="billing" >
     <label class="form-check-label" for="flexCheckChecked"  autocomplete='off'>
      My billing address is the same as my shipping address                        
     </label>
   </div>
                     </div>
             </div>
               <br>
                   </div>
           
         

           <div class="row show_customerchange" id="billing_selectrow" style="display: none;" >
             <div class="col-md-12">
                   <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>Billing Address</label>
                           <select name="billingcustomer" class="form-control"  id="billing_select">

                           </select>
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
           
           
           
            <div class="row"  id="billid" style="display: none;">
                           <div class="col-md-12">
                        <div id="billing_address" style="width: 50%;">

           <h5 class="modal-title" id="">Billing Address </h5>
           <br>
        
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text"  class="form-control" name="bill_firstname" id="bill_firstname" placeholder="First name"  >
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" class="form-control" id="bill_lastname" name="bill_lastname" placeholder="Last name"  >
                       </div>
                   </div>
               </div>
                
                       <div class="form-group">
                          <label>Address *</label>
                           <input type="text" class="form-control" id="bill_address" name="bill_address"  placeholder="Address" >
                       </div>
                      
                                <div class="form-row">
                         <div class="col-12 col-md-6">
                 <div class="form-group">
                                <div class="custom_select">
                                <label>Country * </label> 
                               <select class="form-control first_null not_chosen" name="bill_country" id="bill_country" > 
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
                         <label>State / Province * </label>
                           <input class="form-control"  type="text" id="bill_state" name="bill_state" placeholder="State / Province" >
                       </div>
                   </div>
               </div>
                        <div class="form-row">
                     <div class="col-12 col-md-6">
              <div class="form-group">
                         <label>City *</label>
                           <input class="form-control"  type="text"  id="bill_city" name="bill_city" placeholder="City" >
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
                 <div class="form-group">
                          <label>ZIP / Postal Code * </label>
                           <input class="form-control"  type="text"  id="bill_zip" name="bill_zip" placeholder="ZIP / Postal Code " >
                       </div>
                      
                   </div>
               </div>
                   <div class="form-row">
                     
                      <div class="col-12 col-md-6">
                       <div class="form-group">
                            <label>Phone Number * </label>
                           <input class="form-control"  type="text" id="bill_phone" name="bill_phone" placeholder="Phone " >
                       </div>
                   </div>

               </div>
                    


                       <!--<div class="heading_s1">
                           <h6>Additional information</h6>
                       </div>
                       <div class="form-group mb-0">
                           <textarea rows="5" class="form-control" placeholder="Order notes"></textarea>
                       </div>-->
                   
<!--<button type="button" class="btn btn-primary">Save</button>-->
                  
       
   </div>
</div>
                     </div>     
                    
                              
            <div class="row" >
             <div class="col-md-12">
                   <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>Shipping Method *</label>
                           <select name="shippingmethod" class="form-control" required="">
                    <!--placeholder-->
                    <option value="15">Delivery(+15 SAR)</option>
                          <option value="0" >Pickup(The customer will visit the shop and collect the items ordered)</option>
                    
                  </select> 
                       </div>
                   </div>
                          
               </div>
             </div>
                
                     </div> 
                    
                    
                            
                              
                             
                           
                              
                                 
                    <div class="col-12 col-lg-6 text-right">
                      <br>
                      <button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit" id="createorder">Create Order</button>         


                    </div>
                            </div>
                </form>
</div>
</div>
        
                        </div>
                      </div>
          <!--/div-->
          
          
        
<script type="text/javascript">
 $(".show_hide").click(function(){
$(this).parent('.at_box').toggleClass("show_3");
if ($(this).parent('.at_box').hasClass('show_3')){
 $(this).html('View More');
 } else {
 $(this).html('Less View');
   }
});

    $(document).ready(function() {
    
    
     $("#createorder").click(function(){
		 
		 
		  if($("#customerid").is(":visible")){
			  
			   var lable = $("#newcust").attr("value");
 
 //alert(lable);

   if(lable == "Show") {
                if(document.getElementById('customerid').value=="0")
				{
				
					alert("Plz enter Customer");
					return false;
					
				}
	   
   }
            } 
		 
		 if($("#shipping_select").is(":visible")){
                if(document.getElementById('shipping_select').value=="")
				{
				
					alert("Plz enter Shipping Address");
					return false;
					
				}
            } 
		 
		 
		  
		 if($("#billing_select").is(":visible")){
                if(document.getElementById('billing_select').value=="")
				{
				
					alert("Plz enter Billing Address");
					return false;
					
				}
            } 
		 
		 
		 if($("#firstname").is(":visible")){
                if(document.getElementById('firstname').value=="")
				{
				
					alert("Plz enter customer firstname");
				   document.getElementById('firstname').focus();
					return false;
					
				}
            } 
		 
		 
		  if($("#lastname").is(":visible")){
                if(document.getElementById('lastname').value=="")
				{
				
					alert("Plz enter customer lastname");
					 document.getElementById('lastname').focus();
					return false;
					
				}
            }
		 
		   if($("#email").is(":visible")){
                if(document.getElementById('email').value=="")
				{
				
					alert("Plz enter customer email");
					 document.getElementById('email').focus();
					return false;
					
				}
            } 
		 
		  if($("#password").is(":visible")){
                if(document.getElementById('password').value=="")
				{
				
					alert("Plz enter customer password");
					 document.getElementById('password').focus();
					return false;
					
				}
            } 
		 
		  if($("#password").is(":visible")){
                if(document.getElementById('conpassword').value=="")
				{
				
					alert("Plz enter customer confirm password");
					 document.getElementById('conpassword').focus();
					return false;
					
				}
            } 
		 
		 
		  if($("#sh_firstname").is(":visible")){
                if(document.getElementById('sh_firstname').value=="")
				{
				
					alert("Plz enter Shipping firstname");
					 document.getElementById('sh_firstname').focus();
					return false;
					
				}
            } 
		 
		 
		   if($("#sh_lastname").is(":visible")){
                if(document.getElementById('sh_lastname').value=="")
				{
				
					alert("Plz enter Shipping lastname");
					document.getElementById('sh_lastname').focus();
					return false;
					
				}
            } 
		 
		 
		 
		   if($("#sh_address").is(":visible")){
                if(document.getElementById('sh_address').value=="")
				{
				
					alert("Plz enter Shipping address");
					document.getElementById('sh_address').focus();
					return false;
					
				}
            } 
		 
		  if($("#sh_country").is(":visible")){
                if(document.getElementById('sh_country').value=="")
				{
				
					alert("Plz enter Shipping Country");
					document.getElementById('sh_country').focus();
					return false;
					
				}
            } 
		 
		 if($("#sh_state").is(":visible")){
                if(document.getElementById('sh_state').value=="")
				{
				
					alert("Plz enter Shipping State");
					document.getElementById('sh_state').focus();
					return false;
					
				}
            } 
		 
		  if($("#sh_city").is(":visible")){
                if(document.getElementById('sh_city').value=="")
				{
				
					alert("Plz enter Shipping City");
					document.getElementById('sh_city').focus();
					return false;
					
				}
            } 
		 
		   if($("#sh_zip").is(":visible")){
                if(document.getElementById('sh_zip').value=="")
				{
				
					alert("Plz enter Shipping Zip");
					document.getElementById('sh_zip').focus();
					return false;
					
				}
            } 
		 
		  if($("#sh_phone").is(":visible")){
                if(document.getElementById('sh_phone').value=="")
				{
				
					alert("Plz enter Shipping Phone");
					document.getElementById('sh_phone').focus();
					return false;
					
				}
            } 
		 
		 
		 
		 
		  if($("#bill_firstname").is(":visible")){
                if(document.getElementById('bill_firstname').value=="")
				{
				
					alert("Plz enter Billing firstname");
					document.getElementById('bill_firstname').focus();
					return false;
					
				}
            } 
		 
		 
		   if($("#bill_lastname").is(":visible")){
                if(document.getElementById('bill_lastname').value=="")
				{
				
					alert("Plz enter Billing lastname");
					document.getElementById('bill_lastname').focus();
					return false;
					
				}
            } 
		 
		 
		   
		 
		   if($("#bill_address").is(":visible")){
                if(document.getElementById('bill_address').value=="")
				{
				
					alert("Plz enter Billing address");
					document.getElementById('bill_address').focus();
					return false;
					
				}
            } 
		 
		  if($("#bill_country").is(":visible")){
                if(document.getElementById('bill_country').value=="")
				{
				
					alert("Plz enter Billing Country");
					document.getElementById('bill_country').focus();
					return false;
					
				}
            } 
		 
		 if($("#bill_state").is(":visible")){
                if(document.getElementById('bill_state').value=="")
				{
				
					alert("Plz enter Billing State");
					document.getElementById('bill_state').focus();
					return false;
					
				}
            } 
		 
		  if($("#bill_city").is(":visible")){
                if(document.getElementById('bill_city').value=="")
				{
				
					alert("Plz enter Billing City");
					document.getElementById('bill_city').focus();
					return false;
					
				}
            } 
		 
		   if($("#bill_zip").is(":visible")){
                if(document.getElementById('bill_zip').value=="")
				{
				
					alert("Plz enter Biliing Zip");
						document.getElementById('bill_zip').focus();
					return false;
					
				}
            } 
		 
		  if($("#bill_phone").is(":visible")){
                if(document.getElementById('bill_phone').value=="")
				{
				
					alert("Plz enter Billing Phone");
						document.getElementById('bill_phone').focus();
					return false;
					
				}
            } 
		 
		 
		 
		 
		 
		 if($("#shipping_select").is(":visible")){
                //alert("The paragraph  is visible.");
            } else{
				
				//alert("hai");
                 if($("#shipping_select").val()=="-1")
      {
        
    /*
		  
	  document.getElementById('sh_firstname').disabled =false;
          
  document.getElementById('sh_lastname').disabled =false;
  document.getElementById('sh_city').disabled =false;
  document.getElementById('sh_state').disabled =false;
  document.getElementById('sh_zip').disabled =false;
  document.getElementById('sh_address').disabled =false;
  document.getElementById('sh_country').disabled =false;
  document.getElementById('sh_phone').disabled =false;	
  
  */
       
      }
		else{
			
			/*
			
			document.getElementById('sh_firstname').disabled ="true";
          
  document.getElementById('sh_lastname').disabled ="true";
  document.getElementById('sh_city').disabled ="true";
  document.getElementById('sh_state').disabled ="true";
  document.getElementById('sh_zip').disabled ="true";
  document.getElementById('sh_address').disabled ="true";
  document.getElementById('sh_country').disabled ="true";
  document.getElementById('sh_phone').disabled ="true"; 
  
  */
			
			
				
      /*    
  document.getElementById('sh_lastname').disabled =false;
  document.getElementById('sh_city').disabled =false;
  document.getElementById('sh_state').disabled =false;
  document.getElementById('sh_zip').disabled =false;
  document.getElementById('sh_address').disabled =false;
  document.getElementById('sh_country').disabled =false;
  document.getElementById('sh_phone').disabled =false;	
  
  */
       
			
		}
		 
	if($("#billing_select").val()=="-1")
      {	 /*
		document.getElementById('bill_firstname').disabled =false;
          
  document.getElementById('bill_lastname').disabled =false;
  document.getElementById('bill_city').disabled =false;
  document.getElementById('bill_state').disabled =false;
  document.getElementById('bill_zip').disabled =false;
  document.getElementById('bill_address').disabled =false;
  document.getElementById('bill_country').disabled =false;
  document.getElementById('bill_phone').disabled =false;
  */
    }
      else{
        
        // alert("checked");
        $('#billing_selectrow').hide();
       // $("#billid").hide();
		  
		  /*
        
        document.getElementById('bill_firstname').disabled ="true";
          
  document.getElementById('bill_lastname').disabled ="true";
  document.getElementById('bill_city').disabled ="true";
  document.getElementById('bill_state').disabled ="true";
  document.getElementById('bill_zip').disabled ="true";
  document.getElementById('bill_address').disabled ="true";
  document.getElementById('bill_country').disabled ="true";
  document.getElementById('bill_phone').disabled ="true";
  
  */
        
      } 
            }
		 
		 
		
	//alert("kkkkkkkkkkkkkkkkkkk");
		// return false;
        
       
    if($("#custom").val()=="0") 
      {
        
      
    
    
        
      }
  });

    
     
    
    document.getElementById('firstname').disabled ="true";
  document.getElementById('lastname').disabled  ="true";
  document.getElementById('email').disabled ="true";
     document.getElementById('password').disabled ="true";
       document.getElementById('conpassword').disabled ="true";
    
    $('#billchk').click(function() {
    if (!$(this).is(':checked')) {
     // alert("Are you sure?");
		var label=$("#newcust").attr("value");
		//alert(label);
		if(label=="Hide")
			{
				 $('#billing_selectrow').hide();
				 $('#billid').show();
			}
		else{
			 $('#billing_selectrow').show();
			 $('#billid').hide();
		}
		
		/*
     
     $("#billid").show();
    var selectedvalue2 = $('#billing_select').children("option:selected").val();
     if (selectedvalue2 == '-1') {
        $('#billid').show();
    }
     else{
       // $('#billid').hide();
    }
	
	*/
   
    }
      else{
        
         //alert("checked");
        $('#billing_selectrow').hide();
        $("#billid").hide();
        /*
        document.getElementById('bill_firstname').disabled ="true";
          
  document.getElementById('bill_lastname').disabled ="true";
  document.getElementById('bill_city').disabled ="true";
  document.getElementById('bill_state').disabled ="true";
  document.getElementById('bill_zip').disabled ="true";
  document.getElementById('bill_address').disabled ="true";
  document.getElementById('bill_country').disabled ="true";
  document.getElementById('bill_phone').disabled ="true";
  
  */
        
      }
  });
    
    
    
    $("#newcust").click(function() {
 
   var lable = $("#newcust").attr("value");
 
  //alert(lable);

   if(lable == "Show") {
     $("#newcust").attr("value", "Hide");
     $("#cuid").show();
	  // alert("mmmmmm");
	   $("#customerid").val("0");
	   $("#shipping_selectrow").hide();
	    $("#billing_selectrow").hide();
	   //alert("kkkk");
	  
	  $("#checkbox-billing").show();
	  
	   $("#shipid").show();
	    $("#billid").show();
     $('#customerid').attr('disabled', 'disabled');
      document.getElementById('firstname').disabled =false;
  document.getElementById('lastname').disabled  =false;
  document.getElementById('email').disabled =false;
     document.getElementById('password').disabled =false;
       document.getElementById('conpassword').disabled =false;
     
     // $('#custom').val(1);
	   
	   return false;
     
    
   }
   else {
     $("#newcust").attr("value", "Show");
     $("#cuid").hide();
	   //alert("jjjj");
	   //$("#shipping_selectrow").hide();
	   //$("#customer_id").val("");
	   //document.getElementById('customerid').change();
	 
	   $("#shipping_selectrow").show();
	    $("#billing_selectrow").show();
	   $("#shipid").hide();
	    $("#billid").hide();
     $('#customerid').removeAttr('disabled');
      document.getElementById('firstname').disabled ="true";
  document.getElementById('lastname').disabled  ="true";
  document.getElementById('email').disabled ="true";
     document.getElementById('password').disabled ="true";
       document.getElementById('conpassword').disabled ="true";
	   
	   return false;
     
     // $('#custom').val(0);
     
    
   }
      
  
   
 });
        
    });
</script>

<script type="text/javascript">
  
  $('#customerid').on('change', function() {
    $('.show_customerchange').show();
    $('#checkbox-billing').show();
});
</script>
<script type="text/javascript">
  $('#shipping_select').on('change', function() {

var selectedvalue = $(this).children("option:selected").val();

     if (selectedvalue == '-1') {
        $('#shipid').show();
    }
    else{
       $('#shipid').hide();
    }
});
</script>

<script type="text/javascript">
  $('#billing_select').on('change', function() {
var selectedvalue = $(this).children("option:selected").val();
     if (selectedvalue == '-1') {
        $('#billid').show();
    }
     else{
        $('#billid').hide();
    }
});
</script>

<script type="text/javascript">


   
$('#customerid').on('change', function() {
				 
			//alert("ccccccc");

      var customer_id = $('#customerid').val();
			
			//alert(customer_id);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/ad_order/update_shipping/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                   // data: $(deyar_form).serialize(),//The variables which are going.
                    data:{customer:customer_id},
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						
						//alert(data);
						//return false;
						
						
						
						
					$('#shipping_select').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		$('#customerid').on('change', function() {
				 
			//alert("vvvvvvvvvvvv");

      var customer_id = $('#customerid').val();
			
			//alert(customer_id);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/ad_order/update_billing/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                   // data: $(deyar_form).serialize(),//The variables which are going.
                    data:{customer:customer_id},
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						
						//alert(data);
						//return false;
						
						
						
						
					$('#billing_select').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
    
	
</script>