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
								<li class="breadcrumb-item active">Product</li>
									<li class="breadcrumb-item active" aria-current="page">New Product</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Product</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->product_id)){?>
              <form role="form" action="<?php echo base_url()?>products"  method="post" enctype="multipart/form-data" id="product">
				  <input type="hidden" name="productid" value="<?php echo $result->product_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>products"  method="post" enctype="multipart/form-data" id="product">
              <?php } ?>
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Category Name: <span class="tx-danger">*</span></label>
												<select  name="category" id="category" class="form-control">
													<?php
    $i = 0;
    foreach ($categories as $cat) {?>
													   
								<option value="<?php echo $cat->category_id?>" <?php if(isset($result->category))if($result->category==$cat->category_id) echo "selected";?>><?php echo $cat->category_name?></option>					
													
	<?php	
	}
													?>
												
													
                       
                        </select>
												<span class="tx-danger"><?php echo form_error('category'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				                      <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="product" placeholder="Enter Product Name" type="text" value="<?php echo $result->product_name?>">
												<span class="tx-danger"><?php echo form_error('product'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				                     <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product Name(Arabic): </label>
												<input class="form-control" name="product_arabic" placeholder="Enter Product Name" type="text" value="<?php echo $result->product_name_arabic?>">
												<span class="tx-danger"><?php echo form_error('product_arabic'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				  
				                      <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product Image: <span class="tx-danger">*</span></label>
												<input class="form-control" name="prdimage" placeholder="Enter Product Image" type="file" value="">
												<span class="tx-danger"><?php echo form_error('prdimage'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				                             <?php
              if(isset($result->product_id)){?>
				  
				                         <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<img src="<?php echo base_url()?>assets/uploads/products/<?php echo $result->product_image?>" width="100" height="auto">
									                </div>
								                </div>
								            </div>
				  
				                    <?php } ?>
				  
				                       <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Price: <span class="tx-danger">*</span></label>
												<input class="form-control" name="price" placeholder="Enter Price" type="text" value="<?php echo $result->price?>">
												<span class="tx-danger"><?php echo form_error('price'); ?></span>
									                </div>
								                </div>
								            </div>
	
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product Description: </label>
												<textarea   name="description"  class="form-control"><?php echo $result->description?></textarea>
												
									                </div>
								                </div>
								            </div>
				                       <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product Description(Arabic): </label>
												<textarea   name="description_arabic"  class="form-control"><?php echo $result->description_arabic?></textarea>
												
									                </div>
								                </div>
								            </div>
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
	                                     <select  name="status" id="status" class="form-control">
                        <option value="1" <?php if(isset($result->status))if($result->status=="1") echo "selected";?>>Active</option>
                        <option value="2" <?php if(isset($result->status))if($result->status=="2") echo "selected";?>>InActive</option>
                        </select>
												
											</div>
								           </div>
								        </div>	

										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"><?php if(isset($result->product_id)){?>&nbsp;&nbsp;Update&nbsp;&nbsp;<?php } else{?>Submit Form <?php } ?></button>  <a href="<?php echo base_url()?>products/product_list" role="button" class="btn btn-dark pd-x-20 mg-t-10">Cancel</a>                </div>
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

<script type="text/javascript">
    $(function ()
    {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>