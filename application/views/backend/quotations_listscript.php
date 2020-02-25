<script>
	function comfirmDelete(dataID,table,product_name){  
            	
       swal({
                title: 'Delete '+product_name + '?',
                text: "Please confirm the delete of the data. !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
		   		$.post('<?php echo base_url('Control/deleteyoutube')?>', { dataID : dataID , table : table }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
						  $('#row'+dataID).remove();
						   //------ images RowImg   file RowFile
					   }else{
						   swal({
							title: 'Error',
							text: "Cannot delete data",
							type: 'error',
							confirmButtonClass: 'btn btn-confirm mt-2'
                    		})
					   }
				});
               
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal({
                        title: 'Cancelled',
                        text: "You have canceled the data deletion.",
                        type: 'error',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    })
                }
            })

	} 
          //------------------------------ 
	function ShowBookDetail(DataID,quotation_id){
		$.post('<?php echo base_url('Control2/quotationsDetail')?>' , {DataID:DataID},function(data){
			    $('#modal_Large2 .modal-body').empty();
     			$('#modal_Large2  .modal-title').html('No. <span class="text-danger">'+quotation_id+'</span>');
     			$('#modal_Large2 .modal-body').html(data);
     			$('#modal_Large2').modal('show');
		})
			   
	}  

	//--------------------------------
	$('#datatable').DataTable();
	$(document).ready(function(){
		//loadListProduct();
	})
</script>