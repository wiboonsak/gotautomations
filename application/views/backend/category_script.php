<script>
	function updateOrder(dataID,FieldName,changeValue){
		var returnValue = $('#chkOrder'+dataID).val();
		console.log('returnValue:-'+returnValue);
		if((changeValue=='')){
			swal({
				title: 'Warning !',
				text: "Please enter the numbers in order.",
				type: 'warning',
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			$('#order'+dataID).val(returnValue);
			return false;
			
		}else{
			
			$.post('<?php echo base_url('Control/updateOrderCate')?>', { dataID : dataID , changeValue : changeValue } ,function(data){
				
				if(data == 1){
					swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });	
                    setTimeout(function(){ window.location.href = "<?php echo base_url('Control/category')?>"; }, 2000);
				
				}else{
					swal({
                        title: 'Can not be saved!',
                        //text: "You won't be able to revert this!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
				}
			})
		}
	}
	//-------------------------
	function comfirmDelete(DataID,cateName,level){
       swal({
                title: 'Delete '+cateName+' ?',
                text: "Please confirm delete data. !",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
                cancelButtonText: 'Cancel',
                confirmButtonClass: 'btn btn-success mt-2',
                cancelButtonClass: 'btn btn-danger ml-2 mt-2',
                buttonsStyling: false
            }).then(function () {
		   		$.post('<?php echo base_url('Control/deletePcate')?>', { DataID : DataID , level : level }, function(data){  
					console.log(data);
					   if(data == '1'){
						     swal({
								title: 'Cannot delete data. !',
								text: "Please delete product or sub category.",
								type: 'error',
								confirmButtonClass: 'btn btn-confirm mt-2'
							}) 
						    loadCategory();
						   
					   } else if(data == '2'){
						    swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'
							})
						    loadCategory();
						    
					   }else{
						   swal({
								title: 'Error',
								text: "Cannot delete data",
								type: 'error',
								confirmButtonClass: 'btn btn-confirm mt-2'
                    	   })
					   }
				});
               
            }, function (dismiss){
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if(dismiss === 'cancel'){
                    swal({
                        title: 'Cancelled',
                        text: "You have canceled the data deletion.",
                        type: 'error',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    })
                }
            })
  }
  //---------------------------------
	function AddCateGory(){
		
		var files = $('#category_img').val();
		var category_title = $('#name_th').val();
		var oldImg = $('#imgold').val();
		console.log(files);		
		
		if(category_title==''){
			
			alert('Please enter product category name.');
			return false;
			
		}else{
			
			var detail_th = tinyMCE.editors[$('#detail_th1').attr('id')].getContent();
			$('#detail_th').val(detail_th);
			var postData = new FormData($("#categoryForm")[0]);
			
			$.ajax({
				type:'POST',
				url:'<?php echo base_url('Control/DoAddProductCategory')?>',
				processData: false,
				contentType: false,
				data : postData,
				xhr: function(){
				//upload Progress
				var xhr = $.ajaxSettings.xhr();
				if(xhr.upload){
					$(".progress").show();
					xhr.upload.addEventListener('progress', function(event) {
						var percent = 0;
						var position = event.loaded || event.position;
						var total = event.total;
						if(event.lengthComputable){
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
				// console.log("File Uploaded");
					console.log('data->'+data+'  status->'+status);
					//$('#oldImg').val(data);
					$(".progress-bar").css("width", + 0 +"%");
					$(".progress").hide();
					if(status == 'success'){
						//$('#dataID').val(data);
						swal({
                        	title: 'Data saved successfully.',
                        	//text: "Your file has been deleted",
                        	type: 'success',
                        	confirmButtonClass: 'btn btn-confirm mt-2'
                    	});	
						setTimeout(function(){ window.location.href = "<?php echo base_url('Control/detail_category/')?>"+data; }, 2000);                    
                     
					} else {
						swal({
							title: 'Can not be saved!',
							//text: "You won't be able to revert this!",
							type: 'warning',
							confirmButtonClass: 'btn btn-confirm mt-2'
						});
					}
					/*if(oldImg==''){ 
						window.location.href="<?php //echo base_url('Control/category_add/')?>"+data;
					}*/							 
				}
			});
		}
	}
	//-----------------------
	function loadImages(ProID){
		$.post('<?php echo base_url('Control/loadcateImg')?>' , { ProID : ProID }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);			
		})		
	}
	//-----------------------
    function imgDelete(DataID,FileName){
		var currentID = $('#dataID').val();
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
		   		$.post('<?php echo base_url('Control/deletecateimg')?>', { DataID : DataID ,  FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						    swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
 							setTimeout(function(){ window.location.href = "<?php echo base_url('Control/detail_category/')?>"+currentID; }, 2000);
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
	//-----------------------
	
	function loadCategory(){
		
		$.post('<?php echo base_url('Control/load_category')?>', {}, function(data){
			$('#showData').empty();
			$('#showData').html(data);			
		})		
	}
	//-----------------
	
	function updateData(){
		
		swal({
           title: 'Data saved successfully.',
           type: 'success',
           confirmButtonClass: 'btn btn-confirm mt-2'
        });		
	}
	//-----------------
	
	function add_cateGory(type2){
		
		var category_title = $('#name_th'+type2).val();		
		var mainCate_id = $('#mainCate_id'+type2).val();		
		var level = $('#level'+type2).val();		
		
		if(category_title == ''){
			
			alert('Please enter product category name.');
			return false;
			
		} else {
		
			$.post('<?php echo base_url('Control/do_addCategory')?>' , { category_title : category_title , mainCate_id : mainCate_id , level : level } , function(data){
				
					if(data > 0){						
						
						//$('#modalCategory').modal('hide');						
						
						swal({
                        	title: 'Data saved successfully.',
                        	//text: "Your file has been deleted",
                        	type: 'success',
                        	confirmButtonClass: 'btn btn-confirm mt-2'
                    	});
						loadCategory();
						$('#name_th'+type2).val('');
						
                    } else {
						swal({
							title: 'Can not be saved!',
							//text: "You won't be able to revert this!",
							type: 'warning',
							confirmButtonClass: 'btn btn-confirm mt-2'
						});
					}
			});
		}
	}
	//----------------------
	
	function add_subCategory(mainCate_id,level){
		
		$('#modalCategory').modal('show');		
		$('#mainCate_id2').val('');
		$('#level2').val('');
		$('#mainCate_id2').val(mainCate_id);
		$('#level2').val(level);
		
	}
	//----------------------
	
	function updateCategory(dataID,changeValue){
		
		if((changeValue == '')){
			swal({
				title: 'Warning !',
				text: "Please enter product category name.",
				type: 'warning',
				confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			//$('#order'+dataID).val(returnValue);
			return false;
			
		}else{
			
			$.post('<?php echo base_url('Control/update_category')?>', { dataID : dataID , changeValue : changeValue } ,function(data){
				
				if(data == 1){
					swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });                    
				
				}else{
					swal({
                        title: 'Can not be saved!',
                        //text: "You won't be able to revert this!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
				}
			})
		}
	}
	//----------------------	
	
	
	$(".progress").hide();
	
	$(document).ready(function (){
		
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
	//----------------------	
            
        var currentID = $('#dataID').val();
        loadImages(currentID);		
		loadCategory();
		
		
  //called when key is pressed in textbox
		$(".OrderCate").keypress(function (e){
			 //if the letter is not digit then display error and don't type anything
			 if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)){
				//display error message
				//$("#errmsg").html("Digits Only").show().fadeOut("slow");
					   return false;
			}
		 });
	});
	
</script>
