


	<?php //echo "mmmm".$this->cart->total_items();?>


	<div class="contantBlock blockEnd">
		<div class="container">
			<div class="row">
				

			<div class="col-md-8 col-lg-8">	
					<div class="row">
			<div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
					<h4 class="mb-0 font-weight-bold">Your Cart <span class="item_num"><?php echo $this->cart->total_items();?> Items</span></h4> 
					<a class="btn mt-md-0 mt-3 conti_shop" href="<?php echo base_url()?>" >Continue Shoping</a>
				</div>	
			</div>
				
				<?php 
				$total="0";
				foreach ($this->cart->contents() as $items)
{
					
					
	
					$options=json_decode($items['options']);
					
					//print_r($options);
					
					

?>			<form method="post" action="<?php echo base_url()?>cart/update_cart">
				<input type="hidden" name="rowid" value="<?php echo $items['rowid']?>">
				<div class="row box_div" >
					
					<div class="col-md-4  col-lg-5">
						<div class="name_item"><b> <a href="#"><?php echo $items['name']?></a></b></div>

					<div class="at_box">
					<div class="attribute_box show_3">
				<?php		foreach ($options as $key=>$value)
							 {
								 
						?>
								 
							
							<div class="dependable-attribute">
								
							<?php
						echo $value->name." : <b>".$value->value."</b>";
						?>
						</div>
								<?php } ?>
						
						<?php if($items['comments']){?>
						
					
						
						<div class="dependable-attribute">
								
							
						comments : <b><?php echo $items['comments']?></b>
						
						</div>
						<?php } ?>
							
					</div>
					<div class="show_hide">View More</div>
				</div>
					</div>
					<div class="col-md-4  col-lg-2">
						<input type="number" name="qty_<?php echo $items['rowid']?>" class="form-control quantity_input" value="<?php echo $items['qty']?>" placeholder="Quantity" style="width: 95px;">
					</div>
					<div class="col-md-4  col-lg-2">
					<div class="price_div">SAR&nbsp;<?php echo $items['subtotal']?></div>

					</div>
					<div class="col-md-4  col-lg-3">
				<div class="edit_delete">
						<!--<a href="#" class="edit_class">Update</a>-->
					<button type="submit" class="btn btn-outline-primary">Update</button>
							<a href="<?php echo base_url()?>cart/delete_cart/<?php echo $items['rowid']?>" class="Delete_class"  onClick="return confirm('Are you sure you want to delete this cart item')">Delete</a>
				</div>
					</div>
				</div>
				</form>
				
				<?php 

              $total=$total+$items['subtotal'];
					
                 } 
				?>

			<?php 
				
				$vat=number_format($total*(15/100),2);
								   
				$grandtotal=$total+$vat;				   
				
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
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">SAR&nbsp;<?php echo $total?></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping</td>
                                    <td class="cart_total_amount">Free Shipping</td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">VAT (15%)</td>
                                    <td class="cart_total_amount">SAR&nbsp;<?php echo $vat?></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label"><strong>Estimate Total </strong></td>
                                    <td class="cart_total_amount"><strong>SAR&nbsp;<?php echo $grandtotal?></strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-center"> 
                        	<a class="btn animatedBtn darckBtn" href="<?php echo base_url()?>checkout" role="button">Proceed To Checkout</a>
                        </div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>




















