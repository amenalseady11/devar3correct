<!DOCTYPE html>
<?php $admin = new Main();?>
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

		<!-- Owl-carousel css-->
		<link href="<?php echo $admin->assets('plugins/owl-carousel/owl.carousel.css')?>" rel="stylesheet"/>

		<!--- Right-sidemenu css --->
		<link href="<?php echo $admin->assets('plugins/sidebar/sidebar.css')?>" rel="stylesheet">

		<!--- Style css --->
		<link href="<?php echo $admin->assets('css/style.css')?>" rel="stylesheet">
		<link href="<?php echo $admin->assets('css/skin-modes.css')?>" rel="stylesheet">

		<!--- Animations css --->
		<link href="<?php echo $admin->assets('css/animate.css')?>" rel="stylesheet">
		
		
		<script src="<?php echo $admin->skin('js/jquery.min.js')?>"></script>
		
		
		

        <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> -->
<style>
    .dataTables_wrapper{
    width: 99%;
    }
</style>
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
			
			<?php echo $admin->footer();?>
			
		</div>
		<!-- end page -->

		<!--- Back-to-top --->
		<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>

	<!--- JQuery min js --->
		<script src="<?php echo $admin->assets('plugins/jquery/jquery.min.js')?>"></script>

		<!--- Datepicker js --->
		<script src="<?php echo $admin->assets('plugins/jquery-ui/ui/widgets/datepicker.js')?>"></script>

		<!--- Bootstrap Bundle js --->
		<script src="<?php echo $admin->assets('plugins/bootstrap/js/bootstrap.bundle.min.js')?>"></script>

		<!--- Internal Chart.bundle js --->
		<script src="<?php echo $admin->assets('plugins/chart.js/Chart.bundle.min.js')?>"></script>

		<!--- Ionicons js --->
		<script src="<?php echo $admin->assets('plugins/ionicons/ionicons.js')?>"></script>

		<!--- Moment js --->
		<script src="<?php echo $admin->assets('plugins/moment/moment.js')?>"></script>

		<!--- JQuery sparkline js --->
		<script src="<?php echo $admin->assets('plugins/jquery-sparkline/jquery.sparkline.min.js')?>"></script>
		
		
		<script src="<?php echo $admin->assets('plugins/datatable/js/jquery.dataTables.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/dataTables.dataTables.min.js')?>"></script>
		<!--<script src="<?php echo $admin->assets('plugins/datatable/js/dataTables.responsive.min.js')?>"></script>-->
		<!--<script src="<?php echo $admin->assets('plugins/datatable/js/responsive.dataTables.min.js')?>"></script>-->
		<script src="<?php echo $admin->assets('plugins/datatable/js/jquery.dataTables.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/dataTables.bootstrap4.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/dataTables.buttons.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/buttons.bootstrap4.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/jszip.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/pdfmake.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/vfs_fonts.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/buttons.html5.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/buttons.print.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/datatable/js/buttons.colVis.min.js')?>"></script>
		<!--<script src="<?php echo $admin->assets('plugins/datatable/js/dataTables.responsive.min.js')?>"></script>-->
		<script src="<?php echo $admin->assets('plugins/datatable/js/responsive.bootstrap4.min.js')?>"></script>

		<!-- datatable js -->
		<script src="<?php echo $admin->assets('js/table-data.js')?>"></script>

		<!--- Select2 js --->
		<script src="<?php echo $admin->assets('plugins/select2/js/select2.min.js')?>"></script>

		<!--- P-scroll js --->
		<script src="<?php echo $admin->assets('plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/perfect-scrollbar/p-scroll.js')?>"></script>

		<!--- Eva-icons js --->
		<script src="<?php echo $admin->assets('js/eva-icons.min.js')?>"></script>

		<!--- Internal Chartjs js --->
		<script src="<?php echo $admin->assets('js/chart.chartjs.js')?>"></script>
		
		<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>

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

		<!--- Sticky js --->
		<script src="<?php echo $admin->assets('js/sticky.js')?>"></script>

		<!--- Index js --->
		<script src="<?php echo $admin->assets('js/script.js')?>"></script>

		<!--- Custom js --->
		<script src="<?php echo $admin->assets('js/custom.js')?>"></script>

	</body>
</html>

			
			