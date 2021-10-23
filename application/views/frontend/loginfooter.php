

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
		

/*
   
        $(document).on('change', 'input[name="Paper Types"]', function (event) {
			
			alert("aaaaaaaa");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			$('#prdcount').val(1);
			
			
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
						alert(data);
						
						
						$('#dynamic_id_1').html(data);
						$('#dynamic_id_2').html('');
						$('#price').html('');
							
						
                    }
                      });
					  
					  
              });
	
	
	
	
	  $(document).on('change', 'input[name="Paper Sizes"]', function (event) {
			
			alert("vvvvvvvvvv");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			
			$('#prdcount').val(2);
			
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
						alert(data);
						
						
						$('#dynamic_id_2').html(data);
						$('#price').html('');
							
						
                    }
                      });
					  
					  
              });
	
	
	
	 $(document).on('change', 'input[name="Paper Weights"]', function (event) {
			
			alert("ssssssss");
			
			var q1 = $('input[type="radio"]:checked').val();
			
			
			$('#prdcount').val(2);
			
			//alert(q1);
			
			 $.ajax({  
                    url: "<?php echo base_url(); ?>/home/selectradios/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: $(deyar_form).serialize(),//The variables which are going.
				   //data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						alert(data);
						
						
						$('#price').html(data);
							
						
                    }
                      });
					  
					  
              });
		
		
		
		
		*/
		
   
		
		
		
   
	
</script>
<script type="text/javascript">
	/*
	
$(document).on('change', 'input[type=radio]', function (event) {
   
	alert("ccccccccc");
			
			var q1 = $('input[type="radio"]:checked').val();
	

	
	
	
	     $("input[name='gender']:checked").val();
	alert(q1);
	
	
			
		
			
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
						//alert(data);
						$('#price').html(data);
                    }
                      });
			
		
	
	
});
   
       
		
		
*/   
	
	
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
						alert("Added Items to Cart");
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
		
		
    
	
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

</body>

</html>


