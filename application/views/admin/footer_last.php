<?php $main = new Main()?>

<!-- Footer opened -->
			<div class="main-footer ht-50">
				<div class="container-fluid pd-t-0-f ht-100p">
					<span>Copyright &copy; <?php echo date('Y')?> <a href="http://deyarprint.com/">Deyar Print</a>. Designed by <a href="https://www.crayotech.com/">Crayo Tech</a> All rights reserved.</span>
				</div>
			</div>
			<!-- Footer closed -->


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
						alert("Updated Order with New Item");
						
						window.location = '<?php echo base_url(); ?>ad_order';
						
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
						
						alert(data);
						//return false;
						alert("Added Items to Cart");
						
						window.location = '<?php echo base_url(); ?>ad_order/new_cart';
						
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
						alert("Updated Items on order");
						
						window.location = '<?php echo base_url(); ?>ad_order';
						
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
							
							alert(data);
							//return false;
							alert("Added Items to Cart");
							
							window.location = '<?php echo base_url(); ?>estimate/new_cart';
							
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
