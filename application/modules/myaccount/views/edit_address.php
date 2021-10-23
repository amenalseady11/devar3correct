
        
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
                       <h4>Edit Address</h4> <div>
                          <form class="g-3 acc_form" method="post" action="<?php echo base_url()?>updateaddress">
							  <input type="hidden" name="id" value="<?php echo $editaddress['id']?>">
							  
							    <div class="row">
               <div class="col-md-12">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name"  value="<?php echo $editaddress['first_name']?>">
  </div>
  <div class="col-md-12 mar-b">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name"  value="<?php echo $editaddress['last_name']?>">
  </div>
      </div>
							  <div class="row">
  <div class="col-md-12 mar-b">
    <label for="inputEmail4" class="form-label">Phone Number</label>
    <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone" value="<?php echo $editaddress['phone_number']?>">
  </div>
							  </div>
      <div class="row">
               <div class="col-md-12">
    <label for="fname" class="form-label">Street Address</label>
    <input type="text" class="form-control" id="streetaddress" name="streetaddress" placeholder="Address"  value="<?php echo $editaddress['address']?>">
				   <span class="text-danger"><?php echo form_error('streetaddress'); ?></span>
  </div>
  <div class="col-md-12 mar-b">
    <label for="lname" class="form-label">Street Address2</label>
    <input type="text" class="form-control" id="streetaddress2" name="streetaddress2" placeholder="Enter Address2"  value="<?php echo $editaddress['address2']?>">
  </div>
      </div>
            <div class="row">
  <div class="col-md-12 mar-b">
    
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
  <div class="col-md-12 mar-b">
    <label for="phone" class="form-label">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="Enter Your State" value="<?php echo $editaddress['state']?>">
	  <span class="text-danger"><?php echo form_error('state'); ?></span>
  </div>
  </div>
  
							  <div class="row">
 
  <div class="col-md-12 mar-b">
   <label for="inputEmail4" class="form-label">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="Enter Your City"  value="<?php echo $editaddress['city']?>">
	  <span class="text-danger"><?php echo form_error('city'); ?></span>
  </div>
								   <div class="col-md-12 mar-b">
    <label for="inputEmail4" class="form-label">Zip</label>
    <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter Your Zip"  value="<?php echo $editaddress['zip_code']?>">
	  <span class="text-danger"><?php echo form_error('zip'); ?></span>
  </div>
  </div>
	<?php if(!($editaddress['def_ship']=="1" || $editaddress['def_bill']=="1")){
	
	?>
					  
							  
							  <div class="row" style="margin-left:10px">
  <div class="col-md-12 mar-b">   
    
<input type="checkbox" class="form-check-input" id="default" name="default" <?php
	if($editaddress['def_bill']){echo  "checked"; }?>>
    <label class="form-check-label" for="exampleCheck1">Default Billing Address</label>
  </div>
  <div class="col-md-12 mar-b">    
    <input type="checkbox" class="form-check-input" id="defaultship" name="defaultship" <?php if($editaddress['def_ship']){echo  "checked"; }?>>
    <label class="form-check-label" for="exampleCheck1">Default Shipping Address</label>s
  </div>
  </div>
						
						<?php } ?>

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


             <div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <form method="POST" action="" id="">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id=""> Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <div class="row">
                           <div>
                              <div id="form-sec" class="col-md-12">
                                    <div class="row">
               <div class="col-md-12">
    <label for="old-pass" class="form-label"> Old Password</label>
    <input type="text" class="form-control" id="old-pass" >
  </div>
  <div class="col-md-12 mar-b">
    <label for="new-pass" class="form-label"> New Password</label>
    <input type="password" class="form-control" id="new-pass" >
  </div>
   <div class="col-md-12 mar-b">
    <label for="confirm-pass" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" id="confirm-pass" >
  </div>
      </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                      
                        <button type="submit" class="btn animatedBtn darckBtn">Save</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
