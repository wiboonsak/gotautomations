<script>
	//-------------  
	function removeMe(imageID,imageName){
		 swal({
                title: 'Delete ?',
                text: "Please confirm the delete of the data. !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
		   		$.post('<?php echo base_url('Control/deleteNewsImg')?>', { imageID : imageID , imageName:imageName }, function(data){ 
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
	function AddNews(){  // news_title  news_detail
		var news_title = $('#news_title').val();
		var news_detail = $('#news_detail').val();
		if(news_title==''){
			swal({
					title: 'warning !',
					text: "Please enter a news topic.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			
		}else if(news_detail==''){
				swal({
					title: 'warning !',
					text: "Please enter news details.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else{
					var postData = new FormData($("#productForm")[0]);	
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('Control/addNews')?>',
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
			$('#oldImg').val(data);
			$(".progress-bar").css("width", + 0 +"%");
			$(".progress").hide();
			$('#ImagesFiles').val('');
			$('#cFiles').val('');
			 $('#txtTitle').val('');
			if(status=='success'){
				 loadImages(data);
				 //loadFile(data);
				swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control/news_add/')?>"+data; }, 2000);
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
	function  loadImages(ProID){
		$.post('<?php echo base_url('Control/loadNewsImages')?>' , { ProID : ProID }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);
			
		})
		
	}
                    //----------------------
	function deleteyoutube(dataID,table){  
            	var currentID = $('#currentID').val();
       swal({
                title: 'Delete ?',
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
						  setTimeout(function () {
                        window.location.href = "<?php echo base_url('Control/news_add/') ?>"+currentID ;
                    }, 2000);
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
                                   //===============================
        function ADDyoutube(){
             
        var num = $('.youtube3').length;
        num = num + 1;
        $('#linkyoutube_a').append("<br><input name='youtube[]' type='text' id='inputyoutube"+num+"' class='form-control form-control-sm youtube3' value=''>");
        
       
    
        }
        //---------------------------------------------------
        function sendmail(currentID){
             
       $.post('<?php echo base_url('Control/sendmail')?>', { currentID : currentID }, function(data){
           if(data=='1'){
               alert('Send Mail Successfully');
           }else{
                alert('Can not Send Mail');
           }
              });
       
    
        }
	//--------------------------
	$(document).ready(function(){
		var currentID = $('#currentID').val();
		//if(currentID!=''){ 
			loadImages(currentID);
		//}	
	})
</script>


