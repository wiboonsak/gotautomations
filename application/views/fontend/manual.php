<!DOCTYPE html>

<html lang="en">
<head>
<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-148089183-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-148089183-1');
	</script>
	
	
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<title>GOT AUTOMATION : จำหน่ายสินค้าและให้บริการ ออกแบบและติดตั้ง  เครื่องจักรอุตสาหกรรม ครบวงจร</title>
<meta name="keywords" content="สินค้าอุตสาหกรรม , เครื่องจักรอุตสาหกรรม , สินค้าอุตสาหกรรม ภาคใต้ , ขายเครื่องจักร , เครื่องจักรภาคใต้ , โรงงาน , เครื่องจักร ภาคใต้, Motor, Motor gear, ปั๊ม Blower, ปั๊มลม, Inverter, เครื่องมือวัด, สอบเทียบ">
<meta name="description" content="GREAT ORIENTAL TRADING : GOT จำหน่ายสินค้าและให้บริการ ออกแบบและติดตั้ง  เครื่องจักรอุตสาหกรรม ครบวงจร">			
<meta name="AUTHOR" content="GOTAUTOMATIONS.COM">
<meta name="COPYRIGHT" content="GOTAUTOMATIONS.COM">
<meta name="GENERATOR" content="Boothstrap,Javascript,PHP,CSS,Editplus">
<meta name="ABSTRACT" content="GOTAUTOMATIONS.COM">	

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

<!-- Inner Banner Start -->
	<section id="inner-banner" style="border-bottom:2px solid #fb452b; padding-top: 10px !important">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="inner-banner-detail">
						<p style="padding-bottom: 10px; text-align: left;"><a href="<?php echo base_url('Welcome')?>">Home</a><span> / </span>Manual</p>
						<!--<h2>Flow Meters for ALL Applications</h2>-->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Inner Banner End -->	
	
<!--  Checkout  -->
<section class="padding_top padding_bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12 p-b-35">
				<div class="gym_heading">
					<p>GOT AUTOMATION</p>
					<h2>DOCUMENT</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive cart_info">
								<table border="0" cellpadding="2" cellspacing="2" class="table table-condensed" style="background-color: #FDFDFD">
									<thead>
										<tr class="cart_menu">
											<!--<td class="description">Manufacturer</td>-->
											<td class="description">Product</td>
											<td class="description">Manual</td>
											<td class="description">Specification</td>
											<td class="description">Brochure</td>
											<td class="description">Others</td>
										</tr>
									</thead>
									<tbody>
									<?php foreach($productName->result() AS $productName2){ 
										
										$Manual = $this->Category_model->getFile_byGroup($productName2->product_id,'2');
										$Specification = $this->Category_model->getFile_byGroup($productName2->product_id,'3');
										$Brochure = $this->Category_model->getFile_byGroup($productName2->product_id,'4');
										$Others = $this->Category_model->getFile_byGroup($productName2->product_id,'5');
									?>									
										
										<tr>											
											<td>
												<div class="cart_description">
													<p><?php echo $productName2->name_th?></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<?php if($Manual->num_rows() > 0){ 
															foreach($Manual->result() AS $Manual2){								
													?>												
													<p><a href="<?php echo base_url().'uploadfile/catalogue/'.$Manual2->imge_name?>" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> <?php echo $Manual2->txtTitle_th?></a></p>
													<?php } } else { ?>													
													<p style="text-align: center;">--</p>										
													
													<?php } ?>												
												</div>
											</td>
											<td>
												<div class="cart_description">
													<?php if($Specification->num_rows() > 0){ 
															foreach($Specification->result() AS $Specification2){				
													?>												
													<p><a href="<?php echo base_url().'uploadfile/catalogue/'.$Specification2->imge_name?>" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> <?php echo $Specification2->txtTitle_th?></a></p>
													<?php } } else { ?>													
													<p style="text-align: center;">--</p>										
													
													<?php } ?>												
												</div>
											</td>
											<td>
												<div class="cart_description">
													<?php if($Brochure->num_rows() > 0){ 
															foreach($Brochure->result() AS $Brochure2){							
													?>												
													<p><a href="<?php echo base_url().'uploadfile/catalogue/'.$Brochure2->imge_name?>" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> <?php echo $Brochure2->txtTitle_th?></a></p>
													<?php } } else { ?>													
													<p style="text-align: center;">--</p>										
													
													<?php } ?>												
												</div>
											</td>
											<td>
												<div class="cart_description">
													<?php if($Others->num_rows() > 0){ 
															foreach($Others->result() AS $Others2){								
													?>												
													<p><a href="<?php echo base_url().'uploadfile/catalogue/'.$Others2->imge_name?>" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> <?php echo $Others2->txtTitle_th?></a></p>
													<?php } } else { ?>													
													<p style="text-align: center;">--</p>										
													
													<?php } ?>												
												</div>
											</td>											
										</tr>
									<?php } ?>	
										
										
										
										
										
										<!--<tr>
											<td>
												<div class="cart_description">
													<p><strong>Adcon Telemetry</strong></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>A723 addIT Radio Telemetry Unit</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 1</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 2</a></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Data Sheet</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Quick Start Guide</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Instruction Manual</a></p>
												</div>
											</td>											
										</tr>
										<tr>
											<td>
												<div class="cart_description">
													<p><strong>Adcon Telemetry</strong></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>A723 addIT Radio Telemetry Unit</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 1</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 2</a></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Data Sheet</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Quick Start Guide</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Instruction Manual</a></p>
												</div>
											</td>											
										</tr>										
										<tr>
											<td>
												<div class="cart_description">
													<p><strong>Adcon Telemetry</strong></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>A723 addIT Radio Telemetry Unit</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 1</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 2</a></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Data Sheet</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Quick Start Guide</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Instruction Manual</a></p>
												</div>
											</td>											
										</tr>
										<tr>
											<td>
												<div class="cart_description">
													<p><strong>Adcon Telemetry</strong></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>A723 addIT Radio Telemetry Unit</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 1</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 2</a></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Data Sheet</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Quick Start Guide</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Instruction Manual</a></p>
												</div>
											</td>											
										</tr>
										<tr>
											<td>
												<div class="cart_description">
													<p><strong>Adcon Telemetry</strong></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>A723 addIT Radio Telemetry Unit</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 1</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> File Name 2</a></p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p>--</p>
												</div>
											</td>
											<td>
												<div class="cart_description">
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Data Sheet</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Quick Start Guide</a></p>
													<p><a href="#" target="_blank"><i class="fa fa-file-pdf-o" style="color: #b70b07; font-size: 18pt"></i> Instruction Manual</a></p>
												</div>
											</td>											
										</tr>-->
									</tbody>
								</table>
			  </div>
			</div>			
		</div>
	</div>
</section>
<!--  Check out End  -->

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