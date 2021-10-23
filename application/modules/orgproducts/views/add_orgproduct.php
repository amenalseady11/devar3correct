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
									<h3 class="card-title mg-b-2 mt-2"> New Products</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
						
					                </div>

					<div class="card-body">                
               <form role="form" action="<?php echo base_url()?>orgproducts"  method="post" enctype="multipart/form-data" id="orgproducts">
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Product: <span class="tx-danger">*</span></label>
									<select name="product" class="form-control" required="">
										<!--placeholder-->
										<option value="0" disabled="" selected="">Select Product</option>
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

				   <div id="dependid"></div>

								         
								              
								             <div class="row ">
										<div class="col-12 col-lg-6">
								            <hr>
								        </div>
								    </div>
				   
				     <div class="row ">
										<div class="col-12 col-lg-6">
											<label class="form-label">Type Price :</label>
								           <select name="type" id="type" class="form-control" required="">
										<!--placeholder-->
										<option value="0">Per Price</option>
											   <option value="1">Batch price</option>
											</select>
								        </div>
								    </div>

								            <div class="row" id="second">
										<div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label">Quantity :</label>
														<input class="form-control" name="quantity" placeholder="" type="text"  >
									                </div>
								                </div>
								                <div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label">Per Price :</label>
														<input class="form-control" name="per_price" placeholder="Enter Price" type="text"  >
									                </div>
								                </div>
								            </div>
				   
				   

                                         <div class="row">
										<div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label">Minimum Quantity :</label>
														<input class="form-control" name="min_quantity" placeholder="" type="text"  >
									                </div>
								                </div>
								                <div class="col-12 col-lg-3">
											<div class="form-group mg-b-0">
												<label class="form-label">Price :</label>
														<input class="form-control" name="quantity_price" placeholder="Enter Per Price" type="text"  >
									                </div>
								                </div>
											 
											 <div class="col-12 col-lg-2 align-items-center">
											<div class="form-group mg-b-0 align-items-center">
												      <button type="button" id="add-button" class="btn btn-success float-left  ml-1" style="display:none"><i class="fas fa-plus fa-fw"></i> Add</button>
    <!--           <button type="button" id="remove-button" class="btn btn-danger float-left  ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button> -->
											</div>
</div>

								            </div>
				   
				                       <div class="input_fields_wrap">

</div>

								           
								              
								                 
										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit">ADD</button>      <a href="<?php echo base_url()?>orgproducts/orgproduct_list" role="button" class="btn btn-dark pd-x-20 mg-t-10">Cancel</a>    


									  </div>
							              </div>
								</form>
</div>
</div>
				
				                </div>
			                </div>
					<!--/div-->
	<script type="text/javascript">
					
		
					
					
					</script>				
					
				
<script type="text/javascript">


    $(document).ready(function() {
		
		
	
		
		var max_fields      = 10;
var wrapper         = $(".input_fields_wrap"); 
var add_button      = $("#add-button");
//var remove_button   = $(".remove_field_button");

$(add_button).click(function(e){
    e.preventDefault();
	var $this = $(this);
    var total_fields = wrapper[0].childNodes.length;
    if(total_fields < max_fields){
        $(wrapper).append('<div class="row" id="re' + total_fields + '"><div class="col-12 col-lg-3"><div class="form-group mg-b-0">'+
	'<label class="form-label">Quantity :</label><input class="form-control" name="qua[]" placeholder="" type="text">'+
	'</div></div>'+								                
		'<div class="col-12 col-lg-3"><div class="form-group mg-b-0"><label class="form-label">Price :</label>'+
'<input class="form-control" name="quaprice[]" placeholder="Enter Price" type="text"></div></div>'+
'<div class=""><button type="button" id="remove-button' + total_fields + '" class="btn btn-danger float-left  ml-1"' +
	'style="margin-top:40px;">'+
	'<i class="fas fa-minus fa-fw"></i>Remove</button></div></div>');
		$("#remove-button" + total_fields).on("click", function() {
			//alert("kkkksss");
           $("#re" + total_fields).remove();
        });
    }
});
		
		
	 $("#type").on('change', function() {
            var typeid = $("#type").val();
		 
		 if(typeid=="1")
			 {
				 
				$("#second").hide(); 
				 $(".input_fields_wrap").show();
				 $("#add-button").show(); 
				 
			 }
		  if(typeid=="0")
			 {
				 
				$("#second").show(); 
				 
				 $(".input_fields_wrap").hide(); 
				 
				 $("#add-button").hide(); 
				 
				 
				 
			 }
			
		
    });	
		
		
		 
		
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