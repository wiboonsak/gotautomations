<?php
	if(!isset($product_nameen)){ $product_nameen ='';}
	if(!isset($product_nameth)){ $product_nameth ='';}
	if(!isset($product_topic)){ $product_topic ='';}
	if(!isset($product_desc)){ $product_desc ='';}
	if(!isset($product_category)){ $product_category ='';}
        if(!isset($product_price)){ $product_price ='';}
	if(!isset($linkyoutube)){ $linkyoutube ='';}
	if(!isset($currentID)){ $currentID ='';}
?>
<div class="wrapper">
<div class="container-fluid">

<!-- Page-Title -->
<div class="row">
	<div class="col-sm-12">
		<div class="page-title-box">

			<h4 class="page-title">Product Data</h4>
                        <br>
			<div class="row">
				<div class="col-sm-12">
					<div class="card m-b-30 card-body">
						<h5 class="card-title">
							<div class="progress mb-0" style="display: none">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
						</div>

							<div class="pull-right">
                                                             <?php if($currentID!=''){?>
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/Product_add')?>'"><i class="fa fa-plus"></i> Add Product</button> 
						    &nbsp;&nbsp;
                                                             <?php }?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/Product_list')?>'">Back</button></div>
						</h5>
						<!-------------->
						<form enctype="multipart/form-data" id="productForm" name="productForm">
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Name English</label>
								<div class="col-sm-6">
									<input type="text" id="product_nameen" name="product_nameen" class="form-control form-control-sm" value="<?php echo $product_nameen?>">
								</div>
							   <div class="col-sm-4">	</div>
						</div>
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Name Thai</label>
								<div class="col-sm-6">
									<input type="text" id="product_nameth" name="product_nameth" class="form-control form-control-sm" value="<?php echo $product_nameth?>">
								</div>
							   <div class="col-sm-4">	</div>
						</div>
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Topic</label>
								<div class="col-sm-6">
									<input type="text" id="product_topic" name="product_topic" class="form-control form-control-sm" value="<?php echo $product_topic?>">
								</div>
							   <div class="col-sm-4">	</div>
						</div>
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Category</label>
								<div class="col-sm-6">
									<select id="product_category" name="product_category" class="form-control form-control-sm" >
										<option value="0">---Select---</option>
										<?php foreach($categoryList->result() AS $category){ ?>
										<option value="<?php echo $category->id?>" <?php if($category->id==$product_category){ echo "selected";}?> ><?php echo $category->category_title?></option>
										<?php }?>
									</select>
								</div>
							   
							   <div class="col-sm-4">	</div>
						</div>	
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">DESCRIPTION</label>
								<div class="col-sm-6">
									<textarea id="product_desc" name="product_desc" class="ex"><?php echo $product_desc?></textarea>
                                    <input type="hidden" name="comment" id="comment" >
								</div>
							   <div class="col-sm-4">	</div>
						</div> 
                        <div class="form-group row" style="display:none">
							  <label class="col-sm-2 col-form-label">Price</label>
								<div class="col-sm-6">
									<input type="text" id="product_price" name="product_price" class="form-control form-control-sm" value="<?php echo $product_price?>">
								</div>
							   <div class="col-sm-4">	</div>
						</div>
                                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">link Youtube</label>
                                       
<!--                                            <input id="linkyoutube" name="linkyoutube" class="form-control form-contol-sm" >-->
                                          
                                             <div id="linkyoutube_a" class="col-sm-6">
                                                                                                      <input id="youtube" name="youtube[]" type="text" class="form-control form-control-sm youtube3"  autocomplete="off"   >
                                                                                                     
                                             </div>
                                            <div class="col-sm-1">	
                                        <a  id="bt1" class="btn btn-primary btn-sm" onclick="ADDyoutube()">Add Clip Video</a>
                                        </div>
                                            <div class="col-sm-2">	
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url('HTML/images/youtube.jpg')?>" target="_blank">ขั้นตอนการเพิ่มคลิปวีดีโอ</a>
                                        </div>
                                                     
                                        
                                       
                                    </div> 
                                                         <?php 
                                                      $youtube = $this->Product_model->getlinkyoutube($currentID);
                                                      $numyoutube = $youtube->num_rows();
                                                      if($numyoutube>0){
                                                      foreach ($youtube->result() AS $youtube2){?>
                                                    <div class="form-group row">
                                   <label class="col-sm-2 col-form-label"></label>
                                    
                                         <div id="linkyoutube_a" class="col-sm-6">
                                            <input id="youtube<?php echo $youtube2->id?>" name="youtube1[]" type="text" class="form-control form-control-sm youtube3" readonly value='<?php echo $youtube2 ->linkyoutube;?>'>
                                         </div>
                                               <div class="col-sm-3">
                                                        <a  id="bt2"class="btn btn-danger btn-sm entypo-cancel" onclick="deleteyoutube('<?php echo $youtube2->id ?>', 'tbl_youtube_link')"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                         
                                                    </div>
                                    </div> 
                                                      <?php }}?>
						<!--<div class="form-group row">
							  <label class="col-sm-2 col-form-label">รายละเอียด</label>
								<div class="col-sm-6">
									<textarea id="product_detail_th" name="product_detail_th" class="form-control form-contol-sm"><?php //echo $product_detail_th?></textarea>
								</div>
							   <div class="col-sm-4">	</div>
						</div>-->

						<div class="form-group row" >
							<div class="col-sm-6" style="text-align: center">
								
							<button type="button" class="btn btn-success btn-sm" onClick="Addproduct()">Add / Edit Data</button>
							<input type="hidden" name="currentID" id="currentID" value="<?php echo $currentID?>">

							</div>
					</div>
					<div class="form-group row" >
						 <div id="showError"></div>
					</div>
					<div class="row">
							<div class="col-lg-6">
								<div class="card m-b-30">
									<h6 class="card-header">Add Images</h6>
									<div class="card-body">
									 <input type="file" id="ImagesFiles" name="userFiles[]" multiple/> 
										<a href="#" class="btn btn-custom waves-effect waves-light" onClick="Addproduct()">Add Images</a>
                                                                                 <br><a>(Supports image file extension jpg, gif, png. File size should not exceed 2MB. Picture size 570 x 325 pixels.)</a>
										<div id="showImage" style="margin-top: 5px;"></div>
									</div>
								</div>
							</div>
<div class="col-lg-6">
								<div class="card m-b-30">
									<div class="card-header">
											Add File Catalog
									</div>
									<div class="card-body">
										 <div class="form-group row">
											  <div class="col-4"> 
												  <input   type="file" id="cFiles" name="catFiles[]" multiple/>
											 </div>
											
											 <div class="col-1"> 
												  <a href="#" class="btn btn-custom waves-effect waves-light" onClick="Addproduct()">Add File</a>
											 </div>
										 </div>
										
										<div id="showCat"></div>
									</div>
								</div>
							</div>
							
					</div>	
						<!-------------->
					</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<!-- end page title end breadcrumb -->

</div> <!-- end container -->
</div>