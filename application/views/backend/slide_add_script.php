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
		   		$.post('<?php echo base_url('control/deleteSlideImg')?>', { imageID : imageID , imageName:imageName }, function(data){ 
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
	function AddSlide(){  // news_title  news_detail
		//var slide_title = $('#slide_title').val();
                var slide_title1 = tinyMCE.editors[$('#slide_title').attr('id')].getContent();
		$('#comment').val(slide_title1);
		//var slide_detail = $('#slide_detail').val();
                var slide_detail1 = tinyMCE.editors[$('#slide_detail').attr('id')].getContent();
		$('#comment1').val(slide_detail1);
                var slide_desc = tinyMCE.editors[$('#slide_desc').attr('id')].getContent();
		$('#comment2').val(slide_desc);
		var ImagesFiles = $('#ImagesFiles').val();
		var img_old = $('#img_old').val();
		var currentID = $('#currentID').val();
		if(slide_title1==''){
			swal({
					title: 'Warning !',
					text: "Please Enter Topic.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			
		}else if(slide_detail1==''){
				swal({
					title: 'Warning !',
					text: "Please Enter Details.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if((ImagesFiles=='')&&(img_old=='')){
				swal({
					title: 'Warning !',
					text: "Please Enter Picture Banner",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else{
					var postData = new FormData($("#slideForm")[0]);	
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('control/addSlide')?>',
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
				 loadImages(data);
				 //loadFile(data);
				swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                                 setTimeout(function () {
                            window.location.href = "<?php echo base_url('Control/slide_add/') ?>" + data;
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
	function  loadImages(ProID){
		$.post('<?php echo base_url('control/loadSlideImages')?>' , { ProID : ProID }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);
			
		})
		
	}
	//--------------------------
	$(document).ready(function(){
		var currentID = $('#currentID').val();
		//if(currentID!=''){ 
			loadImages(currentID);
		//}	
                
                 tinymce.init({
		   selector: "textarea.ex",
		   theme: "modern",
		   height:300,
		   plugins: [
			 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
		   style_formats: [
			 {title: 'Bold text', inline: 'b'},
			 {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			 {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			 {title: 'Example 1', inline: 'span', classes: 'example1'},
			 {title: 'Example 2', inline: 'span', classes: 'example2'},
			 {title: 'Table styles'},
			 {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
		   ]
		});
	})
</script>


