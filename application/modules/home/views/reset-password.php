
<<!--div class="headerSpace"></div>-->

<?php if($message!="success"){?>
	<div class="contantBlock blockEnd forgotemail_box">
		<div class="container">
			<div class="row justify-content-center">
				

			<div class="col-md-8 col-lg-6 text-center">	

<div class="forgotFormArea" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
				
				<form class="forgot" method="post" action="<?php echo base_url()?>reset_password">
					<input type="hidden" name="random" value="<?php echo $random?>">
					
					<div class="text-danger">					</div>
					<h5>Reset password</h5>
					<div class="form-group">
						<label>NEW PASSWORD</label>
						<input type="password" name="password" class="form-control" placeholder="Enter your password" required="">
					</div>
					<div class="form-group">
						<label>CONFIRM NEW PASSWORD</label>
						<input type="password" name="conpassword" class="form-control" placeholder="Enter your confirm password" required="">
						<span class="alert-danger"><?php echo form_error('conpassword'); ?></span>
					</div>
					
					<button type="submit" class="btn animatedBtn darckBtn pass-forgot">SUBMIT</button>
					
				</form>

			</div>
			</div>
				
			</div>
		</div>
	</div>
<?php } ?>

<?php if($message=="success"){?>
	

	<div class="contantBlock blockEnd success_box" >
		<div class="container">
			<div class="row justify-content-center">
				

			<div class="col-md-10 col-lg-8 text-center">	
				<div class="success-message">
                <div class="title">Thank you</div>
                <div class="description">Your Password successfully changed</div>
<br>
                <a  class="btn animatedBtn darckBtn pass-forgot" href="<?php echo base_url()?>login">SIGN IN</a>
              </div>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<script type="text/javascript">
	   $(".pass-forgot").click(function(){
$('.forgotemail_box').hide();
$('.success_box').show();
 });
</script>


