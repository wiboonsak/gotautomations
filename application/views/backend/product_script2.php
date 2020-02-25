<script>	 
	
	function comfirmDelete(DataID,fileType,FileName){
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
            }).then(function (){
		   		$.post('<?php echo base_url('Control/deletePorductFile1')?>', { DataID : DataID , fileType : fileType , FileName : FileName }, function(data){  
					console.log(data);
					   if(data=='1'){
						     swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
						   //------------------------ catalgoue RowImg19
						   if(fileType=='imgfile'){
							     $('#RowImg'+DataID).remove(); 
							     console.log('#RowImg'+DataID)
						   }
						   if(fileType=='catalgoue'){
							     $('#RowFile'+DataID).remove();  
							   console.log('#RowFile'+DataID)
						   }						  
						   
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
	//---------------------------
	
	function loadImages(ProID){
		$.post('<?php echo base_url('Control/loadProductImg')?>' , { ProID : ProID }, function(data){
			$('#showImage').empty();
			$('#showImage').html(data);			
		})		
	}
    //----------------------------
	
    function loadFile(ProID){
		$.post('<?php echo base_url('Control/loadProductFile')?>' , { ProID : ProID }, function(data){
			$('#showCat').empty();
			$('#showCat').html(data);			
		})		
	}
	//---------------------- 
	
	function Addproduct(){
		
		var product_nameth = $('#name_th').val();
		var category = $('#category1').val();		
		
        /*var product_desc = tinyMCE.editors[$('#product_desc').attr('id')].getContent();
		$('#comment').val(product_desc);
        var comment = $('#comment').val();
		var product_price = $('#product_price').val();                
		var product_category = $('#product_category option:selected').val();*/
                
		if(product_nameth == ''){
			 swal({
				title: 'Please enter product name. !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			 })
			
        }else if(category == '0'){
			swal({
				title: 'Please select product category. !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})

		}else{	
			
			var overview_th = tinyMCE.editors[$('#overview_th2').attr('id')].getContent();
			$('#overview_th').val(overview_th);
			var specification_th = tinyMCE.editors[$('#specification_th2').attr('id')].getContent();
			$('#specification_th').val(specification_th);
                       
			var postData = new FormData($("#productForm")[0]);	
			$.ajax({
				 type:'POST',
				 url:'<?php echo base_url('Control/addProduct')?>',
				 processData: false,
				 contentType: false,
				 data : postData,
				 xhr: function(){
					//upload Progress
					var xhr = $.ajaxSettings.xhr();
					if(xhr.upload){
						$(".progress").show();
						xhr.upload.addEventListener('progress', function(event){
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
					if(status=='success'){
						 loadImages(data);
						 loadFile(data);

						swal({
							title: 'Data saved successfully',
							//text: "Your file has been deleted",
							type: 'success',
							confirmButtonClass: 'btn btn-confirm mt-2'
						});
						setTimeout(function(){ window.location.href = "<?php echo base_url('Control/Product_add/')?>"+data; }, 2000);
						
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
		}
	}
    //===============================
	
    function ADDyoutube(){
             
        var num = $('.youtube3').length;
        num = num + 1;
        $('#linkyoutube_a').append("<br><input name='youtube[]' type='text' id='inputyoutube"+num+"' class='form-control form-control-sm youtube3' value=''>");
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
						  setTimeout(function (){  window.location.href = "<?php echo base_url('Control/Product_add/')?>"+currentID;
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
    //------------------------- 
	
	function get_subCategory(mainCate_id,level){
		$.post('<?php echo base_url('Control/do_get_subCategory')?>' , { mainCate_id : mainCate_id , level : level }, function(data){
			
			level = parseInt(level) + 1;
			if($('#sub'+level).length){		
				
				var loop = $('.category2').length;
				for(var i = level; i <= loop; i++){ 
					
					$('#sub'+i).remove();			
				}
				level = parseInt(level) - 1;
				$(data).insertAfter($('#sub'+level));		
				
			} else {
				
				$(data).insertAfter($('.category2').last());
			}			
		})		
	}
	//------------------------- 
	
	function AddFAQ(){
		
		var topic_th = $('#topic_th').val();
		var desc_th = tinyMCE.editors[$('#desc_th2').attr('id')].getContent();
		var faqID = $('#faqID').val();
		var currentID = $('#currentID').val();        
                
		if(topic_th == ''){
			 swal({
				title: 'Please enter topic of questions. !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			 })
			
        }else if(desc_th == ''){
			swal({
				title: 'Please enter detail of answer. !',
				confirmButtonClass: 'btn btn-confirm mt-2',
				type: 'warning'
			})

		}else{
			
			$.post('<?php echo base_url('control/addFAQ')?>' , { topic_th : topic_th , desc_th : desc_th , faqID : faqID , currentID : currentID }  , function(data){
				
				if(data != 'Error'){
					//$('#faqID').val(data);
					swal({
						title: 'Data saved successfully',
						//text: 'You clicked the button!',
						type: 'success',
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 
					$('#topic_th').val('');
					tinyMCE.editors[$('#desc_th2').attr('id')].setContent('');
					loadFAQ(currentID);
					$("#faq").removeClass('active');
					$('a[href="#faq"]').removeClass('active');
					$("#list_faq").addClass('active');
					$('a[href="#list_faq"]').addClass('active');

				}else{
					swal({
						title: 'Can not be saved!',
						//text: "You won't be able to revert this!",
						type: 'warning',								
						confirmButtonClass: 'btn btn-confirm mt-2'
					}) 							
				}
			})			
		}				
	}
	//----------------------
	
	function loadFAQ(ProID){
		$.post('<?php echo base_url('Control/load_FAQ')?>' , { ProID : ProID }, function(data){
			$('#showFAQ').empty();
			$('#showFAQ').html(data);			
		})		
	}
	//----------------------
	
	function deleteFAQ(DataID){
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
            }).then(function (){
		   		$.post('<?php echo base_url('Control/deleteFAQ')?>', { DataID : DataID }, function(data){  
					
					   if(data=='1'){
						   	loadFAQ(currentID);
						    swal({
								title: 'Deleted !',
								text: "Data has been deleted successfully.",
								type: 'success',
								confirmButtonClass: 'btn btn-confirm mt-2'   
							}) 
						   
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
	//----------------------
	
	function editFAQ(dataID,topic){
		
		var currentID = $('#currentID').val();
		
		$.post('<?php echo base_url('Control/editFAQ')?>' , { dataID : dataID , currentID : currentID }, function(data){
						
			$('#faqID').val(dataID);
			$('#topic_th').val(topic);
			tinyMCE.editors[$('#desc_th2').attr('id')].setContent(data);
			
			$("#list_faq").removeClass('active');
			$('a[href="#list_faq"]').removeClass('active');
			$("#faq").addClass('active');
			$('a[href="#faq"]').addClass('active');
		})		
	} 
	//----------------------
	
	function AddFile(){
		
		var cFiles = $('#file22').val();
		//var cFiles = $('#cFiles').val();
		var group2 = $('#group2').val();
		var txtTitle = $('#txtTitle_th').val();
		
		if(cFiles != ''){
			
			if(group2 == '0'){
				
				swal({
					title: 'Please select type of file. !',
					confirmButtonClass: 'btn btn-confirm mt-2',
					type: 'warning'
				})				
			   
			} else if(txtTitle == ''){
				
				swal({
					title: 'Please enter file name. !',
					confirmButtonClass: 'btn btn-confirm mt-2',
					type: 'warning'
				})
				
			} else {
				
				$('#file22').attr('onclick', 'upload_file(this.files[0])');
				$('#file22').click();
								 
				$('#divload').modal({backdrop: 'static', keyboard: false});
				$('#divload').modal('show');
			}		   
		} else {
			return false;
		}		
	}
	//----------------------
	
	var p=document.getElementById('progress_bar');
	var s=document.getElementById('status');
	var b=document.getElementById('file22');
		//var a=document.getElementById('abort');

function upload_file(file){
	
	 var allowedExtensions = /(\.pdf|\.PDF)$/i;
	 var filePath = document.getElementById('file22').value;
	 var imgVideo = document.getElementById("file22");     

	if(!allowedExtensions.exec(filePath)){
        alert('กรุณาอัพโหลดไฟล์ประเภท PDF');
       
        return false;
	/*}else if(imgVideo.files[0].size > 52428800){
        alert('ขนาดไฟล์เกิน 50 เมกกะไบต์ \r \n กรุณาเลือกไฟล์ขนาดเล็กกว่า 50 เมกกะไบต์');
       
        return false;*/		
    }else{
	
	chunk_uploader.on_ready=function(response){
		//s.innerHTML='100%';

		//document.getElementById('client_file_size').innerHTML=response.total+' bytes';
		//document.getElementById('server_sent_bytes').innerHTML=response.sent+' bytes';
		//document.getElementById('elapsed_time').innerHTML=response.elapsed+' sec';
		//document.getElementById('remote_file_name').innerHTML=response.file.name;
		//document.getElementById('remote_file_path').innerHTML=response.file.tmp_name;
		//document.getElementById('remote_file_size').innerHTML=response.file.size+' bytes';
		//document.getElementById('remote_file_chunks').innerHTML=response.file.chunks+' chunks of max. '+chunk_uploader.options.max_chunk_size+' bytes';
		//document.getElementById('remote_file_crc').innerHTML=response.file.crc.toString(16)+' ('+response.file.crc+')';

		//document.getElementById('transfer_result').style.display='inherit'; a.
        console.log('>'+response.file.name)
		document.getElementById('video_file_name').value=response.file.name;		
		
	};

	chunk_uploader.on_done=function(){
		b.disabled=false;
		//a.disabled=!b.disabled;
		p.style.backgroundColor='#13B048';
		setTimeout(function (){  
			$('#divload').modal('hide');
			Addproduct();
        }, 2000);		
	};
	
	chunk_uploader.on_error=function(object,err_type){
		s.innerHTML=err_type+' error : '+object.message+' ('+object.code+')';
		b.disabled=false;
		//a.disabled=!b.disabled;
		p.style.backgroundColor='#FF6347';
	};

	chunk_uploader.on_abort=function(object){
		s.innerHTML=object.message;
		b.disabled=false;
		//a.disabled=!b.disabled;
		p.style.backgroundColor='#F78C18';
		document.getElementById('video_file_name').value='';
		console.log('on_abort');
	};

	chunk_uploader.on_upload_progress=function(progress){
		p.style.width=progress.percentage+'%';
		s.innerHTML=p.style.width+' (ETA : '+progress.eta.toHMS()+')';
	};

	chunk_uploader.options.max_chunk_size=parseInt(document.getElementById('max_chunk_size').value);
	//chunk_uploader.options.raw_post=document.getElementById('raw_post').checked;
	chunk_uploader.options.raw_post=false;
	chunk_uploader.options.max_parallel_chunks=parseInt(document.getElementById('max_parallel_chunks').value);
	chunk_uploader.options.send_interval=parseInt(document.getElementById('send_interval').value);

	b.disabled=true;
	//a.disabled=!b.disabled;
	
	chunk_uploader.upload_chunked('<?php echo base_url()?>upload.php',file);  
  }
}
window.onload=function(){window.chunk_uploader=new MyChunkUploader();};	
	
    //------------------------- get_subCategory
	
	$(document).ready(function(){ 
        tinymce.init({
		   selector: "textarea.ex",
		   theme: "modern",
		   height:300,
		   plugins: [
			 "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			 "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			 "save table contextmenu directionality emoticons template paste textcolor"
		   ],
		   toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons",
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
	/////////////////////////////////	
       var currentID = $('#currentID').val();		
	   var product_category = $('#product_category option:selected').val();	
	   loadImages(currentID);
       loadFile(currentID);
       loadFAQ(currentID);
    })          
		
//		if(accessories_category!=0){
//			getSubCateSlect(accessories_category);
//			
//		}
	

	
</script>
<??>