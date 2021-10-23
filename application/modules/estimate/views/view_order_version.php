<style>
    .update_status{
            color: #ffffff;
    border: 1px solid #e81f8a;
    background-color: #e81f8a;
    padding: 2px 10px;
    /*font-size: 12px;*/
    border-radius: 3px;
    }
    .discount_select {
    /* padding: 4px 10px; */
    margin-left: 10px;
}
.float_right{
        float: right;
    display: inline-block;
    padding: 5px 0px;
}
.product_sel {
    vertical-align: middle;
    width: 380px;
    display: inline-block;
}
button#newitem {
    margin: 18px 0px 18px 10px;
    background-color: #fff;
    color: #e81f8a;
    border-radius: 3px;
    padding: 4px 16px;
    border: 1px solid #e81f8a;
}
select#update_statusbtn {
    border: 1px solid #c5c5c5;
    border-radius: 3px !important;
}
select#product {
    height: 33px;
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
								<li class="breadcrumb-item active">Estimate</li>
									<li class="breadcrumb-item active" aria-current="page">New Estimate</li>
								</ol>
							</nav>
						</div>
						
					</div>
					<!-- /breadcrumb -->
		<!-- main-content-body -->
					
					<div class="main-content-body" >
						<div class="row row-sm">
								<!--div-->
					<div class="col-xl-12">
						
					
						<div class="card mg-b-20">
							
							<?php if($this->session->flashdata('message_email')){?>
	

							<div style="width:80%;margin-left:100px;" align="center"> <div class="alert alert-success">
    <strong>Success!</strong> <?php echo $this->session->flashdata('message_email');?>
  </div></div>
							<?php } ?>
							<div class="card-header pb-0">
								
								
									
								<div class="justify-content-between" style="display: inline-block;">
									<a href="<?php echo base_url()?>estimate"   ><< Back</a>
									<h3 class="card-title mg-b-2 mt-2">Estimate #<?php echo $orders['order_id']?> </h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
                                     
						             </div>
								<form method="post" class="float_right" action="<?php echo base_url()?>estimate/update_order_status">
									
									<input type="hidden" name="ordid" value="<?php echo $orderid?>">
									
							<div class="btn_right class_status" >
								Estimate Status : 
								<select id="update_statusbtn" class="form-control2" name="status"> 
									
									<option value="Pending" <?php if($orders['status']=="Pending"){ echo "selected";}?>>Pending</option> 
									<option value="Awaiting Payment" <?php if($orders['status']=="Awaiting Payment"){ echo "selected";}?>>Awaiting Payment</option>
									 <option value="Processing" <?php if($orders['status']=="Processing"){ echo "selected";}?>>Processing</option> 
									 <option value="Completed" <?php if($orders['status']=="Completed"){ echo "selected";}?>>Completed</option>
									 <option value="Cancelled" <?php if($orders['status']=="Cancelled"){ echo "selected";}?>>Cancelled</option>
									 <option value="Failed" <?php if($orders['status']=="Failed"){ echo "selected";}?>>Failed</option>
									 <option value="Onhold" <?php if($orders['status']=="Onhold"){ echo "selected";}?>>Onhold</option>
									</select>

									
							</div>
									</form>
					                </div>

					                <div class="card-header pb-0">
					                	Order Date : <?php echo date("d F Y H:i:s A", strtotime($orders['order_date'])); ?>
					                </div>

					<div class="card-body">    
					<div class="row ">            
	 <div class="col-md-10">
									<div class="row row-sm">												
  <div class="col-md-6 col-lg-6">
<div class="box box-address-billing">
              <div class="box-title">
                    <strong>Shipping Address</strong>&nbsp;&nbsp;
                </div>
                <div class="box-content order_vi">
                    <address>
<?php echo $shipping['first_name']?>&nbsp;<?php echo $shipping['last_name']?><br>
 <?php echo $shipping['address']?><br>
<?php echo $shipping['city']?><br>
<?php echo $shipping['state']?><br>
						<?php echo $shipcountryarr['country_name']?><br>
<a href="tel:<?php echo $shipping['phone_number']?>"> <?php echo $shipping['phone_number']?></a>

                    </address>
                </div>
                
            </div>
  </div>
   <div class="col-md-6 col-lg-6">
  <div class="box box-address-shipping">
               <div class="box-title">
                    <strong>Shipping Method</strong>
                </div>
                <div class="box-content order_vi">
                      <address>
<?php echo $orders['shipping_method']?>
</address>
                </div>
                
            </div>
  </div>
</div>
	<div class="row row-sm">
															
  <div class="col-md-6 col-lg-6">
