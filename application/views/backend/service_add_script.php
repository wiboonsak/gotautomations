<script>
	
	//-----------------------------------
	function AddService(){  // news_title  news_detail
		var topic = $('#topic').val();
		var topic_detail = $('#topic_detail').val();
		var icon_class = $('#icon_class').val();
		if(topic==''){
			swal({
					title: 'warning !',
					text: "Please Enter Topic.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			
		}else if(topic_detail==''){
				swal({
					title: 'warning !',
					text: "Please Enter Details.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if(icon_class==''){
				swal({
					title: 'warning !',
					text: "Please Enter Icon.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else{
					var postData = new FormData($("#serviceForm")[0]);	
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('Control2/AddService')?>',
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
				 //loadFile(data);
				swal({
                        title: 'Data saved successfully',
                        //text: "Your file has been deleted",
                        type: 'success',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    });
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control2/service_add/')?>"+data; }, 2000);
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

	//--------------------------
	$(document).ready(function(){
		var currentID = $('#currentID').val();
		//if(currentID!=''){ 
			loadImages(currentID);
		//}	
	})
</script>


