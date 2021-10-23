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
	
	$subtotal=$items['qty']*$items['price'];
?>
				
				<div class="row box_div" >
					
					<div class="col-md-4  col-lg-4">
						<div class="name_item"><b> <a href="#"><?php echo $items['product_name']?></a></b></div>

					<div class="at_box show_3" >
					<div class="attribute_box" >
						
						<?php		foreach ($options as $key=>$value)
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
					    <div class="form-group">
    <label for="quantity" class="qty_css">Qty :</label>
  <?php echo $items['qty']?>
  </div>
					
						
					</div>
					<div class="col-md-4  col-lg-2">
					<div class="price_div">SAR&nbsp;<?php echo $subtotal?></div>

					</div>
					<div class="col-md-4  col-lg-3">
				<div class="edit_delete">
						<!--<a href="#" class="edit_class">Update  </a>-->
					<!--<button type="submit" class="edit_class">Update</button>-->
					<?php if($countcart!="1"){?>
		
	
							<a href="<?php echo base_url()?>ad_order/newcart_delete/<?php echo $items['admin_cart_id']?>" class="Delete_class"  onClick="return confirm('Are you sure you want to delete this item')">Delete</a>
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
                           <button  class="btn btn-primary" name="newcust" id="newcust" value="Show">New Customer</button>
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
                          <label>Email *</label>
                           <input type="email" class="form-control" id="email" name="email"  placeholder="Email" required>
                       </div>
                      
                               
                        <div class="form-row">
                     <div class="col-12 col-md-6">
						  <div class="form-group">
                         <label>Password *</label>
                           <input class="form-control"  type="password"  id="password" name="password" placeholder="Password" required>
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
								 <div class="form-group">
                          <label>Confirm Password * </label>
                           <input class="form-control"  type="password"  id="conpassword" name="conpassword" placeholder="Confirm Password" required>
                       </div>
                      
                   </div>
               </div>
                   
       
   </div>
</div>
                     </div>							
										
				   
				   
				   <div class="row" style="" id="shipid">
                           <div class="col-md-12">
                        <div id="shipping_address" style="width: 50%;">

           <h5 class="modal-title" id="">Shipping Address </h5>
           <br>
        
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text"  class="form-control" name="sh_firstname" id="sh_firstname" placeholder="First name"  required>
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" class="form-control" id="sh_lastname" name="sh_lastname" placeholder="Last name"  required>
                       </div>
                   </div>
               </div>
                
                       <div class="form-group">
                          <label>Address *</label>
                           <input type="text" class="form-control" id="sh_address" name="sh_address"  placeholder="Address" required>
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
                         <label>State / Province </label>
                           <input class="form-control"  type="text" id="sh_state" name="sh_state" placeholder="State / Province" required>
                       </div>
                   </div>
               </div>
                        <div class="form-row">
                     <div class="col-12 col-md-6">
						  <div class="form-group">
                         <label>City *</label>
                           <input class="form-control"  type="text"  id="sh_city" name="sh_city" placeholder="City" required>
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
								 <div class="form-group">
                          <label>ZIP / Postal Code * </label>
                           <input class="form-control"  type="text"  id="sh_zip" name="sh_zip" placeholder="ZIP / Postal Code " required>
                       </div>
                      
                   </div>
               </div>
                   <div class="form-row">
                     
                      <div class="col-12 col-md-6">
                       <div class="form-group">
                            <label>Phone Number * </label>
                           <input class="form-control"  type="text" id="sh_phone" name="sh_phone" placeholder="Phone " required>
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
				   
				   
				   <div class="row">
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
                   </div>
				   
				   <br>
				   
				   
				   
				    <div class="row" style="" id="billid">
                           <div class="col-md-12">
                        <div id="billing_address" style="width: 50%;">

           <h5 class="modal-title" id="">Billing Address </h5>
           <br>
        
             <div class="form-row">
                 <div class="col-12 col-md-6">
                       <div class="form-group">
                        <label>First Name *</label>
                           <input type="text"  class="form-control" name="bill_firstname" id="bill_firstname" placeholder="First name"  required>
                       </div>
                   </div>
                          <div class="col-12 col-md-6">
                       <div class="form-group">
                          <label>Last Name *</label>
                           <input type="text" class="form-control" id="bill_lastname" name="bill_lastname" placeholder="Last name"  required>
                       </div>
                   </div>
               </div>
                
                       <div class="form-group">
                          <label>Address *</label>
                           <input type="text" class="form-control" id="bill_address" name="bill_address"  placeholder="Address" required>
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
                         <label>State / Province </label>
                           <input class="form-control"  type="text" id="bill_state" name="bill_state" placeholder="State / Province" required>
                       </div>
                   </div>
               </div>
                        <div class="form-row">
                     <div class="col-12 col-md-6">
						  <div class="form-group">
                         <label>City *</label>
                           <input class="form-control"  type="text"  id="bill_city" name="bill_city" placeholder="City" required>
                       </div>
                      
                   </div>
                            <div class="col-12 col-md-6">
								 <div class="form-group">
                          <label>ZIP / Postal Code * </label>
                           <input class="form-control"  type="text"  id="bill_zip" name="bill_zip" placeholder="ZIP / Postal Code " required>
                       </div>
                      
                   </div>
               </div>
                   <div class="form-row">
                     
                      <div class="col-12 col-md-6">
                       <div class="form-group">
                            <label>Phone Number * </label>
                           <input class="form-control"  type="text" id="bill_phone" name="bill_phone" placeholder="Phone " required>
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
			 
		if($("#custom").val()=="0")	
			{
				
			
		
	 	if($("#customerid").val()=="0")
			{
				
			alert("Please select Customer");
				return false;
			}
				
				
			}
	});

		
		
		
		document.getElementById('firstname').disabled ="true";
	document.getElementById('lastname').disabled  ="true";
	document.getElementById('email').disabled ="true";
	   document.getElementById('password').disabled ="true";
	     document.getElementById('conpassword').disabled ="true";
		
		$('#billchk').click(function() {
    if (!$(this).is(':checked')) {
      //alert("Are you sure?");
		$("#billid").show();
		document.getElementById('bill_firstname').disabled =false;
					
	document.getElementById('bill_lastname').disabled =false;
	document.getElementById('bill_city').disabled =false;
	document.getElementById('bill_state').disabled =false;
	document.getElementById('bill_zip').disabled =false;
	document.getElementById('bill_address').disabled =false;
	document.getElementById('bill_country').disabled =false;
	document.getElementById('bill_phone').disabled =false;
    }
			else{
				
				// alert("checked");
				$("#billid").hide();
				
				document.getElementById('bill_firstname').disabled ="true";
					
	document.getElementById('bill_lastname').disabled ="true";
	document.getElementById('bill_city').disabled ="true";
	document.getElementById('bill_state').disabled ="true";
	document.getElementById('bill_zip').disabled ="true";
	document.getElementById('bill_address').disabled ="true";
	document.getElementById('bill_country').disabled ="true";
	document.getElementById('bill_phone').disabled ="true";
				
			}
  });
		
		
		
		$("#newcust").click(function() {
 
   var lable = $("#newcust").attr("value");
 
  //alert(lable);

   if(lable == "Show") {
     $("#newcust").attr("value", "Hide");
     $("#cuid").show();
	   $('#customerid').attr('disabled', 'disabled');
	    document.getElementById('firstname').disabled =false;
	document.getElementById('lastname').disabled  =false;
	document.getElementById('email').disabled =false;
	   document.getElementById('password').disabled =false;
	     document.getElementById('conpassword').disabled =false;
	   
	    $('#custom').val(1);
	   
	  
   }
   else {
     $("#newcust").attr("value", "Show");
     $("#cuid").hide();
	   $('#customerid').removeAttr('disabled');
	    document.getElementById('firstname').disabled ="true";
	document.getElementById('lastname').disabled  ="true";
	document.getElementById('email').disabled ="true";
	   document.getElementById('password').disabled ="true";
	     document.getElementById('conpassword').disabled ="true";
	   
	    $('#custom').val(0);
	   
	  
   }
			
	
   
 });
        
    });
</script>