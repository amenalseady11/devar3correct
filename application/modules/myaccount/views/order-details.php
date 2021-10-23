   
              <style type="text/css">
                .comment_box {
    padding: 0px;
    border: 1px solid #efefef;
}
.comment_boxhead{
  margin-bottom: 10px;
}
              </style>
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
                       <h4>Order #<?php echo $orderid?> - Order <?php echo ucfirst($orders['status'])?></h4>
<?php
//$dt = new DateTime('2016-12-12 12:12:12', new DateTimeZone('Asia/Riyadh'));

// change the timezone of the object without changing it's time
//$dt->setTimezone(new DateTimeZone('UTC'));

// format the datetime
//echo $dt->format('Y-m-d H:i:s T');



   


?>


                       <div>
                         <p style="font-size: 15px;"><!--Order Date : 03 April 2021 ,  11:55:50 AM--><?php echo date("d F Y H:i:s A", strtotime($orders['order_date'])); ?></p>
						   <p class="invoice_rightcss"><?php if($orders['confirmed']){?><a href="<?php echo base_url()?>myaccount/invoice/<?php echo $orderid?>" target="_blank"  role="button" class="btn pinkcss animatedBtn darckBtn btn_style1">Invoice</a><?php } ?></p>
                       </div>
                       <div>
                           <?php if(count($ordernotes)){?>
                       <div class="row">
 <div class="col-md-12 col-lg-12">
  <div class="comment_box"> 
<div class="comment_boxhead">
                <strong class="box-title">
                    <span>Order Comments</span>
                </strong>
            </div>
         
<?php foreach ($ordernotes as $notes){

 ?>

             <div class="box-content order_vi" style="background-color: #f9f9f9;margin-bottom: 10px;border-left: 2px solid #ec1d8c;">
                    <address>
                   <?php echo $notes[order_comments] ?>

                    </address>
                </div>

  <?php
}
?>
  </div>
</div>
</div>
<?php } ?>
                         <div class="row">
  <div class="col-md-6 col-lg-6">
<div class="box box-address-billing">
                <strong class="box-title">
                    <span>Shipping Address</span>
                </strong>
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
                <strong class="box-title">
                    <span> Shipping Method</span>
                </strong>
                <div class="box-content order_vi">
                      <address>
<?php echo $orders['shipping_method']?>
</address>
                </div>
                
            </div>
  </div>
  </div>

    <div class="row">
  <div class="col-md-6 col-lg-6">
<div class="box box-address-billing">
                <strong class="box-title">
                    <span>Billing Address</span>
                </strong>
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
                <strong class="box-title">
                    <span> Payment Method</span>
                </strong>
                <div class="box-content order_vi">
                      <address>
                     Cash On Delivery   
                   </address>
                </div>
                
            </div>
  </div>
  </div>
 
                       </div>


                    
        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3 mb-lg-0">
                                   
                                    <div class="card-body table_cardbody">
                                        
                                   
                                    <div class="order-details-items ordered">
<div class="table-wrapper order-items">
                                        <table class="data table table-order-items" id="my-orders-table" summary="Items Ordered">   
   <thead>
      <tr>
         <th class=" name" width="60%">Product Name</th>
         <!-- <th class="col price" width="200">Price</th> -->
         <th class=" qty" width="20%">Qty</th>
         <th class=" status" width="20%" style="text-align: right;">Price</th>
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
            <div class="at_box">
          <div class="attribute_box show_3">
              
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
            <ul class="items-qty">
               <li class="item">
                  <span class="content"><?php echo $items['qty']?></span>
               </li>
            </ul>
         </td>
         <td class=" subtotal pending_color" data-th="Status" style="text-align: right;">
            <span class="price-excluding-tax" data-label="Status">
            <span class="cart-price" style="color: #2e3435;">
         <?php $pr=$items['qty']*$items['unit_price'];
				
				$prdisp=number_format($pr, 2);
				$tot=$pr+$tot;
				
				$totdisp=number_format($tot, 2);
				
				?>
         <?php echo "SAR ".$prdisp?>
            </span>
         </td>
      </tr>
	     <?php } 
	   
	   
	   ?>
   </tbody>
   <tfoot>
      <tr class="subtotal">
         <th colspan="2" class="mark" scope="row">
            Subtotal                    
         </th>
         <td class="amount" data-th="Subtotal" style="text-align: right;">
            <span class="price">SAR <?php  echo $totdisp;?> </span>                    
         </td>
      </tr>
	   
	    <tr class="subtotal">
         <th colspan="2" class="mark" scope="row">
            Vat(15%)                    
         </th>
         <td class="amount" data-th="Subtotal" style="text-align: right;">
            <span class="price">SAR <?php  echo $vat=number_format($tot*0.15, 2);?> </span>                    
         </td>
      </tr>
	   
	   <tr class="subtotal">
         <th colspan="2" class="mark" scope="row">
            Shipping & Handling                    
         </th>
         <td class="amount" data-th="Subtotal" style="text-align: right;">
            <span class="price">SAR <?php  echo number_format($orders['shipping_price'],2)?> </span>                    
         </td>
      </tr>
	   
     
      <tr class="grand_total">
         <th colspan="2" class="mark" scope="row">
            <strong>Estimated Total</strong>
         </th>
		  <?php
	
	
	$grandtotal=$orders['price']+$orders['shipping_price'];
	
		$grandtotal=number_format($grandtotal, 2);
	
	?>
         <td class="amount" data-th="Estimated Total" style="text-align: right;">
            <strong><span class="price"><strong>SAR <?php echo $grandtotal?> </strong></span></strong>
         </td>
      </tr>
   </tfoot>
</table>
<div class="btn_bottom">
     <a href="<?php echo base_url()?>orders" class="btn pinkcss animatedBtn darckBtn btn_style2 back_order">Back to My Orders</a>
	<form method="post" action="<?php echo base_url()?>re_orders" style="
display: inline-block;float: right;">
<input type="hidden" name="orderid" value="<?php echo $orderid?>">
<button type="submit" class="btn pinkcss animatedBtn darckBtn btn_style1 text-right" >Order Again</button>
</form>
    
</div>
</div>





                                    </div>                        </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                  </div>
               </div>
            </div>
         </div>


         