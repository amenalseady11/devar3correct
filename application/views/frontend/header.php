
<!doctype html>
   <html lang="en">
      <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
         <meta name="description" content="">
         <meta name="author" content="">
         <link rel="icon" href="https://www.deyar.demoatcrayotech.com/printstore/img/favicon.ico">
         <title>Deyar</title>
         <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">
         <link href="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/css/all.css" rel="stylesheet">
         <link href="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/css/hover.css" rel="stylesheet">
         <!-- Bootstrap core CSS -->
         <link href="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/css/bootstrap.css" rel="stylesheet">
         <!-- Custom styles for this template -->
         <link href="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/css/style.css" rel="stylesheet">
         <link rel="stylesheet" href="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/css/owl.carousel.min.css">
                   <link href="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/css/style-new.css" rel="stylesheet">
          <?php

      $ci =&get_instance();
      $ci->load->model('Main');
      $userid=$this->session->userdata('uid');
      $comments= $ci->Main->getComments($userid);  
      $commentcount=count($comments);
       
        
        

       ?>          
                   
      </head>
      <body>
         <div class="loader"></div>
         <header class="headerBar headerDark">
            <div class="headerWidth">
               <div class="headerLft">
                  <a href="<?php echo base_url()?>" class="headerBrand">
                  <img class="l" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/logo-l.png" alt=""><img class="d" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/logo-d.png" alt="">
                  </a>
               </div>
               <div class="headerRgt">
                  <div class="headerNav">
                     <div class="navItem headerContact">
                        <a href="#"><img class="headerIcon l" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/phone-icon-l.svg" alt=""><img class="headerIcon d" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/phone-icon-d.svg" alt=""> +966 114741435</a>
                     </div>
                     <div class="navItem headerLocation">
                        <a href="#"><img class="headerIcon l" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/location-icon-l.svg" alt=""><img class="headerIcon d" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/location-icon-d.svg" alt=""></a>
                     </div>
                     <?php if($userid){?>
                      <div class="navItem headerCart1 dropDown">
                          
                        <a href="#" class="icon_noti"><img class="headerIcon l" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/bell-icon.svg" alt=""><img class="headerIcon d" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/bell-icon.svg" alt=""><span class="spancount"><?php echo $commentcount?></span></a>

                          <ul class="navBar dropDownMenu box_notimenu">
                           <div class="head_notificationmenu">
                             <?php if($commentcount){?>
                          <?php echo $commentcount ?> New Notifications
                          <?php } ?>
                           </div>
                           <div class="list_notification">
                          
                             <?php foreach ($comments as $co){
                             
                               $comlen=strlen($co['order_comments']);
                                        if($comlen>"20")
                                        {

                                        $comments=substr($co['order_comments'],0,20);
                                        $comments=$comments."..";
                                        }
                                        else{

                                          $comments=$co['order_comments'];

                                        }
                             ?>
                          
                              <div>
                                   <a href="<?php echo base_url()?>order_details/<?php echo $co['order_id']?>"> <?php echo $comments?>  <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                              </div>
                               
                              <?php } ?>
                              
                              <div>
                                   <a href="<?php echo base_url()?>notifications"> See All Notification <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                              </div>
                               
                              </ul>
                           </div>
                           <?php } ?>
                 
                     <div class="navItem headerUser dropDown">
                        <a href="<?php echo base_url()?>myaccount"><img class="headerIcon l" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/user-icon-l.svg" alt=""><img class="headerIcon d" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/user-icon-d.svg" alt=""></a>
                        <ul class="navBar dropDownMenu">
                           <li><a href="<?php echo base_url()?>orders"><i class="fas fa-user"></i> My Account</a></li>
							<?php if($this->session->userdata('uid')){	
                              ?>
                           <li><a href="<?php echo base_url()?>logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
							<?php } else {?> <li><a href="<?php echo base_url()?>login"><i class="fas fa-sign-out-alt"></i> Login</a></li><?php }?>
                        </ul>
                     </div>
                     <div class="navItem headerCart">
                        <a href="<?php echo base_url()?>cart"><img class="headerIcon l" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/cart-icon-l.svg" alt=""><img class="headerIcon d" src="https://www.deyar.demoatcrayotech.com/printstore/assets/deyar/skin/img/cart-icon-d.svg" alt=""><span class="cartCount"><?php echo count($this->cart->contents());?></span></a>
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
                        <a href="#">Print & Copy</a>
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
                     	<?php if($this->session->userdata('uid')){	
                              ?>
                               <a href="<?php echo base_url()?>logout" class="btnFlip" data-back="Logout" data-front="Logout"></a>
                               <?php } else {?>
                     <a href="<?php echo base_url()?>login" class="btnFlip" data-back="Login" data-front="Login"></a>
                     <?php } ?>
                     <div class="clearfix"></div>
                     <a class="btn animatedBtn lightBtn" href="contact-us.html#contactForm" role="button">REQUEST CALL BACK</a>
                     <a class="btn animatedBtn lightBtn" href="contact-us.html#contactForm" role="button">BULK SALES ENQUIRY</a>
                  </div>
               </div>
            </div>
         </div>
		 
         <div class="headerSpace"></div>
	<?php $main = new Main();
						if($this->uri->segment(1)=="category")
						{
							
							$id_act=$this->uri->segment(2);
							
						}
		  
		$categories=$main->getCategories();  
		  ?>	  
		  
		<div class="listMenu">
            <ul class="nav justify-content-center">
				<?php
				$j="0";
