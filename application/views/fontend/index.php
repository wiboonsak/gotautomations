<!DOCTYPE html>

<html lang="en">
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


<!--  Banner Start  -->
<section class="rev_slider_wrapper" style="height: 350px !important">

	<div id="rev_slider_2" class="rev_slider" data-version="5.0">

		<ul>

			<!-- SLIDE  -->
                     <?php foreach ($SlideDetail->result() AS $data) {
                                $firstImg = $this->Product_model->getSlideImg($data->id);
                         
?>
			<li data-transition="fade">

				<img src="<?php echo base_url('uploadfile/banner/').$firstImg ?>" alt="" data-bgposition="center center" data-bgfit="cover" class="rev-slidebg">

				<div class="tp-caption tp-resizeme" data-x="['left','left','left','left']" data-hoffset="['15','15','30','15']" data-y="['40','30','30','30']" data-voffset="['0','0','0','0']" data-responsive_offset="on" data-visibility="['on','on','on','on']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="800">

					<p class="banner_P"><?php echo $data->slide_title ?></p>

				</div>

				<div class="tp-caption tp-resizeme" data-x="['left','left','left','left']" data-hoffset="['15','15','30','15']" data-y="['100','30','30','30']" data-voffset="['0','0','0','0']" data-responsive_offset="on" data-visibility="['on','on','on','off']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="800">

					<h3 class="banner_h3"><?php echo $data->slide_detail ?></h3>

				</div>

				<div class="tp-caption tp-resizeme" data-x="['left','left','left','left']" data-hoffset="['15','15','30','15']" data-y="['130','50','50','50']" data-voffset="['0','0','0','0']" data-responsive_offset="on" data-visibility="['on','on','on','off']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="800">

					<h2 class="banner_h2"><strong><?php echo $data->slide_desc?></strong></h2>

				</div>

				<div class="tp-caption tp-resizeme" data-x="['left','left','left','left']" data-hoffset="['15','15','30','15']" data-y="['210','70','70','70']" data-voffset="['0','0','0','0']" data-responsive_offset="on" data-visibility="['on','on','on','on']" data-transform_idle="o:1;" data-transform_in="z:0;rX:0;rY:0;rZ:0;sX:0.9;sY:0.9;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="800">

					<?php if($data->learnMore != ''){?>
					<a href="<?php echo $data->learnMore?>" class="btn_dark">Read More</a>
                                        <?php } ?>     

					<!--<a href="javascript:void(0)" class="btn_light">Join Now</a>-->

				</div>

			</li>
<?php } ?>
		</ul>

	</div>

</section>
<!--  Banner End  -->


<!-- Catagories Products -->

<section id="how-can-help" class="padding_bottom padding_top">

	<div class="container">

		<div class="row">
			<div class="col-md-12 text-center p-b-15">
				<div class="gym_heading">
					<!--<p>GOT Automation Co., Ltd.</p>-->
					<h2>We are Best in Town With 50 years of Experience.</h2>
				</div>
			</div>
		</div>	
		
		<?php if($Category->num_rows() > 0){ ?>
		<div class="row"><!--col-md-3 col-sm-6 col-xs-12-->
			
			<?php foreach($Category->result() AS $Category2){ ?>
			<div class="col-md-3 col-sm-6 col-xs-6 text-center m-t-35">
				<a href="<?php echo base_url()?>Product/cat_product/<?php echo $Category2->id?>" target="_blank">
					<div class="how-can-help-box" style="height: 150px; width: 100%;">
						<i class="<?php if($Category2->icon != ''){ echo 'fa '.$Category2->icon; } else { echo 'fa fa-info-circle'; }?>" aria-hidden="true"></i>
						<h3><?php echo $Category2->name_th?></h3>
						<!--<p>We are Best in Town With 50 years of Experience.</p>-->
						<div class="how-can-help-box__body"></div>
					</div>
				</a>
			</div>
			<?php }
                        
                        /* ?>
                        
			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-qrcode" aria-hidden="true"></i>
					<h3>WATER QUALITIY</h3>
					<!--<p>We are Best in Town With 50 years of Experience.</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-info-circle" aria-hidden="true"></i>
					<h3>LEVEL</h3>
					<!--<p>We are Best in Town With 50 years of Experience.</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div>
			
			
			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-truck" aria-hidden="true"></i>
					<h3>MOISTURE</h3>
					<!--<p>We are Best in Town With 50 years of Experience.</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div>
			
			
			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-podcast" aria-hidden="true"></i>
					<h3>GROUNDWATER</h3>
					<!--<p>We are Best in Town With 50 years of Experience.</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-wrench" aria-hidden="true"></i>
					<h3>WATER STATIONS</h3>
					<!--<p>We are Best in Town With 50 years of Experience.</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div>

			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-server" aria-hidden="true"></i>
					<h3>TELEMETRY</h3>
					<!--<p>We are Best in Town With 50 years of Experience.</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div>
			
			<div class="col-md-3 col-sm-6 col-xs-12 text-center m-t-35">
				<div class="how-can-help-box">
					<i class="fa fa-cogs" aria-hidden="true"></i>
					<h3>GOT AUTOMATION</h3>
					<!--<p>System checks, maintenance along to repair services are available for your convenience</p>-->
					<div class="how-can-help-box__body"></div>
				</div>
			</div><?php */ ?>
			<div class="col-md-3 col-sm-6 col-xs-6 text-center m-t-35">
				<a href="<?php echo base_url()?>Service" target="_blank">
					<div class="how-can-help-box" style="height: 150px; width: 100%;">
						<i class="fa fa-wrench" aria-hidden="true"></i>
						<h3>Services</h3>
						<!--<p>We are Best in Town With 50 years of Experience.</p>-->
						<div class="how-can-help-box__body"></div>
					</div>
				</a>
			</div>

		</div>
		<?php } ?>

	</div>

