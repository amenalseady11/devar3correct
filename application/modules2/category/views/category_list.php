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
									<li class="breadcrumb-item active">Categories</li>
									<li class="breadcrumb-item active" aria-current="page">Category List</li>
								</ol>
							</nav>
						</div>
						
					</div>
					<!-- /breadcrumb -->


					<!-- main-content-body -->
					<div class="main-content-body">
						<div class="row row-sm1">
								<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="justify-content-between" style="display: inline-block;">
									<h3 class="card-title mg-b-2 mt-2"> Category List</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<div class="btn_right">
								<a href="<?php echo base_url()?>category/" class="btn btn-outline-success btn-block"> New Category</a>
							</div>
					                </div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap  table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
										<thead>
											<tr>
												<th class="border-bottom-0">S.No.</th>
												<th class="border-bottom-0" >Category Name</th>
												<th class="border-bottom-0">Status </th>
												<th class="border-bottom-0">Actions </th>
											</tr>
										</thead>
										<tbody>
											<?php
    $i = 0;
    foreach ($categories as $cat) {
		$i=$i+1;
		if($cat->status=="1"){$st="Active";$badge="primary";} else{$st="InActive";$badge="danger";}
        ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td ><a href="#"><?php echo $cat->category_name?></a></td>
												<td style="text-align: center;vertical-align: middle;"><a href="#"><span class="badge badge-<?php echo $badge?>-gradient"><?php echo $st?></span></a></td>
												<td>
													<div class="btn-icon-list">
 
	<a href="edit/<?php echo $cat->category_id?>"><button class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></button></a>
	<a href="delete/<?php echo $cat->category_id?>" onClick="return confirm('Are you sure you want to delete this item')"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
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
					<!--/div-->
						</div>

			
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /main-content -->