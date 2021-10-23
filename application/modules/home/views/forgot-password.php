






<!--<div class="headerSpace"></div>-->


	<div class="contantBlock blockEnd forgotemail_box" <?php if($message=="success"){ ?>style="display:none"<?php } ?>  dis>
		<div class="container">
			<div class="row justify-content-center">
				

			<div class="col-md-8 col-lg-6 text-center">	

<div class="forgotFormArea" style="opacity: 1; transform: matrix(1, 0, 0, 1, 0, 0);">
				
				<form class="forgot" method="post" action="<?php echo base_url()?>forgot_password">
					
					<div class="text-danger">					</div>
					<h5>Forgot Password</h5>
					<?php if($message=="fail"){ echo "Email not exist in our system";  } ?>
					<div class="form-group">
						<label>EMAIL ADDRESS</label>
						<input type="email" name="email" class="form-control" placeholder="Email" required="">
					</div>
					
					<button type="submit" class="btn animatedBtn darckBtn pass-forgot">SUBMIT</button>
					
				</form>

			</div>
			</div>
				
			</div>
		</div>
	</div>

   <?php if($message=="success"){ ?>
	<div class="contantBlock blockEnd success_box" >
		<div class="container">
			<div class="row justify-content-center">
				

			<div class="col-md-10 col-lg-8 text-center">	
				<div class="success-message">
                <div class="title">Thank you</div>
                <div class="description">Please check your email for new password</div>
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








