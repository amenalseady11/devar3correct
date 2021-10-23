<!-- START HEADER -->
<?php
$main = new Main();

?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/favicon.ico">

    <title>Deyar</title>
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="<?php echo $main->front_end_skin('css/all.css')?>" rel="stylesheet">
	<link href="<?php echo $main->front_end_skin('css/hover.css')?>" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $main->front_end_skin('css/bootstrap.css')?>" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo $main->front_end_skin('css/style.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo $main->front_end_skin('css/owl.carousel.min.css')?>">
	
	<style type="text/css">
		.item_num{
		font-weight: 400;
    font-size: 18px;
		}
		.bor_bot{
		    padding-bottom: 15px;
    margin-bottom: 15px;
    border-bottom: 1px solid #d0d0d0;
		}
		.name_item{
			font-size: 20px;
		}
		.dependable-attribute {
    font-size: 14px;
    margin: 5px 0px;
    color: #484848;
}
.attribute_box{
	margin: 5px 0px;
}
.show_3{
	height: 88px;
	overflow: hidden;
	   -webkit-transition:0.4s;
    -moz-transition:0.4s;
    -ms-transition:0.4s;
    -o-transition:0.4s;
    transition:0.4s;
}
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.price_div{
	text-align: center;
	    padding: 0.375rem 0.45rem;
    line-height: 1.6;
    font-weight: 600;
    font-size: 16px;
}
.edit_delete{
	text-align: center;
		    padding: 0.375rem 0.75rem;
		        line-height: 1.6;
		          font-size: 14px;
}
.quantity_input{
    font-size: 14px;	
}
.edit_class:after{
    border-right: 1px solid #c5c5c5;
    content: '';
    display: inline-block;
    vertical-align: middle;
    width: 1px;
    padding-left: 4px;
    height: 12px;
    margin-top: -2px;
    opacity: .8;
}
.show_hide{
    margin-bottom: 10px;
    list-style: none;
    color: #ec216c;
    font-size: 14px;
    cursor: pointer;
    display: inline-block;
}
.box_div{
    margin-bottom: 25px;
    border-bottom: 1px solid #ececec;
    padding-bottom: 15px;
}
.conti_shop{
	font-size: 14px;
	text-decoration: underline;
}
.cart_summary {
    border: 1px solid #ececec;
    padding: 10px;
}
.head_sum{
	padding: 10px;
}
.sticky_new{
	position: -webkit-sticky;
    position: sticky;
    top: 92px;
}
table.table {
    font-size: 15px;
}
.cart_total_amount{
	text-align: right;
}

@media(max-width: 600px){
.edit_delete, .price_div{
	text-align: left;
	}
}


	</style>
</head>

<body>
    <div class="loader"></div>
    <header class="headerBar headerLight">
		<div class="headerWidth">
			<div class="headerLft">
				<a href="index.html" class="headerBrand">
                    <img class="l" src="<?php echo $main->front_end_skin('img/logo-l.png')?>" alt=""><img class="d" src="<?php echo $main->front_end_skin('img/logo-d.png')?>" alt="">
                </a>
			</div>

			<div class="headerRgt">
				<div class="headerNav">
					<div class="navItem headerContact">
						<a href="#"><img class="headerIcon l" src="<?php echo $main->front_end_skin('img/phone-icon-l.svg')?>" alt=""><img class="headerIcon d" src="<?php echo $main->front_end_skin('img/phone-icon-d.svg')?>" alt=""> +966 114741435</a>
					</div>
					<div class="navItem headerLocation">
						<a href="#"><img class="headerIcon l" src="<?php echo $main->front_end_skin('img/location-icon-l.svg')?>" alt=""><img class="headerIcon d" src="<?php echo $main->front_end_skin('img/location-icon-d.svg')?>" alt=""></a>
					</div>
					<div class="navItem headerUser dropDown">
						<a href="<?php echo base_url()?>myaccount"><img class="headerIcon l" src="<?php echo $main->front_end_skin('img/user-icon-l.svg')?>" alt=""><img class="headerIcon d" src="<?php echo $main->front_end_skin('img/user-icon-d.svg')?>" alt=""></a>
						<ul class="navBar dropDownMenu">
							<li><a href="<?php echo base_url()?>myaccount"><i class="fas fa-user"></i> Profile</a></li>
							<li><a href="<?php echo base_url()?>logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
						</ul>
					</div>
					<div class="navItem headerCart">
						<a href="<?php echo base_url()?>cart"><img class="headerIcon l" src="<?php echo $main->front_end_skin('img/cart-icon-l.svg')?>" alt=""><img class="headerIcon d" src="<?php echo $main->front_end_skin('img/cart-icon-d.svg')?>" alt=""><span class="cartCount"><?php echo $this->cart->total_items();?></span></a>
					</div>
					<div class="navItem headerLaguage">
						<a href="#">AR</a>
					</div>
					<div class="navItem headerMenu off">
						<div class="hamburgerMenu">
							<div class="hamburgerMenuIcon"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </header>
	
	<div class="mainMenu">
		<div class="menuArea">
			<div>
				<ul class="navBar menuItem">
					<li class="navItem">
						<a href="<?php echo base_url()?>">Print & Copy</a>
					</li>
					<li class="navItem">
						<a href="our-works.html">Our Work</a>
					</li>
					<li class="navItem">
						<a href="<?php echo base_url()?>">All Products</a>
					</li>
					<li class="navItem">
						<a href="our-clients.html">Our Client</a>
					</li>
					<li class="navItem">
						<a href="who-we-are.html">Who We Are</a>
					</li>
					<li class="navItem">
						<a href="contact-us.html">Contact Us</a>
					</li>
					<li>
						<div class="menuLanguage">
							<a href="#">EN</a> |
							<a class="active" href="#">AR</a>
						</div>
					</li>
				</ul>

				<div class="menuBtn">
					<a href="<?php echo base_url()?>" class="btnFlip" data-back="Shop Now" data-front="Shop Now"></a>
					<div class="clearfix"></div>
					<a href="<?php echo base_url()?>login" class="btnFlip" data-back="Login" data-front="Login"></a>
					<div class="clearfix"></div>
					<a class="btn animatedBtn lightBtn" href="contact-us.html#contactForm" role="button">REQUEST CALL BACK</a>
					<a class="btn animatedBtn lightBtn" href="contact-us.html#contactForm" role="button">BULK SALES ENQUIRY</a>
				</div>
			</div>
		</div>
	</div>





