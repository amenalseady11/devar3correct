<style type="text/css">
	button.btn.btn-primary.buttons-collection.dropdown-toggle.buttons-colvis {
    display: none;
}
.btn-main-primary {
    color: #fff;
    background-color: #ec1d8c;
    border-color: #ec1d8c;
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
								<li class="breadcrumb-item active">Order Details</li>
									<li class="breadcrumb-item active" aria-current="page">Order View</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Order #<?php echo $orders['order_id']?> </h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>

						             </div>
						
					                </div>

					                <div class="card-header pb-0">
					                	Order Date : <?php echo date("d F Y H:i:s A", strtotime($orders['order_date'])); ?>
					                </div>

					<div class="card-body">    
							<div class="row">
								<form method="post" action="<?php echo base_url()?>/ad_order/update_status">
									<input type="hidden" name="orderid" value="<?php echo $orders['order_id']?>">
								<div class="col-md-8">
									<div>
									<strong>Order Status</strong> : 
								<select id="update_statusbtn" name="status" id="status"> 
									<option value="Pending" <?php if($orders['status']=="Pending") echo "selected";?>>Pending</option> 
<option value="Awaiting Payment" <?php if($orders['status']=="Awaiting Payment") echo "selected";?>>Awaiting Payment</option>
<option value="Processing" <?php if($orders['status']=="Processing") echo "selected";?>>Processing</option> 
			 <option value="Completed" <?php if($orders['status']=="Completed") echo "selected";?>>Completed</option>
					<option value="Cancelled" <?php if($orders['status']=="Cancelled") echo "selected";?>>Cancelled</option>
					 <option value="Failed" <?php if($orders['status']=="Failed") echo "selected";?>>Failed</option>
									</select>
							</div>
							<br>
								<div>
									<strong>Comment</strong> :
								<textarea class="form-control text_comment"  name="status_comments" rows="5" cols="100"></textarea>
									
							</div>
							<br>
							<div>
								<input type="checkbox" id="notify" name="notify" value="1">
<label for="email"> Notify Customer by Email</label>
							</div>

							<div class="form-group ">
								<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"  role="button">SUBMIT</button>
							</div>
								</div>
									</form>
	<div class="col-md-4">
		<div>
			<h5><strong>Order Totals</strong></h5>
		</div>
		<?php 
				$total="0";
				 $tot="0";
				foreach ($order_details as $items)
{
		 $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
					
				}
		
		 $vat=$tot*15/100;?>
				
		<?php $grandtotal=$orders['shipping_price']+$vat+$tot;?>
<table class="table tablenew">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label" style="background-color: #f1f6fb;">Subtotal</td>
                                    <td class="cart_total_amount" style="background-color: #f1f6fb;">SAR <?php echo $tot?></td>
                                </tr>
								<tr>
                                    <td class="cart_total_label">Vat(15%)</td>
                                    <td class="cart_total_amount">SAR <?php echo $vat?></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label">Shipping & Handling</td>
                                    <td class="cart_total_amount">SAR <?php echo $orders['shipping_price']?></td>
                                </tr>
                                <tr>
                                    <td class="cart_total_label"><strong>Grand Total</strong></td>
                                    <td class="cart_total_amount">SAR <?php echo $grandtotal;?></td>
                                </tr>
                                 <!--<tr>
                                    <td class="cart_total_label" style="border: 0px solid;"><strong> Total Paid</strong></td>
                                    <td class="cart_total_amount" style="border: 0px solid;">SAR 50.00</td>
                                </tr>
                                 <tr>
                                    <td class="cart_total_label" style="border: 0px solid;"><strong> Total Refunded</strong></td>
                                    <td class="cart_total_amount" style="border: 0px solid;">SAR 0.00</td>
                                </tr>-->
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