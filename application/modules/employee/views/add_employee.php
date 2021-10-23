<!-- main-content opened -->
<?php
 $user = $this->ion_auth->user()->row();
 $adminid=$user->id;
$type=$user->type;	
?>
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
								<li class="breadcrumb-item active">employee</li>
									<li class="breadcrumb-item active" aria-current="page">New employee</li>
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
									<h3 class="card-title mg-b-2 mt-2">  employee</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->id)){?>
              <form role="form" action="<?php echo base_url()?>employee"  method="post" enctype="multipart/form-data" id="employee" onsubmit="return validate()">
				  <input type="hidden" name="employeeid" value="<?php echo $result->id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>employee"  method="post" enctype="multipart/form-data" id="employee" onsubmit="return validate()">
              <?php } ?>
			  <div class="row">
        <div class="col-md-10 mx-auto">
            <form>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label for="inputFirstname">Employee Name</label>
                        <input class="form-control" name="employee" placeholder="Enter employee Name" type="text" value="<?php echo $result->fullname?>" required>
												<span class="tx-danger"><?php echo form_error('employee'); ?></span>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputLastname">Email</label>
                        <input class="form-control" name="email" placeholder="Enter Email" type="email" value="<?php echo $result->email?>" required>
												<span class="tx-danger"><?php echo form_error('email'); ?></span>
                    </div>
                </div>
                <div class="form-group row">
				<div class="col-sm-6">
                        <label for="inputPostalCode">Department</label>
						<select  name="department" id="department" class="form-control">
						<option value="">Select Department</option>
						<?php
						
                        foreach ($departments as $dept) {?>
													   
													   <option value="<?php echo $dept->department_id?>" <?php if(isset($result->department_id))if($result->department_id==$dept->department_id) echo "selected";?>><?php echo $dept->department_name?></option>					
																		   
						   <?php	
						   }
						   ?>
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="inputAddressLine2">Employee Description</label>
                        <textarea  name="description"  class="form-control"><?php echo $result->description?></textarea>
												
                    </div>
                </div>
                <div class="form-group row">
				<div class="col-sm-6">
                        <label for="inputState">Designation</label>
						<select  name="designation" id="designation" class="form-control">
						<option value="">Select Designation</option>
                        <?php
                        foreach ($designation as $des) {?>
													   
					 <option value="<?php echo $des->designation_id?>" <?php if(isset($result->designation_id))if($result->designation_id==$des->designation_id) echo "selected";?>><?php echo $des->designation_name?></option>					
																		   
						   <?php	
						   }
						   ?>
                        </select>
                    </div>
                    
					<div class="col-sm-6">
                        <label for="inputContactNumber">Status</label>
                        <select  name="status" id="status" class="form-control">
                        <option value="1" <?php if(isset($result->active))if($result->active=="1") echo "selected";?>>Active</option>
                        <option value="0" <?php if(isset($result->active))if($result->active=="0") echo "selected";?>>InActive</option>
                        </select>
                    </div>
                    
                
                    
                </div>
                
				
                   

				<div class="form-group row">
				<?php if($result->id=="" || $type=="Admin") {
	
	?>
                    <div class="col-sm-6">
                        <label for="inputAddressLine1">Password</label>
                        <input class="form-control" name="password" id="password" placeholder="Enter Password" type="password" value="" required>
												<span class="tx-danger"><?php echo form_error('password'); ?></span>
                    </div>

					<div class="col-sm-6">
                        <label for="inputCity">Confirm Password</label>
                        <input class="form-control" name="conpassword" id="conpassword" placeholder="Enter Confirm Password" type="password" value="" required>
												<span class="tx-danger"><?php echo form_error('conpassword'); ?></span>
                    </div>
					<?php } ?>
                    
                </div>
				
				<div class="form-group row">
					<div class="col-sm-6">
                        <label for="inputContactNumber">Type</label>
                        <select  name="type" id="type" class="form-control">
                        <option value="General" <?php if(isset($result->type))if($result->type=="General") echo "selected";?>>General</option>
                        <option value="Admin" <?php if(isset($result->type))if($result->type=="Admin") echo "selected";?>>Admin</option>
                        </select>
                    </div>
				</div>
				
				
                <button type="submit" class="btn btn-primary px-4 float-right">Save</button>
            </form>
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

<script type="text/javascript">
function validate()
{

	var password = $("#password").val()
         var password1 = $("#conpassword").val()
        
            if (password == password1) {
                
             }
             else {
                 alert('Confirm Password not equal');
				 return false;
             }

        


}
    $(function ()
    {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
        //bootstrap WYSIHTML5 - text editor
        //$(".textarea").wysihtml5();
    });
</script>