<div class="box box-address-billing">
              <div class="box-title">
                    <strong>Billing Address</strong>&nbsp;&nbsp;
                </div>
                <div class="box-content order_vi">
                     <address>
<?php echo $billing['first_name']?>&nbsp;<?php echo $billing['last_name']?><br>
 <?php echo $billing['address']?><br>
<?php echo $billing['city']?><br>
<?php echo $billing['state']?><br>
						<?php echo $countryarr['country_name']?><br>
<a href="tel:<?php echo $billing['phone_number']?>"> <?php echo $billing['phone_number']?></a>


                    </address>
                </div>
                
            </div>
  </div>
   <div class="col-md-6 col-lg-6">
  <div class="box box-address-shipping">
               <div class="box-title">
                    <strong>Payment Method</strong>
                </div>
                <div class="box-content order_vi">
                      <address>
    Cash On Delivery  
</address>
                </div>
                
            </div>
  </div>
</div>
</div>

</div>
<br>
<div class="row">
                            <div class="col-lg-12">
                                <div class="mb-3 mb-lg-0">
                                   
                                    <div class="table_cardbody">
                                        
                                   
                                    <div class="order-details-items ordered">
<div class="table-wrapper order-items">
	<div class="btn_bottom">
     
		
		 
		 <div class="row">
                            	
                         	

                            	 
			 <div class="col-lg-12">
				 <div align="right">
						 <form method="post" action="<?php echo base_url()?>estimate/estimate_new_item">
		 <input type="hidden" name="orderid" value="<?php echo $orderid?>"> 
			

						<div class="product_sel">
							   
						 Product 
					 <select class="discount_select  form-control" id="product" name="product">
						 <option value="">Select</option>
						 <?php foreach ($products as $prd){?>
	

										
                            	 		<option value="<?php echo $prd->product_id?>"><?php echo $prd->product_name?></option>
                            	 		
						 
						 <?php } ?>
                            	 	</select>
						</div>
				
				
									 
									 
				
				
		
					 </form>

			 </div>
                            	
                            			
		
   
		
