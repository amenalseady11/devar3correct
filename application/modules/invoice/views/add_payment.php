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
								<li class="breadcrumb-item active">Payment</li>
									<li class="breadcrumb-item active" aria-current="page">New Payment</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Payment</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->payment_id)){?>
              <form role="form" action="<?php echo base_url()?>invoice/add_payment"  method="post" enctype="multipart/form-data" id="payment">
				  <input type="hidden" name="paymentid" value="<?php echo $result->payment_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>invoice/add_payment"  method="post" enctype="multipart/form-data" id="invoice/add_payment">
              <?php } ?>
				  <input type="hidden" name="invoiceid" value="<?php echo $invoiceid?>">
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Payment: <span class="tx-danger">*</span></label>
												<input class="form-control" name="payment" placeholder="Enter payment " type="text" value="<?php echo $balance?>" required>
												<span class="tx-danger"><?php echo form_error('payment'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				  
				                  
	                                 
				                       
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
	                                     <select  name="method" id="method" class="form-control" required>
											  <option value="" >Select Method</option>
                        <option value="1" <?php if(isset($result->invoice_payment_method))if($result->invoice_payment_method=="1") echo "selected";?>>Cash</option>
                        <option value="2" <?php if(isset($result->invoice_payment_method))if($result->invoice_payment_method=="2") echo "selected";?>>Check</option>
											 <option value="3" <?php if(isset($result->invoice_payment_method))if($result->invoice_payment_method=="3") echo "selected";?>>Bank Transfer</option>
                        </select>
												
											</div>
								           </div>
								        </div>
				  
				  
				        <!-- <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
	                                     <select  name="status" id="status" class="form-control" required>
											  <option value="" >Select Payment Status</option>
                        <option value="1" <?php if(isset($result->invoice_payment_status))if($result->invoice_payment_status=="1") echo "selected";?>>Incomplete</option>
                        <option value="2" <?php if(isset($result->invoice_payment_status))if($result->invoice_payment_status=="2") echo "selected";?>>Completed</option>
											 <option value="3" <?php if(isset($result->invoice_payment_status))if($result->invoice_payment_status=="3") echo "selected";?>>Pending</option>
											 
											  <option value="4" <?php if(isset($result->invoice_payment_status))if($result->invoice_payment_status=="4") echo "selected";?>>Failed</option>
                        </select>
												
											</div>
								           </div>
								        </div>-->	
				  
				             <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
	                                     <select  name="collect" id="collect" class="form-control">
											  <option value="0" >Collected By</option>
											 <?php foreach ($employees as $emp){?>
											 
											 <option value="<?php echo $emp['employee_id']?>" ><?php echo $emp['employee_name']?></option>
											 <?php
	
	
}
											 
											 ?>
														   
                       
                        </select>
												
											</div>
								           </div>
								        </div>
				  
                           <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Payment details: <span class="tx-danger">*</span></label>
												<textarea name="payment_details" id="" class="form-control"></textarea>
												<span class="tx-danger"><?php echo form_error('payment'); ?></span>
									                </div>
								                </div>
								            </div>
				  
				             <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Receipt Notes: <span class="tx-danger">*</span></label>
												<textarea name="receipt_details" id="" class="form-control"></textarea>
												<span class="tx-danger"><?php echo form_error('payment'); ?></span>
									                </div>
								                </div>
								            </div>
				  


										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"><?php if(isset($result->payment_id)){?>Update<?php } else{?>Add Payment <?php } ?></button>                </div>
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