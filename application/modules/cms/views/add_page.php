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
								<li class="breadcrumb-item active">Category</li>
									<li class="breadcrumb-item active" aria-current="page">New Category</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Page</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->page_id)){?>
              <form role="form" action="<?php echo base_url()?>cms"  method="post" enctype="multipart/form-data" id="category">
				  <input type="hidden" name="pageid" value="<?php echo $result->page_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>cms"  method="post" enctype="multipart/form-data" id="category">
              <?php } ?>
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Page Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="pagename" placeholder="Enter Page Name" type="text" value="<?php echo $result->page_name?>">
												<span class="tx-danger"><?php echo form_error('pagename'); ?></span>
									                </div>
								                </div>
								            </div>


											<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Page Name(Arabic): <span class="tx-danger">*</span></label>
												<input class="form-control" name="pagename_arabic" placeholder="Enter Page Name" type="text" value="<?php echo $result->page_name_arabic?>">
												
									                </div>
								                </div>
								            </div>
				  
				  
				                    <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Page Link:</label>
												<input class="form-control" name="page_link" placeholder="Enter Page Link" type="text" value="<?php echo $result->page_link?>">
												<span class="tx-danger"><?php echo form_error('page_link'); ?></span>
									                </div>
								                </div>
								            </div>
	
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Content: </label>
												<textarea  name="description"  class="form-control" id="editor1"><?php echo $result->description?></textarea>
												
									                </div>
								                </div>
								            </div>
				  
				                         <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Content(Arabic): </label>
												<textarea  name="description_arabic"  class="form-control" id="editor2"><?php echo $result->description_arabic?></textarea>
												
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
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"><?php if(isset($result->page_id)){?>Update<?php } else{?>Submit Form <?php } ?></button>         <a href="<?php echo base_url()?>cms/page_list" role="button" class="btn btn-dark pd-x-20 mg-t-10">Cancel</a>           </div>
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
		CKEDITOR.replace('editor2');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>