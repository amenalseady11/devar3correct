<!DOCTYPE html>
<?php $admin = new Main();?>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="">
		<meta name="Author" content="">
		<meta name="Keywords" content=""/>

		<!-- Title -->
		<title> Deyar </title>

		<!--- Favicon --->
		<link rel="icon" href="<?php echo $admin->assets('img/brand/favicon.png')?>" type="image/x-icon"/>

		<!--- Icons css --->
		<link href="<?php echo $admin->assets('css/icons.css')?>" rel="stylesheet">

		<!-- Owl-carousel css-->
		<link href="<?php echo $admin->assets('plugins/owl-carousel/owl.carousel.css')?>" rel="stylesheet"/>

		<!--- Right-sidemenu css --->
		<link href="<?php echo $admin->assets('plugins/sidebar/sidebar.css')?>" rel="stylesheet">

		<!--- Style css --->
		<link href="<?php echo $admin->assets('css/style.css')?>" rel="stylesheet">
		<link href="<?php echo $admin->assets('css/skin-modes.css')?>" rel="stylesheet">

		<!--- Animations css --->
		<link href="<?php echo $admin->assets('css/animate.css')?>" rel="stylesheet">

        <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> -->

	</head>
	<body class="main-body  app">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo $admin->assets('img/loaders/loader-4.svg')?>" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		

		<!-- Page -->
		<div class="page">
			
			 <?php echo $admin->header();?>
			
			  <?php echo $admin->menu();?>
			
			

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
									<li class="breadcrumb-item active" aria-current="page">Project</li>
								</ol>
							</nav>
						</div>
						
					</div>
					<!-- /breadcrumb -->


					<!-- main-content-body -->
					<div class="main-content-body">
						<div class="row row-sm1">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card overflow-hidden project-card">
									<div class="card-body card-body01">
										<div class="d-flex">
											<div class="my-auto">
			<svg enable-background="new 0 0 512 512" class="mr-4 ht-60 wd-60 my-auto my-color" version="1.1" viewBox="0 0 512 512" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M2,228.5a19,19 0 01 19-19h91a19,19 0 01 19,19v201a19,19 0 01-19,19h-91a19,19 0 01-19-19zM41.5,389.5a20,20 0 01 40.5,0a20,20 0 01-40.5,0z" />

      <path d="M151.5,229a19,19 0 01 19-19c15.5-4,35.5-30,83.5-90c24-24,19-62,34-91c8-15,17-20,32-17.5c60,0.5,78,73.5,47,132.5c-8,14-10,16-13,26.5l91,0.5c53,7,72,64,37.5,106c8.5,23,6.5,42-8.5,67c7,21,0,47-16.5,65c2.5,46-17.5,76-70.5,80h-51c-66-3-140-38-165.5-40a19,19 0 01-19-19z" />
    </svg>


											</div>
											<div class="project-content">
												<h6>Orders</h6>
												<ul>
													<li>
														<strong>Pending</strong>
														<span>05</span>
													</li>
													<li>
														<strong>Approved</strong>
														<span>102</span>
													</li>
														<li>
														<strong>Processing</strong>
														<span>152</span>
													</li>
													<li>
														<strong>Delivered</strong>
														<span>1077</span>
													</li>
													<li>
														<strong>Completed </strong>
														<span>1277</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card  overflow-hidden project-card">
									<div class="card-body card-body01">
										<div class="d-flex">
											<div class="my-auto">
												<svg enable-background="new 0 0 438.891 438.891" class="mr-4 ht-60 wd-60 my-auto danger" version="1.1" viewBox="0 0 438.89 438.89" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
													<path d="m347.97 57.503h-39.706v-17.763c0-5.747-6.269-8.359-12.016-8.359h-30.824c-7.314-20.898-25.6-31.347-46.498-31.347-20.668-0.777-39.467 11.896-46.498 31.347h-30.302c-5.747 0-11.494 2.612-11.494 8.359v17.763h-39.707c-23.53 0.251-42.78 18.813-43.886 42.318v299.36c0 22.988 20.898 39.706 43.886 39.706h257.04c22.988 0 43.886-16.718 43.886-39.706v-299.36c-1.106-23.506-20.356-42.068-43.886-42.319zm-196.44-5.224h28.735c5.016-0.612 9.045-4.428 9.927-9.404 3.094-13.474 14.915-23.146 28.735-23.51 13.692 0.415 25.335 10.117 28.212 23.51 0.937 5.148 5.232 9.013 10.449 9.404h29.78v41.796h-135.84v-41.796zm219.43 346.91c0 11.494-11.494 18.808-22.988 18.808h-257.04c-11.494 0-22.988-7.314-22.988-18.808v-299.36c1.066-11.964 10.978-21.201 22.988-21.42h39.706v26.645c0.552 5.854 5.622 10.233 11.494 9.927h154.12c5.98 0.327 11.209-3.992 12.016-9.927v-26.646h39.706c12.009 0.22 21.922 9.456 22.988 21.42v299.36z"/>
													<path d="m179.22 233.57c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z"/>
													<path d="m329.16 256.03h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z"/>
													<path d="m179.22 149.98c-3.919-4.131-10.425-4.364-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.364-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.211-0.391-0.412-0.601-0.604z"/>
													<path d="m329.16 172.44h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z"/>
													<path d="m179.22 317.16c-3.919-4.131-10.425-4.363-14.629-0.522l-33.437 31.869-14.106-14.629c-3.919-4.131-10.425-4.363-14.629-0.522-4.047 4.24-4.047 10.911 0 15.151l21.42 21.943c1.854 2.076 4.532 3.224 7.314 3.135 2.756-0.039 5.385-1.166 7.314-3.135l40.751-38.661c4.04-3.706 4.31-9.986 0.603-14.025-0.19-0.21-0.391-0.411-0.601-0.604z"/>
													<path d="m329.16 339.63h-120.16c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h120.16c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z"/>
												</svg>
											</div>
											<div class="project-content">
												<h6>Tasks</h6>
												<ul>
													<li>
														<strong>Processing</strong>
														<span>55</span>
													</li>

													<li>
														<strong>Completed</strong>
														<span>23</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
								<div class="card overflow-hidden project-card">
									<div class="card-body card-body01">
										<div class="d-flex">
											<div class="my-auto">
												<svg enable-background="new 0 0 469.682 469.682" version="1.1"  class="mr-4 ht-60 wd-60 my-auto my-color1" viewBox="0 0 469.68 469.68" xml:space="preserve" xmlns="http://www.w3.org/2000/svg">
													<path d="m120.41 298.32h87.771c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449h-87.771c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449z"/>
													<path d="m291.77 319.22h-171.36c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h171.36c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z"/>
													<path d="m291.77 361.01h-171.36c-5.771 0-10.449 4.678-10.449 10.449s4.678 10.449 10.449 10.449h171.36c5.771 0 10.449-4.678 10.449-10.449s-4.678-10.449-10.449-10.449z"/>
													<path d="m420.29 387.14v-344.82c0-22.987-16.196-42.318-39.183-42.318h-224.65c-22.988 0-44.408 19.331-44.408 42.318v20.376h-18.286c-22.988 0-44.408 17.763-44.408 40.751v345.34c0.68 6.37 4.644 11.919 10.449 14.629 6.009 2.654 13.026 1.416 17.763-3.135l31.869-28.735 38.139 33.959c2.845 2.639 6.569 4.128 10.449 4.18 3.861-0.144 7.554-1.621 10.449-4.18l37.616-33.959 37.616 33.959c5.95 5.322 14.948 5.322 20.898 0l38.139-33.959 31.347 28.735c3.795 4.671 10.374 5.987 15.673 3.135 5.191-2.98 8.232-8.656 7.837-14.629v-74.188l6.269-4.702 31.869 28.735c2.947 2.811 6.901 4.318 10.971 4.18 1.806 0.163 3.62-0.2 5.224-1.045 5.493-2.735 8.793-8.511 8.361-14.629zm-83.591 50.155-24.555-24.033c-5.533-5.656-14.56-5.887-20.376-0.522l-38.139 33.959-37.094-33.959c-6.108-4.89-14.79-4.89-20.898 0l-37.616 33.959-38.139-33.959c-6.589-5.4-16.134-5.178-22.465 0.522l-27.167 24.033v-333.84c0-11.494 12.016-19.853 23.51-19.853h224.65c11.494 0 18.286 8.359 18.286 19.853v333.84zm62.693-61.649-26.122-24.033c-4.18-4.18-5.224-5.224-15.673-3.657v-244.51c1.157-21.321-15.19-39.542-36.51-40.699-0.89-0.048-1.782-0.066-2.673-0.052h-185.47v-20.376c0-11.494 12.016-21.42 23.51-21.42h224.65c11.494 0 18.286 9.927 18.286 21.42v333.32z"/>
													<path d="m232.21 104.49h-57.47c-11.542 0-20.898 9.356-20.898 20.898v104.49c0 11.542 9.356 20.898 20.898 20.898h57.469c11.542 0 20.898-9.356 20.898-20.898v-104.49c1e-3 -11.542-9.356-20.898-20.897-20.898zm0 123.3h-57.47v-13.584h57.469v13.584zm0-34.482h-57.47v-67.918h57.469v67.918z"/>
												</svg>
											</div>
											<div class="project-content">
												<h6>Invoices</h6>
												<ul>
													<li>
														<strong>Unpaid</strong>
														<span>05</span>
													</li>
													<li>
														<strong>Paid</strong>
														<span>102</span>
													</li>
														<li>
														<strong>Partially Paid</strong>
														<span>152</span>
													</li>
													<li>
														<strong>Due</strong>
														<span>12</span>
													</li>
													<li>
														<strong>Failed </strong>
														<span>02</span>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						
						
						</div>

						<!-- row -->
						<div class="row row-sm1 ">
							<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
								<div class="card overflow-hidden">
									<div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
										<div class="d-flex justify-content-between">
											<h4 class="card-title mg-b-10">ORDERS</h4>
											<i class="mdi mdi-dots-horizontal text-gray"></i>
										</div>
										<p class="tx-12 text-muted mb-2">The Project Budget is a tool used by project managers to estimate the total cost of a project. A project budget template includes a detailed estimate of all costs. <a href="">Learn more</a></p>
									</div>
									<div class="card-body pd-y-7">
									
								
												<div class="ht-200 ht-lg-250">
											<canvas id="chartBar1"></canvas>
								                </div>
									</div>
								</div>
							</div>
							<div class="col-sm-12 col-md-12 col-lg-12 col-xl-4">
								<div class="card overflow-hidden">
									<div class="card-body pb-3">
										<div class="d-flex justify-content-between">
											<h4 class="card-title mg-b-10">taskS</h4>
											<i class="mdi mdi-dots-horizontal text-gray"></i>
										</div>
										<p class="tx-12 text-muted mb-3">In project, a task is an activity that needs to be accomplished within a defined period of time or by a deadline. <a href="">Learn more</a></p>
										<div class="table-responsive mb-0 projects-stat tx-14">
											<table class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap  ">
												<thead>
													<tr>
														<th>ORDER id</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="project-names">
																<h6 class="bg-primary-transparent text-primary d-inline-block mr-2 text-center">U</h6>
																<p class="d-inline-block font-weight-semibold mb-0"><a href="#">100123</a></p>
															</div>
														</td>
														<td>
															<div class="badge badge-success">Completed</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="project-names">
																<h6 class="bg-pink-transparent text-pink d-inline-block text-center mr-2">R</h6>
																<p class="d-inline-block font-weight-semibold mb-0"><a href="#">100124</a></p>
															</div>
														</td>
														<td>
															<div class="badge badge-warning">Pending</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="project-names">
																<h6 class="bg-success-transparent text-success d-inline-block mr-2 text-center">W</h6>
																<p class="d-inline-block font-weight-semibold mb-0"><a href="#">100125</a></p>
															</div>
														</td>
														<td>
															<div class="badge badge-danger">Canceled</div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="project-names">
																<h6 class="bg-purple-transparent text-purple d-inline-block mr-2 text-center">P</h6>
																<p class="d-inline-block font-weight-semibold mb-0"><a href="#">100126</a></p>
															</div>
														</td>
														<td>
																<div class="badge badge-warning">Pending</div>
														</td>
													</tr>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /row -->



						<!-- row -->
						<div class="row row-sm1">
							<div class="col-md-12 col-xl-12">
								<div class="card overflow-hidden review-project">
									<div class="card-body">
										<div class="d-flex justify-content-between">
											<h4 class="card-title mg-b-10">All ORDERS</h4>
											<i class="mdi mdi-dots-horizontal text-gray"></i>
										</div>
										<p class="tx-12 text-muted mb-3">A project is an activity to meet the creation of a unique product or service and thus activities that are undertaken to accomplish routine activities cannot be considered projects. <a href="">Learn more</a></p>
										<div class="table-responsive mb-0">
											<table class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
												<thead>
													<tr>
														<th>ORDER ID</th>
														<th>Team Members</th>
														<th>Product</th>
														<th>Created</th>
														<th>Status</th>
														<th>Deadline</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="project-contain">
																<h6 class="mb-1 tx-14"><a href="#">10001</a></h6>
															</div>
														</td>
														<td>
															<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround " alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"></div>
														</td>
														<td>Catalogs</td>
														<td>01 Jan 2021</td>
														<td><span class="badge badge-primary-gradient">Ongoing</span></td>
														<td>12 Jan 2021</td>
													</tr>
													<tr>
														<td>
															<div class="project-contain">
																<h6 class="mb-1 tx-14"><a href="#">10002</a></h6>
															</div>
														</td>
														<td>
															<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround " alt="profile image" src="assets/deyar//img/faces/1.jpg"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"></div>
														</td>
														<td>Poster</td>
														<td>03 Jan 2021</td>
														<td><span class="badge badge-success-gradient">Ongoing</span></td>
														<td>15 Jan 2021</td>
													</tr>
													<tr>
														<td>
															<div class="project-contain">
																<h6 class="mb-1 tx-14"><a href="#">10003</a></h6>
															</div>
														</td>
														<td>
															<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround " alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"></div>
														</td>
														<td>Book</td>
														<td>13 Jan 2021</td>
														<td><span class="badge badge-danger-gradient">Pending</span></td>
														<td>29 Jan 2021</td>
													</tr>
													<tr>
														<td>
															<div class="project-contain">
																<h6 class="mb-1 tx-14"><a href="#">10004</a></h6>
															</div>
														</td>
														<td>
															<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround " alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"></div>
														</td>
														<td>Business Card</td>
														<td>14 Jan 2021</td>
														<td><span class="badge badge-success-gradient">Ongoing</span></td>
														<td>25 Jan 2021</td>
													</tr>
													<tr>
														<td>
															<div class="project-contain">
																<h6 class="mb-1 tx-14"><a href="#">10005</a></h6>
															</div>
														</td>
														<td>
															<div class="image-grouped"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround " alt="profile image" src="assets/deyar/img/faces/1.jpg"><img class="profile-img brround" alt="profile image" src="assets/deyar/img/faces/1.jpg"></div>
														</td>
														<td>Invitation</td>
														<td>15 Jan 2021</td>
														<td><span class="badge badge-pink-gradient">Ongoing</span></td>
														<td>20 Jan 2021</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- /row -->





					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /main-content -->
			<?php echo $admin->footer();?>
			
		</div>
		<!-- end page -->

		<!--- Back-to-top --->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

	<!--- JQuery min js --->
		<script src="<?php echo $admin->assets('plugins/jquery/jquery.min.js')?>"></script>

		<!--- Datepicker js --->
		<script src="<?php echo $admin->assets('plugins/jquery-ui/ui/widgets/datepicker.js')?>"></script>

		<!--- Bootstrap Bundle js --->
		<script src="<?php echo $admin->assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

		<!--- Internal Chart.bundle js --->
		<script src="<?php echo $admin->assets('plugins/chart.js/Chart.bundle.min.js')?>"></script>

		<!--- Ionicons js --->
		<script src="<?php echo $admin->assets('plugins/ionicons/ionicons.js')?>"></script>

		<!--- Moment js --->
		<script src="<?php echo $admin->assets('plugins/moment/moment.js')?>"></script>

		<!--- JQuery sparkline js --->
		<script src="<?php echo $admin->assets('plugins/jquery-sparkline/jquery.sparkline.min.js')?>"></script>

		<!--- Select2 js --->
		<script src="<?php echo $admin->assets('plugins/select2/js/select2.min.js')?>"></script>

		<!--- P-scroll js --->
		<script src="<?php echo $admin->assets('plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/perfect-scrollbar/p-scroll.js')?>"></script>

		<!--- Eva-icons js --->
		<script src="<?php echo $admin->assets('js/eva-icons.min.js')?>"></script>

		<!--- Internal Chartjs js --->
		<script src="<?php echo $admin->assets('js/chart.chartjs.js')?>"></script>

		<!--- Rating js --->
		<script src="<?php echo $admin->assets('plugins/rating/jquery.rating-stars.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/rating/jquery.barrating.js')?>"></script>

		<!--- Custom Scroll bar Js --->
		<script src="<?php echo $admin->assets('plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')?>"></script>

		<!--- Horizontalmenu js --->
		<script src="<?php echo $admin->assets('plugins/horizontal-menu/horizontal-menu.js')?>"></script>

		<!--- Right-sidebar js --->
		<script src="<?php echo $admin->assets('plugins/sidebar/sidebar.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/sidebar/sidebar-custom.js')?>"></script>

		<!--- Sticky js --->
		<script src="<?php echo $admin->assets('js/sticky.js')?>"></script>

		<!--- Index js --->
		<script src="<?php echo $admin->assets('js/script.js')?>"></script>

		<!--- Custom js --->
		<script src="<?php echo $admin->assets('js/custom.js')?>"></script>

	</body>
</html>

			
			