</div>
			 
                                        <table class="data table table-order-items" id="my-orders-table" summary="Items Ordered">   
   <thead>
      <tr>
         <th class=" name" width="50%">Product Name</th>
         <!-- <th class="col price" width="200">Price</th> -->
         <th class=" qty" width="30%">Quantity</th>
         <th class=" status" style="text-align: left;width: 100px;">Subtotal</th>
         <th style="width: 40px;text-align: center;"></th>
      </tr>
   </thead>
   <tbody>
	   <?php 
				$total="0";
				 $tot="0";
	 $prdcount=count($order_details);
				foreach ($order_details as $items)
{
					
					
					$total=$total+$item['price'];
					
					
	
					$options=json_decode($items['product_options']);
					
					?>
      <tr id="order-item-row-40">
         <td class=" name" data-th="Product Name" style="">
            <strong class="product name product-item-name"><b><?php echo $items['name']?></b></strong>
            <div class="at_box show_3" >
            	<div class="attribute_box ">
            <?php		foreach ($options as $key=>$value)
							 {
						
						$subprice=$items['price']*$items['qty'];
								 
						?>
           
              <div class="dependable-attribute">
             <?php
						echo $value->name." : <b>".$value->value."</b>";
						?>
            </div>
			  <?php } ?>
            <?php if($items['comments']){?>
			  
			   <div class="dependable-attribute">
           
						comments : <b><?php echo $items['comments'] ?></b>
						
            </div>
			  <?php } ?>
					
					 <?php $itemid=$items['id']; ?>
			  
			  <?php foreach($filearr[$itemid] as $val){
						
						$file=$val['order_file_name'];
						
			  
			  $ext = pathinfo($file, PATHINFO_EXTENSION);
						
						
			  ?>
						
						<div class="dependable-attribute">
							<?php if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext=="gif"){
				  
			             ?>
           
						uploaded files : <img src="<?php echo base_url()?>assets/uploads/<?php echo $val['order_file_name'] ?>" width="100" height="auto">
							<?php } else {?>
							
							uploaded files : <a href="<?php echo base_url()?>assets/uploads/<?php echo $val['order_file_name'] ?>"><?php echo $val['order_file_name'] ?></a>
           
			  <?php } ?>
							
							 </div>
						
						
				<?php	}
					
             ?>
         
             
        </div>
   <div class="show_hide">View More</div> 

        </div>
         </td>

         <td class=" qty" data-th="Qty">
           <form method="post" action="<?php echo base_url()?>estimate/update_qty">
			   <input type="hidden" name="oid" id="oid" value="<?php echo $orders['order_id']?>">
			   <input type="hidden" name="itid" id="itid" value="<?php echo $items['id']?>">
                  <input type="number" name="qty" class="qty_input" value="<?php echo $items['qty']?>">
                  	
			 </form>
            
         </td>
         <td class=" subtotal pending_color" data-th="Status" style="text-align: left;">
            <span class="price-excluding-tax" data-label="Status">
            <span class="cart-price">
         <?php $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
				?>
         <?php echo "SAR ".number_format($pr,2)?>
            </span>
         </td>
         <td class="text-center">
			
         </td>
      </tr>
       <?php } 
	   
	   
	   ?>
   </tbody>
   <tfoot>
	  
	    
      <tr class="subtotal">
		  <input type="hidden" name="subtotal" id="subtotal" value="<?php echo $tot?>">
		   <input type="hidden" name="shipping" id="shipping" value="<?php echo $orders['shipping_price']?>">
		  
		  
      	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            Subtotal  :                    
         </th>
         <td   class="amount" data-th="Subtotal" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1">SAR  <?php  echo number_format($tot,2);?></span>                    
         </td>
           
      </tr>
      <tr class="shipping">
       			<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
         Discount :           
         </th>
         <td  class="amount" data-th="Shipping &amp; Handling" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1" id="discountprice">SAR <?php echo number_format($orders['discount'],2)?><?php if($orders['discount_type']=="percentage"){ echo " (".$orders['discount_percentage']." %)"; }?></span>                    
         </td>
         
      </tr>
	   <?php 
	
	if($orders['vat_price'])
	{
	  $vat=$orders['vat_price'];
		
	}
	else
	{
	  $vat=$tot*15/100;	
	}
	
	
	   
	   ?>
	   <tr class="shipping">
       			<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
         Vat(15%) :           
         </th>
         <td  class="amount" data-th="Shipping &amp; Handling" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1" id="vat">SAR <?php echo number_format($vat,2)?></span>     
			 
         </td>
         
      </tr>
      <tr class="shipping">
       	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            Shipping &amp; Handling :                    
         </th>
         <td  class="amount" data-th="Shipping &amp; Handling" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1">SAR <?php echo number_format($orders['shipping_price'],2)?></span>                    
         </td>
        
      </tr>
	   <?php $grandtotal=$orders['shipping_price']+$vat+$tot-$orders['discount']?>
	   <input type="hidden" name="grand_total" id="grand_total" value="<?php echo $grandtotal;?>">
      <tr class="grand_total">
      	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            <strong> Total  : </strong>
         </th>
         <td  class="amount" data-th="Estimated Total" style="text-align: left;background-color: #f1f6fb;">
         <span class="price1" id="grand">SAR <?php echo number_format($grandtotal,2);?></span>
         </td>
          
      </tr>
       <tr class="grand_total">
 	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            <strong> Paid : </strong>
         </th>
         <td class="amount" data-th="Estimated Total" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1" id="deposit_val">SAR <?php echo number_format($orders['deposit'],2)?></span>
         </td>
           
      </tr>
	   <?php  
	
	    $grandtotal=$grandtotal-$orders['deposit'];
	   ?>
       <tr class="grand_total">
       	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            <strong> Balance Due : </strong>
         </th>
         <td class="amount" data-th="Estimated Total" style="text-align: left;background-color: #f1f6fb;">
            <strong><span class="price" id="balance"><strong>SAR <?php echo number_format($grandtotal,2);?></strong></span></strong>
         </td>
          
      </tr>
   </tfoot>
</table>
</div>
</div> 
</div>
</div>
 </div>
  </div>
<br>
<br>
								<form method="post" action="<?php echo base_url()?>estimate/add_order_comments">
						<input type="hidden" name="orderid" value="<?php echo $orderid?>">
						<input type="hidden" id="hold" name="hold" value="0">
									<input type="hidden" name="userid" value="<?php echo $orders['customer_id']?>">
							<input type="hidden" name="discount_total" id="discount_total" value="<?php echo $orders['discount']?>">
		  <input type="hidden" name="deposit_total" id="deposit_total" value="<?php echo $orders['deposit']?>">
		   <input type="hidden" name="vat_price" id="vat_price" value="<?php echo $orders['vat_price']?>">
									
			 <input type="hidden" name="balance_total" id="balance_total" value="<?php echo $grandtotal;?>">						
									
									
									
  

