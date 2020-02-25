<header id="header-top_1">
	<div id="header-top">
		<div class="container">
			<div class="row">
				<div class="col-md-7 col-sm-8 col-xs-12 header_top_text">
					<p>We are Best in Town With 50 years of Experience.</p>
				</div>
				<div class="col-md-2 col-sm-8 col-xs-12 header_top_text text-right">
                                        <?php if($this->session->userdata('member_id')==''){?>
                                    <p><a href="javascript:void(0)" data-toggle="modal" data-target="#Login1" style="border-radius: 5px; border: #ECECEC 1px solid;padding: 5px 10px">Login | Signup</a></p>
                                        <?php }else{?>
                                    <p><?php echo $this->session->userdata('member_name')?> | <a href="javascript:void(0)" onclick="logout()" style="border-radius: 5px; border: #ECECEC 1px solid;padding: 5px 10px">Logout</a></p>
                                            <?php }?>
				</div>
				<div class="col-md-3 col-sm-8 col-xs-12 text-right">					
					<ul class="top_socials">
						<li><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript:void(0)"><i class="fa fa-youtube"></i></a></li>
						<li><a href="javascript:void(0)"><i class="fa fa-instagram"></i></a></li>
						<li><a href="javascript:void(0)"><img src="<?php echo base_url('HTML_2/images/icon_tiktok.png')?>" alt="tiktok" /></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="header-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<a href="<?php echo base_url()?>"><img src="<?php echo base_url('HTML_2/images/logo-dark.png')?>" alt="logo" />
					</a>
				</div>
				<div class="col-md-10 col-sm-12 col-xs-12">
					<div class="get-tuch text-left">
						<i class="fa fa-phone" aria-hidden="true"></i>
						<ul>
							<li>
								<h4>Phone Number</h4>
							</li>
							<li>
								<p><a href="tel:+660950787525" target="_blank">095-0787525</a> , <a href="tel:+660831968545" target="_blank">083-1968545</a></p>
							</li>
						</ul>
					</div>
					
					<div class="get-tech-line"><img src="<?php echo base_url('HTML_2/images/get-tuch-line.png')?>" alt="line" /></div>
					<div class="get-tuch text-left">
						<i class="fa fa-envelope-o" aria-hidden="true"></i>
						<ul>
							<li>
								<h4>Email Address</h4>
							</li>
							<li>
								<p><a href="mailto:saleteam1@gotrading.co.th" target="_blank">saleteam1@gotrading.co.th</a>
								</p>
							</li>
						</ul>
					</div>
					
					<div class="get-tech-line"><img src="<?php echo base_url('HTML_2/images/get-tuch-line.png')?>" alt="line" /></div>
					<div class="get-tuch text-left">
						<i class="fa fa-wechat" aria-hidden="true"></i>
						<ul>
							<li>
								<h4>ID Line</h4>
							</li>
							<li>
								<p><a href="http://line.me/ti/p/@gotrading" target="_blank">@gotrading</a></p>
							</li>
						</ul>
					</div>
					
					<div class="get-tuch text-left">						
						<ul>
							<li>
								<a href="http://line.me/ti/p/@gotrading" target="_blank"><img src="<?php echo base_url('HTML_2/images/lineatgotrading.jpg')?>" alt="line_Gotaumation" width="60"  /></a>
							</li>							
						</ul>
					</div>
					
				</div>
			</div>
		</div>
	</div>

        <div class="modal fade" id="Login1">
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
</header>
