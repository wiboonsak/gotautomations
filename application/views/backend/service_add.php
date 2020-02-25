 <?php  if(!isset($currentID)){ $currentID='';}
		if(!isset($topic)){ $topic ='';}
		if(!isset($topic_detail)){ $topic_detail ='';}
		if(!isset($icon_class)){ $icon_class ='';}
?>  
<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Service Data</h4>
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
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control2/service_add')?>'"><i class="fa fa-plus"></i> Add Service</button> 
						    &nbsp;&nbsp;
                                                             <?php }?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control2/service_list')?>'">Back</button></div>
										</h5>
						<form enctype="multipart/form-data" id="serviceForm" name="serviceForm">
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Service topic</label>
								<div class="col-sm-6">
									<input type="text" id="topic" name="topic" class="form-control form-control-sm" value="<?php echo $topic?>" >
								</div>
							   <div class="col-sm-4">	</div>
						</div>
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Service Details</label>
								<div class="col-sm-6">
									<textarea id="topic_detail" name="topic_detail" class="form-control form-control-sm" ><?php echo $topic_detail?></textarea>
								</div>
							   <div class="col-sm-4">	</div>
						</div>	
							 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Icon</label>
								<div class="col-sm-6">
									<input   type="input" id="icon_class" name="icon_class" value="<?php echo $icon_class?>" class="form-control form-control-sm"/> 
                                                                        1. คลิกเพื่อเลือก icon<br>2. ตัวอย่างการ copy โค้ด เช่น fa-arrow-down
                                                                        
								</div>
							   <div class="col-sm-4"><label class="col-form-label"><a href="https://fontawesome.bootstrapcheatsheets.com/" target="_blank">คลิกเพื่อเลือก icon</a></label>	</div>
						</div>	
                                                      
                                                         
						 
											
						<div class="form-group row" >
							<div class="col-sm-6" style="text-align: center">
							<button type="button" class="btn btn-success btn-sm" onClick="AddService()">Add / Edit Data</button>
							<input type="hidden" name="currentID" id="currentID" value="<?php echo $currentID?>">
							</div>
					</div>					
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