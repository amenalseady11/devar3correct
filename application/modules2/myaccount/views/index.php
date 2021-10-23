   
        
                  <div class="col-md-8 col-lg-9">
                    <div class="box_address">
						<?php if($this->session->flashdata('msg'))	{ ?><p class="text-danger"><?php echo $this->session->flashdata('msg'); ?></p><?php } ?>
                       <h4>Account Information</h4>
						
					
						
						
                       <div>
                          <form class="g-3 acc_form" method="post" action="<?php echo  base_url()?>myaccount">
							  <input type="hidden" name="customerid" value="<?php echo $accountinfo['customer_id']?>">
      <div class="row">
               <div class="col-md-12">
    <label for="fname" class="form-label">First Name</label>
    <input type="text" class="form-control" id="fname"  name="firstname" placeholder="Enter Your First Name" value="<?php echo $accountinfo['customer_firstname']?>">
  </div>
  <div class="col-md-12 mar-b">
    <label for="lname" class="form-label">Last Name</label>
    <input type="text" class="form-control" id="lname" name="lastname" placeholder="Enter Your Last Name" value="<?php echo $accountinfo['customer_lastname']?>">
  </div>
      </div>
            <div class="row">
  <div class="col-md-12 mar-b">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" id="inputEmail4" name="email"  placeholder="Enter Your Email" value="<?php echo $accountinfo['customer_email']?>" readonly>
  </div>
  <div class="col-md-12 mar-b">
    <label for="phone" class="form-label">Phone Number</label>
    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number" value="<?php echo $accountinfo['customer_phone']?>">
  </div>
  </div>
  <div class="row">
     <div class="col-12">
      <a href="#" class="change_password" data-toggle="modal" data-target="#change_password"> Change Password </a>
     </div>
  </div>

  <div class="row">
     <div class="col-12">
      <br>
    <button type="submit" class="btn btn-primary pink_color">Update Profile</button>
      
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
