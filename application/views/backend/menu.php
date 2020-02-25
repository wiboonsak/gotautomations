<!-- Menu Start -->
<div id="menuSidenav" class="sidenav">

 <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>-->
 
  	<form action="/action_page.php" style="max-width:500px;margin:auto">  
		<div class="input-container">
			<i class="fa fa-search icon"></i>
			<input class="input-field" type="text" placeholder="Search..." name="search">
		</div>
  	</form> 
	
  	<div class="menu_sidenav">
		<a href="<?php echo base_url('Welcome')?>"><i class="fa fa-fw fa-home"></i> Homepage</a>
		<?php $category1 = $this->Category_model->listcategory('0','0');	    
		  
		   	  if($category1->num_rows() > 0){ 
				foreach($category1->result() AS $dataCate1){
				
					$sub_category1 = $this->Category_model->listcategory($dataCate1->id,$dataCate1->level + 1); 
		?>		
		
		<a href="<?php echo base_url()?>Product/cat_product/<?php echo $dataCate1->id?>" class="cate0<?php echo $dataCate1->id?> dropdown-btn active" <?php if($sub_category1->num_rows() > 0){ ?>onMouseOver="bigImg('forcate01_<?php echo $dataCate1->id?>','cate02')"<?php } ?> ><i class="fa fa-fw fa-folder"></i> <?php echo $dataCate1->name_th?><?php if($sub_category1->num_rows() > 0){ ?><i class="fa fa-caret-down"></i><?php } ?></a>
		
		<?php  	
					
				
		
				if($sub_category1->num_rows() > 0){ $a = 1;
			  		
						
						
			  		
		?>		
			<ul class="dropdown-container cate02" id="forcate01_<?php echo $dataCate1->id?>" style="padding-left: 25px;">
				
				
				<?php foreach($sub_category1->result() as $dataCate2){ 
				
						$sub_category2 = $this->Category_model->listcategory($dataCate2->id,$dataCate2->level + 1); 
			  		
		
					
			  		if($sub_category2->num_rows() > 0){
				?>
				
				
				<li><a href="#" class="dropdown-btn active" onMouseOver="bigImg('ss3','pp3')" > <?php echo $dataCate2->name_th?> <i class="fa fa-caret-down"></i></a>
					
					<?php //if($sub_category2->num_rows() > 0){ ?>
					
					
						<ul class="dropdown-container cate03" style="padding-left: 20px;" id="forcate02_<?php echo $dataCate2->id?>">
						<?php foreach($sub_category2->result() as $dataCate3){ ?>	
							
							<li> <a href="<?php echo base_url('Product/product_detail')?>"> <?php echo $dataCate3->name_th?></a></li> 
						<?php } ?>	
							
							
							<!--<li> <a href="<?php //echo base_url('Product/product_detail')?>"> Clamp On Gas Flow Meters</a></li>
							<li> <a href="<?php //echo base_url('Product/product_detail')?>"> Magnetic Flow Meters</a></li>-->
						</ul> 
					
					
					
					
					
				</li>
				
				<?php } else { ?>
				<li><a href="<?php echo base_url('Product/cat_product')?>" > Magnetic Flow Meters</a></li>
				
				
				
				
				
				<?php } } ?>
			</ul>
		
		
		
		<?php } } }   /* ?>
		
		
		
		
		
		
		<a href="#" class="dd33 dropdown-btn active" onMouseOver="bigImg('uu3','uu3,.pp3')" ><i class="fa fa-fw fa-folder"></i> Flow Meters <i class="fa fa-caret-down"></i></a>
			<ul class="dropdown-container uu3" id="uu3" style="padding-left: 25px;">
				<li><a href="#" > Magnetic Flow Meters</a></li>
				<li><a href="#" class="dropdown-btn active" onMouseOver="bigImg('ss3','pp3')" > Menu Dropdown <i class="fa fa-caret-down"></i></a>
						<ul class="dropdown-container pp3" style="padding-left: 20px;" id="ss3">
							<li> <a href="<?php echo base_url('Product/product_detail')?>"> Liquid Ultrasonic Flowmeters</a></li> 
							<li> <a href="<?php echo base_url('Product/product_detail')?>"> Clamp On Gas Flow Meters</a></li>
							<li> <a href="<?php echo base_url('Product/product_detail')?>"> Magnetic Flow Meters</a></li>
						</ul> 					
				</li>
				<li><a href="<?php echo base_url('Product/cat_product')?>" > Magnetic Flow Meters</a></li>
				<li><a href="<?php echo base_url('Product/cat_product')?>" > Magnetic Flow Meters</a></li>
			</ul>				
		
		<a href="#home" class="dd33 dropdown-btn active" onMouseOver="bigImg('uu4','uu3,.pp3')"><i class="fa fa-fw fa-folder"></i> Water Quality Monitoring <i class="fa fa-caret-down"></i></a>
			<ul class="dropdown-container uu3" id="uu4">
				<li> <a href="#"> Liquid Ultrasonic Flowmeters</a></li> 
				<li> <a href="#"> Clamp On Gas Flow Meters</a></li>
				<li> <a href="#"> Magnetic Flow Meters</a></li>
			</ul> 
		
		<a href="#home" class="dropdown-btn active"><i class="fa fa-fw fa-folder"></i> Level Sensors <i class="fa fa-caret-down"></i></a>
			<ul class="dropdown-container">
				<li> <a href="#"> Liquid Ultrasonic Flowmeters</a></li> 
				<li> <a href="#"> Clamp On Gas Flow Meters</a></li>
				<li> <a href="#"> Magnetic Flow Meters</a></li>
			</ul> 
		
		<a href="#home" class="dropdown-btn active"><i class="fa fa-fw fa-folder"></i> Groundwater Monitoring <i class="fa fa-caret-down"></i></a>
			<ul class="dropdown-container">
				<li> <a href="#"> Liquid Ultrasonic Flowmeters</a></li> 
				<li> <a href="#"> Clamp On Gas Flow Meters</a></li>
				<li> <a href="#"> Magnetic Flow Meters</a></li>
			</ul>	<?php */  ?>	
		
<!--
		<button class="dropdown-btn"><i class="fa fa-fw fa-files-o"></i> Water Quality Monitoring<i class="fa fa-caret-down"></i>  </button>
			<div class="dropdown-container">
				  <a href="#">Portable Clamp On 1</a>
				  <a href="#">Portable Clamp On 2</a>
				  <a href="#">Portable Clamp On 3</a>
			</div> 
-->			
		
		<a href="<?php echo base_url('Service')?>"><i class="fa fa-fw fa-cogs"></i> Services</a>
		<a href="<?php echo base_url('Reference')?>"><i class="fa fa-fw fa-handshake-o"></i> Projects Reference</a>
		<a href="<?php echo base_url('News')?>"><i class="fa fa-fw fa-pencil-square-o"></i> News &amp; Events</a>
		<a href="<?php echo base_url('Aboutus')?>"><i class="fa fa-fw fa-address-card-o"></i> About Us</a>
		<a href="<?php echo base_url('Certificate')?>"><i class="fa fa-fw fa-star"></i> Certification</a>
		<a href="<?php echo base_url('Manual')?>"><i class="fa fa-fw fa-file-pdf-o"></i> Manual</a>
		<a href="<?php echo base_url('Contact')?>"><i class="fa fa-fw fa-phone"></i> Contact Us</a>		  
		
	</div>
	

</div>
<!-- Menu End  -->
	
	