<br>
<br>
						
							
						
							
									<br><br>
							
						</div>
					</div>
						</form>
 <!-- <div class="row">
                            <div class="col-lg-12">

                            	
									<div style="display: block;vertical-align: middle;">
										 <h6 class="" style="font-size: 16px;display: inline-block;margin-top: 15px;"><strong>	INVOICE LIST</strong> </h6>
						         <div class="btn_right">  <a href="#" class="btn btn-outline-success " style="display: inline-block;margin-bottom: 10px;">Generate New Invoice  </a>
						         </div>
									</div>



								
					          


                            	
                            	<table id="" class="table key-buttons text-md-nowrap  table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
										<thead>
											<tr>
										
												<th class="border-bottom-0" style="">INVOICE NO</th>
												<th class="border-bottom-0" style="">Created date</th>
												<th class="border-bottom-0" style="">Amount</th>
												<!-- <th class="border-bottom-0" style="">Contact Person</th> -->
											
												<!--<th class="border-bottom-0">Status </th>
												<th class="border-bottom-0">Actions </th>
											</tr>
										</thead>
										<tbody>
											<tr>
											
												<td><a href="#">000555</a></td>
												<td>April 05,2021 <br> 11:55:50 AM</td>
												<td>SAR 102.00</td>
												<!-- <td>deyar</td> -->
												
<!--<td style="vertical-align: middle;"><a href="#"><span class="badge badge-primary-gradient">Pending </span></a></td>
												<td>
													<div class="btn-icon-list">
  <a href="#" data-placement="top" data-toggle="tooltip-primary" title="View">  <button class="btn btn-success btn-warning  btn-icon" ><i class="typcn typcn-eye"></i></button></a>

	<a href="#" data-placement="top" data-toggle="tooltip-primary" title="Delete"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
                </div>
												</td>
											</tr>
												<tr>
											
												<td><a href="#">000554</a></td>
												<td>April 05,2021 <br> 09:55:50 AM</td>
												<td>SAR 102.00</td>
												<!-- <td>deyar</td> -->
												
												<!--<td style="vertical-align: middle;"><a href="#"><span class="badge badge-success-gradient">Paid </span></a></td>
												<td>
													<div class="btn-icon-list">
  <a href="#" data-placement="top" data-toggle="tooltip-primary" title="View">  <button class="btn btn-success btn-warning  btn-icon" ><i class="typcn typcn-eye"></i></button></a>

	<a href="#" data-placement="top" data-toggle="tooltip-primary" title="Delete"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
                </div>
												</td>
											</tr>
												<tr>
											
												<td><a href="#">000553</a></td>
												<td>April 04,2021 <br> 11:55:50 AM</td>
												<td>SAR 102.00</td>
												<!-- <td>deyar</td> -->
												
												<!--<td style="vertical-align: middle;"><a href="#"><span class="badge badge-success-gradient">Paid </span></a></td>
												<td>
													<div class="btn-icon-list">
  <a href="#" data-placement="top" data-toggle="tooltip-primary" title="View">  <button class="btn btn-success btn-warning  btn-icon" ><i class="typcn typcn-eye"></i></button></a>

	<a href="#" data-placement="top" data-toggle="tooltip-primary" title="Delete"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
                </div>
												</td>
											</tr>
										</tbody>
									</table>

                            	

                            
                            </div>


</div>
				
				                </div>
			                </div>
					<!--/div-->
						<!--</div>

			








					</div>-->
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			</div>
			<!-- /main-content -->
								

	

<script type="text/javascript">
	
	

    $(document).ready(function() {
        $('select[name="product"]').on('change', function() {
            var productid = $(this).val();
			
			//alert(productid);
            
                           $.ajax({  
                    url: "<?php echo base_url(); ?>orgproducts/orgdependable/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: "product="+productid, //The variables which are going.
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						$('#dependid').html(data);
                    }
                })        });
    });
</script>
 <script type="text/javascript">
  $(".show_hide").click(function(){
$(this).parent('.at_box').toggleClass("show_3");
if ($(this).parent('.at_box').hasClass('show_3')){
 $(this).html('View More');
 } else {
 $(this).html('Less View');
   }
});

