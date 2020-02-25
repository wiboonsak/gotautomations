<!DOCTYPE html>
<?php  
foreach ($referenceDetail->result() AS $data) {}
 $imgreference = $this->Product_model->loadreferenceImg($data->id); foreach ($imgreference->result() AS $imgreference3){}
?>
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
	

         <meta property="fb:app_id"        content="355179808591281"/>
         <meta property="og:url"           content="<?php echo base_url('Reference/Reference_detail/').$data->id?>"/>
         <meta property="og:type"          content="website"/>
        <meta property="og:title"         content="<?php echo $data->reference_title?>"/>
        <meta property="og:description"   content="<?php echo strip_tags($data->reference_detail)?>"/>
        <meta property="og:image"         content="<?php echo base_url('uploadfile/reference/').$imgreference3->images_name?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<script type="text/javascript">LineIt.loadButton();</script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
	

</head>

<div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
  
  </script>

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
						<p style="padding-bottom: 10px; text-align: left;"><a href="<?php echo base_url('Welcome')?>">Home</a><span> / </span>Project Reference</p>
						<!--<h2>Flow Meters for ALL Applications</h2>-->
					</div>
				</div>
			</div>
		</div>
	</section>
<!-- Inner Banner End -->

	
<!--  Blog Start  -->
<section id="blog-section" class="padding_bottom padding_top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="blog-box">
					<div id="web" class="blog-box-img">
						<div id="bloghome_slider">
                                                    <?php $n=1; 
                         foreach ($imgreference->result() AS $imgreference2){?>
							<div class="item web_box">
                                                            <img src="<?php echo base_url('uploadfile/reference/').$imgreference2->images_name?>" alt="image" style="width: 1140px;height: 641px">
							</div>
                 <?php }?>
						</div>
						<!--<div class="date-tag">
							<span class="date-sec"><p>25 Nov, 2019</p></span>
						</div>-->
					</div>
					<div class="blog-box-deatil" style="padding:50px;">
						<h2><a href="javascript:void(0)"><?php echo $data->reference_title ?></a></h2>
						<div class="blog-tags">
							<a href="javascript:void(0)"><span>By</span> Admin,</a>
							<a href="javascript:void(0)"><span><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $this->Product_model->getDayMonthYear($data->reference_date_add)?></a>
						</div>
                                                <p><?php echo $data->reference_detail?></p>
						<div style="padding-top: 20px; float: left;">
							<ul>
                                                            <?php foreach ($linkyoutube->result() AS $linkyoutube2){?>
								<li style="padding: 5px; float: left;"><?php echo $linkyoutube2->linkyoutube?></li>
                                                            <?php }?>
								
							</ul>
						</div>	
						
                                                <div class="blog-tags" style="width: 300px; padding: 10px;">
                                                     <div class="row"> 
                                                         <div class="col-md-4">
							<a href="javascript:void(0)"><span>Share on</span></a>
                                                        </div>
                                                         <div class="col-md-2" >
                                                            
                                                             <a href="javascript:void(0)"  onclick="windowOpener('500', '700', 'facebook-share', 'https://www.facebook.com/sharer/sharer.php?u=<?php echo base_url('Reference/Reference_detail/').$data->id?>')">
                                                             <img src="<?php echo base_url('HTML_2/images/facebook1.png')?>" alt="image" width="28px">
</a>
<!--                                                        <div class="fb-share-button" 
    data-href="<?php //echo base_url('News/news_detail/').$data->id?>" 
    data-layout="button">
                                                            </div>-->
  </div>
                                                        <div class="col-md-2">
							<div class="line-it-button" data-lang="th" data-type="share-b" data-ver="3" data-url="<?php echo base_url('Reference/Reference_detail/').$data->id?>" data-color="default" data-size="small" data-count="false" style="display: none;"></div>  
                                                        
                                                              
						</div>
                                                         


						</div>
						</div>
                                                
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--  Blog End  -->


	

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
	
<script type="text/javascript">
            $(document).ready(function() {
    $("iframe").removeAttr('width');
    $("iframe").removeAttr('height');
    $("iframe").css("width", "450px");
    $("iframe").css("height", "315px");
});
  </script>

	<script>
          //--------------------------------------
        	 function windowOpener(windowHeight, windowWidth, windowName, windowUri)
			{
					var centerWidth = (window.screen.width - windowWidth) / 2;
					var centerHeight = (window.screen.height - windowHeight) / 2;
    				newWindow = window.open(windowUri, windowName, 'resizable=1,scrollbars=yes,width=' + windowWidth +  ',height=' + windowHeight +  ',left=' +centerWidth + ',top=' + centerHeight);
					newWindow.focus();
					return newWindow.name;
		}
                //--------------------------------------
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