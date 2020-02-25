<script>
	 function chk_username(username){
                  $.post('<?php echo base_url('Control/chk_user')?>' , { username : username }, 
			function(data){
				if(data>0){ 
                                    alert('Username is already in the system.');
                	
                    $('#username').val('');
                    $('#username').focus();
				}
			});
             
                    }
       //---------------------------------
        function chkpass(pass){
            var pass1 = $('#Password').val();
            if(pass != pass1){
                alert('password is not match');
                $('#ComfirmPassword').val('');
                $('#ComfirmPassword').focus();
            }
                    }          
	//---------------------------------
	function Addadmin(){
		var Name = $("#Name").val();
		var user_name = $("#username").val();
                var Password = $("#Password").val();
                var ComfirmPassword = $("#ComfirmPassword").val();
                var password_old = $("#oldpass").val();
                var dataID = $("#dataID").val();
               
    if(Name == ''){  
         swal({
              title: "Please enter user name ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            });
    }else if(user_name ==''){
            swal({
              title: "Please enter user name ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            });
        }else if((Password == '')&&(password_old == '')){
             swal({
              title: "Please enter Password ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            });
        }else if ((ComfirmPassword == '')&&(password_old == '')){
                swal({
              title: "Please enter Comfirm Password ",
                type: "warning",
                closeOnConfirm: false,
                showLoaderOnConfirm: true  
            }); 
        }else{
             var postData = new FormData($("#adminForm")[0]);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('Control/add_admin') ?>',
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function (data, status) {
                        //console.log(data);
                        $('#currentID').val(data);
                        if (status == 'success') {
                             swal({
                                title: 'Save data successfully..',
                                text: 'Saved successfully',
                                type: 'success',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                            setTimeout(function () {
                                window.location.href = "<?php echo base_url('Control/admin_add/')?>"+data;
                            }, 2000);
                        } else {
                            swal({
                                title: 'Can not be saved.!',
                                text: "Can not be saved.!",
                                type: 'warning',
                                confirmButtonClass: 'btn btn-confirm mt-2'
                            });
                        }
                    }
                });

	}
        }
	//-----------------
	$(".progress").hide();
	
	
</script>