<!-- END HEADER -->

<div class="loginBlock">
		<div class="loginTop triggerBlock">
			<div class="orderBlock">
				<h3 class="sliderUp50d1">How to Order</h3>
				<div class="orderFlow">
					<div class="orderFlowRibbon circle-ribbon"></div>
					<ul class="orderFlowItems">
						<li class="orderFlowItem1">
							<p>Login</p>
							<div class="icon"><img src="<?php echo $main->front_end_skin('img/step1.png')?>"></div>
						</li>
						<li class="orderFlowItem2">
							<p>Upload</p>
							<div class="icon"><img src="<?php echo $main->front_end_skin('img/step2.png')?>"></div>
						</li>
						<li class="orderFlowItem3">
							<p>Check Out</p>
							<div class="icon"><img src="<?php echo $main->front_end_skin('img/step3.png')?>"></div>
						</li>
						<li class="orderFlowItem4">
							<p>Make Payment</p>
							<div class="icon"><img src="<?php echo $main->front_end_skin('img/step4.png')?>"></div>
						</li>
					</ul>
				</div>
				<h4 class="sliderUp50d1">valuble and easy to print</h4>
			</div>
		</div>
		
		<div class="loginBottom parallaxBlock triggerBlock">
			<div class="bgImg" style="background-image: url('<?php echo base_url()?>img/bg-img4.jpg');">
				<div class="bgOverlay"></div>
			</div>
			<div class="loginFormArea sliderUp50d1">
				<form class="signInForm" method="post" action="<?php echo base_url()?>login">
					<h5>Sign In</h5>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="password" class="form-control" placeholder="Password" required>
					</div>
					<button type="submit" class="btn animatedBtn darckBtn">LOGIN</button>
					<div class="form-check">
						<label class="form-check-label">
							<input type="checkbox" class="form-check-input"> Remember me
						</label>
						<a class="forgotPassword" href="#">Forgot Password?</a>
					</div>
				</form>

				<form class="signUpForm" method="post" action="<?php echo base_url()?>registration">
					<h5>Create Account</h5>
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-6">
								<input type="text"  name="firstname" class="form-control" placeholder="First name" required>
							</div>
							<div class="col-md-6">
								<input type="text" name="lastname" class="form-control" placeholder="Last name" required>
							</div>
						</div>
					</div>
					<div class="form-group">
						<input type="email" name="email" class="form-control" placeholder="Email Address" required>
						<span class="alert-danger"><?php echo form_error('email'); ?></span>
					</div>
					
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required>
						<span class="alert-danger"><?php echo form_error('password'); ?></span>
					</div>
					
					<div class="form-group">
						<input type="password" name="conpassword" class="form-control" placeholder="Confirm Password" required>
					</div>
					<button type="submit" class="btn animatedBtn darckBtn">CREATE ACCOUNT</button>
					<p>By creating an account, you agree to terms</p>
				</form>
			</div>
		</div>
	</div>
	
