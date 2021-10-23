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
	a#basket {
    color: #fff;
}
div#price {
    position: -webkit-sticky;
    position: sticky;
    top: 130px;
}
.horizontalMenucontainer {	
    overflow: unset;
}
	</style>
<script>
		// Add restrictions
		Dropzone.options.fileupload = {
		    acceptedFiles: "audio/*,image/*,.psd,.pdf,.zip",
		    maxFilesize: 10 // MB
		};
	</script>

 <!-- main-content opened -->
			<div class="main-content horizontal-content">

				<!-- container opened -->
				<div class="container">

					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div>
							<h4 class="content-title mb-2">Hi, welcome back!</h4>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
								<!-- <li class="breadcrumb-item active">Suppliers</li> -->
									<li class="breadcrumb-item active" aria-current="page">New Order</li>
								</ol>
							</nav>
						</div>
						
					</div>
					<!-- /breadcrumb -->


					<!-- main-content-body -->
					<div class="main-content-body">
						<div class="row row-sm">
								<!--div-->
					<div class="col-xl-12">
						<div class="card mg-b-20">
							<div class="card-header pb-0">
								<div class="justify-content-between" style="display: inline-block;">
									<h3 class="card-title mg-b-2 mt-2"> PRICE CALCULATOR</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
						
					                </div>

					<div class="card-body">                
<form name="deyar_form" method="post">
									<div class="row row-sm">
										
									<div class="col-md-8 col-lg-9">					
					<div id="accordion" class="price-calculator">
							
						
	<!--<form name="deyar_form" meth="post">
	<div class="contantBlock blockEnd">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 class="mb-3">Price Calculator</h5>
				</div>
				<div class="col-md-8 col-lg-9">					
					<div id="accordion" class="price-calculator">-->
							
						
							
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
							
							
							
							
							
							
							
							
								
								
							
							<!--<div class="card cardFinal">
								<div class="card-header" id="headingEight" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
									<h5 class="mb-0">Cover Lamination</h5>
									<span>No Select</span>
								</div>
								<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordion">
									<div class="card-body">
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" data-target="#collapseEight">
												<input type="radio" name="cover-lamination">
												<img src="img/product/cover-lamination-1.png" alt="">
												<span class="checkmark"></span>
											</label>
											None
										</div>										
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" data-target="#collapseEight">
												<input type="radio" name="cover-lamination">
												<img src="img/product/cover-lamination-2.png" alt="">
												<span class="checkmark"></span>
											</label>
											Matte
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" data-target="#collapseEight">
												<input type="radio" name="cover-lamination">
												<img src="img/product/cover-lamination-3.png" alt="">
												<span class="checkmark"></span>
											</label>
											Glossy
										</div>
									</div>
								</div>
							</div>-->
						
						
		
						</div>
					</div>
						
				<div class="col-md-4 col-lg-3" >
					
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
		
				
			</div>
			</form>
						
			<div class="row row-sm">
				<div class="col-md-8 col-lg-9" >				
							<!-- Dropzone -->
	   <!-- 	<form action="ad_order/fileupload" class="dropzone" id='fileupload' disabled>
	   	</form>
				 -->
							
						
						
														<!--<div class="form-group files" for="fileDrag">
								<input type="file" class="form-control" id="fileDrag" multiple="">
							</div>-->
						
						<div class='content' >
		<!-- Dropzone -->
	   	<form action="ad_order/fileupload" class="dropzone" id='fileupload'>&nbsp;
			<input type="hidden" name="random" value="<?php echo $random?>">
	   	</form> 
	</div> 
					
</div>
</div>

				
				</div>
							
						
					</div>
				</div>
				
	
	           	
						<!--<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Customers: <span class="tx-danger">*</span></label>
									<select name="product" class="form-control" required="">
										<!--placeholder-->
										<!--<option value="0" disabled="" selected="">Select Customer</option>-->
										<?php
    $i = 0;
   /// foreach ($customers as $cust) {?>
													   
								<!--<option value="<?php echo $cust->customer_id?>" <?php //if(isset($result->product_id))if($result->product_id==$prd->product_id) echo "selected";?>><?php echo $cust->customer_firstname?>&nbsp;<?php echo $cust->customer_lastname?></option>-->					
													
	<?php	
	//}
													?>
									<!--</select> </div>
								                </div>
								     </div>
						
						
						<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Shipping Method: <span class="tx-danger">*</span></label>
									<select name="product" class="form-control" required="">
										<!--placeholder-->
										
								<!--<option value="15">Delivery</option>
								<option value="0">Pickup</option>
									</select> </div>
								                </div>
								     </div>
	
	
	                      <div class="form-group text-center">
								<a class="btn btn-main-primary pd-x-20 mg-t-10" href="login.html" role="button">ORDER NOW</a>
							</div>-->
										
				
								

</div>
				
				                </div>
			                </div>
					<!--/div-->
						</div>

			








					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /main-content -->

	
			
				
