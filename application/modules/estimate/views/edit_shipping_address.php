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
									<li class="breadcrumb-item active" aria-current="page">Edit Order Shipping Address</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Order Shipping Address</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	
              
              <form role="form" action="<?php echo base_url()?>estimate/shipping_update"  method="post" enctype="multipart/form-data" id="product">
				  <input type="hidden" name="shipid" id="shipid" value="<?php echo $editaddress['id']?>">

             
									<div class="row">
               <div class="col-md-9">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"  value="<?php echo $editaddress['first_name']?>">
				   <span class="text-danger"><?php echo form_error('firstname'); ?></span>
  </div>
  <div class="col-md-9 mar-b">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name"  value="<?php echo $editaddress['last_name']?>">
	  <span class="text-danger"><?php echo form_error('lastname'); ?></span>
  </div>
      </div>
							  <div class="row">
  <div class="col-md-9 mar-b">
    <label for="inputEmail4" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone" value="<?php echo $editaddress['phone_number']?>">
  </div>
							  </div>
      <div class="row">
               <div class="col-md-9">
    <label for="fname" class="form-label">Street Address</label>
    <input type="text" class="form-control" id="streetaddress" name="streetaddress" placeholder="Address"  value="<?php echo $editaddress['address']?>">
				   <span class="text-danger"><?php echo form_error('streetaddress'); ?></span>
  </div>
  
      </div>
            <div class="row">
  <div class="col-md-9 mar-b">
    
	   <label for="phone" class="form-label">Country</label>
   <!-- <input type="text" class="form-control" id="country" name="country" placeholder="Enter Your country" value="<?php echo $editaddress['country_code']?>">-->
	   <select class="form-control first_null not_chosen" name="country" id="country" > 
                                   <option value="">Select an option...</option>
								   <?php foreach ($countries as $co){?>
                                   <option value="<?php echo $co['country_code']?>" <?php if($editaddress['country_code']==$co['country_code']){ echo "selected";}?>><?php echo $co['country_name']?></option>
                                   <?php } ?>
                                  
                                   
                               </select>
	  <span class="text-danger"><?php echo form_error('country'); ?></span>
  </div>
  <div class="col-md-9 mar-b">
    <label for="phone" class="form-label">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Enter Your State" value="<?php echo $editaddress['state']?>">
	  <span class="text-danger"><?php echo form_error('state'); ?></span>
  </div>
  </div>
  
							  <div class="row">
 
  <div class="col-md-9 mar-b">
   <label for="inputEmail4" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Enter Your City"  value="<?php echo $editaddress['city']?>">
	  <span class="text-danger"><?php echo form_error('city'); ?></span>
  </div>
								   <div class="col-md-9 mar-b">
    <label for="inputEmail4" class="form-label">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Your Zip"  value="<?php echo $editaddress['zip_code']?>">
	  <span class="text-danger"><?php echo form_error('zip'); ?></span>
  </div>
  </div>
	
  <div class="row">
     <div class="col-12">
      <br>
    <button type="submit" class="btn btn-primary pink_color">Update</button>      
  </div>
  </div>
</form>
                       </div>
                    </div>
                  </div>
               </div>
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