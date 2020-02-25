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
                           
                            <h4 class="page-title">List All Product 
								<div class="pull-right">
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/Product_add')?>'"><i class="fa fa-plus"></i> Add New Product</button>
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
										<table id="datatable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Amount</th>                                    
									<th>ALL Product</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($categoryList->result() AS $data){ 
									$x ='';
									$count_product = $this->Category_model->get_productData($x,$data->id);	
								?>	
                                <tr id="row<?php echo $data->id?>">
                                    <td scope="row"><?php echo $n?></td>
                                    <td><?php echo $data->name_th?></td>
                                    <td><?php echo $count_product->num_rows();?></td>                                   
                                    <td><button type="button" class="btn btn-info btn-sm" onClick="window.location.href='<?php echo base_url('Control/Product/'.$data->id)?>'"><i class="dripicons-zoom-in"></i></button>
									
									<!--<button type="button" class="btn btn-primary btn-sm waves-light waves-effect">Primary</button>-->
									
									</td>
                                    </td>
                                </tr>
                                <?php  $n++; } ?>
                                </tbody>
                            </table>
											
										</div>
									
								</div>
								
							
                       
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>