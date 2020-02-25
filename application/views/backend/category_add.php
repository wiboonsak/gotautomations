<!-- Bootstrap fileupload css -->
<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

<div class="wrapper">
    <div class="container-fluid">	
		

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    <h4 class="page-title">Edit Detail Category</h4>
                    <br>
                    <div class="row">
						<?php foreach($detail->result() as $detail2){} ?>					
						
                        <div class="col-sm-12">
                            <div class="card m-b-30 card-body">
                                <h5 class="card-title">
                                    <div class="progress mb-0" style="display: none">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
									
									<div class="row">
										<div class="col-sm-12">
											<div class="page-title-box">
												<div class="btn-group">
													<ol class="breadcrumb hide-phone p-0 m-0">
														<!--<li class="breadcrumb-item"><a href="#">Highdmin</a></li>-->		
														
										<?php   $mainCate_id = $detail2->mainCate_id;
												$name_th =''; $html1 ='';	
												if($detail2->level > 0){
													for($i = $detail2->level; $i > 0; $i--){ 
														
														$get_name = $this->Category_model->get_dataCategory($mainCate_id);
														foreach($get_name->result() as $get_name2){}
														$mainCate_id = $get_name2->mainCate_id;
														
														$html1 = '<li class="breadcrumb-item active">'.$get_name2->name_th.'</li>'.$html1;
													}
													echo $html1;	
										?>
														
														<!--<li class="breadcrumb-item active"><?php //echo $get_name2->name_th?></li>-->
										<?php } ?>
														<li class="breadcrumb-item"><?php echo $detail2->name_th?></li>
														<!--<li class="breadcrumb-item"><a href="#">Forms</a></li>
														<li class="breadcrumb-item active">Form Elements</li>-->
													</ol>
												</div>
												<div class="pull-right">                                        
													<button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php echo base_url('Control/category')?>'"><i class=" icon-arrow-left-circle"></i>&nbsp;&nbsp;Back</button>
												</div>												
											</div>
										</div>
									</div>								
                                </h5>
                                <!----->
                                <form id="categoryForm" name="categoryForm">
									<div class="form-group row">
									  <label class="col-3 col-form-label">Category Name</label>
									  <div class="col-9">
											<input type="text" id="name_th" name="name_th" class="form-control form-control-sm" value="<?php echo $detail2->name_th?>">
									  </div>									  
									</div>
									
                                    <div class="form-group row">
                                        <label class="col-3 col-form-label">Description</label>
                                        <div class="col-9">
                                            <textarea class="form-control" id="desc_th" name="desc_th" rows="5"><?php echo $detail2->desc_th?></textarea>
                                        </div>
                                    </div>
									
									<div class="form-group row">
									  	<label class="col-3 col-form-label">Detail</label>
										<div class="col-9">
											<textarea id="detail_th1" name="detail_th1" class="ex"><?php echo $detail2->detail_th?></textarea>
											<input type="hidden" name="detail_th" id="detail_th" >
										</div>
									</div>
									
									<div class="form-group row">
									  <label class="col-3 col-form-label">Category Icon</label>
									  <div class="col-6">
											<input type="text" id="icon" name="icon" class="form-control form-control-sm" value="<?php echo $detail2->icon?>"><br>
										  	1. คลิกเพื่อเลือก icon<br>2. ตัวอย่างการ copy โค้ด เช่น fa-arrow-down
									  </div>
									  <label class="col-3 col-form-label"><a href="https://fontawesome.bootstrapcheatsheets.com/" target="_blank">คลิกเพื่อเลือก icon</a></label>	
									</div>
									
									<div class="form-group row">
                                        <label class="col-3 col-form-label">Category Images</label>
                                        <div class="col-9">
                                            <input id="category_img" name="category_img" type="file" class="form-control form-control-sm" value="" >
											<br>(Supports image file extension jpg, gif, png. File size should not exceed 2MB. Picture size 1200 x 260 pixels.)
                                        </div>										
                                    </div>
                                    <div>		 
                                        <input type="hidden" name="dataID" id="dataID" value="<?php echo $detail2->id?>"> 
                                    </div>
									
                                    <div class="form-group row" >
                                        <div class="col-12" style="text-align: center">
                                            <button type="button" class="btn btn-success btn-sm" onClick="AddCateGory()">Add / Edit</button>
                                        </div>
                                    </div>
                                    <?php if($detail2->category_img != ''){?>
                                    <div class="row">
									<div class="col-12">
										<div class="card m-b-30">
											<h6 class="card-header">Images</h6>
											<div class="card-body">
												<div id="showImage" style="margin-top: 5px;"></div>
												<input type="hidden" id="imgold" name="imgold" value="<?php echo $detail2->category_img?>" />
											</div>
										</div>
									</div>
									</div>	
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!----->

            </div>
        </div>

    </div>
</div>

<!-- end page title end breadcrumb -->
