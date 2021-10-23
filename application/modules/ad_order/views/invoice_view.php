 


				<!-- main-content opened -->
		<div class="main-content horizontal-content"  >

			<!-- container opened -->
			<div class="container" >

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div>
						<h4 class="content-title mb-2">Hi, welcome back!</h4>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="file:///C:/Users/hrith/Downloads/invoice.html#">Pages</a></li>
								<li class="breadcrumb-item active" aria-current="page"> Invoice</li>
							</ol>
						</nav>
			                </div>
					<div class="d-flex my-auto">
						<div class=" d-flex right-page">
							<div class="d-flex justify-content-center mr-5">
								<!--<div class="">
									<span class="d-block">
										<span class="label ">EXPENSES</span>
									</span>
									<span class="value">
										$53,000
									</span>
						                </div>
								<div class="ml-3 mt-2">
									<span class="sparkline_bar"></span>
						                </div>-->
					                </div>
							<div class="d-flex justify-content-center">
								<!--<div class="">
									<span class="d-block">
										<span class="label">PROFIT</span>
									</span>
									<span class="value">
										$34,000
									</span>
						                </div>
								<div class="ml-3 mt-2">
									<span class="sparkline_bar31"></span>
						                </div>-->
					                </div>
				                </div>
			                </div>
		                </div>
				<!-- /breadcrumb -->

				
					<div class="col-md-12 col-xl-10"  style="margin-left:150px">
						<div class=" main-content-body-invoice">
							<div class="card card-invoice">
								<div class="card-body">
									
									<div class="invoice-header">
										
										<h1 class="invoice-title">Invoice</h1>
										
										<div class="billed-from">
											<h6>Deyar, Inc.</h6>											
											Tel No: +966 114741435<br>
											Email: deyar.dp@gmail.com</p>
								                </div><!-- billed-from -->
										<div class="billed-from">
											<img src="<?php echo base_url()?>assets/deyar/skin/img/logo-d.png" width="200" height="auto">
								                </div>
							                </div><!-- invoice-header -->
									<div class="row mg-t-20">
										<div class="col-md">
											<label class="tx-gray-600">Billed To</label>
											<div class="billed-to">
												
											<h6><?php echo $billing['first_name']?>&nbsp;<?php echo $billing['last_name']?></h6>
											 <?php echo $billing['address']?><br>
											<?php echo $billing['city']?><br>
											<?php echo $billing['state']?><br>
											<?php echo $countryarr['country_name']?><br>
											<a href="tel:<?php echo $billing['phone_number']?>"> <?php echo $billing['phone_number']?></a>


									                </div>
								                </div>
										<div class="col-md">
											
											<p class="invoice-info-row"><span>Invoice No</span> <span><?php echo $invoicedetails['invoice_no']?></span></p>
											
											<p class="invoice-info-row"><span>Invoice Date:</span> <span><?php echo date("d F Y H:i:s A", strtotime($invoicedetails['invoice_date'])); ?></span></p>
											<p class="invoice-info-row"><span>Due Date:</span> <span><?php echo date("d F Y H:i:s A", strtotime($invoicedetails['invoice_date'])); ?></span></p>
								                </div>
										
							                </div>
									
									<div class="row mg-t-20">
										<div class="col-md">
											<label class="tx-gray-600">Ship To</label>
											<div class="billed-to">
												<h6><?php echo $shipping['first_name']?>&nbsp;<?php echo $shipping['last_name']?></h6>
												
													 <?php echo $shipping['address']?><br>
													<?php echo $shipping['city']?><br>
													<?php echo $shipping['state']?><br>
																			<?php echo $shipcountryarr['country_name']?><br>
													<a href="tel:<?php echo $shipping['phone_number']?>"> <?php echo $shipping['phone_number']?></a>
									                </div>
								                </div>
										
							                </div>
									<div class="table-responsive mg-t-40">
										<table class="table table-invoice border text-md-nowrap mb-0">
					
													
											<thead>
						 				<tr>
													<th class="wd-20p">Item</th>
													<th class="wd-40p">Description</th>
													<th class="tx-center">QNTY</th>
													<th class="tx-right">Unit Price</th>
													<th class="tx-right">Amount</th>
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
												<tr>
													<td><?php echo $items['name']?></td>
													<td class="tx-12">  <?php		foreach ($options as $key=>$value)
							 {
						
						$subprice=$items['price']*$items['qty'];
								 
						?>
           
             
             <?php
						echo $value->name." : <b>".$value->value."</b><br>";
						?>
           
			  <?php } ?><?php if($items['comments']){?>
			  
			  
           
						comments : <b><?php echo $items['comments'] ?></b>
						
         
			  <?php } ?></td>
													<td class="tx-center"><?php echo $items['qty']?></td>
													<td class="tx-right">SAR&nbsp;<?php echo $items['unit_price']?></td>
													<td class="tx-right"> <?php $pr=$items['qty']*$items['unit_price'];
				
				$tot=$pr+$tot;
				?>
         <?php echo "SAR ".$pr?></td>
												</tr>
												<?php } ?>
												
												<tr>
													<td class="valign-middle" colspan="2" rowspan="4">
														<div class="invoice-notes">
															<label class="main-content-label tx-13">Notes</label>
															<?php foreach ($ordernotes as $notes){?>


															<p><?php echo $notes['order_comments']?></p>
																
																<?php } ?>
												                </div><!-- invoice-notes -->
													</td>
													<td class="tx-right">Sub-Total</td>
													<td class="tx-right" colspan="2">SAR  <?php  echo $tot;?></td>
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
	
	$grandtotal=$orders['shipping_price']+$vat+$tot-$orders['discount']-$orders['deposit'];
	   
	   ?>
												
												
												<tr>
													<td class="tx-right">Vat (15%)</td>
													<td class="tx-right" colspan="2">SAR&nbsp;<?php echo $vat;?></td>
												</tr>
												<tr>
													<td class="tx-right">Shipping </td>
													<td class="tx-right" colspan="2">SAR&nbsp;<?php echo $orders['shipping_price']?></td>
												</tr>
												<tr>
													<td class="tx-right">Discount</td>
													<td class="tx-right" colspan="2">-SAR&nbsp;<?php echo $orders['discount']?></td>
												</tr>
												<tr>
													<td class="tx-right" colspan="3">Paid</td>
													<td class="tx-right" colspan="2">-SAR&nbsp; <?php echo $orders['deposit']?></td>
												</tr>
												<tr>
													
													<td class="tx-right tx-uppercase tx-bold tx-inverse" colspan="3">Total Due</td>
													<td class="tx-right" colspan="2"><h4 class="tx-primary tx-bold">SAR&nbsp; <?php echo $grandtotal?></h4></td>
												</tr>
												
											</tbody>
										</table>
							                </div>
									<hr class="mg-b-40">
									<!--<a class="btn btn-primary btn-block" href=""></a>-->
						                </div>
					                </div>
				                </div>
			                </div><!-- COL-END -->
		                </div>
				<!-- row closed -->
	                </div>
			<!-- Container closed -->
                </div>
		<!-- main-content closed -->

		<!--Sidebar-right-->
		<div class="sidebar sidebar-right sidebar-animate">
			<div class="panel panel-primary card mb-0">
				<div class="panel-body tabs-menu-body p-0 border-0">
					<ul class="Date-time">
						<li class="time">
							<h1 class="animated ">21:00</h1>
							<p class="animated ">Sat,October 1st 2029</p>
						</li>
					</ul>
					<div class="card-body latest-tasks">
						<h3 class="events-title"><span>Events For Week </span></h3>
						<div class="event">
							<div class="Day">Monday 20 Jan                </div>
							<a href="file:///C:/Users/hrith/Downloads/invoice.html#">No Events Today</a>
				                </div>
						<div class="event">
							<div class="Day">Tuesday 21 Jan                </div>
							<a href="file:///C:/Users/hrith/Downloads/invoice.html#">No Events Today</a>
				                </div>
						<div class="event">
							<div class="Day">Wednessday 22 Jan                </div>
							<div class="tasks">
								<div class=" task-line primary">
									<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="label">
										XML Import &amp; Export
									</a>
									<div class="time">
										12:00 PM
							                </div>
						                </div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input checked="" type="checkbox"><span></span></label>
									</label>
						                </div>
					                </div>
							<div class="tasks">
								<div class="task-line danger">
									<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="label">
										Connect API to pages
									</a>
									<div class="time">
										08:00 AM
							                </div>
						                </div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
						                </div>
					                </div>
				                </div>
						<div class="event">
							<div class="Day">Thursday 23 Jan                </div>
							<div class="tasks">
								<div class="task-line success">
									<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="label">
										Create Wireframes
									</a>
									<div class="time">
										06:20 PM
							                </div>
						                </div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
						                </div>
					                </div>
				                </div>
						<div class="event">
							<div class="Day">Friday 24 Jan                </div>
							<div class="tasks">
								<div class="task-line warning">
									<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="label">
										Test new features in tablets
									</a>
									<div class="time">
										02: 00 PM
							                </div>
						                </div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
						                </div>
					                </div>
							<div class="tasks">
								<div class="task-line teal">
									<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="label">
										Design Evommerce
									</a>
									<div class="time">
										10: 00 PM
							                </div>
						                </div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
						                </div>
					                </div>
							<div class="tasks mb-0">
								<div class="task-line purple">
									<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="label">
										Fix Validation Issues
									</a>
									<div class="time">
										12: 00 AM
							                </div>
						                </div>
								<div class="checkbox">
									<label class="check-box">
										<label class="ckbox"><input type="checkbox"><span></span></label>
									</label>
						                </div>
					                </div>
				                </div>
						<div class="d-flex pagination wd-100p">
							<a href="file:///C:/Users/hrith/Downloads/invoice.html#">Previous</a>
							<a href="file:///C:/Users/hrith/Downloads/invoice.html#" class="ml-auto">Next</a>
				                </div>
			                </div>
					<div class="card-body border-top border-bottom">
						<div class="row">
							<div class="col-4 text-center">
								<a class="" href="file:///C:/Users/hrith/Downloads/invoice.html"><i class="dropdown-icon mdi  mdi-message-outline fs-20 m-0 leading-tight"></i></a>
								<div>Inbox                </div>
					                </div>
							<div class="col-4 text-center">
								<a class="" href="file:///C:/Users/hrith/Downloads/invoice.html"><i class="dropdown-icon mdi mdi-tune fs-20 m-0 leading-tight"></i></a>
								<div>Settings                </div>
					                </div>
							<div class="col-4 text-center">
								<a class="" href="file:///C:/Users/hrith/Downloads/invoice.html"><i class="dropdown-icon mdi mdi-logout-variant fs-20 m-0 leading-tight"></i></a>
								<div>Sign out                </div>
					                </div>
				                </div>
			                </div>
		                </div>
	                </div>
                </div>
		<!--/Sidebar-right-->
