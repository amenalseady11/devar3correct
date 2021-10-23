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
<div id="gotocart_popup" class="modalstle" style="display: none;">
    <!-- Modal content -->
    <div class="modal-contentstyle">
        <div>
           <!--  <strong style="font-size: 16px;color: #21293C;"> </strong> <span class="close">×</span> -->
<div class="successfully_icon">
	<i class="fas fa-check-circle"></i>
</div>
        </div>
        <p style="margin-top: 20px;margin-bottom: 20px;color: #21293C; font-size: 15px;">Product successfully added to cart </p>
        <div>
            <a href="<?php echo base_url(); ?>" class="btn pinkcss animatedBtn darckBtn btn_style2 width175" style=""><span> Continue Shopping</span></a>
            
            <a href="<?php echo base_url(); ?>cart" class="btn pinkcss animatedBtn darckBtn btn_style1 width175" style=""><span> Go To Cart</span></a>
        </div>
    </div>
</div>
<style type="text/css">
	.modalstle {
    display: none;
    position: fixed;
    z-index: 9999;
    /*padding-top: 100px;*/
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);
}
.modal-contentstyle {
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    border-radius: 5px;
    text-align: center;
    background-color: #fefefe;
    padding: 30px 10px;
    position: relative;
    border: 1px solid #e3e3e3;
    max-width: 480px;
    width: 80%;
}
.successfully_icon i{
	color: #ec1d8c;
    font-size: 60px;
    margin-bottom: 0px;
}
a.width175 {
    width: 175px;
        margin: 5px 0px;
}
</style>
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
	  tot=tot+" SAR";
	  
	$('#original_price').html(tot);
	  
});
</script>

<script>
	<?php 
				
				foreach ($this->cart->contents() as $items)
{?>
					
  $('body').on('change','#qty_<?php echo $items['rowid']?>',function(){
   //alert("success");
	  var a=parseInt($('#qty_<?php echo $items['rowid']?>').val());
	  
	  var minquantity=parseInt($('#minqty_<?php echo $items['rowid']?>').val());
	  
	  if(a<minquantity)
		  {
			  
			alert('Minimum Quantity Needed');
			  $('#qty_<?php echo $items['rowid']?>').val(minquantity);
			  return false;
			  
		  }
	  
	
});
	<?php } ?>
</script>


<?php if($this->uri->segment(1)=="prd"){
	
	
?>

<script type="text/javascript">
	
	
	
	
	<?php //$dependable=json_decode($productsmap['dependable_attributes']);
	
	$depend=json_decode($productsmap[dependable_attributes]);
	
	$nondepend=json_decode($productsmap[non_dependable_attributes]);
	
	$codepend=count($depend);
	
	
	$k="0";
	
	foreach ($depend as $key=>$val){
		
		$k=$k+1;
		
		$lastname=$val->name;
		
		?>
	
	 $(document).on('change', 'input[name="<?php echo $val->name;?>"]', function (event) {
			
			//alert("aaaaaaaa");
			
			var q1 = $('input[name="<?php echo $val->name;?>"]:checked').val();
		 //alert(q1);
		 
		 <?php $selectname=str_replace(" ","",strtolower($val->name));?>
		 
		  $('#<?php echo $selectname?>').html(q1);
			
			$('#prdcount').val(<?php echo $k;?>);
			
			
			//alert(q1);
		 <?php if($k==$codepend){?>
		 
		  var radios="selectradios/";
		 <?php } else {?>
		  var radios="selectpapertype/";
		 <?php } ?>
		 
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/"+radios, //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						
						
						
						<?php
						for ($x =$k+1; $x <= $codepend; $x++) {?>
							
							$('#dynamic_id_<?php echo $x?>').html('');
						   //$('#dep_<?php echo $x?>').hide();
							 
							<?php }

						?>
						
						<?php if($k!=$codepend){?>
							
							
						
						$('#dynamic_id_<?php echo $k?>').html(data);
						$('#price').html('');
						 $('#non_attribute').html('');
							
							<?php } else{?>
						
						
						
						
						//$('.card').show();
						
						 $('#price').html(data);
						
						<?php } ?>
							
						
                    }
                      });
					  
					  
              });
	
		
