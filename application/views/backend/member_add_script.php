<script>
	
	//-----------------------------------
	function Addmember(){  // news_title  news_detail
		var name = $('#name').val();
		var password = $('#password').val();
		var passwordold = $('#passwordold').val();
		var Confirmpassword = $('#Confirmpassword').val();
		var email = $('#email').val();
		var phone = $('#phone').val();
		if(name==''){
			swal({
					title: 'warning !',
					text: "Please Enter Name.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
			
		
		}else if(email==''){
				swal({
					title: 'warning !',
					text: "Please Enter E-mail.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else if(phone==''){
				swal({
					title: 'warning !',
					text: "Please Enter Phone.",
					type: 'warning',
					confirmButtonClass: 'btn btn-confirm mt-2'
			}) 
		}else{
					var postData = new FormData($("#memberForm")[0]);	
		$.ajax({
		 type:'POST',
		 url:'<?php echo base_url('Control2/Addmember')?>',
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
                     setTimeout(function(){ window.location.href = "<?php echo base_url('Control2/member_add/')?>"+data; }, 2000);
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
         function checkmail(email){
         var emailold = $('#emailold').val();
         if((emailold=='')&&(emailold!=email)){
        $.post('<?php echo base_url('Product/checkmail')?>', { email : email }, function(data){
           if(data>0){
               alert('This email is already in use.');
               $('#email').val('');
               $('#email').focus();
           }
        });
    }
	}
        //---------------------------------
        function confirmpass(pass){
        var password = $('#password').val();
        if(pass!=password){
           swal({
                        title: 'Passwords do not match!',
                        //text: "You won't be able to revert this!",
                        type: 'warning',
                        confirmButtonClass: 'btn btn-confirm mt-2'
                    }); 
            $('#Confirmpassword').val('');    
            $('#Confirmpassword').focus();    
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


