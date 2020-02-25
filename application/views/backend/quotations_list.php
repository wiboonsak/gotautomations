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
                           
                            <h4 class="page-title">List Quotations 
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
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th style="text-align:center">Detail</th>
<!--                                    <th style="text-align:center" width="100">Download</th>
									<th  width="50">Delete</th>-->
                                </tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($getquotations->result() AS $data){
      $getproduct_data = $this->Product_model->getproduct_data($data->product_id);
foreach ($getproduct_data->result() AS $product_data){}                                                              
                                                                    ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th scope="row"><?php echo $n?></th>
                                    <td><?php echo $product_data->name_th?></td>
                                    <td><?php echo $data->name?></td>
                                    <td><?php echo $data->email?></td>
                                    <td><?php echo $this->Download_model->GetthaiDateTime($data->date_add);?></td>
                                    <td  style="text-align:center"><button type="button" class="btn btn-sm btn-info" onClick="ShowBookDetail('<?php echo $data->id?>','<?php echo $data->quotation_id?>')">Detail</button></td>
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