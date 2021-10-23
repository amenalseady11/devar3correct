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
								<li class="breadcrumb-item active">Designation</li>
									<li class="breadcrumb-item active" aria-current="page">New Designation</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Designation</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->designation_id)){?>
              <form role="form" action="<?php echo base_url()?>designation"  method="post" enctype="multipart/form-data" id="designation">
				  <input type="hidden" name="designationid" value="<?php echo $result->designation_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>designation"  method="post" enctype="multipart/form-data" id="designation">
              <?php } ?>
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Department Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="designation" placeholder="Enter Designation Name" type="text" value="<?php echo $result->designation_name?>">
												<span class="tx-danger"><?php echo form_error('designation'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				  
				                  
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Designation Description: </label>
												<textarea  name="description"  class="form-control"><?php echo $result->designation_description?></textarea>
												
									                </div>
								                </div>
								            </div>
				  
				                       
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
	                                     <select  name="status" id="status" class="form-control">
                        <option value="1" <?php if(isset($result->designation_status))if($result->designation_status=="1") echo "selected";?>>Active</option>
                        <option value="2" <?php if(isset($result->designation_status))if($result->designation_status=="2") echo "selected";?>>InActive</option>
                        </select>
												
											</div>
								           </div>
								        </div>	

										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"><?php if(isset($result->designation_id)){?>Update<?php } else{?>Submit <?php } ?></button>       <a href="<?php echo base_url()?>designation/designation_list" role="button" class="btn btn-dark pd-x-20 mg-t-10">Cancel</a>             </div>
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