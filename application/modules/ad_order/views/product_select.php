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
									<li class="breadcrumb-item active" aria-current="page">Product</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Product(New order)</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
						
					                </div>

					<div class="card-body">                
               <form role="form" action="<?php echo base_url()?>ad_order/product_select"  method="post" enctype="multipart/form-data" id="orgproducts">
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product: <span class="tx-danger">*</span></label>
									<select name="product" class="form-control" id="product">
										<!--placeholder-->
										<option value="">Select Product</option>
										<?php
    $i = 0;
    foreach ($products as $prd) {?>
													   
								<option value="<?php echo $prd->product_id?>" <?php if(isset($result->product_id))if($result->product_id==$prd->product_id) echo "selected";?>><?php echo $prd->product_name?></option>					
													
	<?php	
	}
													?>
									</select> </div>
								                </div>
								     </div>

				  

								         
								              
								             
								           
								              
								                 
										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit" id="newproduct">Create Order</button>         


									  </div>
							              </div>
								</form>
</div>
</div>
				
				                </div>
			                </div>
					<!--/div-->
					
					
				
<script type="text/javascript">
	
	 $("#newproduct").click(function(){
		
	 	if($("#product").val()=="")
			{
				
			alert("Please select Product");
				return false;
			}
	});


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