 <?php  if(!isset($currentID)){ $currentID='';}
		if(!isset($certificates)){ $certificates ='';}
		if(!isset($file_name)){ $file_name ='';}
?>  

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">Certificates Add</h4>
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
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control2/certificates_add')?>'"><i class="fa fa-plus"></i> Add Certificates</button> 
						    &nbsp;&nbsp;
                                                             <?php }?>
								<button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control2/certificates_list')?>'">Back</button></div>
										</h5>
						<form enctype="multipart/form-data" id="certificateForm" name="certificateForm">
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">Certificates</label>
								<div class="col-sm-6">
									<input type="text" id="certificates" name="certificates" class="form-control form-control-sm" value="<?php echo $certificates?>" >
								</div>
							   <div class="col-sm-4">	</div>
						</div>
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label">File PDF</label>
								<div class="col-sm-6">
									<input   type="file" id="ImagesFiles" name="userFiles[]"  />
								</div>
							   <div class="col-sm-4">	</div>
						</div>	
						 <div class="form-group row">
							  <label class="col-sm-2 col-form-label"></label>
								<div class="col-sm-6">
									<div id="showImage" style="margin-top: 5px;"></div>
								</div>
							   <div class="col-sm-4">	</div>
						</div>	
						<div class="form-group row" >
							<div class="col-sm-6" style="text-align: center">
							<button type="button" class="btn btn-success btn-sm" onClick="AddCertificates()">Add / Edit Data</button>
							<input type="hidden" name="currentID" id="currentID" value="<?php echo $currentID?>">
                                                        <input type="hidden" name="img_old" id="img_old" value="<?php if ($currentID!=''){echo $file_name;}?>">
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