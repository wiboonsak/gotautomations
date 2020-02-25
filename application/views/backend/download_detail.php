  <!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/select.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           <h4 class="page-title">List All Download</h4>
						</div>
							
						<div class="col-sm-12">
							<h5 class="card-title">
								<div class="progress mb-0" style="display: none">
									<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
								</div>
							</h5>
							<div class="card-box table-responsive" id="showData">
								<table id="datatable" class="table table-hover">
                                <thead>
									<tr>
										<th>#</th>
										<th>File name</th>
										<th>Product name</th>
										<th style="text-align:center">Amount</th>
										<th style="text-align:center">Member</th>                                 
									</tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($getdownloadfiledistinct->result() AS $downloadfile){
	
                    					$x ='';	
										$txtTitle = $this->Product_model->getPdetailcatalogue($x,$downloadfile->file_id);
										foreach($txtTitle->result() AS $txtTitle2){}
	
                     					$countdownload = $this->Download_model->countdownload($downloadfile->file_id,$downloadfile->product_id);
                     					foreach($countdownload->result() AS $countdownload2){}
	
										$name_th = $this->Product_model->getproduct_data($downloadfile->product_id);
										foreach($name_th->result() AS $name_th2){}
                                ?>	
										<tr>
											<th scope="row"><?php echo $n?></th>
											<td><?php echo $txtTitle2->txtTitle_th?></td>
											<td><?php echo $name_th2->name_th?></td>
											<td style="text-align:center"><?php echo $countdownload2->count2?></td>
											 <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control2/download_member/'.$downloadfile->file_id.'/'.$downloadfile->product_id)?>'" ><i class="fa fa-download"></i></button></td>
										</tr>
                                <?php $n++; } ?>
                                </tbody>
                            	</table>
							</div>
					</div>                      
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>