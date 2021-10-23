<?php
$admin=new Main();?>
	<!-- page -->
	<div class="page">

		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login login-back d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<br><br>
							<img src="<?php echo $admin->assets('img/brand/logo-white.png')?>" class=" m-0 mb-4" alt="logo">
							
						
				                </div>
			                </div>
		                </div>
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">
						<h2>Login</h2>
						<h4>Please sign in to continue</h4>
						<div id="message"></div>
						<form method="post" id="adminlog">
							<div class="form-group">
								<label>Email</label><input type="text" class="form-control" placeholder="Username" name="username" required>
					                </div>
							<div class="form-group">
								<label>Password</label> <input type="password" class="form-control" placeholder="Password" name="password" required>
					                </div>
							
							<button class="btn btn-danger btn-block" type="submit">Sign In</button>
							
						</form>
			                
					<div class="main-signin-footer mt-3 mg-t-5">
						
			                </div>
		                </div>
	                </div>
	                </div>
                </div>
		<!-- /main-signin-wrapper -->
	</div>
		<!-- End page -->

		