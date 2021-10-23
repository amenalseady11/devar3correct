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
									<li class="breadcrumb-item active">Tasks</li>
									<li class="breadcrumb-item active" aria-current="page">Task List</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Task List</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							
					                </div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table key-buttons text-md-nowrap  table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
										<thead>
											<tr>
												<th class="border-bottom-0">S.No.</th>											
												<th class="border-bottom-0" >Order Id</th>
												<th class="border-bottom-0" >Task Details</th>
												
												<th class="border-bottom-0" style="width:200px">Assigned Groups </th>
												<th class="border-bottom-0" >Priority</th>
												<th class="border-bottom-0" >Status</th>
												<th class="border-bottom-0">Actions </th>
											</tr>
										</thead>
										<tbody>
											<?php
    $i = 0;
    foreach ($tasks as $cat) {
		
		$i=$i+1;
		
		if($cat[priority]=="High")
		{
			
			$class="danger";
			
		}
		else if($cat[priority]=="Normal")
		{
			
			$class="warning";
			
		}
		else if($cat[priority]=="Low")
		{
			
			$class="info";
			
		}
        ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td ><a href="#"><?php echo $cat[order_id]?></a></td>
												<td ><?php echo $cat[details]?></td>
												<td style="text-align: center;vertical-align: middle;"><?php echo substr($group_name[$i-1],0,strlen($group_name[$i-1])-2); ?></td>
											
												<td><span class="badge badge-<?php echo $class?>">&nbsp;&nbsp;&nbsp;<?php echo $cat[priority]?>&nbsp;&nbsp;&nbsp;</span></td>
												<td><?php echo $cat[status]?></span></td>
												<td>
													<div class="btn-icon-list">
 
	<a href="<?php echo base_url()?>task/task_view/<?php echo $cat[order_id]?>"><button class="btn btn-primary btn-icon"><i class="typcn typcn-edit"></i></button></a>
	<a href="<?php echo base_url()?>task/delete/<?php echo $cat[task_id]?>" onClick="return confirm('Are you sure you want to delete this item')"><button class="btn btn-danger btn-icon"><i class="typcn typcn-delete"></i></button></a>
                </div>
												</td>
											</tr>
											
											<?php
			
	
	} ?>
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