<?php	}
	
	
	?>
	
	
	 $(document).on('change', 'input[name="<?php echo $lastname?>"]', function (event) {
			
			//alert("vvvvvvvvv1111111111");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			//$('#prdcount').val(5);
			
			
			//alert(q1);
		 		 
		  var radios="nonattributes/";
		 		 
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/"+radios, //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						
						
						
												
												
						
						
						
						//$('.card').show();
						
						 $('#non_attribute').html(data);
						
													
						
                    }
                      });
					  
					  
              });
	
<?php	
	$k="0";
	
	foreach ($nondepend as $key=>$val){
		
		$k=$k+1;
		
		
		
		?>
	
	 $(document).on('change', 'input[name="<?php echo $val->name;?>"]', function (event) {
			
			//alert("wwww");
			
			var q1 = $('input[name="<?php echo $val->name;?>"]:checked').val();
		 //alert(q1);
		 
		 <?php $selectname=str_replace(" ","",strtolower($val->name));?>
		 
		  $('#<?php echo $selectname?>').html(q1);
			
			  });
	
	<?php } ?>
		


	
</script>

<script type="text/javascript">


   
			$('body').on('click','#basket',function(){
				 
				 //alert("ggggggggggg");
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/add_to_cart/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						
						//alert(data);
						//return false;
						// alert("Added Items to Cart");
						$('#gotocart_popup').show();
						// window.location = '<?php echo base_url(); ?>cart';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>

<?php if($this->uri->segment(1)=="prd_edit"){
	
	
?>

<script type="text/javascript">
	
	
	
	
	<?php //$dependable=json_decode($productsmap['dependable_attributes']);
	
	$depend=json_decode($productsmap[dependable_attributes]);
	
	$nondepend=json_decode($productsmap[non_dependable_attributes]);
	
	$codepend=count($depend);
	
	
	$k="0";
	
	foreach ($depend as $key=>$val){
		
		$k=$k+1;
		
		$lastname=$val->name;
		
		?>
	
	 $(document).on('change', 'input[name="<?php echo $val->name;?>"]', function (event) {
			
			//alert("aaaaaaaa");
			
			var q1 = $('input[name="<?php echo $val->name;?>"]:checked').val();
		 //alert(q1);
		 
		 <?php $selectname=str_replace(" ","",strtolower($val->name));?>
		 
		  $('#<?php echo $selectname?>').html(q1);
			
			$('#prdcount').val(<?php echo $k;?>);
			
			
			//alert(q1);
		 <?php if($k==$codepend){?>
		 
		  var radios="selectradios/";
		 <?php } else {?>
		  var radios="selectpapertype/";
		 <?php } ?>
		 
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/"+radios, //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						
						//alert(<?php echo $k?>);
						
						
						
						<?php
						for ($x =$k+1; $x <= $codepend; $x++) {?>
						
						
						$("#editcid_<?php echo $x?>").html('');
						$("#editcid_<?php echo $x?>").hide();
						
						<?php	
	$g="0";
	
	foreach ($nondepend as $key=>$val){
		
		$g=$g+1;
		?>
						$("#editnoncid_<?php echo $g?>").html('');
						$("#editnoncid_<?php echo $g?>").hide();
						<?php
		
	}
		
		?>						
						
						   
							 
							<?php }

						?>
						
						<?php if($k!=$codepend){?>
							
							
						
							$('#dynamic_id_<?php echo $k?>').html(data);
						$('#price').html('');
						 $('#non_attribute').html('');
							
							<?php } else{?>
						
						
						
						
						//$('.card').show();
						
						$('#price').html(data);
						
						<?php } ?>
							
						
                    }
                      });
					  
					  
              });
	
		
<?php	}
	
	
	?>
	
	
	 $(document).on('change', 'input[name="<?php echo $lastname?>"]', function (event) {
			
			//alert("vvvvvvvvv1111111111");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			//$('#prdcount').val(5);
			
			
			//alert(q1);
		 		 
		  var radios="nonattributes/";
		 		 
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/"+radios, //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						
						
						
						<?php	
	$k="0";
	
	foreach ($nondepend as $key=>$val){
		
		$k=$k+1;
		?>
						$("#editnoncid_<?php echo $k?>").html('');
						$("#editnoncid_<?php echo $k?>").hide();
						<?php
		
	}
		
		?>						
												
						
						
						
						//$('.card').show();
						
						$('#non_attribute').html(data);
						
													
						
                    }
                      });
					  
					  
              });
	
