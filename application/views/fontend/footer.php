<!--  Contact Us Start  -->
<section class="purchase_now">
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-sm-8 col-xs-12">
				<div class="purchase_text">
					<h3>Would you like to know more information?</h3>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 col-xs-12 text-right">
				<div class="purchase_button">
					<a href="<?php echo base_url('Contact')?>" class="btn_dark"> Contact Us </a>
				</div>
			</div>
		</div>
	</div>
</section>
<!--   Contact Us  End  -->


	<!--  Partners Start  -->
	<div id="partners">
		<div class="container">

			<div class="row">
				<div id="partners_slider">

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner1.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner2.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner1.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner2.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner1.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner2.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner1.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner2.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner1.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

					<div class="item partners_box">

						<a href="#"><img src="<?php echo base_url('HTML_2/images/partner2.png')?>" alt="GOT AUTOMATION">
						</a>

					</div>

				</div>
			</div>

		</div>
	</div>
	<!--  Partners End  -->


	<!-- Footer -->
	<footer id="footer" style="padding-top: 0px !important">
		<div class="container">
			
			<!-- Back To Top -->
			<a href="#top" class="scroll"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
			<!-- /#Back To Top -->
			<div class="footer_bottom">
				<div class="row">
					<div class="col-md-7">
						<div class="copyright">
							<p>Copyright 2019 - GOT Automation Co., Ltd. All Rights Reserved. Developed by <a href="https://www.me-fi.com" target="_blank"> ME-FI.com</a>
							</p>
						</div>
					</div>
					<div class="col-md-5">
						<ul class="socialicons">
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="javascript:void(0)"><img src="<?php echo base_url('HTML_2/images/icon_tiktok.png')?>" alt="tiktok" /></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- /#Footer -->
        <script>
            function AddNewUser(){
            var name = $('#name').val();
            var Phone = $('#Phone').val();
            var Line = $('#Line').val();
            var email = $('#email').val();
            var password = $('#Password').val();
            $.post('<?php echo base_url('Product/AddNewUser')?>', { name : name , Phone : Phone , Line : Line , email : email , password : password }, function(data){
				
                if(data != 'Error'){
                	//setTimeout(function(){ window.location.href = "<?php //echo base_url('Product/product_detail')?>"; }, 2000);
					location.reload();
            	}
            });	 
	}
        function checkmail(email){
        $.post('<?php echo base_url('Product/checkmail')?>', { email : email }, function(data){
           if(data>0){
               alert('This email is already in use.');
               $('#email').val('');
               $('#email').focus();
           }
        });  
	}
	function loginform(){
        var email = $('#emaillogin').val();
        var password = $('#passwordlogin').val();
        $.post('<?php echo base_url('Product/loginform')?>', { email : email , password : password }, function(data){
            if(data != false){
                //setTimeout(function(){ window.location.href = "<?php //echo base_url('Product/product_detail')?>"; }, 2000);
				location.reload();
            }else{
                alert('Incorrect email or password.');
            }
        });            
	}
        function logout(){
        $.post('<?php echo base_url('Product/logoutform')?>', { }, function(data){
            if(data == 1){
				location.reload();
            }else{
                alert('Can not log out');
            }
        });     
        }
            </script>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v5.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="1597218797213726">
      </div>