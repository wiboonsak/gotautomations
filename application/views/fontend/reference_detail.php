
<!--  Header End  -->


<!-- Inner Banner Start -->
<section id="inner-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div class="inner-banner-detail">					
					<h2 style="color: #1A1A1A !important">PROJECTS REFERENCE</h2>
					<h3>GOT AUTOMATION</h3>
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
                 foreach ($referenceDetail->result() AS $data) {}
                 $imgreference = $this->Product_model->loadreferenceImg($data->id);                                                   foreach ($imgreference->result() AS $imgreference2){?>
							<div class="item web_box">
								<img src="<?php echo base_url('uploadfile/reference/').$imgreference2->images_name?>" alt="GOT AUTOMATION">
							</div>
							<?php }?>
						</div>
					</div>
					
					<div class="blog-box-deatil">
						<h2><a href="javascript:void(0)"><?php echo $data->reference_title ?></a></h2>
						<div class="blog-tags">
							<a href="javascript:void(0)"><span><i class="fa fa-calendar" aria-hidden="true"></i></span><?php echo $this->Product_model->getDayMonthYear($data->reference_date_add)?></a>
						</div>
						<p><?php echo $data->reference_detail?></p>						
					
					
						<div class="inner_heading" style="padding-top: 15px;">
							<h2>Clip Video:</h2>
						</div>
						<div style="padding-top: 20px; float: left;">
							<ul>
                                                            <?php foreach ($linkyoutube->result() AS $linkyoutube2){?>
								<li style="padding: 5px; float: left;"><?php echo $linkyoutube2->linkyoutube?></li>
                                                            <?php }?>
								
							</ul>
						</div>			
					</div>					
				</div>

			</div>
		</div>
	</div>
</section>
<!--  Blog End  -->


	
	
</body>

</html>