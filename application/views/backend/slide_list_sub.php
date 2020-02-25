<table class="table table-hover table-striped table-bordered">
	<?php $n=1; foreach($slideList->result() AS $data){ ?>
	<tr id="row<?php echo $data->id?>">
		<td width="10"><?php echo $n?></td>
		<td><img src="<?php echo base_url('uploadfile/banner/').$data->imge_name?>" style="width:200px; height: auto"></td>
		
		<td width="50">
		<button type="button" class="btn btn-danger btn-sm" onClick="comfirmDelete('<?php echo $data->id?>','<?php echo $data->imge_name?>')"><i class="icon-trash"></i></button>
		</td>
	</tr>
	<?php $n++; }?>
</table>