<?php	
	$k="0";
	
	foreach ($nondepend as $key=>$val){
		
		$k=$k+1;
		
		
		
		?>
	
	 $(document).on('change', 'input[name="<?php echo $val->name;?>"]', function (event) {
			
			//alert("wwww");
			
			var q1 = $('input[name="<?php echo $val->name;?>"]:checked').val();
		 //alert(q1);
		 
		 <?php $selectname=str_replace(" ","",strtolower($val->name));?>
		 
		$('#<?php echo $selectname?>').html(q1);
			
			  });
	
	<?php } ?>
		


	
</script>

<script type="text/javascript">


   
			$('body').on('click','#basket',function(){
				 
				//alert("ggggggggggg");
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/update_cart/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						
						//alert(data);
						//return false;
						alert("Updated Items to Cart");
						
						window.location = '<?php echo base_url(); ?>cart';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>


<script type="text/javascript">
    $(document).ready(function() {
    //set initial state.
    // $('#textbox1').val($(this).is(':checked'));

    $('#flexCheckChecked').change(function() {
        if($(this).is(":checked")) {
         $('#billing_address').hide();
        }
      else{
$('#billing_address').show();
      }     
    });
});
</script>


<script type="text/javascript">
   
     $(".ship_here").click(function(){
      $('.adding-address-box').removeClass('selected-item');
         $('.ship_here').show();
          $('.slected_address').hide();
            $(this).parent().parent('.adding-address-box').addClass('selected-item');
             $(this).parent('.btn_styleaddress').children('.slected_address').show();
             $(this).hide();

              $(this).parent().parent('.adding-address-box').children('.radioshipgere').prop("checked", true);
        
            });
</script>
<script type="text/javascript">

         $(window).load(function() {
   var n = $( ".lenthdiv" ).length;
   if (n == '1') {
	   //alert("hhhh");
$('.radioshipgere').prop("checked", true);
	   $('.lenthdiv').first().addClass('selected-item');
	   
	   //$('.lenthdiv').first().children('.radioshipgere').prop("checked", true);
	      $('.slected_address').show();
   $('.ship_here').hide();
   }
   else{  
$('.lenthdiv').first().children('.btn_styleaddress').children('.radioshipgere').prop("checked", true);
$('.lenthdiv').first().addClass('selected-item');
$('.lenthdiv').first().children('.btn_styleaddress').children('.slected_address').show();
   }
});
   </script>
   <script type="text/javascript">
     $("#check_address").click(function(){
   var n = $( ".lenthdiv" ).length;
   if (n == '1') {
$('.radioshipgere').prop("checked", true);
   $('.ship_here').hide();
   $('.slected_address').show();
   }
   else{
   }
            });
</script>

</script>

<script type="text/javascript">
	$(".show_hide").click(function(){
$(this).parent('.at_box').children('.attribute_box').toggleClass("show_3");
if ($(this).parent('.at_box').children('.attribute_box').hasClass('show_3')){
 $(this).html('View More');
 } else {
 $(this).html('Less View');
   }
});

	
</script>
<script type="text/javascript">
    if (window.location.hash && window.location.hash == '#_=_') {
        window.location.hash = '';
    }
</script>
   <script type="text/javascript">
  $(".quantity_input").click(function() {
  	 $(this).parent().parent('.padding0_qty').children('#update_qty').delay( 2000 ).show();
});
  </script>
<script>
  $('body').on('change','#quantity',function(){
   
	  var qu=$('#quantity').val(); 
	  var a=qu.split("|");				  
		var pri=a[1]; 
	  var b=parseFloat(pri);
	  var tot=b;
	  tot=tot.toFixed(2);
	 // $('#orgpriceid').val(tot);	
	  tot="SAR "+tot;  
	$('#original_price').html(tot);	
	
	  
});
</script>
</body>

</html>


