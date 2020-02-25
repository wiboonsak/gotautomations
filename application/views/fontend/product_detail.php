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
<style>
  .colera:hover {
  color: #ffa50a;
}  
</style>
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

<?php foreach($product->result() AS $product2){} ?>

<!-- Inner Banner Start -->
	<section id="inner-banner" style="border-bottom:2px solid #fb452b; padding-top: 10px !important">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="inner-banner-detail">
						<p style="padding-bottom: 10px; text-align: left;"><a href="<?php echo base_url('Welcome')?>">Home</a>
							<?php for($i=1; $i <= 5; $i++){
									if($i == 1){
										$numCate = $product2->category1;
									} else if($i == 2){
										$numCate = $product2->category2;
									} else if($i == 3){
										$numCate = $product2->category3;
									} else if($i == 4){
										$numCate = $product2->category4;
									} else if($i == 5){
										$numCate = $product2->category5;
									}	

								if($numCate != '0'){
									$categoryName = $this->Category_model->get_dataCategory($numCate);
									foreach($categoryName->result() AS $categoryName2){}
							?>
							 / <a href="<?php echo base_url()?>Product/cat_product/<?php echo $categoryName2->id?>"><?php echo $categoryName2->name_th?></a>		
							<?php } } ?> / <?php echo $product2->name_th?></p>
							
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
                <input type="hidden" id="product_id" name="product_id" value="<?php echo $product2->id?>">
				<div class="col-md-8 col-sm-8 col-xs-12">

                                    <div class="blog-box" style="margin-bottom:0px!important;">						
						<div class="blog-box-deatil">
							<h2><a href="#"><?php echo $product2->name_th?></a></h2>	
						</div>
						
						<?php if($img->num_rows() > 0){ ?>

						<div id="web" class="blog-box-img">
							<div id="bloghome_slider">
							<?php foreach($img->result() AS $img2){ ?>						

								<div class="item web_box">
									<img src="<?php echo base_url().'uploadfile/product/'.$img2->imge_name?>" alt="image">
								</div>
							<?php } ?>
							</div>
							
							<?php if($product2->instock == '1'){ ?>
							<div class="date-tag">								
								<span class="pic-sec"><i class="fa fa-sign-in" aria-hidden="true"></i> IN STOCK</span>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
						
						
						<div class="row" style="padding-top: 20px">
							<div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="faq_box padding_bottom" style="padding-bottom:30px !important;">
									<ul class="items">
									<?php if($product2->overview_th != ''){ ?>									
										<li><a href="javascript:void(0)" class="expanded">OVERVIEW</a>
											<ul class="sub-items" style="display:block;">
												<li>
													<p><?php echo $product2->overview_th?></p>
												</li>
											</ul>
										</li>
									<?php } ?>	
										
									<?php if($product2->specification_th != ''){ ?>
										<li><a href="javascript:void(0)">SPECIFICATION</a>
											<ul class="sub-items">
												<li>
													<p><?php echo $product2->specification_th?></p>
												</li>
											</ul>
										</li>
									<?php } ?>	

									<?php if($linkyoutube->num_rows() > 0){ ?>
										<li><a href="javascript:void(0)">CLIP VIDEO</a>
											<ul class="sub-items">
												<li>
												<?php foreach($linkyoutube->result() AS $linkyoutube2){ ?>
													<p><?php echo $linkyoutube2->linkyoutube;?></p>
												<?php } ?>
												</li>
											</ul>
										</li>
									<?php } ?>	
										
									<?php if($fileProduct->num_rows() > 0){ ?>
										<li><a href="javascript:void(0)">DOWNLOADS</a>
											<ul class="sub-items">
											<?php foreach($fileProduct->result() AS $fileProduct2){
												
												$count1 = $this->Download_model->countdownload($fileProduct2->id,$product2->id);
												foreach($count1->result() AS $count2){}
											?>
											
												<li>
													<div class="row" style="margin: 0px 20px; border-bottom: 1px solid #B3B3B3;">
														<div class="col-md-4">
															<p><i class="fa fa-file-pdf-o" style="font-size: 22px; color:red;"></i><strong> <?php echo $fileProduct2->txtTitle_th?></strong></p>
														</div>
														<div class="col-md-4">
															<p><?php echo $count2->count2?> Download(s)</p>
														</div>
														<div class="col-md-4">									
                                                            <a <?php if($this->session->userdata('member_id')!=''){?>href="<?php echo base_url().'uploadfile/catalogue/'.$fileProduct2->imge_name?>" download="<?php echo $fileProduct2->txtTitle_th?>"<?php }else{?>href="javascript:void(0)"<?php } ?> ><button type="button" class="btn btn-primary" <?php if($this->session->userdata('member_id')==''){?>data-toggle="modal" data-target="#Login"<?php }else{?>onclick="download('<?php echo $product2->id?>' , '<?php echo $fileProduct2->id?>' , '<?php echo $this->session->userdata('member_id')?>')"<?php } ?> >Click to Download</button></a>
														</div>
													</div>
												</li>
											<?php } ?>														
											</ul>
										</li>
									<?php } ?>
	
									<?php if($faq->num_rows() > 0){ ?>
										<li><a href="javascript:void(0)">FAQ'S</a>
											<ul class="sub-items">
												<li>										
													<div class="container">										
													<?php foreach($faq->result() AS $faq2){ ?>					
														<div class="panel panel-default">
														  <div class="panel-heading">
															<h4 class="panel-title">
															  <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $faq2->id?>"><?php echo $faq2->topic_th?></a>
															</h4>
														  </div>
														  <div id="collapse<?php echo $faq2->id?>" class="panel-collapse collapse in">
															<div class="panel-body">
																<?php echo $faq2->desc_th?>
															</div>
														  </div>
														</div>
													<?php } ?>												
													</div> 
												</li>
											</ul>
										</li>
									<?php } ?>
									</ul>
								</div>
							</div>
						</div>
                                            
					</div>

				</div>

                               
				<div class="col-md-4 col-sm-4 col-xs-12">
					
					<div class="blog-sidebar-box" style="padding: 5px !important">												
						<form id="list_blog_contact" style="padding: 10px; border: none !important">
							<div class="inner_heading">
								<p>We Offer for you</p>
								<h3>Quote Quotation</h3>
							</div>

							<div class="form-group">
                                 <input type="text" class="form-control" placeholder="Name*" required <?php if($this->session->userdata('member_id')!=''){?>value="<?php echo $this->session->userdata('member_name')?>"<?php }?> id="nameQuotation" name="nameQuotation">
                                 <input type="hidden" id="member_id" name="member_id" value="<?php echo $this->session->userdata('member_id')?>">
							</div>
							<div class="form-group">
                                 <input type="text" class="form-control" placeholder="Phone" required <?php if($this->session->userdata('member_id')!=''){?>value="<?php echo $this->session->userdata('member_phone')?>"<?php }?> id="phoneQuotation" name="phoneQuotation">
							</div>
							<div class="form-group">
                                 <input type="text" class="form-control" placeholder="Line" <?php if($this->session->userdata('member_id')!=''){?>value="<?php echo $this->session->userdata('member_line')?>"<?php }?> id="lineQuotation" name="lineQuotation">
							</div>
							<div class="form-group">
                                 <input type="email" class="form-control" placeholder="Email*" required <?php if($this->session->userdata('member_id')!=''){?>value="<?php echo $this->session->userdata('member_email')?>"<?php }?> id="emailQuotation" name="emailQuotation">
							</div>
							<div class="form-group">
                                 <textarea class="form-control" placeholder="Address" id="addressQuotation" name="addressQuotation"></textarea>
							</div>

							<div class="form-group">
                                 <textarea class="form-control" placeholder="Message *" id="messageQuotation" name="messageQuotation"></textarea>
							</div>

							<div class="list_blog_contact">
								<button type="button" class="btn_dark" onclick="Quotation()">Submit</button>
							</div>
						</form>

					</div>
				</div>
			</div>
                    <div class="row" >
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h4>RELATED PRODUCTS</h4>
                                                    <br>
                                                    <div id="partners1">
		<div class="container">

			<div class="row">
				<div id="partners_slider1">

                                    <?php 
                                    if($product2->category5 !=0){
                                        $cate = $product2->category5;
                                        $typecate = 'category5';
                                    }else if($product2->category4 !=0){
                                        $cate = $product2->category4;
                                        $typecate = 'category4';
                                    }else if($product2->category3 !=0){
                                        $cate = $product2->category3;
                                        $typecate = 'category3';
                                    }else if($product2->category2 !=0){
                                        $cate = $product2->category2;
                                        $typecate = 'category2';
                                    }else if($product2->category1 !=0){
                                        $cate = $product2->category1;
                                        $typecate = 'category1';
                                    }
                                 $get_productData2 =  $this->Category_model->get_productData2($cate , $typecate,'10',$product2->id );
                                 foreach ($get_productData2->result() AS $productData){
                                     $chFirst = $this->Product_model->loadProductImg($productData->id);
                                    ?>
					<div class="item partners_box">
                                            <?php if($chFirst->num_rows() > 0){ ?>
                                            <a href="#"><img src="<?php echo base_url().'uploadfile/product/'.$this->Product_model->getFirstImg($productData->id)?>" alt="GOT AUTOMATION" width="208" height="110">
						</a>
                                            <?php } else { ?>
                                            <a href="#"><img src="<?php echo base_url()?>HTML_2/images/placeholder.png" alt="GOT AUTOMATION" width="208" height="110" style="padding:0px;border: 0px">
						</a>
						
						<?php } ?>
                                            <div class="services_detail" style="background-color: #f3f3f3;margin-right: 20px;padding: 10px !important;height: 100px">
                                                <a class="colera" href="<?php echo base_url()?>Product/product_detail/<?php echo $productData->id?>" style="font-size:13px;border-bottom: 0px"><strong><?php echo $productData->name_th?></strong></a><br>
						<a class="colera" href="<?php echo base_url()?>Product/product_detail/<?php echo $productData->id?>" style="font-size:12px;">View Product</a>
					</div>
					</div>
                                 <?php }?>
				</div>
			</div>

		</div>
	</div>
                                                </div>
                                           </div>
                    <div class="row" >
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <h4>SERVICE</h4>
                                                    <br>
                                                    <div id="partners2">
		<div class="container">

			<div class="row">
                            <div id="partners_slider2" class="text-center"> 
                                     <?php foreach ($getservice_list->result() AS $service_list){?>
					<div class="item partners_box" >
                                            <div class="services_detail" style="background-color: #0179bf;margin-right: 20px;padding: 10px !important;height: 100px">
                                                <i class="fa <?php echo $service_list->icon_class?>" aria-hidden="true" style="font-size:30px;color: #ffa50a"></i><br>
                                                <a class="colera" href="<?php echo base_url('Service/service/'.$service_list->topic.'/'.$service_list->id);?>" style="font-size:13px;border-bottom: 0px;color: white;"><strong><?php echo $service_list->topic?></strong></a><br>
						<a class="colera" href="<?php echo base_url('Service/service/'.$service_list->topic.'/'.$service_list->id);?>" style="font-size:12px;color: white;text-align: center">View Service</a>
					</div>
					</div>
                                 <?php }?>
				</div>
			</div>

		</div>
	</div>
                                                </div>
                                           </div>
                    
                                           </div>
		</div>
            
	</section>
	<section>
            <div class="container">
            
	</section>
	<!--  Blog End  -->


	<!-- The Modal -->
	  <div class="modal fade" id="Login">
		<div class="modal-dialog modal-xl">
		  <div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Login / Signup for download file.</h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Modal body -->
			<div class="modal-body">
				
				<!-- Login -->
				<section id="form">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="login-form">
									<div class="inner_heading">
										<h4>Login to <span>your account</span></h4>
									</div>
                                    <form enctype="multipart/form-data" id="LoginForm" name="LoginForm"  method="POST">
										<div class="form-group">
                                             <input placeholder="Email Address" class="form-control" type="email" id="emaillogin" name="emaillogin" required>
										</div>
										<div class="form-group">
                                              <input placeholder="Password" class="form-control" type="password" id="passwordlogin" name="passwordlogin" required>
										</div>
										<span>
											<input class="checkbox" type="checkbox"> 
											Keep me signed in
										</span>
                                        <button type="button" class="btn_dark" onclick="loginform()">Login</button>
									</form>
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-12 text-center">
								<h2 class="or">OR</h2>
							</div>
							<div class="col-md-5 col-sm-5 col-xs-12">
								<div class="signup-form">
									<div class="inner_heading">
										<h4>New User <span>Signup!</span></h4>
									</div>
                                    <form enctype="multipart/form-data" id="NewUserForm" name="NewUserForm" method="POST"> 
										<div class="form-group">
                                             <input placeholder="Name*" class="form-control" type="text" name="name" id="name" required>
										</div>	
										<div class="form-group">
                                             <input placeholder="Phone*" class="form-control" type="text" name="Phone" id="Phone" required>
										</div>
										<div class="form-group">
                                             <input placeholder="Line" class="form-control" type="text" name="Line" id="Line">
										</div>
										<div class="form-group">
                                             <input placeholder="Email Address*" class="form-control" type="email" name="email" id="email" required onchange="checkmail(this.value)">
										</div>
										<div class="form-group">
                                             <input placeholder="Password*" class="form-control" type="password" name="Password" id="Password" required>
										</div>
                                        <button type="button" class="btn_dark" onclick="AddNewUser()">Signup</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
				<!-- Login End -->
				
			</div>

			<!-- Modal footer -->
			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>

		  </div>
		</div>
	  </div>	

	<!-- Footer -->
	<?php include("footer.php");?>  

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
        
	
        
	function download(product_id,file_id,member_id){
        $.post('<?php echo base_url('Product/download')?>', { product_id : product_id , file_id : file_id , member_id : member_id }, function(data){ });  
	}
        
	
        
    function Quotation(){
            var name = $('#nameQuotation').val();
            var member_id = $('#member_id').val();
            var phone = $('#phoneQuotation').val();
            var line = $('#lineQuotation').val();
            var email = $('#emailQuotation').val();
            var address = $('#addressQuotation').val();
            var message = $('#messageQuotation').val();
            var product_id = $('#product_id').val();
            if(name==''){
                alert('Please enter Name');
                $('#nameQuotation').focus();
            }else if(email==''){
                alert('Please enter Email');
                $('#emailQuotation').focus();
            }else if(message==''){
                alert('Please enter Message');
                $('#messageQuotation').focus();
            }else{
            	$.post('<?php echo base_url('Product/Quotation')?>', { name : name , member_id : member_id , phone : phone , line : line , email : email , address : address , message : message , product_id : product_id }, function(data){
                	if(data!='Error'){
                   
                    	alert('Save Quotation Successfully');
                		setTimeout(function(){ window.location.href = "<?php echo base_url('Product/product_detail/')?>"+product_id }, 2000);
            		}
            	});	 
			}
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