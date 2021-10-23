<!DOCTYPE html>
<?php $admin = new Main();?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="Description" content="">
      <meta name="Author" content="">
      <meta name="Keywords" content=""/>
      <!-- Title -->
      <title> Deyar </title>
      <!--- Favicon --->
      <link rel="icon" href="<?php echo $admin->assets('img/brand/favicon.png')?>" type="image/x-icon"/>
      <!--- Icons css --->
      <link href="<?php echo $admin->assets('css/icons.css')?>" rel="stylesheet">
      <!-- Internal Data table css -->
      <link href="<?php echo $admin->assets('plugins/datatable/css/dataTables.bootstrap4.min.css')?>" rel="stylesheet" />
      <link href="<?php echo $admin->assets('plugins/datatable/css/buttons.bootstrap4.min.css')?>" rel="stylesheet">
      <link href="<?php echo $admin->assets('plugins/datatable/css/responsive.bootstrap4.min.css')?>" rel="stylesheet" />
      <link href="<?php echo $admin->assets('plugins/datatable/css/jquery.dataTables.min.css')?>" rel="stylesheet">
      <link href="<?php echo $admin->assets('plugins/datatable/css/responsive.dataTables.min.css')?>" rel="stylesheet">
      <link href="<?php echo $admin->assets('plugins/select2/css/select2.min.css')?>" rel="stylesheet">
      <!--- Right-sidemenu css --->
      <link href="<?php echo $admin->assets('plugins/sidebar/sidebar.css')?>" rel="stylesheet">
      <!--- Custom Scroll bar --->
      <link href="<?php echo $admin->assets('plugins/mscrollbar/jquery.mCustomScrollbar.css')?>" rel="stylesheet"/>
      <!--- Select2 css-->
      <link href="<?php echo $admin->assets('plugins/select2/css/select2.min.css')?>" rel="stylesheet">
      <!--- Internal Sumoselect css --->
      <link rel="stylesheet" href="<?php echo $admin->assets('plugins/sumoselect/sumoselect.css')?>">
      <!--- Style css --->
      <link href="<?php echo $admin->assets('css/style.css')?>" rel="stylesheet">
      <link href="<?php echo $admin->assets('css/skin-modes.css')?>" rel="stylesheet">
      <!--- Animations css --->
      <link href="<?php echo $admin->assets('css/animate.css')?>" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> -->

	</head>
	<body class="main-body  app">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo $admin->assets('img/loaders/loader-4.svg')?>" class="loader-img" alt="Loader">
		</div>
		<!-- /Loader -->

		

		<!-- Page -->
		<div class="page">
			
			 <?php echo $admin->header();?>
			
			
			
			 <?php echo $admin->menu();?>
			
			
			
			<?php echo $contents; ?>
			
			<?php //echo $admin->footer();?>
			
		</div>
		<!-- end page -->

		 <!-- Footer closed -->
         </div>
         <!-- end page -->
         <!--- JQuery min js --->
         <script src="<?php echo $admin->assets('plugins/jquery/jquery.min.js')?>"></script>
         <!--- Datepicker js --->
         <!--<script src="<?php echo $admin->assets('plugins/jquery-ui/ui/widgets/datepicker.js')?>"></script>-->
         <!--- Bootstrap Bundle js --->
         <script src="<?php echo $admin->assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
         <!--- Ionicons js --->
         <script src="<?php echo $admin->assets('plugins/ionicons/ionicons.js')?>"></script>
         <!--- Moment js --->
         <script src="<?php echo $admin->assets('plugins/moment/moment.js')?>"></script>
         <!--- JQuery sparkline js --->
         <script src="<?php echo $admin->assets('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
         <!--- Select2 js --->
         <script src="<?php echo $admin->assets('plugins/select2/js/select2.min.js')?>"></script>
         <!--- Fileuploads js --->
         <script src="<?php echo $admin->assets('plugins/fileuploads/js/fileupload.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/fileuploads/js/file-upload.js')?>"></script>
         <!--- Fancy uploader js --->
         <script src="<?php echo $admin->assets('plugins/fancyuploder/jquery.ui.widget.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/fancyuploder/jquery.fileupload.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/fancyuploder/jquery.iframe-transport.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/fancyuploder/jquery.fancy-fileupload.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/fancyuploder/fancy-uploader.js')?>"></script>
         <!--- Internal Form-elements js --->
         <script src="<?php echo $admin->assets('js/advanced-form-elements.js')?>"></script>
         <script src="<?php echo $admin->assets('js/select2.js')?>"></script>
         <!--- Internal Sumoselect js --->
         <script src="<?php echo $admin->assets('plugins/sumoselect/jquery.sumoselect.js')?>"></script>
         <!--- Internal TelephoneInput js --->
         <script src="<?php echo $admin->assets('plugins/telephoneinput/telephoneinput.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/telephoneinput/inttelephoneinput.js')?>"></script>
         <!--- P-scroll js --->
         <script src="<?php echo $admin->assets('plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/perfect-scrollbar/p-scroll.js')?>"></script>
         <!--- Rating js --->
         <script src="<?php echo $admin->assets('plugins/rating/jquery.rating-stars.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/rating/jquery.barrating.js')?>"></script>
         <!--- Custom Scroll bar Js --->
         <script src="<?php echo $admin->assets('plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')?>"></script>
         <!--- Horizontalmenu js --->
         <script src="<?php echo $admin->assets('plugins/horizontal-menu/horizontal-menu.js')?>"></script>
         <!--- Right-sidebar js --->
         <script src="<?php echo $admin->assets('plugins/sidebar/sidebar.js')?>"></script>
         <script src="<?php echo $admin->assets('plugins/sidebar/sidebar-custom.js')?>"></script>
         <!--- Eva-icons js --->
         <script src="<?php echo $admin->assets('js/eva-icons.min.js')?>"></script>
         <!--- Sticky js --->
         <script src="<?php echo $admin->assets('js/sticky.js')?>"></script>
         <!--- Index js --->
         <script src="<?php echo $admin->assets('js/script.js')?>"></script>
         <!--- Custom js --->
         <script src="<?php echo $admin->assets('js/custom.js')?>"></script>
         <script type="text/javascript" src="<?php echo $admin->assets('js/jqueryui.js')?>"></script>

 
      
   </body>
</html>