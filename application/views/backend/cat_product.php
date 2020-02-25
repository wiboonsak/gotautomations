<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>GOT AUTOMATION</title>

<!-- Bootstrap -->
<link href="<?php echo base_url('HTML_2/css/bootstrap.min.css')?>" rel="stylesheet">

<!-- Font-awesome -->
<link href="<?php echo base_url('HTML_2/css/font-awesome.min.css')?>" rel="stylesheet">

<!-- Bootsnav -->
<link href="<?php echo base_url('HTML_2/css/bootsnav.css')?>" rel="stylesheet">

<!-- Cubeportfolio -->
<link href="<?php echo base_url('HTML_2/css/cubeportfolio.min.css')?>" rel="stylesheet">

<!-- OWL-Carousel -->
<link href="<?php echo base_url('HTML_2/css/owl.carousel.css')?>" rel="stylesheet">
<link href="<?php echo base_url('HTML_2/css/owl.transitions.css')?>" rel="stylesheet">

<!-- Slider -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('HTML_2/css/settings.css')?>">

<!-- Custom Style Sheet -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('HTML_2/css/style.css')?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('HTML_2/css/toggle_menu.css')?>">
	
<link rel="shortcut icon" href="<?php echo base_url('HTML_2/images/logo.ico')?>">

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
	

</head>



<body class="overflow_hidden">  

<!-- Loader Start -->

<div class="loading-page">
	<div class="counter">
		<p><img src="<?php echo base_url('HTML_2/images/logo-dark.png')?>" alt="image"></p>
		<h2>0%</h2>
		<hr/>
	</div>
</div>

<!-- Loader End  -->

	
<!-- Menu Start -->
	<?php include("menu.php")?>
<!-- Menu End  -->
	
	
	
<!-- MAIN  CONTENTS ---------------->

<div id="main">

	<span id="btnSpan">
		<span class="toggle_menu" onclick="openNav()"><span style="color:#ffa50a; font-size: 30px; font-weight:700"><i class="fa fa-bars"></i></span> Menu</span>
	</span>

	<!--<button id="menu-toggle" class="btn btn-secondary" onclick="openNav()"><i class="fa fa-angle-double-down"></i> Open Menu <i class="fa fa-filter"></i></button> -->

	
	
<!--  Header Start  -->
	<?php include("header.php")?>
<!--  Header End  -->



<!-- Loader Start -->
<div class="loading-page">
	<div class="counter">
		<p><img src="<?php echo base_url('HTML_2/images/logo-white.png')?>" alt="image"></p>
		<h2>0%</h2>
		<hr/>
	</div>
</div>
<!-- Loader End  -->

	<?php foreach($dataCategory->result() AS $dataCategory2){} ?>

	<!-- Inner Banner Start -->
	<section id="inner-banner" style="border-bottom:2px solid #fb452b; padding-top: 10px !important">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="inner-banner-detail">
						<p style="padding-bottom: 10px; text-align: left;"><a href="<?php echo base_url('Welcome')?>">Home</a><span> / </span>Flow Meters for ALL Applications</p>
						<!--<h2>Flow Meters for ALL Applications</h2>-->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Inner Banner End -->


	<!-- Over view start -->
	<section id="companyover-view" class="padding_bottom padding_top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="inner_heading heading_space" style="margin-bottom: 20px">
						<!--<p>We started with a simple idea</p>-->
						<h2><?php echo $dataCategory2->name_th?></h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<img src="<?php echo base_url('HTML_2/images/web7.jpg')?>" alt="image" class="img-responsive">
					<p>&nbsp;</p>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12">						
					<div class="over-view">						
						
						<div class="text-oblic">
							<p><?php echo $dataCategory2->desc_th?></p>
						</div>
					</div>

				</div>

				<!--<div class="col-md-4 col-sm-4 col-xs-12">
					<div class="over-view-img">
						<a title="View About us video" data-height="420" data-width="900" class="html5lightbox content-vbtn-color-blue" href="https://player.vimeo.com/video/102732914?title=0&amp;byline=0&amp;portrait=0&amp;color=11b1c2&amp;wmode=opaque"><img src="images/about-over-view.jpg" alt="image">
						</a>
					</div>
				</div>-->
			</div>
		</div>
	</section>
	<!-- Over view end -->

