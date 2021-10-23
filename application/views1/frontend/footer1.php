<?php $main = new Main()?>

<footer class="footerBlock">
		<div class="footerWidth">
			<div class="footerTop">
				<div class="col">
					<ul class="navBar">
						<li class="navItem">Contact</li>
						<li class="navItem"><a href="mailto:deyar.dp@gmail.com">deyar.dp@gmail.com</a></li>
						<li class="navItem"><a href="tel:+966 114741435">+966 114741435</a></li>
						<li class="navItem socialMedia">
							Follow Us
							<p>
								<a href="https://www.instagram.com/deyar.dp/" target="_blank"><i class="fab fa-instagram"></i></a>
								<a href="https://twitter.com/DeyarDp" target="_blank"><i class="fab fa-twitter"></i></a>
								<a href="https://www.facebook.com/profile.php?id=100005133916843" target="_blank"><i class="fab fa-facebook-f"></i></a>
							</p>
						</li>
					</ul>
				</div>
				<div class="col">
					<ul class="navBar">
						<li class="navItem"><a href="#">Printing</a></li>
						<li class="navItem"><a href="#">Flyers & Leaflets</a></li>
						<li class="navItem"><a href="#">Certificates</a></li>
						<li class="navItem"><a href="#">Folded leaflets</a></li>
						<li class="navItem"><a href="#">Posters</a></li>
						<li class="navItem"><a href="#">Letter Heads</a></li>
						<li class="navItem"><a href="#">Business cards</a></li>
						<li class="navItem"><a href="#">Plastic cards</a></li>
						<li class="navItem"><a href="#">Brochures</a></li>
						<li class="navItem"><a href="#">Catalogues</a></li>
						<li class="navItem"><a href="#">Notebooks</a></li>
						<li class="navItem"><a href="#">Desk pads</a></li>
						<li class="navItem"><a href="#">Envelopes</a></li>
					</ul>
				</div>
				<div class="col">
					<ul class="navBar">
						<li class="navItem"><a href="#">Branding</a></li>
						<li class="navItem"><a href="#">Stickers</a></li>
						<li class="navItem"><a href="#">Calendars</a></li>
						<li class="navItem"><a href="#">Folders/Binders</a></li>
						<li class="navItem"><a href="#">Promotional Items</a></li>
						<li class="navItem"><a href="#">Flex/Banners</a></li>
						<li class="navItem"><a href="#">Roll up banners</a></li>
						<li class="navItem"><a href="#">Boards/Signs</a></li>
						<li class="navItem"><a href="#">Flags</a></li>
						<li class="navItem"><a href="#">Exhibition systems</a></li>
					</ul>
				</div>
				<div class="col">
					<ul class="navBar">
						<li class="navItem">Menu</li>
						<li class="navItem"><a href="#">Print & Copy</a></li>
						<li class="navItem"><a href="our-works.html">Our Work</a></li>
						<li class="navItem"><a href="products.html">All Products</a></li>
						<li class="navItem"><a href="our-clients.html">Our Client</a></li>
						<li class="navItem"><a href="who-we-are.html">Who We Are</a></li>
						<li class="navItem"><a href="contact-us.html">Contact Us</a></li>
					</ul>
				</div>
				<div class="col">
					<ul class="navBar">
						<li class="navItem">Sign up for newsletter</li>
						<li class="navItem">
							<form class="footerForm">								
								<input type="text" class="form-control" id="" placeholder="">
								<button type="submit" class="btn btn-primary hvr-icon-wobble-horizontal"><i class="fas fa-arrow-right hvr-icon"></i></button>
							</form>
						</li>
						<li class="navItem">
							<div class="footerMap">
								<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3626.138018542653!2d46.72756361499866!3d24.653377184152!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f0435e9e299f3%3A0x16f539b849194fdf!2z2YXYt9io2LnYqSDYp9mE2K_Zitin2LEg2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sen!2sin!4v1575255666799!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="footerBottom">
				<div class="footerLeft">
					<a href="index.html" class="navbarBrand">
						<img src="<?php echo $main->front_end_skin('img/footer-logo.png')?>" alt="">
						<div class="circleRibbon big"></div>						
						<div class="circleRibbon small"></div>
					</a>
					<p>© 2020 Deyar Print. All Rights Reserved.</p>
				</div>
				
				<div class="footerRight">
					<ul class="navBar">
						<li class="navItem">
							<img src="<?php echo $main->front_end_skin('img/visa-icon.png')?>" alt="">
						</li>
						<li class="navItem">
							<img src="<?php echo $main->front_end_skin('img/mastercard-icon.png')?>" alt="">
						</li>
						<li class="navItem">
							<img src="<?php echo $main->front_end_skin('img/mada-icon.png')?>" alt="">
						</li>
						<li class="navItem">
							<img class="sslIcon" src="<?php echo $main->front_end_skin('img/ssl-icon.png')?>" alt="">
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>

    <!-- JS -->
    <script src="<?php echo $main->front_end_skin('js/jquery.min.js')?>"></script>
    <script src="<?php echo $main->front_end_skin('js/bootstrap.min.js')?>"></script>
    <script src="<?php echo $main->front_end_skin('js/TweenMax.min.js')?>"></script>
	<script src="<?php echo $main->front_end_skin('js/ScrollMagic.min.js')?>"></script>
	<script src="<?php echo $main->front_end_skin('js/animation.gsap.js')?>"></script>
	<script src="<?php echo $main->front_end_skin('js/debug.addIndicators.min.js')?>"></script>
	<script src="<?php echo $main->front_end_skin('js/owl.carousel.js')?>"></script>
    <script src="<?php echo $main->front_end_skin('js/script.js')?>"></script>
	<script>
		$(document).ready(function() {
			
			var owl=$('.owl-carousel');
			owl.owlCarousel( {
				margin: 10,
				nav: true,
				responsive: {
					0: {
						items: 1
					}
					, 600: {
						items: 3
					}
					, 1000: {
						items: 4
					}
				}
			})
		})	
    </script>	

<script type="text/javascript">
/*

    $(document).ready(function() {
		//alert("kkkkk");
        $('input[type="radio"]').change(function() {
			
			alert("mmmmm");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/selectradios/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				    //data: "product="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						alert(data);
						$('#price').html(data);
                    }
                      });
					  
					  
              });
		
		
		
    });
	
	*/
</script>
<script>
  $('body').on('change','#quantityid',function(){
    //alert("success");
	  var a=parseInt($('#quantityid').val());
	  
	  var minquantity=parseInt($('#min_quantityid').val());
	  
	  if(a<minquantity)
		  {
			  
			alert('Minimum Quantity Needed');
			  $('#quantityid').val(minquantity);
			  return false;
			  
		  }
	  
	  //alert(a);
	  var b=a*parseFloat($('#perpriceid').val());
	  var tot=b;
	  tot=tot.toFixed(2);
	  tot=tot+" SR";
	  
	$('#original_price').html(tot);
	  
});
</script>

<script type="text/javascript">


    $(document).ready(function() {
		//alert("kkkkk");
        $('input[name="Paper Types"]').change(function() {
			
			//alert("mmmmm");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/selectpapertype/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						$('#dynamic_id').html(data);
                    }
                      });
					  
					  
              });
		
		
		
    });
	
</script>
<script type="text/javascript">

$(document).on('change', 'input[type=radio]', function (event) {
   
	//alert("ccccccccc");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/selectradios/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				    //data: "product="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						$('#price').html(data);
                    }
                      });
	
	
});
   
       
		
		
   
	
	
</script>
</body>

</html>


