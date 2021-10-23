<<!-- main-content opened -->
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
									<li class="breadcrumb-item active">Products Attributes</li>
									<li class="breadcrumb-item active" aria-current="page">Products Attributes List</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Products Attribute List</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
								<div class="btn_right">
								<a href="<?php echo base_url()?>/orgproducts" class="btn btn-outline-success btn-block"> New full Product</a>
							</div>
						
					                </div>

<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap  table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
										<thead>
											<tr>
												<th class="border-bottom-0" style="width: 50px;">S.No.</th>
												<th class="border-bottom-0" >Product</th>
												<th class="border-bottom-0" >Width </th>
												<th class="border-bottom-0" >Height </th>
												<th class="border-bottom-0" >Paper Type</th>
												
												<th class="border-bottom-0">Actions </th>
											</tr>
										</thead>
										<tbody>
											
				<?php
											
										
    $i = 0;
    foreach ($products as $dep) {		
		$i=$i+1;
		
		$dependable= json_decode($dep->dependable_values);
		  
				  $width=""; 
		$height="";
		
		$papertype="";
				    
		 foreach ($dependable as $k=>$v)
	                     {
			 
			 //$papertype="";
			 
			 if($v->name=="width")
			 {
				$width= $v->value;
			 }
			 
			 if($v->name=="height")
			 {
				$height= $v->value;
			 }
			 
			  if($v->name=="Paper Types")
			 {
				$papertype= $v->value;
				  //echo $v->value;
				  
				 // echo "kkkk".$papertype;
			 }
			 
			// echo $v->name;
			 
		 }
                            
					   ?>

		
		
											<tr>
												<td><?php echo $i ?></td>
												<td><a href="<?php echo base_url()?>orgproducts/view/<?php echo $dep->dependable_id?>"><?php echo $dep->product_name?></a></td>
												<td><?php echo $width?></td>
												<td><?php echo $height?></td>
												<td><?php echo $papertype;?> </td>												
												
												<td>

													<div class="btn-icon-list">
<!--<a class="btn  btn-successa" data-target="#scrollmodal<?php echo $i;?>" data-toggle="modal" href="">  View More</a>-->
	<a href="#">  <button class="btn btn-success btn-successa  btn-icon" data-target="#scrollmodal<?php echo $i;?>" data-toggle="modal" href=""><i class="typcn typcn-eye"></i></button></a>
	<a href="edit/<?php echo $dep->dependable_id?>"><button class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></button></a>													

	<a href="delete/<?php echo $dep->dependable_id?>" onClick="return confirm('Are you sure you want to delete this item')"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
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
$i="0";
			 foreach ($products as $dep) {		
		$i=$i+1;	
		?>
<!-- Scroll with content modal -->
		<div class="modal" id="scrollmodal<?php echo $i;?>">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">View More Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			                </div>
					<div class="modal-body">
		<?php				
		    $dependable= json_decode($dep->dependable_values);
				 
				 $nondependable= json_decode($dep->non_dependable_values);
				 
			 
		
		 foreach ($dependable as $k=>$v)
	                     {	?>		
						<p><?php echo $v->name?> : <?php echo $v->value;?> </p>
		 
		<?php				
		 }
				 
				 ?>
						<hr>
				<?php		
						 foreach ($nondependable as $k=>$v)
	                     {	?>		
						<p><?php echo $v->name?> : <?php echo $v->value;?> </p>
		 
		<?php				
		 }
				 
			 ?>
			                </div>
					<div class="modal-footer">
						<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			                </div>
		                </div>
	                </div>
                </div>
<?php } ?>
		<!--End Scroll with content modal -->
