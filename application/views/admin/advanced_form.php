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

        <!-- <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet"> -->
		
		<style type="text/css">
	button.btn.btn-primary.buttons-collection.dropdown-toggle.buttons-colvis {
    display: none;
}
.btn-main-primary {
    color: #fff;
    background-color: #ec1d8c;
    border-color: #ec1d8c;
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

		<!--- Select2 js --->
		<script src="<?php echo $admin->assets('plugins/select2/js/select2.min.js')?>"></script>

		<!--- P-scroll js --->
		<script src="<?php echo $admin->assets('plugins/perfect-scrollbar/perfect-scrollbar.min.js')?>"></script>
		<script src="<?php echo $admin->assets('plugins/perfect-scrollbar/p-scroll.js')?>"></script>

		<!--- Eva-icons js --->
		<script src="<?php echo $admin->assets('js/eva-icons.min.js')?>"></script>

		<!--- Internal Chartjs js --->
		<script src="<?php echo $admin->assets('js/chart.chartjs.js')?>"></script>

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


$("body").on("click", ".remove-select1", function () {
 $(this).closest("div.nonattribute-field").remove();
    });
});
		</script>

	</body>
</html>

			
			