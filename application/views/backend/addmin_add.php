<!-- Bootstrap fileupload css -->
<link href="<?php echo base_url('assets/plugins/bootstrap-fileupload/bootstrap-fileupload.css') ?>" rel="stylesheet" />

<div class="wrapper">
    <div class="container-fluid">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add / Edit Admin</h4>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card m-b-30 card-body">
                                <h5 class="card-title">
                                    <div class="progress mb-0" style="display: none">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%"></div>
                                    </div>
                                    <div class="pull-right">
                                        <?php if($dataID!=''){?>
                                        <button type="button" class="btn btn-success btn-sm" onClick="window.location.href = '<?php echo base_url('Control/admin_add') ?>'"><i class="icon-plus"></i>&nbsp;&nbsp;Add Admin</button>
                                        &nbsp;&nbsp;<?php }?>
                                        <button type="button" class="btn btn-info btn-sm" onClick="window.location.href = '<?php echo base_url('Control/admin_list') ?>'"><i class=" icon-arrow-left-circle"></i>&nbsp;&nbsp;Back</button></div>
                                </h5>


                                <!----->
                                <form id="adminForm" name="adminForm">
                                    <div class="form-group row">
                                        <label class="col-sm-2">
                                            Name - Surname
                                        </label>
                                        <div class="col-sm-6">
                                            <input id="Name" name="Name" type="text" class="form-control form-control-sm" value="<?php echo $name_sname ?>" > 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">
                                           User Name
                                        </label>
                                        <div class="col-sm-6">
                                            <input id="username" name="username" type="text" class="form-control form-control-sm" value="<?php echo $user_name ?>" onchange="chk_username(this.value)"> 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">
                                            Password
                                        </label>
                                        <div class="col-sm-6">
                                            <input id="Password" name="Password" type="Password" class="form-control form-control-sm"  > 
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2">
                                           Comfirm Password
                                        </label>
                                        <div class="col-sm-6">
                                            <input id="ComfirmPassword" name="ComfirmPassword" type="Password" class="form-control form-control-sm"  onchange="chkpass(this.value)"> 
                                        </div>
                                    </div>
                                    <div>		 
                                        <input type="hidden" name="dataID" id="dataID" value="<?php echo $dataID ?>"> 
                                        <input type="hidden" name="oldpass" id="oldpass" value="<?php echo $password ?>"> 
                                    </div>
                                    <div class="form-group row" >
                                        <div class="col-sm-8" style="text-align: center">
                                            <button type="button" class="btn btn-success btn-sm" onClick="Addadmin()">Add / Edit</button>
                                        </div>
                                    </div>
                                  
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!----->


            </div>
        </div>

    </div>
</div>

<!-- end page title end breadcrumb -->

