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
									<li class="breadcrumb-item active" aria-current="page">New Products</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Edit Products</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
						
					                </div>

					<div class="card-body">                
               <form role="form" action="<?php echo base_url()?>orgproducts/updatedependable"  method="post" enctype="multipart/form-data" id="orgproducts">
				   <input type="hidden" name="dependid" value="<?php echo $depresult->dependable_id?>">
				   <input type="hidden" name="product" value="<?php echo $depresult->product_id?>">
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product: <span class="tx-danger">*</span></label>
									<select name="product" class="form-control" required="" disabled>
										<!--placeholder-->
										<option value="0" disabled="" selected="">Select Product</option>
										<?php
    $i = 0;
    foreach ($products as $prd) {?>
													   
								<option value="<?php echo $prd->product_id?>" <?php if(isset($depresult->product_id))if($depresult->product_id==$prd->product_id) echo "selected";?>><?php echo $prd->product_name?></option>					
													
	<?php	
	}
													?>
									</select> </div>
								                </div>
								     </div>
				   
				   <?php $dependable= json_decode($depresult->dependable_values);
		  $nondependable= json_decode($depresult->non_dependable_values);
				   
				   ?>
			<?php	   
		 foreach ($dependable as $k=>$v)
	                     {
                            
					   ?>

				    <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
									<label class="form-label"><?php echo $v->name;?> :</label>
								<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>" placeholder="Enter <?php echo $v->name;?>" type="text" value="<?php echo $v->value;?>" >
									                </div>
								                </div>
								            </div>
				   
				  <!-- <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
									<label class="form-label"><?php echo $v->name;?> Image:</label>
								<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>_image" placeholder="Enter <?php echo $v->name;?>" type="file" >
									                </div>
								                </div>
								            </div>-->
				   
				   
				   <?php } ?>
				   
				   <div class="row ">
										<div class="col-12 col-lg-6">
								            <hr>
								        </div>
								    </div>

								    
<br>
				                   

				<?php	   
		 foreach ($nondependable as $k=>$v)
	                     {
                            
					   ?>
				   
				    <div class="row ">
										<div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label"><?php echo $v->name;?>  :</label>
														<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>" placeholder="<?php echo $v->name;?> " type="text" value="<?php echo $v->value;?>" >
									                </div>
								                </div>
								                <div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label">Price :</label>
														<input class="form-control" name="<?php echo str_replace(" ","",$v->name);?>_price" placeholder="Enter Price" type="text"value="<?php echo $v->price;?>" >
									                </div>
								                </div>
								            </div>
				   
				   
				   
				   <?php } ?>
				   
				   
				   
								              
								             <div class="row ">
										<div class="col-12 col-lg-6">
								            <hr>
								        </div>
								    </div>

								           

								           
								              
								                 
										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">&nbsp;&nbsp;&nbsp;UPDATE&nbsp;&nbsp;&nbsp;</button>         


									  </div>
							              </div>
								</form>
</div>
</div>
				
				                </div>
			                </div>
					<!--/div-->
					
					
					
<!-- Scroll with content modal -->
		<div class="modal" id="scrollmodal">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">View More Details</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			                </div>
					<div class="modal-body">
<?php						
			 foreach ($result as $dep) {		
		$i=$i+1;	
		
		    $dependable= json_decode($dep->dependable_values);
				 
				 $nondependable= json_decode($dep->non_dependable_values);
				 
			 }
		
		 foreach ($dependable as $k=>$v)
	                     {	?>		
						<p><?php echo $v->name?> : <?php echo $v->value;?> </p>
		 
		<?php				
		 }
				 
				 ?>
						<hr>
				<?php		
						 foreach ($nondependable as $k=>$v)
	                     {	?>		
						<p><?php echo $v->name?> : <?php echo $v->value;?> </p>
		 
		<?php				
		 }
				 
			 ?>
						
			                </div>
					<div class="modal-footer">
						<!-- <button class="btn ripple btn-primary" type="button">Save changes</button> -->
						<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
			                </div>
		                </div>
	                </div>
                </div>
		<!--End Scroll with content modal -->


<script type="text/javascript">


    $(document).ready(function() {
        $('select[name="product"]').on('change', function() {
            var productid = $(this).val();
			
			//alert(productid);
            
                           $.ajax({  
                    url: "<?php echo base_url(); ?>orgproducts/orgdependable/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: "product="+productid, //The variables which are going.
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						$('#dependid').html(data);
                    }
                })        });
    });
</script>