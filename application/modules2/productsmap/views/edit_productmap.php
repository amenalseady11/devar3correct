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
									<li class="breadcrumb-item active" aria-current="page">Edit Productmap</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Products Attribute Map</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                
<?php
              if(isset($result->product_map_id)){?>
              <form role="form" action="<?php echo base_url()?>productsmap/updateattribute"  method="post" enctype="multipart/form-data" id="productmap">
				  <input type="hidden" name="productmapid" value="<?php echo $result->product_map_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>productsmap"  method="post" enctype="multipart/form-data" id="productmap">
              <?php } ?>
				  
	<?php 	
				  
			$dependable= json_decode($result->dependable_attributes);
				  $selectedattributearr=array();	            
	               foreach ($dependable as $k=>$v)
	                     {
                            $selectedattributearr[]=$v->id; // etc.
                         }  
				 
				  $depcount=count($selectedattributearr);
				  
				 $nondependable= json_decode($result->non_dependable_attributes);
				  $selectednonattributearr=array();	            
	               foreach ($nondependable as $k=>$v)
	                     {
                            $selectednonattributearr[]=$v->id; // etc.
                         }  
				  
				  //print_r($selectednonattributearr);
				 
				  $nondepcount=count($selectednonattributearr); 
				  
				  
				  
				  
				  ?>
				  
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
													   
								<option value="<?php echo $prd->product_id?>" <?php if(isset($result->product_id))if($result->product_id==$prd->product_id) echo "selected";?>><?php echo $prd->product_name?></option>					
													
	<?php	
	}
													?>
									</select>
												
												
												<span class="tx-danger"><?php echo form_error('product'); ?></span>
									                </div>
								                </div>
								            </div>

								            <div class="row ">
										<div class="col-12 col-lg-6">

											  <div class="row dynamic-field"  id="dynamic-field-1">
										<div class="col-12 col-lg-12">
													<div class="form-group mg-b-0">
									<label class="form-label">Dependable Attribute  </label>
														<select name="dependableattribute-1" class="form-control select-remove">
															<option disabled="" selected="">Select Attribute</option>
										<?php
    $i = 0;
    foreach ($dependattributes as $dat) {?>
													   
						<option value="<?php echo $dat->dependable_attribute_id?>|<?php echo $dat->dependable_attribute_name?>" <?php if(isset($selectedattributearr[0]))if($selectedattributearr[0]==$dat->dependable_attribute_id) echo "selected";?>><?php echo $dat->dependable_attribute_name?></option>					
													
	<?php	
	}
													?>
										
									</select>
														<span class="tx-danger"><?php echo form_error('dependableattribute-1'); ?></span>
									<!-- <div class="remove-select" id="remove-select"><i class="typcn typcn-delete"></i> </div> -->
									                </div>
												</div>
											</div>
								                </div>

								                <div class="col-12 col-lg-2 align-items-center">
											<div class="form-group mg-b-0 align-items-center">
												      <button type="button" id="add-button" class="btn btn-success float-left  ml-1"><i class="fas fa-plus fa-fw"></i> Add</button>
    <!--           <button type="button" id="remove-button" class="btn btn-danger float-left  ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button> -->
											</div>
</div>

								            </div>
				  
	<!-----edit mode of------------>
				  
				  <?php 
				  
				  for ($x = 1; $x < $depcount; $x++) {
				  
					  $m=$x+1;
				  ?>
 		  
				  
				   <div class="row ">
										<div class="col-12 col-lg-6">

											  <div class="row dynamic-field"  id="dynamic-field-<?php echo $m?>">
										<div class="col-12 col-lg-12">
													<div class="form-group mg-b-0">
									<label class="form-label">Dependable Attribute  </label>
														<select name="dependableattribute-<?php echo $m?>" class="form-control select-remove">
															<option disabled="" selected="">Select Attribute</option>
										<?php
    $i = 0;
    foreach ($dependattributes as $dat) {?>
													   
						<option value="<?php echo $dat->dependable_attribute_id?>|<?php echo $dat->dependable_attribute_name?>" <?php if(isset($selectedattributearr[$x]))if($selectedattributearr[$x]==$dat->dependable_attribute_id) echo "selected";?>><?php echo $dat->dependable_attribute_name?></option>					
													
	<?php	
	}
													?>
										
									</select>
													
									<div class="remove-select" id="remove-select"><i class="typcn typcn-delete"></i> </div> 
									                </div>
												</div>
											</div>
								                </div>

								                

								            </div>
				  
		<?php } ?>		  
				  
