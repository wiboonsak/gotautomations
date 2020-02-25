<table class="table table-bordered table-hover">
    <?php foreach($slideImg->result() AS $data){ ?>
	<tr id="Dimg<?php echo $data->id?>">
	<td><span class="text-danger"><img src="<?php echo base_url('uploadfile/banner/').$data->image_name?>" class="img-thumbnail" style="width:300px;"></span></td>
	
        </tr>

<?php }?>
</table>

 
			