<!--  Catagories Produts Start  -->
<section class="padding-bootom-50"><!--id="services"-->
	<div class="container">
		<div class="row">
			<div class="col-md-12 padding-bootom-50"><!--<div id="services_slider">-->
				
				<div class="item services_box col-md-4 col-sm-4 col-xs-12" style="padding-bottom: 15px">
					<div class="services_img">
						<img src="<?php echo base_url('HTML_2/images/cat_1.jpg')?>" alt="Image">
					</div>
					<div class="services_detail"  style="background-color: #f3f3f3;">
						<span>01</span>
						<h3>Ultrasonic Flowmeters</h3>
						<p>Non-invasive, ultrasonic flow meters offer great benefits in many applications. By using ultrasonic transducers clamped to the outside of pipework, there is no disruption of flow or service downtime. Ultrasonic flowmeters are ideal for almost all applications.</p>
						<a href="javascript:void(0)">Read more</a>
					</div>
				</div>
				<div class="item services_box col-md-4 col-sm-4 col-xs-12" style="padding-bottom: 15px">
					<div class="services_img">
						<img src="<?php echo base_url('HTML_2/images/cat_2.jpg')?>" alt="Image">
					</div>
					<div class="services_detail" style="background-color: #f3f3f3;">
						<span>02</span>
						<h3>Ultrasonic Flowmeters</h3>
						<p>Non-invasive, ultrasonic flow meters offer great benefits in many applications. By using ultrasonic transducers clamped to the outside of pipework, there is no disruption of flow or service downtime. Ultrasonic flowmeters are ideal for almost all applications.</p>
						<a href="javascript:void(0)">Read more</a>
					</div>
				</div>
				<div class="item services_box col-md-4 col-sm-4 col-xs-12" style="padding-bottom: 15px">
					<div class="services_img">
						<img src="<?php echo base_url('HTML_2/images/cat_3.jpg')?>" alt="Image">
					</div>
					<div class="services_detail" style="background-color: #f3f3f3;">
						<span>03</span>
						<h3>Ultrasonic Flowmeters</h3>
						<p>Non-invasive, ultrasonic flow meters offer great benefits in many applications. By using ultrasonic transducers clamped to the outside of pipework, there is no disruption of flow or service downtime. Ultrasonic flowmeters are ideal for almost all applications.</p>
						<a href="javascript:void(0)">Read more</a>
					</div>
				</div>
				<div class="item services_box col-md-4 col-sm-4 col-xs-12" style="padding-bottom: 15px">
					<div class="services_img">
						<img src="<?php echo base_url('HTML_2/images/cat_6.jpg')?>" alt="Image">
					</div>
					<div class="services_detail" style="background-color: #f3f3f3;">
						<span>04</span>
						<h3>Ultrasonic Flowmeters</h3>
						<p>Non-invasive, ultrasonic flow meters offer great benefits in many applications. By using ultrasonic transducers clamped to the outside of pipework, there is no disruption of flow or service downtime. Ultrasonic flowmeters are ideal for almost all applications.</p>
						<a href="javascript:void(0)">Read more</a>
					</div>
				</div>
				<div class="item services_box col-md-4 col-sm-4 col-xs-12" style="padding-bottom: 15px">
					<div class="services_img">
						<img src="<?php echo base_url('HTML_2/images/cat_5.jpg')?>" alt="Image">
					</div>
					<div class="services_detail" style="background-color: #f3f3f3;">
						<span>05</span>
						<h3>Ultrasonic Flowmeters</h3>
						<p>Non-invasive, ultrasonic flow meters offer great benefits in many applications. By using ultrasonic transducers clamped to the outside of pipework, there is no disruption of flow or service downtime. Ultrasonic flowmeters are ideal for almost all applications.</p>
						<a href="javascript:void(0)">Read more</a>
					</div>
				</div>
				<div class="item services_box col-md-4 col-sm-4 col-xs-12" style="padding-bottom: 15px">
					<div class="services_img">
						<img src="<?php echo base_url('HTML_2/images/cat_4.jpg')?>" alt="Image">
					</div>
					<div class="services_detail" style="background-color: #f3f3f3;">
						<span>06</span>
						<h3>Ultrasonic Flowmeters</h3>
						<p>Non-invasive, ultrasonic flow meters offer great benefits in many applications. By using ultrasonic transducers clamped to the outside of pipework, there is no disruption of flow or service downtime. Ultrasonic flowmeters are ideal for almost all applications.</p>
						<a href="javascript:void(0)">Read more</a>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 col-sm-12 col-xs-12">						
				<div class="over-view" style="padding: 0 30px;">							
					<?php echo $dataCategory2->detail_th?>
				</div>
			</div>

		</div>
	</div>
</section>
<!--  Services End  -->

	<!-- Footer -->
	<?php include("footer.php"); ?>  

</div>

	<script src="<?php echo base_url('HTML_2/js/jquery.2.2.3.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/bootstrap.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/owl.carousel.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/bootsnav.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/jquery.cubeportfolio.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/jquery-countTo.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/jquery.appear.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/jquery.typewriter.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/.elevateZoom-3.0.8.min.js')?>"></script>
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
	<script src="<?php echo base_url('HTML_2/js/gmaps.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/contact.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/jquery.themepunch.tools.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/jquery.themepunch.revolution.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/revolution.extension.layeranimation.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/revolution.extension.navigation.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/revolution.extension.parallax.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/revolution.extension.slideanims.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/themepunch/revolution.extension.video.min.js')?>"></script>
	<script src="<?php echo base_url('HTML_2/js/functions.js')?>"></script>


	<script>

	function openNav() {

	  document.getElementById("menuSidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	  $('#btnSpan').empty();

	 // var closeBtn = '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';

	  var closeBtn = '<span class="toggle_menu" onclick="closeNav()" ><span style="color:#FFFFFF; font-size: 30px; font-weight:500"><i class="fa fa-times"></i></span> Menu</span>';

	  $('#btnSpan').html(closeBtn);

	}


	function closeNav() {

	  document.getElementById("menuSidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";

	   $('#btnSpan').empty();

	   var openBtn = '<span class="toggle_menu" onclick="openNav()"><span style="color:#ffa50a; font-size: 30px; font-weight:700"><i class="fa fa-bars"></i></span> Menu</span>';

	  $('#btnSpan').html(openBtn);

	}
		
		function bigImg(Oopen,Cclose){
		
	if(Cclose != '0'){	
		$("."+Cclose).css("display", "none");
		
	}
	if(Oopen != '0'){	
		$("#"+Oopen).css("display", "block");
	}
	}	

		function aaa(element){
			$("#"+element).css("display", "none");
			
		}

	</script>	
	
	
	
	<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

</body>
</html>