</section>

<!-- Catagories Products end -->


<!-- News Event start -->
<section id="causes" class="padding_bottom padding_top">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="gym_heading heading_space">
					<p>Got Automation Co., Ltd.</p>
					<h2>News & Activities</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="services_slider">
                                    <?php 
                        foreach ($newsDetail->result() AS $newsDetail2){
                             $firstImg = $this->Product_model->getNewsImg($newsDetail2->id);
                            ?>
					<div class="item services_box text-center">
						<div class="services_img">
                                                    <img src="<?php echo base_url('uploadfile/news/') . $firstImg ?>" alt="Owl Image" style="width: 350px; height: 265px;">
							<div class="precent"><span><?php echo $this->Product_model->getDayMonthYear($newsDetail2->news_date_add)?></span>
							</div>
							<div class="progres-bar">
							</div>
						</div>
						<div class="services_detail causes-box">
							<h3><?php echo $newsDetail2->news_title ?></h3>
                                                        <br>
                                                        <br>
							<?php echo $this->Product_model->str_limit_html($newsDetail2->news_detail,160)?>
                                                        <br>
							<a href="<?php echo base_url('News/news_detail/').$newsDetail2->id ?>">Read More</a>
							<!--<a href="javascript:void(0)">Donate Now</a>-->
						</div>
					</div>
                                        <?php }?>
				</div>
			</div>
		</div>
             <br>
            <div class="row">
			<div class="col-md-12 text-center">
				<div class="gym_heading heading_space">
					<p>Got Automation Co., Ltd.</p>
					<h2>Projects Reference</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div id="services_slider">
                                    <?php 
                        foreach ($referenceDetail->result() AS $referenceDetail2){
                             $firstImg = $this->Product_model->getreferenceImg($referenceDetail2->id);
                            ?>
					<div class="item services_box text-center">
						<div class="services_img">
                                                    <img src="<?php echo base_url('uploadfile/reference/') . $firstImg ?>" alt="Owl Image" style="width: 350px; height: 265px;">
							<div class="precent"><span><?php echo $this->Product_model->getDayMonthYear($referenceDetail2->reference_date_add)?></span>
							</div>
							<div class="progres-bar">
							</div>
						</div>
						<div class="services_detail causes-box">
							<h3><?php echo $referenceDetail2->reference_title ?></h3>
                                                        <br>
                                                        <br>
							<?php echo $this->Product_model->str_limit_html($referenceDetail2->reference_detail,160)?>
                                                        <br>
							<a href="<?php echo base_url('Reference/Reference_detail/').$referenceDetail2->id ?>">Read More</a>
							<!--<a href="javascript:void(0)">Donate Now</a>-->
						</div>
					</div>
                                        <?php }?>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- News Event end -->


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

	function openNav(){

	  document.getElementById("menuSidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	  $('#btnSpan').empty();

	 // var closeBtn = '<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>';

	  var closeBtn = '<span class="toggle_menu" onclick="closeNav()" ><span style="color:#FFFFFF; font-size: 30px; font-weight:500"><i class="fa fa-times"></i></span> Menu</span>';

	  $('#btnSpan').html(closeBtn);

	}


	function closeNav(){

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