<script>
	//-------------  
	function comfirmDelete(imageID,imageName){
		 swal({
                title: 'Delete ?',
                text: "Please confirm the delete of the data.!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
		   		$.post('<?php echo base_url('control2/deletecertificatesImg')?>', { currentID : imageID , img:imageName }, function(data){ 
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'
							}) 
						    $('#Dimg'+imageID).remove();
						 
					   }else{
						   swal({
							title: 'Error',
							text: "Cannot delete data.",
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
	
	//-----------------------------------
	function AddCertificates(){  // news_title  news_detail
		var certificates = $('#certificates').val();
		var ImagesFiles = $('#ImagesFiles').val();
		var img_old = $('#img_old').val();
		var currentID = $('#currentID').val();
		if(certificates==''){
			swal({
					title: 'Warning !',
					text: "Please enter Certificates.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if((ImagesFiles=='')&&(img_old=='')){
				swal({
					title: 'Warning !',
					text: "Please enter File PDF",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else{
					var postData = new FormData($("#certificateForm")[0]);	
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('control2/addcertificates')?>',
		 processData: false,
		 contentType: false,
		 data : postData,
		 xhr: function(){
			//upload Progress
			var xhr = $.ajaxSettings.xhr();
			if (xhr.upload) {
				$(".progress").show();
				xhr.upload.addEventListener('progress', function(event) {
					var percent = 0;
					var position = event.loaded || event.position;
					var total = event.total;
					if (event.lengthComputable) {
						percent = Math.ceil(position / total * 100);
					}
					//update progressbar
					$(".progress-bar").css("width", + percent +"%");
					$('#progress_bar_id' + " .status").text(percent +"%");
				}, true);
			}
			return xhr;
		},
		 success:function(data, status){
			console.log(data);
			$('#currentID').val(data);
		  // console.log("File Uploaded");
			console.log('data->'+data+'  status->'+status);
			
			if(status=='success'){
				 //loadImages(data);
				 //loadFile(data);
				swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                                 setTimeout(function () {
                            window.location.href = "<?php echo base_url('Control2/certificates_add/') ?>" + data;
                        }, 2000);
			}else{
					 swal({
                        title: 'Can not be saved!',
                        //text: "You won't be able to revert this!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
			}

		 }
			});
			//----------------------------
		}
	}
	//---------------------------------
	//--------------------------- 
	function  loadImages(currentID,img_old){
		$.post('<?php echo base_url('control2/loadcertificatefile')?>' , {currentID:currentID, img_old : img_old }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);
			
		})
		
	}
	//--------------------------
	$(document).ready(function(){
		var currentID = $('#currentID').val();
		var img_old = $('#img_old').val();
		if(img_old!=''){ 
			loadImages(currentID,img_old);
		}	
	})
</script>


