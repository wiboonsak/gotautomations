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
                           
                            <h4 class="page-title">List Member Download 
							</h4>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Line</th>
                                    <th>Date</th>
<!--                                    <th style="text-align:center" width="100">Download</th>
									<th  width="50">Delete</th>-->
                                </tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($getuserfontendbyid->result() AS $data){
                   $getdownloadfile = $this->Download_model->getdownloadfile($data->id);
                   foreach ($getdownloadfile->result() AS $getdownloadfile2){}
                   ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th scope="row"><?php echo $n?></th>
                                    <td><?php echo $data->name?></td>
                                    <td><?php echo $data->email?></td>
                                    <td><?php echo $data->phone?></td>
                                    <td><?php echo $data->line?></td>
                                    <td><?php echo $this->Download_model->GetthaiDateTime($getdownloadfile2->date_time);?></td>
<!--                                    <td style="text-align:center"><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php //echo base_url('Control2/download_data/'.$data->id)?>'" ><i class="fa fa-download"></i></button></td>
                                    <td><button type="button" class="btn btn-danger btn-sm" ><i class="icon-trash"></i></button></td>-->
                                </tr>
                                <?php  $n++;  }?>
                                </tbody>
                            </table>
											
										</div>
									
								</div>
								
							
                       
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>