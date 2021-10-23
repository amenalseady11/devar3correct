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
								<li class="breadcrumb-item active">Group</li>
									<li class="breadcrumb-item active" aria-current="page">New Group</li>
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
									<h3 class="card-title mg-b-2 mt-2">  Group</h3>
									<i class="mdi mdi-dots-horizontal text-gray"></i>
						             </div>
							<!-- <div class="btn_right">
								<a href="#" class="btn btn-outline-success btn-block"> View All</a>
							</div> -->
					                </div>

					<div class="card-body">                

	<?php
              if(isset($result->group_id)){?>
              <form role="form" action="<?php echo base_url()?>groups"  method="post" enctype="multipart/form-data" id="group">
				  <input type="hidden" name="groupid" value="<?php echo $result->group_id?>">

              <?php } else{?>
              <form role="form" action="<?php echo base_url()?>groups"  method="post" enctype="multipart/form-data" id="group">
              <?php } ?>
									<div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Group Name: <span class="tx-danger">*</span></label>
												<input class="form-control" name="group" placeholder="Enter Group Name" type="text" value="<?php echo $result->group_name?>">
												<span class="tx-danger"><?php echo form_error('group'); ?></span>
									                </div>
								                </div>
								            </div>

											<div class="row ">
										<div class="col-4 col-lg-4">
											<div class="form-group mg-b-0">
												<label class="form-label">Filter </label>
												<input class="form-control" name="emp" id="emp" placeholder="" type="text" value="">												
									                </div>
								                </div>

												<div class="col-4 col-lg-4">
											<div class="form-group mg-b-0">
												<label class="form-label">Filter </label>
												<input class="form-control" name="empselected" placeholder="" type="text" value="">	
												
									                </div>
								                </div>


								            </div>
				  
									<div class="row ">
										<div class="col-4 col-lg-4">
											<div class="form-group mg-b-0">
												<label class="form-label">User List: </label>
												<select class="form-select" multiple aria-label="multiple select example" style="height:200px;width:200px;" id="userlist">
  
  <?php foreach ($employees as $emp){
	?>
													<option value="<?php echo $emp->id?>"><?php echo $emp->fullname;?></option>
	
	<?php
}
													?>
</select>
												
									                </div>
								                </div>

												

												<div class="col-4 col-lg-4">
											<div class="form-group mg-b-0">
												<label class="form-label">Selected Users: </label>
												<select class="form-select1" multiple aria-label="multiple select example" style="height:200px;width:200px;" id="selectedlist" name="selectedlist[]" required>
  <?php foreach ($selectedmembers as $me){
	?>
													<option value="<?php echo $me->id?>"><?php echo $me->fullname;?></option>
	
	<?php
}
 ?>
</select>
												
									                </div>
								                </div>
								            </div>



											<div class="row ">
										<div class="col-4 col-lg-4" style="margin-left:90px">
											<div class="form-group mg-b-0">
											<button name="right" id="right">></button>
												
									                </div>
								                </div>

												

												<div class="col-4 col-lg-4">
											<div class="form-group mg-b-0">
												<button name="left" id="left"><</button>
												
												
									                </div>
								                </div>
								            </div>
				                  






				                  
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
												<label class="form-label">Group Description: </label>
												<textarea  name="description"  class="form-control"><?php echo $result->description?></textarea>
												
									                </div>
								                </div>
								            </div>
				  
				                       
	                                   <div class="row ">
										<div class="col-12 col-lg-6">
											<div class="form-group mg-b-0">
	                                     <select  name="status" id="status" class="form-control">
                        <option value="1" <?php if(isset($result->group_status))if($result->group_status=="1") echo "selected";?>>Active</option>
                        <option value="2" <?php if(isset($result->group_status))if($result->group_status=="2") echo "selected";?>>InActive</option>
                        </select>
												
											</div>
								           </div>
								        </div>	

										<div class="col-12 col-lg-6 text-right">
											<br>
											<button class="btn btn-main-primary pd-x-20 mg-t-10" type="submit" onclick="selectAll();"><?php if(isset($result->group_id)){?>Update<?php } else{?>Submit Form <?php } ?></button> 
											<a href="<?php echo base_url()?>groups/group_list" role="button" class="btn btn-dark pd-x-20 mg-t-10">Cancel</a>    </div>
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

$(function(){
	/*
    $("#right").on("click", function(){
		alert("kkkkk");
        $(".form-select option:selected").each(function(){
           $("#userlist").append('<option>'+$(this).text()+'</option>'); 
            $('option:selected', "#userlist").remove();
        });  
    });  
    $("#left").on("click", function(){
        $(".form-select1 option:selected").each(function(){
           $("#selectedlist").append('<option>'+$(this).text()+'</option>'); 
            $('option:selected', "#selectedlist").remove();
        });  
    });  
	
	*/

	$(document).on('keyup', '#emp', function (event) {
				 
			//alert("ggggggggggg");
			
			//alert(q1);
				
				//alert($('#randomid').val());
				//return false;
				
				

	$.ajax({  
                    url: "<?php echo base_url(); ?>groups/result/", //The url where the server req would we made.
                    async: false,
                    type: "POST", //The type which you want to use: GET/POST
                   // data: $(deyar_form).serialize(),//The variables which are going.
				   data: "type="+q1, 
                    dataType: "html", //Return data type (what we expect).
                    
                    //This is the function which will be called if ajax call is successful.
                    success: function(data)
                    {
						
						alert(data);
						//return false;
						alert("bvcbvcbvcb");
						
						
						
						//$('.price').html(data);
						
						
						
                    }
                      });
					  
					 
					  
					  
              });
		
	
	$('#right').click(function () {
     return !$('#userlist option:selected').remove().appendTo('#selectedlist');
 });
 $('#left').click(function () {
     return !$('#selectedlist option:selected').remove().appendTo('#userlist');
 });
});
	
	 function selectAll() 
    { 
        selectBox = document.getElementById("selectedlist");

        for (var i = 0; i < selectBox.options.length; i++) 
        { 
             selectBox.options[i].selected = true; 
        } 
    }
    
</script>