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
								<li class="breadcrumb-item active">Departments</li>
									<li class="breadcrumb-item active" aria-current="page">Page Access</li>
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
									<h3 class="card-title mg-b-2 mt-2"> Page Access</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->department_id)){?>
              <form role="form" action="<?php echo base_url()?>departments"  method="post" enctype="multipart/form-data" id="department" name="deyar_form">
				  <input type="hidden" name="departmentid" value="<?php echo $result->department_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>pageaccess"  method="post" enctype="multipart/form-data" id="department" name="deyar_form">
              <?php } ?>
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Group Name: <span class="tx-danger">*</span></label>
												<select  name="designation" id="designation" class="form-control">
												<option value="">select designation</option>
												<?php foreach ($designations as $de){?>

													<option value="<?php echo $de['designation_id']?>" ><?php echo $de['designation_name']?></option>
												
													
                        
                       
						<?php } ?>
                        </select>
									                </div>
								                </div>
								            </div>
				  
				  
				                  
	                                   <div class="row ">
										<div class="col-12 col-lg-12">
											
											<div id="pagedetails"></div>
											
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
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit"><?php if(isset($result->department_id)){?>Update<?php } else{?>Submit Form <?php } ?></button>                </div>
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
   /*
  $(document).on("click", "INPUT[id^=view_]", function (event) {
   var targetId = event.target.id;

   if ($("#" + targetId + ":checked").length > 0) {
      alert('checked');
   }
   else {
      alert('unchecked');
   }
});
*/

$(document).on('change', '[type=checkbox]', function (e) {
//alert('clicked');
var currentId = $(this).attr('id');
    //alert(currentId);
	var res = currentId.split("_");
	/*
	if(res[0]=="view")
	{


		

		if ($("#" +"edit" + "_" + res[1] +":checked").length > 0) {
      
	 alert("jjjj");

	 if ($("#view_"+res[1]+":checked").val() !== undefined)
{
    //Checked
	alert("kkkk");
	
}
else
{
    //Not checked
	alert("ccccccccc");
	$('#view_'+res[1]).attr('checked', true);
}
	

	
	 
	

	}
	else{

       alert("mmmmmm");

	}

	}

	*/
	

	if(res[0]=="edit" || res[0]=="add" || res[0]=="delete")
	{

		if ($("#" +res[0] + "_" + res[1] +":checked").length > 0) {
     // alert('checked');
	  $('#view_'+res[1]).attr('checked', true);
   }
   else {
     // alert('unchecked');
	  var m="0";
	  if ($("#edit_"+res[1]+":checked").length > 0)
	  {



        m=m+1;
	  }
	  if ($("#add_"+res[1]+":checked").length > 0)
	  {



        m=m+1;
	  }
	  if ($("#delete_"+res[1]+":checked").length > 0)
	  {



        m=m+1;
	  }
	 if(m=="0")
	 {

		$('#view_'+res[1]).attr('checked', false);
	 }
	 else{
		 //alert("bbbbbb");

		$('#view_'+res[1]).attr('checked', true);
	 }
	 
	  /*
      var i="0";
	  if ($("#edit_"+res[1]":checked").length > 0)
	  {



        i=i+1;
	  }
	  if ($("#delete_"+res[1]":checked").length > 0)
	  {

		i=i+1; 
	  }

	  if ($("#add_"+res[1]":checked").length > 0)
	  {

		i=i+1; 
	  }

	  if(i=="0")
	  {
		$('#view_'+res[1]).attr('checked', false);

	  }

	  */
	  
	  
   }
	

		//alert("hhhhh");

	

	}
	
});
</script>