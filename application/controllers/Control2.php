<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control2 extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
       parent::__construct();
          $this->load->model('User_model');  	 
          $this->load->model('Product_model'); 
          $this->load->model('Download_model'); 
    }
	//---------------------
	public function index(){

	}
    //---------------------
    public function member(){
		$data['getuserfontend']=$this->Download_model->getuserfontend();
		$this->load->view('backend/header');
		$this->load->view('backend/member_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/member_list_script');
	}
    //---------------------
    public function member_download($userID=NULL){
		$data['getdownloadfile']=$this->Download_model->getdownloadfile($userID);
		$data['getuserfontendbyid']=$this->Download_model->getuserfontendbyid($userID);
		$this->load->view('backend/header');
		$this->load->view('backend/member_download',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/member_list_script');
	}
    //---------------------
    public function downlond(){
		$data['getdownloadfiledistinct']=$this->Download_model->getdownloadfiledistinct();
		$this->load->view('backend/header');
		$this->load->view('backend/download_detail',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/download_list_script');
	}
    //---------------------
    public function download_member($file_id=NULL,$product_id=NULL){
		$data['getuserfontendbyid']=$this->Download_model->download_member($file_id,$product_id);
		$this->load->view('backend/header');
		$this->load->view('backend/download_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/download_list_script');
	}
    //---------------------
    public function quotations(){
		$data['getquotations']=$this->Product_model->getquotations();
		$this->load->view('backend/header');
		$this->load->view('backend/quotations_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/quotations_listscript');
	}
        //-------------------   
	public function quotationsDetail(){
		$data['DataID'] = $this->input->post('DataID');
		
		$data['quotationsDetail'] =$this->Product_model->getquotations($data['DataID']);
		
		$this->load->view('backend/quotationsDetail',$data);
		
	}
         //-------------------------------
	public function certificates_add($curentID=NULL){
		
		$certificateDetail = $this->Product_model->getcertificateDetail($curentID);
		if($certificateDetail->num_rows() > 0){
			foreach($certificateDetail->result() AS $certificate){}
			$data['certificates']=$certificate->certificates;
			$data['file_name']=$certificate->file_name;
			$data['currentID']=$certificate->id;
			
		}else{
			
			$data['certificates']='';
			$data['file_name']='';			
			$data['currentID']='';			
		}
		$this->load->view('backend/header');
		$this->load->view('backend/certificate_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/certificate_add_script');		
	}
    //-------------------------------deleteSlideImg 
	public function deletecertificatesImg(){
		$DataID=$this->input->post('currentID');
		$imge_name=$this->input->post('img');
		$result = $this->Product_model->deletecertificate($DataID,$imge_name);
		echo $result;
	}
    //-------------------------------    
	public function addcertificates(){
		 $currentID =$this->input->post('currentID');
		 $certificates =$this->input->post('certificates');
                 $img = $this->input->post('img_old');
                 $currentID1 = $this->Product_model->addcert($currentID,$certificates);
                 
               
                 
		 //--------uploadfile------------//
		$countFiles = count($_FILES['userFiles']['name']);
		  
		 		$upload_path = './uploadfile/certificate';
				$upload_pathName = 'uploadfile/certificate';
				$config['upload_path'] = $upload_path;
				//allowed file types. * means all types
				$config['allowed_types'] = 'pdf|PDF';
				//allowed max file size. 0 means unlimited file size
				$config['max_size'] = '0';
				//max file name size
				$config['max_filename'] = '255';
				$config['file_name'] = str_replace(" ","",$certificates);
				//whether file name should be encrypted or not
				//$config['encrypt_name'] = TRUE;
				//store image info once uploaded
				$image_data = array();
				//check for errors
				$is_file_error = FALSE;
		 	
		    $this->load->library('upload', $config);
       if($countFiles>0){
            if($img!=''){$this->Product_model->deletecertificatesImg($currentID1,$img);}
			for($i=0; $i<$countFiles; $i++)
			{           
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];


               
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $result = $this->Product_model->addcertificates($uploadData[$i]['file_name'],$currentID1);
                }
                }
                }
		echo $currentID;
		 
	}
    //-------------------------------
	public function loadcertificatefile(){
	$data['currentID'] = $this->input->post('currentID');
	$data['img_old'] = $this->input->post('img_old');
        $this->load->view('backend/certificate_images_list',$data);		
	}

    //-------------------------------
	public function certificates_list(){
            
		$data['getcertificate']=$this->Product_model->getcertificate();
		$this->load->view('backend/header');
		$this->load->view('backend/certificate_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/certificate_list_script');	
	}
         //-------------------------------
    public function deletecertificates(){
		$DataID=$this->input->post('DataID');
		$result = $this->Product_model->deletecertificates($DataID);
		echo $result;
	}
         //-------------------------------
	public function service_add($curentID=NULL){
		
		$getservice = $this->Product_model->getservice($curentID);
		if($getservice->num_rows() > 0){
			foreach($getservice->result() AS $service){}
			$data['topic']=$service->topic;
			$data['topic_detail']=$service->topic_detail;
			$data['icon_class']=$service->icon_class;
			$data['currentID']=$service->id;
			
		}else{
			$data['topic']='';
			$data['topic_detail']='';
			$data['icon_class']='';
			$data['currentID']='';		
		}
		$this->load->view('backend/header');
		$this->load->view('backend/service_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/service_add_script');		
	}
         //-------------------------------    
	public function AddService(){
		$currentID =$this->input->post('currentID');
		$topic =$this->input->post('topic');
		$topic_detail =$this->input->post('topic_detail');
		$icon_class =$this->input->post('icon_class');
		 
		$result = $this->Product_model->AddService($topic , $topic_detail ,$currentID , $icon_class );

		echo $result;		 
	}
         //-------------------------------
	public function service_list(){
            
		$data['getservice_list']=$this->Product_model->getservice_list();
		$this->load->view('backend/header');
		$this->load->view('backend/service_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/service_list_script');	
	}
         //-------------------------------
	public function service_detail_add($curentID=NULL){
		
		$getserviceDetail = $this->Product_model->getserviceDetailbyid($curentID);
		if($getserviceDetail->num_rows() > 0){
			foreach($getserviceDetail->result() AS $serviceDetail){}
			$data['service_topic']=$serviceDetail->service_topic;
			$data['service_cate']=$serviceDetail->service_cate;
			$data['service_detail']=$serviceDetail->service_detail; 
			$data['currentID']=$serviceDetail->id;
			$data['date']=$serviceDetail->date;
		 }else{
			$data['service_topic']='';
			$data['service_cate']='';
			$data['service_detail']=''; 
			$data['currentID']='';
			$data['date']='';
		}
                $data['getservice_list'] = $this->Product_model->getservice_list('1');
		$this->load->view('backend/header_service',$data);
		$this->load->view('backend/service_detail_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/service_detail_script');		
	}
          //-------------------------------
	public function loadserviceImages(){
		$ProID=$this->input->post('ProID');
		$data['loadserviceImages'] = $this->Product_model->loadserviceImages($ProID);
		$this->load->view('backend/service_detail_images_list',$data);
		
	}
            //-------------------------------   // imageID 
	public function deleteserviceImg(){
		$imageID = $this->input->post('imageID');
		$imageName = $this->input->post('imageName');
		$result = $this->Product_model->deleteserviceImg($imageID,$imageName);
		echo $result;
	} 
        //-------------------------------    
	public function Addservice_detail(){
		$currentID =$this->input->post('currentID');
		$service_detail =$this->input->post('service_detail');
		$service_topic =$this->input->post('service_topic');
		$Category =$this->input->post('Category');
		$date =$this->input->post('date');
		$youtube =$this->input->post('youtube');
		 
		$currentID = $this->Product_model->Addservice_detail($service_topic , $service_detail ,$currentID , $date,$Category );
                 
        if($youtube!=''){
            foreach($youtube AS $value){
                if($value !=''){
                    $result_id2 = $this->Product_model->addyoutubeservice($currentID , $value);                        
                }  
            }
        }
		 //--------uploadfile------------//
		$countFiles = count($_FILES['userFiles']['name']);
		   
		$upload_path = './uploadfile/service';
		$upload_pathName = 'uploadfile/service';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'jpg|png|gif';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		$config['encrypt_name'] = TRUE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		 	
		$this->load->library('upload', $config);
        if($countFiles>0){ 
			for($i=0; $i<$countFiles; $i++){           
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];
				
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					$this->Product_model->AddserviceImg($uploadData[$i]['file_name'],$currentID);
                }				
			}
		}		
		echo $currentID;		 
	}
           //-------------------------------
	public function service_detail_list(){
            
		$data['getserviceDetail']=$this->Product_model->getserviceDetail();
		$this->load->view('backend/header');
		$this->load->view('backend/service_detail_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/service_detail_list_script');	
	}
         //-------------------------------  
	public function deleteservice(){
		$DataID = $this->input->post('dataID');
		$result = $this->Product_model->deleteservice($DataID);
		echo $result;
	}
           //-------------------------------
	public function member_add($curentID=NULL){
		
		$getuserfontendbyid = $this->Download_model->getuserfontendbyid($curentID);
		if($getuserfontendbyid->num_rows() > 0){
			foreach($getuserfontendbyid->result() AS $userfontendbyid){}
			$data['name']=$userfontendbyid->name;
			$data['phone']=$userfontendbyid->phone;
			$data['line']=$userfontendbyid->line;
			$data['email']=$userfontendbyid->email;
			$data['password']=$userfontendbyid->password;
			$data['currentID']=$userfontendbyid->id;
			
		}else{
			$data['name']='';
			$data['phone']='';
			$data['line']='';
			$data['email']='';
			$data['password']='';
			$data['currentID']='';		
		}
		$this->load->view('backend/header');
		$this->load->view('backend/member_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/member_add_script');		
	}
         //-------------------------------    
	public function Addmember(){
		$currentID =$this->input->post('currentID');
		$name =$this->input->post('name');
		$password =$this->input->post('password');
		$passwordold =$this->input->post('passwordold');
		$email =$this->input->post('email');
		$phone =$this->input->post('phone');
		$line =$this->input->post('line');
		 
		$result = $this->Download_model->Addmember($currentID , $name ,$password,$passwordold , $email, $phone, $line );

		echo $result;		 
	}
        //---------------------------------------------------------
    function action() {
        $this->load->library("excel");
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("#", "Name", "E-mail", "Phone", "Line");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->getStyle('1:1')->getFont()->setBold(true);
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $employee_data = $this->Download_model->fetch_data();

        $excel_row = 2;
$n=1;
        foreach ($employee_data as $row) {
          
            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $n);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->name);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->phone);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->line);
            $excel_row++;
        $n++;}
        $today = date("d-m-Y");
        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Member ' . $today . '.xls"');
        $object_writer->save('php://output');
    }
    //---------------------- inputName inputEmail inputPhone textareaMessage
	public function sendmail_service(){
		$currentID = $this->input->post('currentID');
                 $status = '1';
                $getuserfontend = $this->Product_model->getuserfontend($status);

                foreach ($getuserfontend->result() AS $userfontend){
                $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
		
                        $imgservice = $this->Product_model->loadserviceImages($currentID);  
 foreach ($imgservice->result() AS $imgservice3){}
                $images_name = $imgservice3->images_name;
		$from_email = 'saleteam1@gotrading.co.th';
		$to_email = $userfontend->email;	
		$email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<style>
		body{
		font-family: arial; 
		font-size: 11pt; 
	}
	</style>

</head>

<body>
	
	<table width="70%" align="center" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td align="center" bgcolor="#efb40b" style="color:#FFFFFF;"><h2>'.$service_topic.'</h2>www.gotautomations.com/News<br><br></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top" style="font-size: 11pt; color: #666666; padding-left: 25px;">
	<img src="'.base_url().'uploadfile/service/'.$images_name.'" align="center" width="500"  style="margin-top: -55px; padding-left: 15px;">
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px; padding-left: 25px;">
		  <p>'.$this->Product_model->str_limit_html($service_detail,450).'</p><br></td>
    </tr>
    <tr>
      <td align="center"><a href="'.base_url().'Service/service_detail/'.$currentID.'" style="padding:20px;background-color:#efb40b;color:white">คลิก อ่านต่อ...</a></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" >
      <div style="padding:10px;background-color:#eaeaea;">
      <p><img src="http://www.gotautomations.com/HTML_2/images/logo-dark.png" alt="logo" /><br>
        <strong>Great Oriental Trading Co.,Ltd.</strong><br>
        <br>
        1049 Ruamtam Rd., T.Khohong Hatyai Songkhla 90110 Thailand
        <br>
      </p>
</div>
</td>
    </tr>
     <tr>
        <td>
            <table width="100%" align="center" cellspacing="0" cellpadding="0" >
                <tr>
                  <td width="9%">&nbsp;</td>
                    <td width="4%">
                         <img src="http://www.gotautomations.com/HTML_2/images/phonegold.png"  width="40" /> 
                    </td>
                    <td width="17%"><strong>Tel:</strong> +66 74-300212-4 <br>
                    <strong>Fax:</strong> +66 74-300215</td>
                    <td width="4%"><img src="http://www.gotautomations.com/HTML_2/images/mail.png"  width="40" /></td>
                    <td width="18%"><br>
                      <strong>Email Address</strong><br>
						<a href="mailto:saleteam1@gotrading.co.th" target="_blank">saleteam1@gotrading.co.th</a></td>
                    <td width="4%" align="center"><img src="http://www.gotautomations.com/HTML_2/images/facebook-logo.png"  width="32" /></td>
                    <td width="18%"><strong>Facebook</strong><br>
                    <a href="https://www.facebook.com/GreatOrientalTrading/" target="_blank">GreatOrientalTrading</a></td>
                    <td width="4%">
                         <img src="http://www.gotautomations.com/HTML_2/images/chat1.png"  width="40" /> 
                    </td>
                    <td width="7%"><strong>ID Line</strong><br>
                    <a href="http://line.me/ti/p/@gotrading" target="_blank">@gotrading</a> </td>
                    <td width="15%"><img src="http://www.gotautomations.com/HTML_2/images/lineatgotrading.jpg"  width="101" /></td>
                </tr>
            </table>
    </td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>

</body>
</html>
';		
		 
		
		$this->email->from($from_email, 'GOT AUTOMATION SERVICE'); 
        $this->email->to($to_email);
        $this->email->subject('จดหมายติดต่อจาก GOT AUTOMATION( gotautomations.com )'); 
        $this->email->message($email_body); 
        $this->email->send();
       
       
                }
                 $this->linenotifyservice($currentID);
                 $this->linenotifyservice2($currentID);
                 $this->linenotifyservice3($currentID);
                 $this->linenotifyservice4($currentID);
                 $this->linenotifyservice5($currentID);
                 $this->linenotifyservice6($currentID);
                 $this->linenotifyservice7($currentID);
                 $this->linenotifyservice8($currentID);
                 $this->linenotifyservice9($currentID);
                 $this->linenotifyservice10($currentID);
                 $this->linenotifyservice11($currentID);
                 $this->linenotifyservice12($currentID);
                 $this->linenotifyservice13($currentID);
                 $this->linenotifyservice14($currentID);
                 $this->linenotifyservice15($currentID);
                echo 1;
	}
 //-------------------
  public function linenotifyservice($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "x90LByhjZwRceboe0brPHw8FukJvJUCxYEetbAIxd6S";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice2($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "krybOHRNYUNBpSUOXlx1D6ULUgfJGcNuLYGjfTNGLHE";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice3($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "24DmLQTQxgWjFkNSm1WvTzs3ZVYcm1ghJMP7x8cPtBv";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice4($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "2FhexaxFwKrzXQ9q9otsA1JzpfGgox96R63s7KuJtlo";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice5($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "DZJP86alrlUOG8WPl1lxU0F4uQsAE5t0ohBfmTP1lwG";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice6($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "5VguGn2ntu87d0leQZcc1cI0FvauCIwqvmTjgsbpDAX";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice7($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "qISRueQZkSm1KKqNYkE9nFEwuYSDlUxN9A7kqhSYrAy";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice8($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "yn7NT6JIzQ7Mr29AtyhrHITTlv24rFNH4hf8BOuYWM3";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice9($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "RlvntzLVROsim5UX5dncL5M2xF6ii552Tw0oUoiVhfY";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice10($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "dxmdB0AhN9MhJvTb444tNjbFktOcjc9oWuyrNefTs92";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice11($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "SsqZEULfajUT7THBQAcvK2kKiFGgaL6CEflwJJ43fE9";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice12($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "X9aGxyuKxddQy7o8gsfxNciXLzJDnyL1VfysNRkRtxf";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice13($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "IzTuCGvb3W7zfRK3kpq5785TiouWpoptbw6ZyZl7mLR";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice14($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "9VdYukJLKd5qckZmI43RKs9eBQMFSSZD4Bg2jEYVEou";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }
 //-------------------
  public function linenotifyservice15($currentID){
	  	   //---------line notify----------------//
		 $serviceDetail = $this->Product_model->getserviceDetail($currentID);
		
			foreach($serviceDetail->result() AS $service){}
			$service_topic=$service->service_topic;
			$service_detail=$service->service_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "tJGT9KwoWYdUFi8R0u0Kca74aygUbJvBOiAGmOMGrzM";

                    $datebookingArray = explode("-",$service->date);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nService Date : ".$date_add."\nService Title : ".$service_topic."\nService Detail : ".$service_detail."";

	            $chOne = curl_init(); 
				curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
				curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
				curl_setopt( $chOne, CURLOPT_POST, 1); 
				curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
				$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
				curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
				curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
				$result = curl_exec( $chOne ); 

				//Result error 
				if(curl_error($chOne)) 
				{ 
					//echo 'error:' . curl_error($chOne); 
				} 
				else { 
					$result_ = json_decode($result, true); 
					//echo "status : ".$result_['status']; echo "message : ". $result_['message'];
				} 
				curl_close( $chOne );   

 }

   
	
}