<link href='<?= base_url() ?>resources/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='<?= base_url() ?>resources/dropzone.js' type='text/javascript'></script>

<style>
	.content{
		width: 100%;
	 	padding: 0px;
	 	margin: 0 auto;
	}
	.content span{
		width: 250px;
	}
	.dz-message{
		text-align: center;
		font-size: 28px;
	}
	</style>
<script>
		// Add restrictions
		Dropzone.options.fileupload = {
		    acceptedFiles: "audio/*,image/*,.psd,.pdf,.zip",
		    maxFilesize: 10 // MB
		};
	</script>

<div  id="banner" class="innerBanner productBanner">
		<div class="bgImg" style="background-image: url('<?php echo $main->front_end_skin('img/bg-img4.jpg')?>">
			<div class="bgOverlay"></div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4 triggerBlock">
					<div class="card sliderUp50d1">
						<div class="card-body">
							<h4>Book & Manual</h4>
							<p>Welcome to our page for great online Document and booklet printing. We offer wide range of printed, folded and perfect-bound items.</p>
							<ul class="list-group">
								<li class="list-group-item">4 different binding types</li>
								<li class="list-group-item">Over 25 paper combinations</li>
								<li class="list-group-item">Next day delivery on Saddle Stitched</li>
								<li class="list-group-item">Brochures</li>
								<li class="list-group-item">No minimum quantities</li>
							</ul>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="owl-carousel">
					<div class="item">
						<a href="">
							<img src="<?php echo $main->front_end_skin('img/service/flyers-leaflets01.jpg')?>" alt="">
							<span class="owl-title">Saddle stitch binding</span>
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="<?php echo $main->front_end_skin('img/service/flyers-leaflets01.jpg')?>" alt="">
							<span class="owl-title">Wiro Bound</span>
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="<?php echo $main->front_end_skin('img/service/flyers-leaflets01.jpg')?>" alt="">
							<span class="owl-title">Perfect Bound</span>
						</a>
					</div>
					<div class="item">
						<a href="">
							<img src="<?php echo $main->front_end_skin('img/service/flyers-leaflets01.jpg')?>" alt="">
							<span class="owl-title">Hardback Books</span>
						</a>
					</div>
				</div>
			</div>			
		</div>
	</div>

 
	<form name="deyar_form" meth="post">
	<div class="contantBlock blockEnd">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="mb-3">Price Calculator</h5>
				</div>
				<div class="col-md-8 col-lg-9">					
					<div id="accordion" class="price-calculator">
							
						
							
							<input type="hidden" name="product" value="<?php echo $productid?>">
						
						    <input type="hidden" name="prdcount" id="prdcount" value="0">
						
						    <input type="hidden" name="productname" value="<?php echo $productsname['product_name']?>">
						
						   
							
						

				   <?php
							
						//echo $data['productsmap'];
							
							//echo $productsmap->dependable_attributes;
							$dependable=json_decode($productsmap['dependable_attributes']);
							
							$nondependable=json_decode($productsmap['non_dependable_attributes']);
							
						
							?>
				 			
							
								
		
							
								
								<?php 
	
	$i="0";
								
	
										 foreach ($dependable as $k=>$v)
	                     {
											$i=$i+1; 
								
							
								if($i=="1")	
								{
									
									
							
								
											 
											 
	
	             if($i=="1")
				 {
					$ab=$i;
					 $as=$i+1;
					 $exp="true";
					 $collapse="collapse show";
					 
				 }
	
	             else 
				 {
					$ab=$i;
					 $as=$i+1;
					 $exp="false";
					 $collapse="collapse";
					 
				 }
	
	            
									$attvalue=str_replace(" ","",strtolower($v->name));
									
									//echo $ab."<br>";
											 
				
                            
					   ?>
							
							<div class="card">
								<div class="card-header" id="heading<?php echo $ab?>" data-toggle="collapse" data-target="#collapse<?php echo $ab?>" aria-expanded="<?php echo $exp ?>" aria-controls="collapse<?php echo $ab?>">
									<h5 class="mb-0"><?php echo $v->name?></h5>
<span id="<?php echo $attvalue?>">No Select</span>
								</div>
								
									
							
							
		

								<div id="collapse<?php echo $ab?>" class="<?php echo $collapse?>" aria-labelledby="heading<?php echo $ab?>" data-parent="#accordion">
									<div class="card-body">
										
									<?php foreach ($$attvalue as $b)	
					   {?>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $as;?>">
												<input type="radio" name="<?php echo $v->name?>" value="<?php echo $b?>" class="ab">
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<?php echo $b?>
										</div>
										
										<?php } ?>
										
									</div>
								</div>
							
							</div>
						
						<?php	
									$n="0";
									foreach ($dependable as $k=>$v)
	                     {
						$n=$n+1;
						?>
						
						<div id="dynamic_id_<?php echo $n?>"></div>
						<?php } ?>
					   
								
						<div id="non_attribute"></div>	
						
						
							<?php 
					   
								
								} 
											 
											 
							
										 }
															 ?>
							
						
						
		<!-- Dropzone1 -->
	   	<form action="<?= base_url('home/fileupload') ?>" class="dropzone" id='fileupload' >
	   	</form>
				
		<?php if($this->session->userdata('uid')){?>
						
		<div class='content' style="margin-top: 20px;">
		  	<label style="font-size: 15px;">Supported file format: PSD, AI, INDD, PDF, TIFF, PNG, JPG, SLDPRT, STL, OBJ, ZIP, RAR </label> 
		<!-- Dropzone2 -->
	   	<form action="<?= base_url('home/fileupload') ?>" class="dropzone" id='fileupload'>
	   	</form> 
	</div> 
						
						
						     
						<?php } ?>
						
						
				
						<div class="form-group productComment">
								<label class="mt-3">ADDITIONAL COMMENTS OR REQUESTS</label>
								<textarea class="form-control" rows="3" name="comments" id="comments"></textarea>
							</div>
						
							<div class="form-group text-center">
								<!--<a class="btn animatedBtn darckBtn" href="login.html" role="button">SIGN IN TO SHOP</a>-->
								<!--<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">SIGN IN TO SHOP</button>-->  
							</div>
						
					</div>
				</div>
				<div class="col-md-4 col-lg-3">
					
						<!--<div class="detailsPriceBody">
							<p>
								<span>Quantity </span>
								<input class="form-control" type="text" name="" value="1">
							</p>
							<h4 class="price">25.00 SR</h4>
							<a class="btn animatedBtn darckBtn" href="#" role="button">Add to Basket</a>
						</div>-->
						
						<div id="price"></div>
								
				</div>
				
				
				
				<hr class="my-4">
				
				<div class="col-md-12 contant">
					<h5>Ordering Tips</h5>
					<h6>Order, Delivery, and Payment</h6>
					<p>If you want your order to be processed on the same day, place it before 5.00 pm GST and we will quickly review it.</p>
					<p>When your order is ready, you can either use our delivery services or pick up the order by yourself.</p>
					<ul class="contant-list">
					  <li>Delivery may take between 2-7 working days, depending on the geographical location and quantity of products.</li>
					  <li>Stop by one of our two locations to pick up your orders: Headquarters at Plot 36, Dubai Production City (DPC) and Dubaiprint.com Lounge at Dubai Design District (d3).</li>
					</ul>
					<p>Then you can choose the payment method that suits you best:</p>
					<ul class="contant-list">
					  <li>We accept Visa and Master Cards, PayPal and Cash on Delivery (COD).</li>
					  <li>Note that COD is only available on the territory of the UAE and on the orders below 2,500 AED.</li>
					</ul>
					<h6>Preparing Your Files</h6>
					<p>Welcome to our page for great online Document and booklet printing. We offer wide range of printed, folded and perfect-bound items.</p>
					<ul class="contant-list">
					  <li>Cras justo odio</li>
					  <li>Dapibus ac facilisis in</li>
					  <li>Morbi leo risus</li>
					  <li>Porta ac consectetur ac</li>
					  <li>Vestibulum at eros</li>
					</ul>
										
				</div>
				
				
				
				<hr class="my-5">
				
				<div class="col-md-12 contant">
					<h5>Product Description</h5>
					<h6>Order, Delivery and Payment</h6>
					<p>Welcome to our page for great <b>online Document and booklet printing</b>. We offer wide range of printed, folded and perfect-bound items.</p>
					<ul class="contant-list">
					  <li>Cras justo odio</li>
					  <li>Dapibus ac facilisis in</li>
					  <li>Morbi leo risus</li>
					  <li>Porta ac consectetur ac</li>
					  <li>Vestibulum at eros</li>
					</ul>	
				</div>
			</div>
		</div>
	</div>
</form>
