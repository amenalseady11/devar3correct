
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
									<li class="breadcrumb-item active" aria-current="page">New Products</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Order #000123 </h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>

						             </div>
							<div class="btn_right class_status">
								Order Status : 
								<select id="update_statusbtn"> <option>Pending</option> 
									<option>Awaiting Payment</option>
									 <option>Processing</option> 
									 <option>Completed</option>
									 <option>Cancelled</option>
									 <option>Failed</option>
									</select>

									<span class="status_updatebtn">Update</span>
							</div>
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
                    <strong>Shipping Address</strong>
                </div>
                <div class="box-content order_vi">
                    <address>
<?php echo $shipping['name']?><br>
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
Delivery
</address>
                </div>
                
            </div>
  </div>
</div>
	<div class="row row-sm">
															
  <div class="col-md-6 col-lg-6">
<div class="box box-address-billing">
              <div class="box-title">
                    <strong>Billing Address</strong>
                </div>
                <div class="box-content order_vi">
                     <address>
<?php echo $billing['name']?><br>
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
     <!-- <a href="user-account-orders.php" class="btn animatedBtn back_order">Back to My Orders</a> -->
    <a href="#" class="btn btn-outline-success " style="float: right;display: inline-block;margin-bottom: 10px;">Add New  Item </a>
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
          <div class="show_hide">View More</div>   	<span class="editnew_btn">Edit</span>

        </div>
         </td>

         <td class=" qty" data-th="Qty">
           
                  <input type="number" name="qty" class="qty_input" value="<?php echo $items['qty']?>">
                  	<span class="update_btn">Update</span>
            
         </td>
         <td class=" subtotal pending_color" data-th="Status" style="text-align: left;">
            <span class="price-excluding-tax" data-label="Status">
            <span class="cart-price">
         <?php $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
				?>
         <?php echo "SAR ".$pr?>
            </span>
         </td>
         <td class="text-center">
         	<a href="#" data-placement="top" data-toggle="tooltip-primary" title="Delete" style="display: inline-block;"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
         </td>
      </tr>
       <?php } 
	   
	   
	   ?>
   </tbody>
   <tfoot>
      <tr class="subtotal">
      	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            Subtotal  :                    
         </th>
         <td   class="amount" data-th="Subtotal" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1">SAR  <?php  echo $tot;?></span>                    
         </td>
           
      </tr>
       <tr class="shipping">
       			<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
         Discount :           
         </th>
         <td  class="amount" data-th="Shipping &amp; Handling" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1">SAR 8.00</span>                    
         </td>
         
      </tr>
      <tr class="shipping">
       	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            Shipping &amp; Handling :                    
         </th>
         <td  class="amount" data-th="Shipping &amp; Handling" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1">SAR 8.00</span>                    
         </td>
        
      </tr>
      <tr class="grand_total">
      	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            <strong> Total  : </strong>
         </th>
         <td  class="amount" data-th="Estimated Total" style="text-align: left;background-color: #f1f6fb;">
         <span class="price1">SAR 208.00</span>
         </td>
          
      </tr>
       <tr class="grand_total">
 	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            <strong> Paid : </strong>
         </th>
         <td class="amount" data-th="Estimated Total" style="text-align: left;background-color: #f1f6fb;">
            <span class="price1">SAR 100.00</span>
         </td>
           
      </tr>
       <tr class="grand_total">
       	<th style="border: 0px solid white;"></th>
         <th  class="mark1" scope="row"  style="text-align: right;background-color: #f1f6fb;">
            <strong> Balance Due : </strong>
         </th>
         <td class="amount" data-th="Estimated Total" style="text-align: left;background-color: #f1f6fb;">
            <strong><span class="price"><strong>SAR 108.00</strong></span></strong>
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
  <div class="row">
                            <div class="col-lg-12">
                            <h6 class="" style="font-size: 16px;">	<strong>	MORE OPTIONS </strong> </h6>

                            <div class="box_moreoptions">
                            	<div class="row">
                            	 <div class="col-lg-12">
                            	 	<strong>Discount  & Deposit</strong>
                            	 </div>
                            	</div>
                            	<br>
                            	<div class="row">
                            	 <div class="col-lg-6">
                            	 Discount

                            	 <div>
                            	 	<input type="text" name="num" value="" placeholder="Enter Discount" class="discount_input form-control">
                            	 	<select class="discount_select  form-control">
                            	 		<option>Amount</option>
                            	 		<option>Percentage</option>
                            	 	</select>
                            	 </div>
                            		 </div>	
                            		  <div class="col-lg-6">
                            	 	Deposit

                            	 	 <div>
                            	 	<input type="text" name="num" value="" placeholder="Enter Deposit" class="deposit_input form-control">
                            	 	<select class="deposit_select  form-control">
                            	 		<option>Amount</option>
                            	 		<option>Percentage</option>
                            	 	</select>
                            	 </div>
                            	 <!--  <input type="checkbox" id="" name="check" value="1">
  <label for="vehicle1"> Already Paid</label><br> -->
                            		 </div>	
                            	</div>

                            </div>
                            </div>


</div>


<br>
<br>
  <div class="row">
                            <div class="col-lg-12">

                            	
									<div style="display: block;vertical-align: middle;">
										 <h6 class="" style="font-size: 16px;display: inline-block;margin-top: 15px;"><strong>	INVOICE LIST</strong> </h6>
						         <div class="btn_right">  <a href="#" class="btn btn-outline-success " style="display: inline-block;margin-bottom: 10px;">Generate New Invoice  </a>
						         </div>
									</div>



								
					          


                            	
                            	<table id="example" class="table key-buttons text-md-nowrap  table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
										<thead>
											<tr>
										
												<th class="border-bottom-0" style="">INVOICE NO</th>
												<th class="border-bottom-0" style="">Created date</th>
												<th class="border-bottom-0" style="">Amount</th>
												<!-- <th class="border-bottom-0" style="">Contact Person</th> -->
											
												<th class="border-bottom-0">Status </th>
												<th class="border-bottom-0">Actions </th>
											</tr>
										</thead>
										<tbody>
											<tr>
											
												<td><a href="#">000555</a></td>
												<td>April 05,2021 <br> 11:55:50 AM</td>
												<td>SAR 102.00</td>
												<!-- <td>deyar</td> -->
												
												<td style="vertical-align: middle;"><a href="#"><span class="badge badge-primary-gradient">Pending </span></a></td>
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
												
												<td style="vertical-align: middle;"><a href="#"><span class="badge badge-success-gradient">Paid </span></a></td>
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
												
												<td style="vertical-align: middle;"><a href="#"><span class="badge badge-success-gradient">Paid </span></a></td>
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
						</div>

			








					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
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