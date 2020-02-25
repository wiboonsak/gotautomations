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
                           
                            <h4 class="page-title">News
                                <div class="pull-right">
								<button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/news_add')?>'"><i class="fa fa-plus"></i> Add New News</button>
								</div>
							</h4>
							 </div>
                           
							<div class="row">
                    			<div class="col-sm-12">
									<div class="card m-b-30 card-body">
										<h5 class="card-title">
											<div class="progress mb-0" style="display: none">
										<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
										</div>

										</h5>
										<div id="showData">
										<table id="datatable" class="table table-hover">
                                <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>News Topic</th>
                                    <th>Date</th>
                                   <th  width="50">Edit</th>
									<th  width="50">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
								<?php $n=1; foreach($NewsList->result() AS $data){ ?>	
                                <tr id="row<?php echo $data->id?>">
                                    <th scope="row"><?php echo $n?></th>
                                    <td><?php echo $data->news_title?></td>
                                    <td><?php echo $this->Product_model->getDayMonthYear($data->news_date_add); ?></td>
                                   
                                    <td><button type="button" class="btn btn-success btn-sm" onClick="window.location.href='<?php echo base_url('Control/news_add/'.$data->id)?>'"><i class="icon-pencil"></i></button></td>
                                    <td><button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $data->id?>' , '<?php echo $data->news_title?>')"><i class="icon-trash"></i></button></td>
                                </tr>
                                <?php $n++; }?>
                                </tbody>
                            </table>
											
										</div>
									</div>
								</div>
								
							</div>
                   
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

            </div> <!-- end container -->
        </div>