foreach ($categories as $cat)
{
		$j=$j+1;	
	if($id_act==""){if($j=="1")$id_act=$cat['category_id'];  }
				?>
	
               <li class="nav-item<?php if($id_act==$cat['category_id']) echo " active" ?>">
                  <a class="nav-link" href="<?php echo base_url()?>cat/<?php echo $cat['category_id']?>"><?php echo $cat['category_name']?></a>
               </li>
				
	<?php } ?>			
              
            </ul>
         </div>
		  
        <!-- <div class="listMenu">
            <ul class="nav justify-content-center">
               <li class="nav-item active">
                  <a class="nav-link" href="<?php echo base_url()?>">Print & copy</a>
               </li>
				
				
               <li class="nav-item">
                  <a class="nav-link" href="#">Office Supplies</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Marketing Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Branding</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Promotional Items</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="#">Outdoor Signage</a>
               </li>
            </ul>
         </div>-->
		<style type="text/css">
     .headerCart1:hover a.icon_noti  {
  -webkit-transform-origin: top center;
  transform-origin: top center;
  -webkit-animation-name: swing;
  animation-name: swing;
  animation-duration: 1s;
}  
.list_notification {
   background-color: white;
    padding: 10px 15px;
}
.list_notification div {
    border-bottom: 1px solid #f1f1f1;
}
.list_notification div a {
    padding: 10px 0px;
    font-size: 14px;
    margin: 0px;
}
.head_notificationmenu {
    font-size: 15px;
    padding: 10px 15px;
    color: #fff;
    background-color: #ec216c;
}
.dropDownMenu a:hover {
    color: #ec008c !important;
    padding-left: 0px;
}
.list_notification div a i{
       margin-bottom: 5px;
   font-size: 10px;
    vertical-align: middle;
    margin-left: 15px;
    color: #ec216d;
    font-weight: 600;
}
.box_notimenu{
       right: -25px;
}
.headerCart1 .spancount {
    position: absolute;
    top: 0px;
    right: 0px;
    border-radius: 16px;
    background: #ec006d;
    width: 10px;
    height: 10px;
    text-align: center;
    font-size: 0;
    font-weight: bold;
    line-height: 9px;
    text-indent: 150%;
    white-space: nowrap;
    overflow: hidden;
    color: #fff;
    -webkit-transition: all .1s ease-out;
    -moz-transition: all .1s ease-out;
    -o-transition: all .1s ease-out;
    -ms-transition: all .1s ease-out;
    transition: all .1s ease-out;
}
.headerCart1:hover .spancount {
    width: 30px;
    height: 16px;
    font-size: 12px;
    text-indent: 0;
    padding: 3px 6px;
}
.headerCart1 a {
    position: relative;
}
@media (min-width: 576px){
.box_notimenu:after {
    content: '';
    position: absolute;
    top: -8.5px;
    right: 24px;
    border-bottom: 9px solid #ec226c;
    border-left: 9px solid transparent;
    border-right: 9px solid transparent;
}
}
      </style>