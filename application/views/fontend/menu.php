<!-- Menu Start -->
<div id="menuSidenav" class="sidenav" onMouseOut="close_ulli()"> 
 
 <form action="<?php echo base_url();?>Action_page" style="max-width:500px;margin:auto">  
	<div class="input-container">
		<i class="fa fa-search icon"></i>
		<input class="input-field" type="text" placeholder="Search..." name="search">
	</div>
 </form> 
	
  	<div class="menu_sidenav">
		<a href="<?php echo base_url()?>" style="color: #f1f1f1; background-color: #ffa50a;"><i class="fa fa-fw fa-home"></i> Homepage</a>
		<?php $category1 = $this->Category_model->listcategory('0','0');	    
		  
		   	  if($category1->num_rows() > 0){ 
				foreach($category1->result() AS $dataCate1){
				
					$sub_category1 = $this->Category_model->listcategory($dataCate1->id,$dataCate1->level + 1); 
		?>		
		
		<a href="<?php echo base_url()?>Product/cat_product/<?php echo $dataCate1->id?>" class="cate0<?php echo $dataCate1->id?> dropdown-btn active" <?php if($sub_category1->num_rows() > 0){ ?>onMouseOver="bigImg('forcate01_<?php echo $dataCate1->id?>','cate02, .cate03')"<?php } ?> ><i class="<?php if($dataCate1->icon != ''){ echo 'fa '.$dataCate1->icon; } else { echo 'fa fa-info-circle'; }?>"></i> <?php echo $dataCate1->name_th?><?php if($sub_category1->num_rows() > 0){ ?><i class="fa fa-caret-down"></i><?php } ?></a>
		
		<?php if($sub_category1->num_rows() > 0){ $a = 1; ?>
		
			<ul class="dropdown-container cate02" id="forcate01_<?php echo $dataCate1->id?>" style="padding-left: 25px;">		
				
				<?php foreach($sub_category1->result() as $dataCate2){ 
				
						$sub_category2 = $this->Category_model->listcategory($dataCate2->id,$dataCate2->level + 1);		
					
			  			if($sub_category2->num_rows() > 0){
				?>				
				
				<li><a href="<?php echo base_url()?>Product/cat_product/<?php echo $dataCate2->id?>" class="dropdown-btn active" onMouseOver="bigImg('forcate02_<?php echo $dataCate2->id?>','cate03')"  > <?php echo $dataCate2->name_th?> <i class="fa fa-caret-down"></i></a><!--onMouseOut="aaa('forcate02_<?php //echo $dataCate2->id?>')"-->
					
					<?php //if($sub_category2->num_rows() > 0){ ?>					
					
						<ul class="dropdown-container cate03" style="padding-left: 20px;" id="forcate02_<?php echo $dataCate2->id?>">
						<?php foreach($sub_category2->result() as $dataCate3){ ?>	
							
							<li><a href="<?php echo base_url()?>Product/cat_product/<?php echo $dataCate3->id?>"> <?php echo $dataCate3->name_th?></a></li> 
						<?php } ?>						
						</ul>				
				</li>
				
				<?php } else { ?>
				<li><a href="<?php echo base_url()?>Product/cat_product/<?php echo $dataCate2->id?>" > <?php echo $dataCate2->name_th?></a></li>				
				
				<?php } } ?>
			</ul>		
		
		<?php } } } ?>		
		
		<a href="<?php echo base_url('Service')?>"><i class="fa fa-wrench"></i> Services</a>
		<a href="<?php echo base_url('Reference')?>"><i class="fa fa-fw fa-handshake-o"></i> Projects Reference</a>
		<a href="<?php echo base_url('News')?>"><i class="fa fa-fw fa-pencil-square-o"></i> News &amp; Events</a>
		<a href="<?php echo base_url('Aboutus')?>"><i class="fa fa-fw fa-address-card-o"></i> About Us</a>
		<a href="<?php echo base_url('Certificate')?>"><i class="fa fa-fw fa-star"></i> Certification</a>
		<a href="<?php echo base_url('Document')?>"><i class="fa fa-fw fa-file-pdf-o"></i> Document</a>
		<a href="<?php echo base_url('Contact')?>"><i class="fa fa-fw fa-phone"></i> Contact Us</a>		  
		
	</div>	

</div>
<!-- Menu End  -->	
	