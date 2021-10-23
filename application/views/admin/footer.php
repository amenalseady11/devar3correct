<?php $main = new Main()?>

<!-- Footer opened -->
			<div class="main-footer ht-50">
				<div class="container-fluid pd-t-0-f ht-100p">
					<span>Copyright &copy; <?php echo date('Y')?> <a href="http://deyarprint.com/">Deyar Print</a>. Designed by <a href="https://www.crayotech.com/">Crayo Tech</a> All rights reserved.</span>
				</div>
			</div>
			<!-- Footer closed -->
			
				<div id="updateordergotocart_popup" class="modalstle" style="display: none;">
    <!-- Modal content -->
    <div class="modal-contentstyle">
        <div>
           <!--  <strong style="font-size: 16px;color: #21293C;"> </strong> <span class="close">×</span> -->
<div class="successfully_icon">
	<i class="fas fa-check-circle"></i>
</div>
        </div>
        <p style="margin-top: 20px;margin-bottom: 20px;color: #21293C; font-size: 15px;">Product updated to order </p>
        <div>
            
            
            <a href="<?php echo base_url()?>ad_order" class="btn pinkcss animatedBtn darckBtn btn_style1 width175" style=""><span> Go To Order</span></a>
        </div>
    </div>
</div>

			
			
				<div id="newitemgotocart_popup" class="modalstle" style="display: none;">
    <!-- Modal content -->
    <div class="modal-contentstyle">
        <div>
           <!--  <strong style="font-size: 16px;color: #21293C;"> </strong> <span class="close">×</span> -->
<div class="successfully_icon">
	<i class="fas fa-check-circle"></i>
</div>
        </div>
        <p style="margin-top: 20px;margin-bottom: 20px;color: #21293C; font-size: 15px;">Product successfully added to order </p>
        <div>
            
            
            <a href="<?php echo base_url()?>ad_order" class="btn pinkcss animatedBtn darckBtn btn_style1 width175" style=""><span> Go To Order</span></a>
        </div>
    </div>
</div>

			
				<div id="newordergotocart_popup" class="modalstle" style="display: none;">
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
            <a href="<?php echo base_url()?>ad_order/product_select" class="btn pinkcss animatedBtn darckBtn btn_style2 width175" style=""><span> Continue Shopping</span></a>
            
            <a href="<?php echo base_url()?>ad_order/new_cart" class="btn pinkcss animatedBtn darckBtn btn_style1 width175" style=""><span> Go To cart</span></a>
        </div>
    </div>
</div>

			
	<div id="estimategotocart_popup" class="modalstle" style="display: none;">
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
            <!--<a href="https://www.deyar.demoatcrayotech.com/printstore/" class="btn pinkcss animatedBtn darckBtn btn_style2 width175" style=""><span> Continue Shopping</span></a>-->
            
            <a href="<?php echo base_url()?>estimate" class="btn pinkcss animatedBtn darckBtn btn_style1 width175" style=""><span> Go To Estimate</span></a>
        </div>
    </div>
</div>

	<div id="newestimategotocart_popup" class="modalstle" style="display: none;">
    <!-- Modal content -->
    <div class="modal-contentstyle">
        <div>
           <!--  <strong style="font-size: 16px;color: #21293C;"> </strong> <span class="close">×</span> -->
<div class="successfully_icon">
	<i class="fas fa-check-circle"></i>
</div>
        </div>
        <p style="margin-top: 20px;margin-bottom: 20px;color: #21293C; font-size: 15px;">Product successfully added to Estimate cart </p>
        <div>
            <a href="<?php echo base_url()?>estimate/product_select" class="btn pinkcss animatedBtn darckBtn btn_style2 width175" style=""><span> Continue Shopping</span></a>
            
            <a href="<?php echo base_url()?>estimate/new_cart" class="btn pinkcss animatedBtn darckBtn btn_style1 width175" style=""><span> Go To Estimate</span></a>
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
	  
	//alert($('#perpriceid').val());
	  var b=a*parseFloat($('#perpriceid').val());
	  var tot=b;
	  tot=tot.toFixed(2);
	  tot=tot+" SAR";
	  
	$('#original_price').html(tot);
	  
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


