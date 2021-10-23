<!--<div class="headerSpace"></div>
	<div class="listMenu">
		<ul class="nav justify-content-center">
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo base_url()?>category/14">Print & copy</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="<?php echo base_url()?>category/15">Office Supplies</a>
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
	<div class="contantBlock blockEnd">
		<div class="container">
			<div class="row">
				<div class="col-md-12 d-md-flex justify-content-md-between align-items-center">
					<h4 class="mb-0 font-weight-bold">NEED URGENTLY<br>
					FAST PRINT AND DELIVERY<br>
					FOR ALL YOUR PRINTING ITEMS</h4>
					<a class="btn animatedBtn darckBtn mt-md-0 mt-3" href="contact-us.html#contactForm" role="button">REQUEST NOW</a>
				</div>
				<div class="col-md-12">
					<div class="listingItemNav d-flex justify-content-between align-items-center">
						<h5 class="mb-0">Find your perfect print</h5>
						<ul class="nav">
						  <li class="nav-item">
							<span class="nav-link thumpIcon"><img src="<?php echo $main->front_end_skin('img/thump-icon.png')?>"></span>
						  </li>
						  <li class="nav-item">
							<span class="nav-link listIcon on"><img src="<?php echo $main->front_end_skin('img/list-icon.png')?>"></span>
						  </li>
						</ul>						
					</div>
					<div class="row">
					<ul class="productListing thump">
						
						<?php foreach ($categoryproducts as $prod)
                             {?>
	                       

						<li class="productItem">
							<div>
								<div class="productItemImg">
									<img src="<?php echo base_url()?>assets/uploads/products/<?php echo $prod->product_image?>" alt="">								
								</div>
								<div class="productItemContant">
									<h5><?php echo $prod->product_name?></h5>
									<p class="productItemDetail"><?php echo $prod->description?></p>
									<a href="<?php echo base_url()?>prd/<?php echo $prod->product_id?>" class="btnFlip" data-back="Shop Now" data-front="Shop Now"></a>
								</div>
							</div>
						</li>
						<?php } ?>
					</ul>
					</div>
				</div>
			</div>
		</div>
	</div>