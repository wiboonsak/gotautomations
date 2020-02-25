<!-- Bootstrap fileupload css -->
<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css')?>" rel="stylesheet" />

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add / Edit Category</h4>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card m-b-30 card-body">
                                <h5 class="card-title">
                                    <div class="progress mb-0" style="display: none">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                    <!--<div class="pull-right">
                                        <?php //if($dataID!=''){?>
                                        <button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php //echo base_url('Control/category_add')?>'"><i class="icon-plus"></i>&nbsp;&nbsp;Add New Category</button>
                                        &nbsp;&nbsp;<?php //} ?>
                                        <button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php //echo base_url('Control/category')?>'"><i class=" icon-arrow-left-circle"></i>&nbsp;&nbsp;Back</button>
									</div>-->
                                </h5>

                                    <div class="form-group row">
                                        <label class="col-sm-3">
                                            Category Name 
                                        </label>
                                        <div class="col-sm-9">
                                            <input id="name_th1" name="name_th1" type="text" class="form-control form-control-sm" value="" > 
                                        </div>
                                    </div>                                    
                                    <div>		 
                                    <input type="hidden" name="mainCate_id1" id="mainCate_id1" value="0"> 
                                    <input type="hidden" name="level1" id="level1" value="0"> 
                                        
                                    </div>
                                    <div class="form-group row" >
                                        <div class="col-sm-12" style="text-align: center">
                                            <button type="button" class="btn btn-success btn-sm" onClick="add_cateGory('1')">Add / Edit</button>
                                        </div>
                                    </div>
                                    
								<br>
								<div class="row">
									<div class="col-lg-12" id="showData">
								
									</div>
								</div>
								
								
								
                            </div>
                        </div>
                    </div>
                </div>

                <!----->

            </div>
        </div>
		
		<div id="modalCategory" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                   <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                      <h4 class="modal-title" id="myLargeModalLabel">Add Sub Category</h4>
                   </div>
                   <div class="modal-body">
											
						<div class="form-group row">
							<label class="col-sm-3">Category Name</label>
							<div class="col-sm-9">
								<input id="name_th2" name="name_th2" type="text" class="form-control form-control-sm" value="" > 
							</div>
						</div>                                    
						<div>		 
							<input type="hidden" name="mainCate_id2" id="mainCate_id2" value="">                
							<input type="hidden" name="level2" id="level2" value="">                
						</div>
						<div class="form-group row" >
							<div class="col-sm-12" style="text-align: center">
								<button type="button" class="btn btn-success btn-sm" onClick="add_cateGory('2')">Add / Edit</button>
							</div>
						</div>                                           
                  </div>
               </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->	
		

    </div>
</div>

<!-- end page title end breadcrumb -->

