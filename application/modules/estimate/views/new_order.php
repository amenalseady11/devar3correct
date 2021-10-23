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
<form action="form-validation.html" data-parsley-validate="">
									<div class="row row-sm">
									<div class="col-md-10 col-lg-10">					
					<div id="accordion" class="price-calculator">
							
						<form>
							<div class="card">
								<div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									<h5 class="mb-0">Paper Types</h5>
									<span>No Select</span>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												<input type="radio" name="paper-type">
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Wood Free Paper </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												<input type="radio" name="paper-type">
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Matt Paper </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												<input type="radio" name="paper-type">
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Glossy Paper </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												<input type="radio" name="paper-type">
												<img src="<?php echo $main->front_end_skin('img/product/paper-type-1.png')?>" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Bristol Paper </div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									<h5 class="mb-0">Paper Weights</h5>
									<span>No Select</span>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
									
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-80gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 80gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-100gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 100gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-120gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 120gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-135gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 135gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-150gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 150gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-170gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 170gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-200gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 200gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-250gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 250gr </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												<input type="radio" name="paper-weight">
												<img src="img/product/paper-weight-300gr.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 300gr </div>
										</div>
																											
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									<h5 class="mb-0">Paper Sizes</h5>
									<span>No Select</span>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												<input type="radio" name="paper-size">
												<img src="img/product/paper-size-a0.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 118.9cm x 84.1cm </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												<input type="radio" name="paper-size">
												<img src="img/product/paper-size-a1.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 59.4cm x 84.1cm </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												<input type="radio" name="paper-size">
												<img src="img/product/paper-size-a2.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 42cm x 59.4cm </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												<input type="radio" name="paper-size">
												<img src="img/product/paper-size-a3.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 42cm x 29.7cm </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												<input type="radio" name="paper-size">
												<img src="img/product/paper-size-a4.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 21cm x 29.7cm </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
												<input type="radio" name="paper-size">
												<img src="img/product/paper-size-a5.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> 14.8cm x 21cm </div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									<h5 class="mb-0">Printing Type</h5>
									<span>No Select</span>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
									<div class="card-body">
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
												<input type="radio" name="printing-type">
												<img src="img/product/printing-type-1.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> One Side </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseFive">
												<input type="radio" name="printing-type">
												<img src="img/product/printing-type-2.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Two Side </div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
									<h5 class="mb-0">Cover Type</h5>
									<span>No Select</span>
								</div>
								<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordion">
									<div class="card-body">
										
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
												<input type="radio" name="cover-type">
												<img src="img/product/cover-type-1.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Without Cover Paper </div>
										</div>	
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
												<input type="radio" name="cover-type">
												<img src="img/product/cover-type-2.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Wood Free Paper </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
												<input type="radio" name="cover-type">
												<img src="img/product/cover-type-3.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Matte Paper </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSix">
												<input type="radio" name="cover-type">
												<img src="img/product/cover-type-4.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Glossy Paper </div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
									<h5 class="mb-0">Binding Type</h5>
									<span>No Select</span>
								</div>
								<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordion">
									<div class="card-body">
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
												<input type="radio" name="binding-type">
												<img src="img/product/binding-type-1.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Staple Binding </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
												<input type="radio" name="binding-type">
												<img src="img/product/binding-type-2.png" alt="">
												<span class="checkmark"></span>
											</label>
										<div class="text_boxcss"> Hard Binding </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
												<input type="radio" name="binding-type">
												<img src="img/product/binding-type-3.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Spiral Binding with Transparensy </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
												<input type="radio" name="binding-type">
												<img src="img/product/binding-type-4.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss">Hard Cover Spral Binding</div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
												<input type="radio" name="binding-type">
												<img src="img/product/binding-type-5.png" alt="">
												<span class="checkmark"></span>
											</label>
										<div class="text_boxcss">	Stapple Binding </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">
												<input type="radio" name="binding-type">
												<img src="img/product/binding-type-6.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Hole punches </div>
										</div>

									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
									<h5 class="mb-0">Cover Print</h5>
									<span>No Select</span>
								</div>
								<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordion">
									<div class="card-body">
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
												<input type="radio" name="cover-print">
												<img src="img/product/cover-print-1.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Front Back Printng colour </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
												<input type="radio" name="cover-print">
												<img src="img/product/cover-print-2.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Front Side Colour </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
												<input type="radio" name="cover-print">
												<img src="img/product/cover-print-3.png" alt="">
												<span class="checkmark"></span>
											</label>
										<div class="text_boxcss"> Front Back Printng B&W </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" href="#collapseEight">
												<input type="radio" name="cover-print">
												<img src="img/product/cover-print-4.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Front Side B&W </div>
										</div>

									</div>
								</div>
							</div>
							<div class="card cardFinal">
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
											<div class="text_boxcss"> None </div>
										</div>										
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" data-target="#collapseEight">
												<input type="radio" name="cover-lamination">
												<img src="img/product/cover-lamination-2.png" alt="">
												<span class="checkmark"></span>
											</label>
										 <div class="text_boxcss"> Matte </div>
										</div>
										<div class="price-calculator-items">	
											<label data-toggle="collapse" data-parent="#accordion" data-target="#collapseEight">
												<input type="radio" name="cover-lamination">
												<img src="img/product/cover-lamination-3.png" alt="">
												<span class="checkmark"></span>
											</label>
											<div class="text_boxcss"> Glossy </div>
										</div>
									</div>
								</div>
							</div>
						
							<div class="form-group productComment">
								<label class="mt-3">ADDITIONAL COMMENTS OR REQUESTS</label>
								<textarea class="form-control" rows="3"></textarea>
							</div>	
							
							<div class="form-group files" for="fileDrag">
								<input type="file" class="form-control" id="fileDrag" multiple="">
							</div>
							<div class="form-group text-center">
								<a class="btn btn-main-primary pd-x-20 mg-t-10" href="login.html" role="button">ORDER NOW</a>
							</div>
						</form>	
					</div>
				</div>
									
										
							                </div>
								</form>

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

	