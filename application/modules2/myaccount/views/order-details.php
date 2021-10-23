  
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
                       <h4>My Orders</h4>
                    
        <div class="row">
                            <div class="col-lg-12">
                                <div class="card mb-3 mb-lg-0">
                                   
                                    <div class="card-body ">
                                        
                                   
                                    <div class="order-details-items ordered">
<div class="table-wrapper order-items">
                                        <table class="data table table-order-items" id="my-orders-table" summary="Items Ordered">   
   <thead>
      <tr>
         <th class=" name" width="60%">Product Name</th>
         <!-- <th class="col price" width="200">Price</th> -->
         <th class=" qty" width="20%">Qty</th>
         <th class=" status" width="20%">Price</th>
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
			  
			  <?php foreach($filearr[$itemid] as $val){?>
						
						<div class="dependable-attribute">
           
						file : <b><img src="<?php echo base_url()?>assets/uploads/<?php echo $val['order_file_name'] ?>" width="100" height="auto"></b>
						
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
         <td class=" subtotal pending_color" data-th="Status">
            <span class="price-excluding-tax" data-label="Status">
            <span class="cart-price">
				<?php $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
				?>
         <?php echo $pr?>
            </span>
         </td>
      </tr>
				  <?php } 
	   
	   
	   ?>
   </tbody>
   <tfoot>
	   <tr class="subtotal">
         <th colspan="2" class="mark" scope="row">
            VAT (15%)  <?php  $vat=$tot*0.15;?>                  
         </th>
         <td class="amount" data-th="Subtotal">
            <span class="price">SAR <?php echo $vat?></span>                    
         </td>
      </tr>
      <tr class="subtotal">
         <th colspan="2" class="mark" scope="row">
            Subtotal                    
         </th>
         <td class="amount" data-th="Subtotal">
            <span class="price">SAR <?php echo $orders['price']?></span>                    
         </td>
      </tr>
      <tr class="shipping">
         <th colspan="2" class="mark" scope="row">
            Shipping &amp; <?php echo $orders['shipping_method']?>                    
         </th>
         <td class="amount" data-th="Shipping &amp; Handling">
            <span class="price">SAR <?php echo $orders['shipping_price']?></span>                    
         </td>
      </tr>
      <tr class="grand_total">
         <th colspan="2" class="mark" scope="row">
            <strong>Estimated Total</strong>
         </th>
		  <?php
	
	
	$grandtotal=$orders['price']+$orders['shipping_price'];
	
	?>
         <td class="amount" data-th="Estimated Total">
            <strong><span class="price"><strong>SAR <?php echo $grandtotal?></strong></span></strong>
         </td>
      </tr>
   </tfoot>
</table>
<div class="btn_bottom">
     <a href="<?php echo base_url()?>orders" class="btn animatedBtn darckBtn">Back to My Orders</a>
    <a href="#" class="btn animatedBtn darckBtn text-right">Order Again</a>
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


        

         