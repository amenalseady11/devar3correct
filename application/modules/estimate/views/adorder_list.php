<!-- main-content opened -->
<?php $admin1 = new Main();?>
<?php
$user = $this->ion_auth->user()->row();
     	$adminid=$user->id;	
     	$type=$user->type;

$pagename="estimate";
	$estimateaccess=$admin1->getmenuaccess($adminid,$pagename);


?>
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
									<li class="breadcrumb-item active">Estimates</li>
									<li class="breadcrumb-item active" aria-current="page">Estimate List</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Estimate List</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
								<div class="btn_right">
								<!--<a href="<?php echo base_url()?>/orgproducts" class="btn btn-outline-success btn-block"> New full Product</a>-->
							</div>
						
					                </div>

<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap  table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
										<thead>
											<tr>
												<th class="border-bottom-0" style="width: 50px;">S.No.</th>
												<th class="border-bottom-0" >Estimate</th>
												<th class="border-bottom-0" >Date</th>
												<th class="border-bottom-0" >Customer Name </th>
												<th class="border-bottom-0" >Total Price</th>
												<th class="border-bottom-0" >Status</th>
												
												<th class="border-bottom-0">Actions </th>
											</tr>
										</thead>
										<tbody>
											
				<?php
											
										
    $i = 0;
    foreach ($orders as $ord) {		
		$i=$i+1;
		
		$totalprice=$ord->price+$ord->shipping_price;
                            
					   ?>

		
		
											<tr>
												<td><?php echo $i ?></td>
												<td><a href="<?php echo base_url()?>estimate/view_order/<?php echo $ord->order_id?>" target="_blank">#<?php echo $ord->order_id ?></a></td>
												<td><?php echo date("d F Y H:i:s A", strtotime($ord->order_date ));?></td>
												<td><?php echo $ord->customer_firstname ?>&nbsp;<?php echo $ord->customer_lastname ?></td>
												<td>SAR&nbsp;<?php echo $totalprice ?></td>	
												<td>
												<?php if($ord->status=="Pending"){?>
						   <span class="badge badge-danger-gradient"><?php echo ucfirst($ord->status) ?></span>
						   
					                              <?php }	?>
													
													<?php if($ord->status=="Processing"){?>
						  <span class="badge badge-primary-gradient">Processing</span>
						   
					                              <?php }	?>
													
													<?php if($ord->status=="Awaiting Payment"){?>
						   <span class="badge badge-warning-gradient" style="color: #ffffff;">Awaiting Payment</span>
						   
					                              <?php }	?>
													
													<?php if($ord->status=="Cancelled"){?>
						   <span class="badge badge-secondary-gradient"><?php echo ucfirst($ord->status) ?></span>
						   
					                              <?php }	?>
													
													<?php if($ord->status=="Completed"){?>
						   <span class="badge badge-success-gradient"><?php echo ucfirst($ord->status) ?></span>
						   
					                              <?php }	?>
													
													<?php if($ord->status=="Failed"){?>
						   <span class="badge badge-info-gradient"><?php echo ucfirst($ord->status) ?></span>
						   
					                              <?php }	?>

												  <?php if($ord->status=="Onhold"){?>
						   <span class="badge badge-warning"><?php echo ucfirst($ord->status) ?></span>
						   
					                              <?php }	?>
													
													
													
													</td>
												
												<td>

													<div class="btn-icon-list">
<!--<a class="btn  btn-successa" data-target="#scrollmodal<?php echo $i;?>" data-toggle="modal" href="">  View More</a>-->
	<!--<a href="ad_order/view_order/<?php echo $ord->order_id?>">  <button class="btn btn-success btn-successa  btn-icon" ><i class="typcn typcn-eye"></i></button></a>-->
<?php if($estimateaccess['edit_access']=="1" || $type=="Admin"){?>
	<a href="<?php echo base_url()?>estimate/view_order/<?php echo $ord->order_id?>"><button class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></button></a>		
	<?php }  else {?>
														
														<a href="<?php echo base_url()?>estimate/view_order_version/<?php echo $ord->order_id?>"><button class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></button></a>		
														
	<?php } ?>														
    <?php if($estimateaccess['delete_access']=="1" || $type=="Admin"){?>
<a href="<?php echo base_url()?>estimate/delete/<?php echo $ord->order_id?>" onClick="return confirm('Are you sure you want to delete this item')"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
	<?php } ?>
                </div>
												</td>
											</tr>
											
		<?php } ?>										

							
										</tbody>
									</table>
						                </div>
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
<?php
  $i = 0;
    foreach ($orders as $ord) {		
		$i=$i+1;
		
		
		?>
		
<!-- Scroll with content modal -->
		<div class="modal" id="scrollmodal<?php echo $i;?>">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">View More Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			                </div>
					
			<?php foreach ($order_details[$ord->order_id] as $val)	{
			
		?>
					<div class="modal-body">
		<?php				
		    $dependable= json_decode($val['product_options']);
				 
			
				 
			 
		
		 foreach ($dependable as $k=>$v)
	                     {	?>		
						<p><?php echo $v->name?> : <?php echo $v->value;?> </p>
		 
		<?php				
		 }
				 
				 ?>
						
						<?php
			
			$itemid=$val['id'];
			
			
			
				foreach ($farr[$itemid] as $valfile)
					
				{?>
					<p>files : <img src="assets/uploads/<?php echo $valfile[order_file_name]?>" width="100" height="auto"> </p><br>
					
			<?php	}
			
			
			?>
						
			                </div>
					<?php } ?>
					<div class="modal-footer">
						<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			                </div>
		                </div>
	                </div>
                </div>
<?php }?>
		<!--End Scroll with content modal -->
