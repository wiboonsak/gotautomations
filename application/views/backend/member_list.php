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
                           
                            <h4 class="page-title">List All Member 
                                <div class="pull-right">
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control2/member_add')?>'"><i class="fa fa-plus"></i> Add New Member</button>
                                                                
								</div>
							</h4>
							 </div>
							
							
								
                    			<div class="col-sm-12">
								
										<h5 class="card-title">
											<div class="progress mb-0" style="display: none">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
										</div>

										</h5>
										<div class="card-box table-responsive" id="showData">
                                                                                    <form method="post" action="<?php echo base_url(); ?>Control2/action">
     <input type="submit" name="export" class="btn btn-warning" value="Excel" />
    </form>	
                                                                                    <br>
										<table id="datatable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Line</th>
                                    <th style="text-align:center" width="100">Download</th>
									<th  width="50">Edit</th>
									<th  width="50">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($getuserfontend->result() AS $data){
        $getdownloadfile = $this->Download_model->getdownloadfile($data->id);
        $numdownload = $getdownloadfile->num_rows();
                                                                    ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th scope="row"><?php echo $n?></th>
                                    <td><?php echo $data->name?></td>
                                    <td><?php echo $data->email?></td>
                                    <td><?php echo $data->phone?></td>
                                    <td><?php echo $data->line?></td>
                                    <td style="text-align:center"><button type="button" class="btn btn-warning btn-sm" onClick="window.location.href='<?php echo base_url('Control2/member_download/'.$data->id)?>'" ><i class="fa fa-download"></i></button></td>
                                    <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control2/member_add/'.$data->id)?>'"><i class="icon-pencil"></i></button></td>
                                    <td><button type="button" class="btn btn-danger btn-sm" <?php if($numdownload>0){?>disabled style="cursor:not-allowed"<?php }?> onclick="comfirmDelete('<?php echo $data->id?>','tbl_user_fontend','<?php echo $data->name?>')"><i class="icon-trash"></i></button></td>
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