$('#onhold').click(function() {
  $('#hold').val(1);
  var count = $("#comments").val().length;
 
  if(count=="0")
  {
  alert("Please Enter Onhold comments")
  return false;
  }

  if(count>"200")
  {
  alert("Maximun 200 charcters allowed in comments")
  return false;
  }
  
 // var textlen = $(#comments).val().length;
 // alert(textlen);
  //return false;
});
	 
	 $('#discountsel').on('change', function() {
		 
		 
		//alert($("#discountsel").val());
		 
		 
		 
		 if($("#depositsel").val()=="")
			 {
				deposit="0.00";				  
				 $("#deposit_val").val(deposit);
				 deposit="SAR "+deposit;
				 $("#deposit_val").html(deposit);
				 
			 }
		  
		 if($("#discountsel").val()=="")
			 {
				discount="0.00";				  
				 $("#discount_val").val(discount);
				 discount="SAR "+discount;
				 $("#discountprice").html(discount);
				 
			 }
		  
		
		 
		 if($("#discountsel").val()=="amount")
			 {
				 
				
		
		var disc=  $("#discount").val();
		 
		 $("#discount_total").val(disc);
				 
			 } else if($("#discountsel").val()=="percentage")
				 {
					 
				var disc=  $("#discount").val();
					 
				disc=	 $("#subtotal").val()*disc/100;
					  disc=(disc).toFixed(2);
		 
		       $("#discount_total").val(disc);	 
					 
					  
					 
				 }
		 else
					 {
						 
					//alert("plz select amount/percentage");
						
						if($("#depositsel").val()=="")
				 {
					 depo="0.00";
					  $("#deposit_total").val(depo);	 
				 }
						
						 disc="0";
					
						 $("#discount_total").val(disc); 
					 }
		 
		 var discprice="SAR "+disc;
		 
		 $("#discountprice").html(discprice);
		
		 
		 var vatprice= $("#subtotal").val()-disc;
		 
		    var vat=vatprice*15/100;
		  vat=(vat).toFixed(2);
		 
		 $("#vat_price").val(vat);
		 
		 
		 $("#vat").html("SAR "+vat);
		 
		 var ship=$("#shipping").val();
		 
		 
		  var discounttotal=$("#discount_total").val();
		 
		 var total=parseFloat(vatprice)+parseFloat(ship)+parseFloat(vat);
		 
		 total=(total).toFixed(2);
		 
		 
		 $("#grand").val(total);
		 
		 //alert($("#grand").val());
		 
		$("#grand").html("SAR "+total);
		 
		 //alert(total);
		 
		 $("#balance_total").val(total);
		 $("#balance").html("SAR "+total);
		 
		if($("#deposit_total").val())
		{
			
			var deposittotal=$("#deposit_total").val();
			
			var deposit=deposittotal;
		}
		 else{
			 
			  var deposit=  $("#deposit").val();
		 
		 $("#deposit_total").val(deposit);
		  
		 
		 
		 }
		 
		 //alert("mmmmm");
				 
			
		
		   var depositprice="SAR "+deposit;
		  
		  
		  //var subtotal= $("#subtotal").val();
		  
		  //alert(subtotal);
		  
		  var deposittotal=$("#deposit_total").val();
		  
		  //alert(deposittotal);
		  
		   //var discounttotal=$("#discount_total").val();
		  
		  //alert(discounttotal);
		 
		 $("#deposit_val").html(depositprice);
		  
		  //var ship=$("#shipping").val();
		 
		 /*
		 if($("#discount").val()=="")
			 {
				var disc="0";
				 discounttotal="0";
			 }
		 else{
			 
			   var disc=  $("#discount").val();
		 }
			 
		 
		
		  
		   var vatprice= $("#subtotal").val()-disc;
		 
		 
		 
		    var vat=vatprice*15/100;
		  vat=(vat).toFixed(2);
		 
		 if($("#discountsel").val()=="percentage")
			 {
				alert(subtotal);
				 alert(vat);
				 
			 }
		  
		  var bal=parseFloat(vatprice)+parseFloat(vat)+parseFloat(ship)-parseFloat(discounttotal)-parseFloat(deposittotal);
		  
		   bal=(bal).toFixed(2);
		 
		 alert(bal);
		  
		  var balancetotal= "SAR "+bal;
		 
		 
		 
		   $("#balance").html(balancetotal);
		   
		    */
		 
		 if(deposittotal)
			{
			
			total=parseFloat(total)-parseFloat(deposittotal);
			
			bal=(total).toFixed(2);
				
				$("#balance_total").val(bal);
				
			 var balancetotal= "SAR "+bal;
		 
		 
		 
		   $("#balance").html(balancetotal);
			
			}
		 
		 

});
	 
	  $('#depositsel').on('change', function() {
		  
		   
		  
		  
		   if($("#deposit").val())
			  {
				  
				var deposit=   $("#deposit").val();  
				  
			  }
		  else{
			  
			  deposit="0";
		  }
		  
		   if($("#depositsel").val()=="")
			 {
				deposit="0.00";				  
				 $("#deposit_val").val(deposit);
				 deposit="SAR "+deposit;
				 $("#deposit_val").html(deposit);
				 
			 }
		  
		 if($("#discountsel").val()=="")
			 {
				discount="0.00";				  
				 $("#discount_val").val(discount);
				 discount="SAR "+discount;
				 $("#discountprice").html(discount);
				 
			 }
		  
		
		  
		 
		  
		  var subtotal= $("#subtotal").val();
		
		   var discounttotal=$("#discount_total").val();
		
		  var ship=$("#shipping").val();
		  
		  
		   if($("#discount").val())
			  {
				  
				var disc=  $("#discount").val();  
				  
			  }
		  else{
			  
			  disc="0";
		  }
		  
		  
		  
		  
		  if($("#discount").val())
			  {
				  
				var disc=  $("#discount").val();  
				  
			  }
		  else{
			  
			  disc="0";
		  }
		  
		  		  
			if($("#discountsel").val()=="amount")
			 {
				 
				
		
		var disc=  $("#discount").val();
		 
		 $("#discount_total").val(disc);
				 
			 } else if($("#discountsel").val()=="percentage")
				 {
					 
				var disc=  $("#discount").val();
					 
				disc=	 $("#subtotal").val()*disc/100;
					  disc=(disc).toFixed(2);
		 
		       $("#discount_total").val(disc);	 
					 
				 }							  
		  
		  
		   var vatprice= $("#subtotal").val()-disc;
		 
		    var vat=vatprice*15/100;
		  vat=(vat).toFixed(2);
		  
		  $("#vat_price").val(vat);
		  
		  
		   if($("#depositsel").val()=="amount")
			 {
			
		    //var deposit=  $("#deposit").val();
			 if($("#deposit").val())
			  {
				  
				var deposit=   $("#deposit").val();  
				  
			  }
		  else{
			  
			  deposit="0";
		  }
		  
		  
		  var depositprice="SAR "+deposit;
				 
				//alert(depositprice);
				 
				$("#deposit_total").val(deposit);
				 
				 
				 var depo=$("#deposit_total").val();
				 
				 
				 $("#deposit_val").html(depositprice);
				 
				// alert("kkkkkkkkk");
				 
			 } else if($("#depositsel").val()=="percentage")
				 {
				
					 
					 // var deposit=  $("#deposit").val();
					 
					 //alert(subtotal);
					  //alert(ship);
					  //alert(vat);
					 
					  if($("#discount").val())
			  {
				  
				  //alert($("#grand").val());
				var depo=  parseFloat(subtotal)+parseFloat(vat)+parseFloat(ship)-parseFloat(discounttotal); 
				  
			  }
		  else{
			  
			   //alert($("#grand").val());
			 var depo=  parseFloat(subtotal)+parseFloat(vat)+parseFloat(ship);
			 // alert(depo);
		  }
					 
				   depo=depo*deposit/100;
					  depo=(depo).toFixed(2);
		 
		        $("#deposit_total").val(depo);
		  
		  var depositprice="SAR "+depo; 
					 
					  $("#deposit_val").html(depositprice);
					 
					 
				
					 
				 } else 
					 
					 {
						
						 depo="0.00";
					  $("#deposit_total").val(depo);	
						 
						 if($("#discountsel").val()=="")
				 {
					 disc="0.00";
					  $("#discount_total").val(disc);	 
				 }
						 
					 }
					
		  
		 //alert($("#grand").val());
		  
		  if($("#grand").val()=="")
			  {
				  
				  
			 
		var grand=$("#grand_total").val();
				  
			  }
		  else{
			  
			  var grand=$("#grand").val()
		  }
		  
		 // alert(grand);
		var dep= $("#deposit_total").val();
		  
		  var bal=parseFloat(grand)-parseFloat(dep);
		  
		   bal=(bal).toFixed(2);
		  
		   $("#balance_total").val(bal);
		  
		  var balancetotal= "SAR "+bal;
		 
		   $("#balance").html(balancetotal);
		 
		

});
 
