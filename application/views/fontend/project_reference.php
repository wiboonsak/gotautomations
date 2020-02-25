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

<style>
    
    .isDisabled {
  pointer-events: none;
  cursor: not-allowed !important;
  opacity: 0.5;
  text-decoration: none;
}
</style>

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
						<p style="padding-bottom: 10px; text-align: left;"><a href="<?php echo base_url('Welcome')?>">Home</a><span> / </span>Project Reference</p>
						<!--<h2>Flow Meters for ALL Applications</h2>-->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Inner Banner End -->

	
	
<!-- Latest News Start  -->
<section id="news" class="padding_bottom padding_top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading_logistic p-b-35">
					<p>GOT AUTOMATION</p>
					<h2>PROJECT REFERENCE</h2>
					<div class="border"></div>
				</div>
			</div>
		</div>
		<div class="row">

			<div class="col-md-12 col-sm-12 col-xs-12 m-t-35">
                              <?php 
                                      $limit =''; $notUse ='';                            
$countAll=$this->Product_model->getreferenceDetail1($limit,$notUse,'-100','-100');

        $countRow = $countAll->num_rows(); 
        $totalRow = ceil($countRow/$perpage);
foreach ($referenceDetail->result() AS $data) {
    $firstImg = $this->Product_model->getreferenceImg($data->id);
                                    ?>
				<div class="row p-b-35">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<div class="logistic_news">
                                                    <img src="<?php echo base_url('uploadfile/reference/') . $firstImg ?>" alt="image" width="336" height="345">
						</div>
					</div>
					<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="logistic_news">
                                                    <div class="logistic_news_detail" style="height:345px">
								<h3><a href="<?php echo base_url('Reference/Reference_detail/').$data->id ?>"><?php echo  substr_replace($data->reference_title,'....',35) ?></a></h3>
								<?php echo $this->Product_model->str_limit_html($data->reference_detail,300)?>
								<a href="<?php echo base_url('Reference/Reference_detail/').$data->id ?>" class="btn btn-info">Read More</a>
								<span style="float: right"><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $this->Product_model->getDayMonthYear($data->reference_date_add)?></span>
							</div>
						</div>
					</div>
				</div>
<?php }?>
			</div>
		</div>
	
	
		<div class="col-md-12 text-center padding-top-50">
					<nav aria-label="...">
                                             <?php 
                                                    $page2 =$page-1; 
                                                    $page3 =$page+1; 
                                                    
                                                    ?>
						<ul class="pagination">
							<li <?php if($page == 1){?>class="isDisabled"<?php }?>> <a href="<?php echo base_url('Reference/Page/').$page2?> " >
								<span>
                      <span aria-hidden="true">Prev</span>
								</span>
                                                                </a>
							</li>
                                                         <?php for($i=1;$i<=$totalRow;$i++){ ?>     
							<li class=" <?php if($page == $i){ echo 'active'; }?>">
                                                             <a href="<?php echo base_url('Reference/Page/').$i?>  " >
								<span><?php echo $i?><span class="sr-only">(current)</span></span>
                                                                </a>
							</li>
<?php }?>     
                                                        <li <?php if($totalRow == 1){?>class="isDisabled"<?php }?>>
                                                            <a href="<?php echo base_url('Reference/Page/').$page3?> " >
								<span>
                      <span aria-hidden="true">Next</span>
								</span>
                                                                </a>
							</li>
						</ul>
					</nav>
				</div>
	
	</div>
</section>
<!-- Latest News End-->

	
	

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