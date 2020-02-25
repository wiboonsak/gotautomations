  <!-- DataTables -->
        <link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/buttons.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/plugins/datatables/select.bootstrap4.min.css')?>" rel="stylesheet" type="text/css" />
<?php foreach ($getuserfontendbyid->result() AS $userfontend){}?>

<div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                           
                            <h4 class="page-title">List Download : <?php echo $userfontend->name?>
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
											<th>File name</th>
											<th>Product name</th>
											<th>Date</th>
										</tr>
										</thead>
										<tbody>
										<?php $n=1; foreach($getdownloadfile->result() AS $data){ 
											
											  $name_th = $this->Product_model->getproduct_data($data->product_id);
											  foreach($name_th->result() AS $name_th2){}
	
											  $x ='';	
											  $txtTitle = $this->Product_model->getPdetailcatalogue($x,$data->file_id);
											  foreach($txtTitle->result() AS $txtTitle2){} 
											
										?>	
											<tr id="row<?php echo $data->id?>">
												<th scope="row"><?php echo $n?></th>
												<td><?php echo $txtTitle2->txtTitle_th?></td>
												<td><?php echo $name_th2->name_th?></td>
												<td><?php echo $this->Download_model->GetthaiDateTime($data->date_time)?></td>
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