<!------ end of edit mode-------------------->				  
				  
				  
   <div class="row">
								                	<div class="col-12 col-lg-6">

								                			  <div class="row nonattribute-field"  id="nonattribute-field-1">
										<div class="col-12 col-lg-12">
											<div class="form-group mg-b-0">
												<label class="form-label">Non Dependable Attribute : </label>
														<select name="nondependableattribute-1" class="form-control select-remove" >
										<!--placeholder-->
										<option disabled="" selected="">Select Attribute</option>
											<?php
    $i = 0;
    foreach ($nondependattributes as $dat) {?>
													   
								<option value="<?php echo $dat->dependable_attribute_id?>|<?php echo $dat->dependable_attribute_name?>" <?php if(isset($selectednonattributearr[0]))if($selectednonattributearr[0]==$dat->dependable_attribute_id) echo "selected";?>><?php echo $dat->dependable_attribute_name?></option>					
													
	<?php	
	}
													?>
									</select>
												<span class="tx-danger"><?php echo form_error('nondependableattribute-1'); ?></span>

									                </div>
									            </div>
									        </div>
								                </div>
								                 <div class="col-12 col-lg-2 align-items-center">
											<div class="form-group mg-b-0 align-items-center">
												      <button type="button" id="add-button1" class="btn btn-success float-left  ml-1"><i class="fas fa-plus fa-fw"></i> Add</button>
            <!--   <button type="button" id="remove-button1" class="btn btn-danger float-left  ml-1" disabled="disabled"><i class="fas fa-minus fa-fw"></i> Remove</button> -->
											</div>
								
								                	 </div>
								            </div>

	<!------edit of non dependable attribute----------------------------------------->
				  
				   <?php 
				  
				  for ($k = 1; $k < $nondepcount; $k++) {
				  
					  $g=$k+1;
				  ?>
 		  
			
				  <div class="row">
								                	<div class="col-12 col-lg-6">

								                			  <div class="row nonattribute-field"  id="nonattribute-field-<?php echo $g?>">
										<div class="col-12 col-lg-12">
											<div class="form-group mg-b-0">
												<label class="form-label">Non Dependable Attribute : </label>
														<select name="nondependableattribute-<?php echo $g?>" class="form-control select-remove" >
										<!--placeholder-->
										<option disabled="" selected="">Select Attribute</option>
											<?php
    $i = 0;
    foreach ($nondependattributes as $dat) {?>
													   
								<option value="<?php echo $dat->dependable_attribute_id?>|<?php echo $dat->dependable_attribute_name?>" <?php if(isset($selectednonattributearr[$k]))if($selectednonattributearr[$k]==$dat->dependable_attribute_id) echo "selected";?>><?php echo $dat->dependable_attribute_name?></option>					
													
	<?php	
	}
													?>
									</select>
												<div class="remove-select" id="remove-select"><i class="typcn typcn-delete"></i> </div>
												<span class="tx-danger"><?php echo form_error('nondependableattribute-1'); ?></span>

									                </div>
									            </div>
									        </div>
								                </div>
								                 
								            </div>

								            
	<?php } ?>			  
				  
   <!--------end of non dependable attribute---------------------------------->
				  
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
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit" id="submit">Update Form</button>                </div>
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
			$(document).ready(function() {
  var buttonAdd = $("#add-button");

  var className = ".dynamic-field";
  var count = 0;
  var field = "";
  var maxFields = 50;

  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#dynamic-field-1").clone();
    field.attr("id", "dynamic-field-" + count);
    field.children("label").text("Field " + count);
    // field.find("select").val("");
    field.find("select[name='dependableattribute-1']").attr("name", "dependableattribute-" + count);
     field.find("select.select-remove").after("<div class='remove-select' id='remove-select'><i class='typcn typcn-delete'></i> </div>");
    $(className + ":last").after($(field));
  }

  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  // function disableButtonRemove() {
  //   if (totalFields() === 1) {
  //     buttonRemove.attr("disabled", "disabled");
  //     buttonRemove.removeClass("shadow-sm");
  //   }
  // }

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });


							    $("body").on("click", ".remove-select", function () {
 $(this).closest("div.dynamic-field").remove();
    });
});
		</script>


				<script type="text/javascript">
			$(document).ready(function() {
  var buttonAdd = $("#add-button1");

  var className = ".nonattribute-field";
  var count = 0;
  var field = "";
  var maxFields = 50;

  function totalFields() {
    return $(className).length;
  }

  function addNewField() {
    count = totalFields() + 1;
    field = $("#nonattribute-field-1").clone();
    field.attr("id", "nonattribute-field-" + count);
    field.children("label").text("Field " + count);
    // field.find("select").val("");
    field.find("select[name='nondependableattribute-1']").attr("name", "nondependableattribute-" + count);
     field.find("select.select-remove").after("<div class='remove-select1' id='remove-select1'><i class='typcn typcn-delete'></i> </div>");
    $(className + ":last").after($(field));
  }


  function enableButtonRemove() {
    if (totalFields() === 2) {
      buttonRemove.removeAttr("disabled");
      buttonRemove.addClass("shadow-sm");
    }
  }

  

  function disableButtonAdd() {
    if (totalFields() === maxFields) {
      buttonAdd.attr("disabled", "disabled");
      buttonAdd.removeClass("shadow-sm");
    }
  }

  function enableButtonAdd() {
    if (totalFields() === (maxFields - 1)) {
      buttonAdd.removeAttr("disabled");
      buttonAdd.addClass("shadow-sm");
    }
  }

  buttonAdd.click(function() {
    addNewField();
    enableButtonRemove();
    disableButtonAdd();
  });
				
$("#submit").click(function() {
	
	
	var attr=new Array();
	
	for(var i = 1; i < 10; i++) {
		
		var dep="dependableattribute-"+i;
		
		
		var nondep="nondependableattribute-"+i;
		
	
		var bb = $("select[name='"+dep+"']");
		
		var cc = $("select[name='"+nondep+"']");
		
		
		
		//alert(bb.val());
		
		if (typeof(bb.val()) === "undefined") {
			   
			
		}
		else
			{
				attr.push(bb.val());
			}
		
		if (typeof(cc.val()) === "undefined") {
			   
			
		}
		else
			{
				attr.push(cc.val());
			}
		
		
		
}
	
	
	
	
var memberArrData = attr.sort(); 
	
var reportCheckDuplicate = [];
for (var i = 0; i < memberArrData.length - 1; i++) {
    if (memberArrData[i + 1] == memberArrData[i]) {
        alert("duplicate value");
		return false;
    }
}
	return true;
    
  });



$("body").on("click", ".remove-select1", function () {
 $(this).closest("div.nonattribute-field").remove();
    });
});
		</script>

<script type="text/javascript">


    $(document).ready(function() {
        $('select[name="product"]').on('change', function() {
            var productid = $(this).val();
			
			//alert(productid);
            
                           $.ajax({  
                    url: "<?php echo base_url(); ?>productsmap/checkproduct/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                    data: "product="+productid, //The variables which are going.
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						//alert(data);
						if(data=="notok"){
							alert("product map already exists");
							$('select[name="product"]').val('0');
						return false;
						}
                       
                    }
                })        });
    });
</script>

			<!-- /main-content -->