</script>
<script type="text/javascript">
	$('#update_statusbtn').on('change', function() {
//$('.status_updatebtn').css("display", "inline-block");;
});
	 $(".status_updatebtn").click(function(){
	 	//$('.status_updatebtn').css("display", "none");;
	});
	 $("#newitem").click(function(){
	 	if($("#product").val()=="")
			{
				
			alert("Please select Product");
				return false;
			}
	});
	
	// $("#discount").onchange(function(){
	function dis(){
		
		 if($("#depositsel").val()=="")
			 {
				deposit="0.00";				  
				 $("#deposit_val").val(deposit);
				 deposit="SAR "+deposit;
				 $("#deposit_val").html(deposit);
				 
				 
						 depo="0.00";
					  $("#deposit_total").val(depo);	
						 
						
				 
			 }
		  
		 if($("#discountsel").val()=="")
			 {
				discount="0.00";				  
				 $("#discount_val").val(discount);
				 discount="SAR "+discount;
				 $("#discountprice").html(discount);
				 
				  disc="0.00";
				$("#discount_total").val(disc);	
				 
			 }
			 
			
		  
			
		  
		
		 if($("#depositsel").val()=="")
			 {
				deposit="0.00";				  
				 $("#deposit_val").val(deposit);
				 deposit="SAR "+deposit;
				 $("#deposit_val").html(deposit);
				 
			 }
		  
		 if($("#discountsel").val()=="")
			 {
				discount="0.00";				  
				 $("#discount_val").val(discount);
				 discount="SAR "+discount;
				 $("#discountprice").html(discount);
				 
			 }
		  
		
		 
		 if($("#discountsel").val()=="amount")
			 {
				 
				
		
		var disc=  $("#discount").val();
		 
		 $("#discount_total").val(disc);
				 
			 } else if($("#discountsel").val()=="percentage")
				 {
					 
				var disc=  $("#discount").val();
					 
				disc=	 $("#subtotal").val()*disc/100;
					  disc=(disc).toFixed(2);
		 
		       $("#discount_total").val(disc);	 
					 
				 }
		 else
					 {
						 
					//alert("plz select amount/percentage");
						
						if($("#depositsel").val()=="")
				 {
					 depo="0.00";
					  $("#deposit_total").val(depo);	 
				 }
						
						 disc="0";
					
						 $("#discount_total").val(disc); 
					 }
		 
		 var discprice="SAR "+disc;
		 
		 $("#discountprice").html(discprice);
		
		 
		 var vatprice= $("#subtotal").val()-disc;
		 
		    var vat=vatprice*15/100;
		  vat=(vat).toFixed(2);
		
		$("#vat_price").val(vat);
		 
		 $("#vat").html("SAR "+vat);
		 
		 var ship=$("#shipping").val();
		 
		 var total=parseFloat(vatprice)+parseFloat(ship)+parseFloat(vat);
		 
		 total=(total).toFixed(2);
		
		$("#balance_total").val(total);
		 
		 
		 $("#grand").val(total);
		 
		 //alert($("#grand").val());
		 
		$("#grand").html("SAR "+total);
		 
		 
		 $("#balance").html("SAR "+total);
		 
		if($("#deposit_total").val())
		{
			
			var deposittotal=$("#deposit_total").val();
			
			var deposit=deposittotal;
		}
		 else{
			 
			  var deposit=  $("#deposit").val();
		 
		 $("#deposit_total").val(deposit);
		  
		 
		 
		 }
		 
		 //alert("mmmmm");
				 
			
		
		   var depositprice="SAR "+deposit;
		  
		  
		  var subtotal= $("#subtotal").val();
		  
		  //alert(subtotal);
		  
		  var deposittotal=$("#deposit_total").val();
		  
		  //alert(deposittotal);
		  
		   var discounttotal=$("#discount_total").val();
		  
		  //alert(discounttotal);
		 
		 $("#deposit_val").html(depositprice);
		  
		  var ship=$("#shipping").val();
		 
		 
		 if($("#discount").val()=="")
			 {
				var disc="0";
				 discounttotal="0";
			 }
		 else{
			 
			   var disc=  $("#discount").val();
		 }
			 
		 
		
		  
		   var vatprice= $("#subtotal").val()-disc;
		 
		 
		 
		    var vat=vatprice*15/100;
		  vat=(vat).toFixed(2);
		  
		  var bal=parseFloat(subtotal)+parseFloat(vat)+parseFloat(ship)-parseFloat(discounttotal)-parseFloat(deposittotal);
		  
		   bal=(bal).toFixed(2);
		
		$("#balance_total").val(bal);
		  
		  var balancetotal= "SAR "+bal;
		 
		 
		 
		   $("#balance").html(balancetotal);
		   
		    
		 
	}
	
	function dep()
	{
		
		
		 if($("#depositsel").val()=="")
			 {
				deposit="0.00";				  
				 $("#deposit_val").val(deposit);
				 deposit="SAR "+deposit;
				 $("#deposit_val").html(deposit);
				 
				 
						 depo="0.00";
					  $("#deposit_total").val(depo);	
						 
						
				 
			 }
		  
		 if($("#discountsel").val()=="")
			 {
				discount="0.00";				  
				 $("#discount_val").val(discount);
				 discount="SAR "+discount;
				 $("#discountprice").html(discount);
				 
				  disc="0.00";
				$("#discount_total").val(disc);	
				 
			 }
			 
			
		  
		
	 if($("#deposit").val())
			  {
				  
				var deposit=   $("#deposit").val();  
				  
			  }
		  else{
			  
			  deposit="0";
		  }
		  
		   if($("#depositsel").val()=="")
			 {
				deposit="0.00";				  
				 $("#deposit_val").val(deposit);
				 deposit="SAR "+deposit;
				 $("#deposit_val").html(deposit);
				 
			 }
		  
		 if($("#discountsel").val()=="")
			 {
				discount="0.00";				  
				 $("#discount_val").val(discount);
				 discount="SAR "+discount;
				 $("#discountprice").html(discount);
				 
			 }
		  
		
		  
		 
		  
		  var subtotal= $("#subtotal").val();
		
		   var discounttotal=$("#discount_total").val();
		
		  var ship=$("#shipping").val();
		  
		  
		   if($("#discount").val())
			  {
				  
				var disc=  $("#discount").val();  
				  
			  }
		  else{
			  
			  disc="0";
		  }
		  
		  
		  
		  
		  if($("#discount").val())
			  {
				  
				var disc=  $("#discount").val();  
				  
			  }
		  else{
			  
			  disc="0";
		  }
					  
			if($("#discountsel").val()=="amount")
			 {
				 
				
		
		var disc=  $("#discount").val();
		 
		 $("#discount_total").val(disc);
				 
			 } else if($("#discountsel").val()=="percentage")
				 {
					 
				var disc=  $("#discount").val();
					 
				disc=	 $("#subtotal").val()*disc/100;
					  disc=(disc).toFixed(2);
		 
		       $("#discount_total").val(disc);	 
					 
				 }							  
		  
		  
		  
		   var vatprice= $("#subtotal").val()-disc;
		 
		    var vat=vatprice*15/100;
		  vat=(vat).toFixed(2);
		
		  $("#vat_price").val(vat);
		  
		  
		   if($("#depositsel").val()=="amount")
			 {
			
		    //var deposit=  $("#deposit").val();
			 if($("#deposit").val())
			  {
				  
				var deposit=   $("#deposit").val();  
				  
			  }
		  else{
			  
			  deposit="0";
		  }
		  
		  
		  var depositprice="SAR "+deposit;
				 
				//alert(depositprice);
				 
				$("#deposit_total").val(deposit);
				 
				 
				 var depo=$("#deposit_total").val();
				 
				 
				 $("#deposit_val").html(depositprice);
				 
				// alert("kkkkkkkkk");
				 
			 } else if($("#depositsel").val()=="percentage")
				 {
				
					 
					 // var deposit=  $("#deposit").val();
					 
					 //alert(subtotal);
					  //alert(ship);
					  //alert(vat);
					 
					  if($("#discount").val())
			  {
				  
				  //alert($("#grand").val());
				var depo=  parseFloat(subtotal)+parseFloat(vat)+parseFloat(ship)-parseFloat(discounttotal); 
				  
			  }
		  else{
			  
			   //alert($("#grand").val());
			 var depo=  parseFloat(subtotal)+parseFloat(vat)+parseFloat(ship);
			 // alert(depo);
		  }
					 
				   depo=depo*deposit/100;
					  depo=(depo).toFixed(2);
		 
		        $("#deposit_total").val(depo);
		  
		  var depositprice="SAR "+depo; 
					 
					  $("#deposit_val").html(depositprice);
					 
					 
					 
		  
					 
				 } else 
					 
					 {
						
						 depo="0.00";
					  $("#deposit_total").val(depo);	
						 
						 if($("#discountsel").val()=="")
				 {
					 disc="0.00";
					  $("#discount_total").val(disc);	 
				 }
						 
					 }
					
		  
		 //alert($("#grand").val());
		  
		  if($("#grand").val()=="")
			  {
				  
				  
			 
		var grand=$("#grand_total").val();
				  
			  }
		  else{
			  
			  var grand=$("#grand").val()
		  }
		  
		 // alert(grand);
		var dep= $("#deposit_total").val();
		  
		  var bal=parseFloat(grand)-parseFloat(dep);
		  
		   bal=(bal).toFixed(2);
		$("#balance_total").val(bal);
		  
		  var balancetotal= "SAR "+bal;
		 
		   $("#balance").html(balancetotal);
		 
	}
</script>
<script>			   
					  $('#update_statusbtn').on('change', function() {
											
											
	 	if($("#update_statusbtn").val()=="Processing")
			{
				document.getElementById("upbutton").disabled = true;
			
			}
			 else
			 {
				document.getElementById("upbutton").disabled = false;		 
						 
			 }
	});
							 </script>