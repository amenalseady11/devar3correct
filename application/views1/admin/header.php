<?php $admin = new Main();?>

<!-- main-header opened -->
				<div class="main-header nav nav-item hor-header">
					<div class="container">
						<div class="main-header-left ">
							<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
							<a class="header-brand" href="index.html">
								<img src="<?php echo $admin->assets('img/brand/logo-white.png')?>" class="logo-white ">
								<img src="<?php echo $admin->assets('img/brand/logo.png')?>" class="logo-default">
								<img src="<?php echo $admin->assets('brand/favicon-white.png')?>" class="icon-white">
								<img src="<?php echo $admin->assets('img/brand/favicon.png')?>" class="icon-default">
							</a>
							<div class="main-header-center  ml-4">
						
							</div>
						</div><!-- search -->
						<div class="main-header-right">
							<div class="nav nav-item nav-link" id="bs-example-navbar-collapse-1" style="display: none;">
									<form class="navbar-form" role="search">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Search">
											<span class="input-group-btn">
												<button type="reset" class="btn btn-default">
													<i class="fas fa-times"></i>
												</button>
												<button type="submit" class="btn btn-default nav-link">
													<i class="fe fe-search"></i>
												</button>
											</span>
										</div>
									</form>
								</div>

								
								<div class="nav nav-item  navbar-nav-right ml-auto">
									<div class="nav-item full-screen fullscreen-button">
										<a class="new nav-link full-screen-link" href="#"><i class="fe fe-maximize"></i></a>
									</div>
								
								<div class="dropdown nav-item main-header-notification">
									<a class="new nav-link" href="#"><i class="fe fe-bell"></i><span class=" pulse"></span></a>
									<div class="dropdown-menu">
										<div class="menu-header-content bg-primary-gradient text-left d-flex">
											<div class="">
												<h6 class="menu-header-title text-white mb-0">7 new Notifications</h6>
											</div>
											<div class="my-auto ml-auto">
												<!-- <a class="badge badge-pill badge-warning float-right" href="#">Mark All Read</a> -->
											</div>
										</div>
										<div class="main-notification-list Notification-scroll">
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-success-transparent">
													<i class="la la-shopping-basket text-success"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">New Order Received</h5>
													<div class="notification-subtext">1 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-danger-transparent">
													<i class="la la-user-check text-danger"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">22 verified registrations</h5>
													<div class="notification-subtext">2 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-primary-transparent">
													<i class="la la-check-circle text-primary"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">Project has been approved</h5>
													<div class="notification-subtext">4 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
											<a class="d-flex p-3 border-bottom" href="#">
												<div class="notifyimg bg-pink-transparent">
													<i class="la la-file-alt text-pink"></i>
												</div>
												<div class="ml-3">
													<h5 class="notification-label mb-1">New files available</h5>
													<div class="notification-subtext">10 hour ago</div>
												</div>
												<div class="ml-auto" >
													<i class="las la-angle-right text-right text-muted"></i>
												</div>
											</a>
										
										
										</div>
										<div class="dropdown-footer">
											<a href="#">VIEW ALL</a>
										</div>
									</div>
								</div>
								<div class="dropdown main-profile-menu nav nav-item nav-link">
									<a class="profile-user d-flex" href=""><img src="<?php echo $admin->assets('img/faces/6.jpg')?>" alt="user-img" class="rounded-circle mCS_img_loaded"><span></span></a>
									<div class="dropdown-menu">
										<div class="main-header-profile header-img">
											<div class="main-img-user"><img alt="" src="<?php echo $admin->assets('img/faces/6.jpg')?>"></div>
											<h6>Administrator</h6>
										</div>
										<a class="dropdown-item" href=""><i class="far fa-user"></i> My Profile</a>
										
										<a class="dropdown-item" href=""><i class="fas fa-sliders-h"></i> Account Settings</a>
										<a class="dropdown-item" href="<?php echo base_url()?>admin/logout"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
									</div>
								</div>
							<!-- 	<div class="dropdown main-header-message right-toggle">
									<a class="nav-link pr-0" data-toggle="sidebar-right" data-target=".sidebar-right">
										<i class="ion ion-md-menu tx-20 bg-transparent"></i>
									</a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
		  <!-- main-header closed -->