<?php if($this->uri->segment(2)=="new_item"){
	
	
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
                    url: "<?php echo base_url(); ?>ad_order/"+radios, //The url where the server req would we made.
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
						
						
						//alert("price");
						//alert(data);
						
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
                    url: "<?php echo base_url(); ?>ad_order/"+radios, //The url where the server req would we made.
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
				
				//alert($('#randomid').val());
				//return false;
				
				var moredata = $('#randomid').val();

// do what you like with the input
$input = $('<input type="hidden" name="randomid"/>').val(moredata);

// append to the form
$(deyar_form).append($input);
			
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>ad_order/update_order_new_item/", //The url where the server req would we made.
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
						//alert("Updated Order with New Item");
						
							$('#newitemgotocart_popup').show();
						
					//	window.location = '<?php echo base_url(); ?>ad_order';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>


<?php if($this->uri->segment(2)=="new_order"){
	
	
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
                    url: "<?php echo base_url(); ?>ad_order/"+radios, //The url where the server req would we made.
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
						
						
						//alert("price");
						//alert(data);
						
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
                    url: "<?php echo base_url(); ?>ad_order/"+radios, //The url where the server req would we made.
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
				
				moredata = $('#randomid').val();

// do what you like with the input
$input = $('<input type="hidden" name="randomid"/>').val(moredata);

// append to the form
$(deyar_form).append($input);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>ad_order/admin_add_to_cart/", //The url where the server req would we made.
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
						//alert("Added Items to Cart");
							$('#newordergotocart_popup').show();
						
					//	window.location = '<?php echo base_url(); ?>ad_order/new_cart';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>

<?php if($this->uri->segment(2)=="edit_product_order"){
	
	
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
                    url: "<?php echo base_url(); ?>ad_order/"+radios, //The url where the server req would we made.
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
                    url: "<?php echo base_url(); ?>ad_order/"+radios, //The url where the server req would we made.
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
				
				//alert($('#randomid').val());
				
				moredata = $('#randomid').val();

// do what you like with the input
$input = $('<input type="hidden" name="randomid"/>').val(moredata);

// append to the form
$(deyar_form).append($input);
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>ad_order/update_order_item/", //The url where the server req would we made.
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
						//alert("Updated Items on order");
						
							$('#updateordergotocart_popup').show();
						
						
						
					//	window.location = '<?php echo base_url(); ?>ad_order';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>


<?php if($this->uri->segment(2)=="new_estimate"){
	
	
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
						url: "<?php echo base_url(); ?>estimate/"+radios, //The url where the server req would we made.
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
							
							
							//alert("price");
							//alert(data);
							
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
						url: "<?php echo base_url(); ?>estimate/"+radios, //The url where the server req would we made.
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
					
					moredata = $('#randomid').val();
	
	// do what you like with the input
	$input = $('<input type="hidden" name="randomid"/>').val(moredata);
	
	// append to the form
	$(deyar_form).append($input);
				
				 $.ajax({  
						url: "<?php echo base_url(); ?>estimate/admin_add_to_cart/", //The url where the server req would we made.
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
							//alert("Added Items to Cart");
							
								$('#newestimategotocart_popup').show();
							
						//	window.location = '<?php echo base_url(); ?>estimate/new_cart';
							
							//$('.price').html(data);
							
							
							
						}
						  });
						  
						 
						  
						  
				  });
			
			
			
		
		
	</script>
	
	<?php } ?>

<?php if($this->uri->segment(2)=="edit_product_estimate"){
	
	
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
                    url: "<?php echo base_url(); ?>estimate/"+radios, //The url where the server req would we made.
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
                    url: "<?php echo base_url(); ?>estimate/"+radios, //The url where the server req would we made.
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
				
				//alert($('#randomid').val());
				
				moredata = $('#randomid').val();

// do what you like with the input
$input = $('<input type="hidden" name="randomid"/>').val(moredata);

// append to the form
$(deyar_form).append($input);
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>estimate/update_order_item/", //The url where the server req would we made.
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
						//alert("Updated Items on order");
						
							$('#estimategotocart_popup').show();
						
						//window.location = '<?php echo base_url(); ?>estimate';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>


<?php if($this->uri->segment(2)=="estimate_new_item"){
	
	
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
                    url: "<?php echo base_url(); ?>estimate/"+radios, //The url where the server req would we made.
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
						
						
						//alert("price");
						//alert(data);
						
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
                    url: "<?php echo base_url(); ?>estimate/"+radios, //The url where the server req would we made.
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
				
				//alert($('#randomid').val());
				//return false;
				
				var moredata = $('#randomid').val();

// do what you like with the input
$input = $('<input type="hidden" name="randomid"/>').val(moredata);

// append to the form
$(deyar_form).append($input);
			
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>estimate/update_order_new_item/", //The url where the server req would we made.
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
						//alert("Updated Order with New Item");
						$('#estimategotocart_popup').show();
						
						//window.location = '<?php echo base_url(); ?>estimate';
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>

<?php } ?>




<?php if($this->uri->segment(1)=="pageaccess"){
	
	
?>

<script type="text/javascript">


   
			$('body').on('change','#designation',function(){
				 
				//alert("ggggggggggg");
				
				//alert($('#randomid').val());
				
				
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>pageaccess/accessdetails/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.				    
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						
						//alert("fghfghfghfhgf");						
					
						
						$('#pagedetails').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
</script>


<?php } ?>
