


	<?php //echo "mmmm".$this->cart->total_items();?>
<style type="text/css">
	.h4_cart{
		    font-size: 1.25rem;
	}
	.item_num {
    margin-left: 10px;
    font-weight: 400;
    font-size: 14px;
}
.conti_shop {
    border: 2px solid #ec008c;
    font-size: 13px;
    }
    .name_item {
    font-size: 16px;
}
.edit_delete {
    text-align: right;
    padding: 0rem 0rem;
}
.box_cartcss {
    border: 1px solid rgba(0, 0, 0, 0.07);
    border-radius: 0.25rem;
    padding: 20px;
        padding-bottom: 0;
    margin: 0px;
    box-shadow: 1px 1px 20px 1px rgb(0 0 0 / 8%);
    box-shadow: 1px 1px 20px 1px rgb(0,0,0,0.08);
}
.div_deletecart{
	display: inline-block;
}
a.Delete_class {
    border: 2px solid #ec008c;
    padding: 2px 10px;
    background-color: #ec008c;
    color: #ffffff;
    font-size: 13px;
}
.padding0_qty{
	padding: 0px;
	text-align: center;
}
.padding0_qty div.form-group{
display: inline-block;
}
</style>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<div class="contantBlock blockEnd">
		<div class="container">
			<div class="row">
				

			<div class="col-md-8 col-lg-8">	
				<div class="box_cartcss">
					
				
					<div class="row">
			<div class="col-lg-12 d-md-flex justify-content-md-between align-items-center bor_bot">
					<h4 class="mb-0 font-weight-bold h4_cart">Your Cart <span class="item_num"><?php echo count($this->cart->contents());?> Items </span></h4> 
					<a class="btn mt-md-0 mt-3 conti_shop pinkcss animatedBtn darckBtn" href="<?php echo base_url()?>" ><i class="fa fa-shopping-basket" aria-hidden="true"></i> Continue Shoping</a>
				</div>	
			</div>
				
				
				<?php 
				$total="0";
					   //print_r($this->cart->contents());
				foreach ($this->cart->contents() as $items)
{
					
					
	
					$options=json_decode($items['options']);
					
					
					
					

?>			<form method="post" action="<?php echo base_url()?>cart/update_cart" class="cartform_css" id="cartform">
				<input type="hidden" name="rowid" value="<?php echo $items['rowid']?>">
				<input type="hidden" name="minqty_<?php echo $items['rowid']?>" id="minqty_<?php echo $items['rowid']?>" value="<?php echo $items['min_qty']?>">
				
				<div class="row box_div" >
					
					<div class="col-md-4  col-lg-4">
						<div class="name_item"><b> <a href="#"><?php echo $items['name']?></a></b></div>

					<div class="at_box">
					<div class="attribute_box show_3">
						
						<?php		foreach ($options as $key=>$value)
							 {
								 
						if($value->name!="random")
						{
							
						
						?>
						
							<div class="dependable-attribute">
								<?php
						echo $value->name." : <b>".$value->value."</b>";
							?>
						</div>
						
						<?php } ?>
								<?php } ?>
						<?php if($items['comments']){?>
						
					
						
						<div class="dependable-attribute">
								
							
						comments : <b><?php echo $items['comments']?></b>
						
						</div>
						<?php } ?>
						
						<?php
					
					if($items['type_price']=="1")
					{
						
						$items['subtotal']=$items['price'];
						
					}
					
					
					
					?>
							
					</div>
					<div class="show_hide">View More</div>
				</div>
					</div>
					<div class="col-md-4  col-lg-3  text-center-web padding0_qty">
					    <div class="form-group">
    <label for="quantity" class="qty_css">Qty :</label>
  <input type="number" name="qty_<?php echo $items['rowid']?>" class="form-control quantity_input" id="qty_<?php echo $items['rowid']?>" value="<?php echo $items['qty']?>" placeholder="00" style="width: 65px;display: inline-block;padding: 5px;" <?php if($items['type_price']=="1")
					{?>disabled<?php } ?>>
  </div>
  <button type="submit" class="edit_class" id="update_qty" style="display: none;" >Update</button>
					
						
					</div>
					<div class="col-md-4  col-lg-2">
					<div class="price_div">SAR&nbsp;<?php echo number_format($items['subtotal'], 2);?></div>

					</div>
					<div class="col-md-4  col-lg-3">
				<div class="edit_delete">
						<!--<a href="#" class="edit_class">Update  </a>-->
					<?php if($items['type_price']!="1")
					{?>
						<div class="edit_csstext"><a href="<?php echo base_url()?>prd_edit/<?php echo $items['rowid']?>" class="btn pinkcss animatedBtn darckBtn"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a></div>
					<?php } ?>
							<div class="div_deletecart">
								<a href="<?php echo base_url()?>cart/delete_cart/<?php echo $items['rowid']?>" class="Delete_class btn"  onClick="return confirm('Are you sure you want to delete this cart item')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
							</div>
				</div>
					</div>
				
				</div>
				</form>

				<?php 

              $total=$total+$items['subtotal'];
              
              $totaldisp=number_format($total,2);
					
                 } 
				?>

			<?php 
				
				$vat=number_format($total*(15/100),2);
				$vatprice=$total*(15/100);
								   
				$grandtotal=$total+$vatprice;
				
				$grandtotaldisp=number_format($grandtotal,2);
				
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
                                    <td class="cart_total_label">Cart Subtotal</td>
                                    <td class="cart_total_amount">SAR&nbsp;<?php echo $totaldisp?></td>
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
                                    <td class="cart_total_amount"><strong>SAR&nbsp;<?php echo $grandtotaldisp?></strong></td>
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
















