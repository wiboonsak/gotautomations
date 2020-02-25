 <?php  if(!isset($currentID)){ $currentID='';}
		if(!isset($slide_title)){ $slide_title ='';}
		if(!isset($slide_detail)){ $slide_detail ='';}
		if(!isset($slide_desc)){ $slide_desc ='';}
		if(!isset($learnMore)){ $learnMore ='';}
		
$slideImg = $this->Product_model->loadSlideImg($currentID);
$numslide = $slideImg->num_rows();
if($numslide!=''){
foreach($slideImg->result() AS $data){ }}
?>  

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Slide Add</h4>
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
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/slide_add')?>'"><i class="fa fa-plus"></i> Add Slide</button> 
						    &nbsp;&nbsp;
                                                             <?php }?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/slide_list')?>'">Back</button></div>
										</h5>
						<form enctype="multipart/form-data" id="slideForm" name="slideForm">
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Topic</label>
								<div class="col-sm-6">
                                                                    <textarea id="slide_title" name="slide_title" class="ex"><?php echo $slide_title?></textarea>
                                    <input type="hidden" name="comment" id="comment" >
								</div>
							   <div class="col-sm-4">	</div>
						</div>
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Text1</label>
								<div class="col-sm-6">
                                                                    <textarea id="slide_detail" name="slide_detail" class="ex"><?php echo $slide_detail?></textarea>
                                    <input type="hidden" name="comment1" id="comment1" >
                                                                    
								</div>
							   <div class="col-sm-4">	</div>
						</div>	
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Text2</label>
								<div class="col-sm-6">
                                                                    <textarea id="slide_desc" name="slide_desc" class="ex"><?php echo $slide_desc?></textarea>
                                    <input type="hidden" name="comment2" id="comment2" >
                                                                    
								</div>
							   <div class="col-sm-4">	</div>
						</div>	
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Images</label>
								<div class="col-sm-6">
									<input   type="file" id="ImagesFiles" name="userFiles[]"  /> 
                                                                        <br><a>(Supported image file extensions jpg, gif, png. File size should not exceed 2MB. Picture size 1,920 x 860 pixels.)</a>
								</div>
							   <div class="col-sm-4">	</div>
						</div>	
                                                   <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Read More</label>
								<div class="col-sm-6">
                                                                    <input type="text" id="learnMore" name="learnMore" class="form-control form-control-sm" value="<?php echo $learnMore?>" > 
                                                                    
                                                                    <p style="color:red">(Please fill http://  or https://  Ex. http://www.gotautomations.com/Product/cat_product/72)</p>
								</div>
							   <div class="col-sm-4">	</div>
						</div>	  
						<div class="form-group row" >
							<div class="col-sm-6" style="text-align: center">
							<button type="button" class="btn btn-success btn-sm" onClick="AddSlide()">Add / Edit Data</button>
							<input type="hidden" name="currentID" id="currentID" value="<?php echo $currentID?>">
                                                        <input type="hidden" name="img_old" id="img_old" value="<?php if ($numslide!=''){echo $data->image_name;}?>">
							</div>
					</div>					
											
						</form>					
										<div id="showImage" style="margin-top: 5px;"></div>
									</div>
								</div>
								
							</div>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>