<!DOCTYPE html>
<?php
$admin=new Main();?>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="">
		<meta name="Author" content="">
		<meta name="Keywords" content=""/>

		<!-- Title -->
		<title>Deyar login </title>

		<!--- Favicon --->
		<link rel="icon" href="<?php echo $admin->assets('img/brand/favicon.png')?>" type="image/x-icon"/>

		<!--- Icons css --->
		<link href="<?php echo $admin->assets('css/icons.css')?>" rel="stylesheet">

		<!--- Right-sidemenu css --->
		<link href="<?php echo $admin->assets('plugins/sidebar/sidebar.css')?>" rel="stylesheet">

		<!--- Custom Scroll bar --->
		<link href="<?php echo $admin->assets('plugins/mscrollbar/jquery.mCustomScrollbar.css')?>" rel="stylesheet"/>

		<!--- Style css --->
		<link href="<?php echo $admin->assets('css/style.css')?>" rel="stylesheet">
		<link href="<?php echo $admin->assets('css/skin-modes.css')?>" rel="stylesheet">

		<!--- Animations css --->
		<link href="<?php echo $admin->assets('css/animate.css')?>" rel="stylesheet">

	</head>
	<body class="main-body bg-light">

		<!-- Loader -->
		<div id="global-loader">
			<img src="assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
                </div>
		<!-- /Loader -->

	<!-- page -->

<?php echo $contents;?>
		
		<!--- JQuery min js --->
		<script src="<?php echo $admin->assets('plugins/jquery/jquery.min.js')?>"></script>

		<!--- Bootstrap Bundle js --->
		<script src="<?php echo $admin->assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

		<!--- Ionicons js --->
		<script src="<?php echo $admin->assets('plugins/ionicons/ionicons.js')?>"></script>

		<!--- Moment js --->
		<script src="<?php echo $admin->assets('plugins/moment/moment.js')?>"></script>

		<!--- Eva-icons js --->
		<script src="<?php echo $admin->assets('js/eva-icons.min.js')?>"></script>

		<!--- Rating js --->
		<script src="<?php echo $admin->assets('plugins/rating/jquery.rating-stars.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/rating/jquery.barrating.js')?>"></script>

		<!--- Index js --->
		<script src="<?php echo $admin->assets('js/script.js')?>"></script>

		<!--- Custom js --->
		<script src="<?php echo $admin->assets('js/custom.js')?>"></script>

	
<!-- jQuery 2.1.4 -->
<script src="<?php echo $admin->skin('plugins/jQuery/jQuery-2.1.4.min.js');?>"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo $admin->skin('bootstrap/js/bootstrap.min.js');?>"></script>
<!-- iCheck -->
<script src="<?php echo $admin->skin('plugins/iCheck/icheck.min.js');?>"></script>
<script src="<?php echo $admin->skin('js/jquery.validate.js');?>"></script>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });
    });
</script>
<script type="text/javascript">
    $( document ).ready(function() {
        var vali= $("#adminlog").validate
        ({
            submitHandler: function(form)
            {
                $("#message").empty();
                $('#loading').show();
                $.ajax({
                    type:"POST",
                    url:'<?php echo base_url().'admin/admin_login';?>',
                    data:$("#adminlog input").serialize(),//only input
                    success: function(response)
                    {
                        $('#loading').hide();
                        $("#message").html();
                        var repage = '<?php echo base_url();?>dashboard';
                        if(response.trim()=='r')
                        {
                            window.location=repage;
                        }
                        else
                        {
                            $("#message").html(response);
                        }
                    }
                });
            }
        });
    });
</script>
</body>
</html>
