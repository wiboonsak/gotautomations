<!DOCTYPE html>
<?php 
if($currentID){
 $imgservice = $this->Product_model->loadserviceImages($currentID); 
 foreach ($imgservice->result() AS $imgservice3){}
}
 ?>
<html>
    <head>
        <meta charset="utf-8" />
        <title>GOT AUTOMATION</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <?php if($currentID){?>
        <meta property="fb:app_id"        content="355179808591281"/>
         <meta property="og:url"           content="<?php echo base_url('Service/service_detail/').$currentID?>"/>
         <meta property="og:type"          content="website"/>
        <meta property="og:title"         content="<?php echo $service_topic?>"/>
        <meta property="og:description"   content="<?php echo strip_tags($service_detail)?>"/>
        <meta property="og:image"         content="<?php echo base_url('uploadfile/service/').$imgservice3->images_name?>"/>
        <?php }?>
        <!-- App favicon -->       

        <!-- App css -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet" type="text/css" />
         <link href="<?php echo base_url('assets/plugins/sweet-alert/sweetalert2.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/plugins/summernote/summernote-bs4.css') ?>" rel="stylesheet" />
        <link href="<?php echo base_url('assets/css/icons.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/css/style.css')?>" rel="stylesheet" type="text/css" />
        <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
		
		<style>
			#topnav .navigation-menu > li > a {
				padding-right: 10px !important;
			}
                        @media screen {
    #printSection {
        display: none;
    }
}
@media print {
    body * {
        visibility:hidden;
       
    }
    #printSection, #printSection * {
        visibility:visible;
    }
    #printSection {
        position:absolute;
        left:0;
        top:0;
        width: 100%
    }
    
    
}
		</style>
                 
        <script src="<?php echo base_url('assets/js/modernizr.min.js')?>"></script>

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
    <body>

        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!-- <a href="<?php echo base_url()?>" class="logo">
                            <span class="logo-small"><i class="mdi mdi-radar"></i></span>
                            <span class="logo-large"><i class="mdi mdi-radar"></i> Highdmin</span>
                        </a> -->
                        <!-- Image Logo -->
                        <a href="<?php echo base_url('control')?>" class="logo">
                            <img src="<?php echo base_url('assets/images/logo_sm.png')?>" alt="" height="26" class="logo-small">
                            <img src="<?php echo base_url('HTML_2/images/logo-dark.png')?>" alt="" height="40" class="logo-large">
                        </a>

                    </div>
                    <!-- End Logo container-->

                    <div class="menu-extras topbar-custom">

                        <ul class="list-unstyled topbar-right-menu float-right mb-0">

                            <li class="menu-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li> 

                            <?php 	$userID = $this->session->userdata('name'); 
                            		$user_type = $this->session->userdata('user_type'); 
                            ?>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?php echo base_url('assets/images/avatar-1.jpg')?>" alt="user" class="rounded-circle"> <span class="ml-1 pro-user-name"><?php echo $userID?> <i class="mdi mdi-chevron-down"></i> </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
      								<div class="dropdown-item noti-title">
                                        <h6 class="text-overflow m-0">Welcome !</h6>
                                    </div>

                                    <!-- item-->
                                    <a href="javascript:void(0);" onClick="cangePassForm()" class="dropdown-item notify-item">
                                        <i class="fi-head"></i> <span>Change Password</span>
                                    </a>
                                    <!-- item-->
                                    <a href="<?php echo base_url('logout')?>" class="dropdown-item notify-item">
                                      <span class="text-danger"><i class="fi-power"></i> <span>Logout</span></span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="#"><i class="icon-layers"></i>Product</a>
                                <ul class="submenu">
                                   
                                    <li><a href="<?php echo base_url('Control/category')?>">Product Category</a></li>
                                    <li><a href="<?php echo base_url('Control/Product_add')?>">Add Product</a></li>
                                    <li><a href="<?php echo base_url('Control/Product_list')?>">List All Product</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="icon-briefcase"></i>News </a>
                                <ul class="submenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo base_url('Control/news_add')?>">Add News</a></li>
                                            <li><a href="<?php echo base_url('Control/news_list')?>">List All News</a></li>

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="icon-briefcase"></i>Reference</a>
                                <ul class="submenu">
                                    <li>
                                        <ul>
                                            <li><a href="<?php echo base_url('Control/reference_add')?>">Add Reference</a></li>
                                            <li><a href="<?php echo base_url('Control/reference_list')?>">List All Reference</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="icon-fire"></i>Slide Show</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Control/slide_add')?>">Add Slide</a></li>
                                    <li><a href="<?php echo base_url('Control/slide_list')?>">List All Slide Show</a></li>
                                </ul>
                            </li>
                            <li class="has-submenu">
                                <a href="#"><i class="icon-briefcase"></i>Certificates</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Control2/certificates_add')?>">Add Certificates</a></li>
                                    <li><a href="<?php echo base_url('Control2/certificates_list')?>">List All Certificates</a></li>
                                </ul>
                            </li>
                            				<li class="has-submenu">
                                <a href="#"><i class="icon-fire"></i>Service</a>
                                <ul class="submenu">
                                    <li><a href="<?php echo base_url('Control2/service_add')?>">Add Service</a></li>
                                    <li><a href="<?php echo base_url('Control2/service_list')?>">List All Service</a></li>
                                    <li><a href="<?php echo base_url('Control2/service_detail_add')?>">Add Service Detail</a></li>
                                    <li><a href="<?php echo base_url('Control2/service_detail_list')?>">List All Service Detail</a></li>

                                </ul>
                            </li>
<!--							<li class="has-submenu">
                                <a href="#"><i class="icon-fire"></i>Manuals</a>
                                <ul class="submenu">
                                    <li><a href="<?php //echo base_url('Control/slide_add')?>">Manufacturer</a></li>
                                    <li><a href="<?php //echo base_url('Control/slide_list')?>">Add Manual</a></li>
                                    <li><a href="<?php //echo base_url('Control/slide_list')?>">List All Manual</a></li>
                                </ul>
                            </li>							-->
							<li class="has-submenu">
                                <a href="<?php echo base_url('Control2/quotations')?>"><i class="icon-briefcase"></i>Quotations</a>                         
                            </li>							
							<li class="has-submenu">
                                <a href="<?php echo base_url('Control2/member')?>"><i class="icon-briefcase"></i>Members</a>                         
                            </li>							
							<li class="has-submenu">
                                <a href="<?php echo base_url('Control2/downlond')?>"><i class="icon-briefcase"></i>Download</a>                         
                            </li>
                            <?php if($user_type!='2'){?>
                            <li class="has-submenu">
                                <a href="#"><i class="fa fa-archive"></i>Admin</a>
                                <ul class="submenu">
                                     <li >
                                        <a href="<?php echo base_url('Control/admin_add')?>">Add Admin</a>
                                    </li>
                                    <li><a href="<?php echo base_url('Control/admin_list')?>">List All Admin</a></li>
                                </ul>
                            </li>
                            <?php } ?>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
