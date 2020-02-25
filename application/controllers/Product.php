<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

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

          $this->load->model('Product_model');  
          $this->load->model('User_model');  
          $this->load->model('Category_model');
          $this->load->model('Download_model');
    }
	//---------------------
	public function index()
	{
	
	}
         
   //----------------------------------
   public function product_detail($dataID=NULL){
			
		$data['product'] = $this->Category_model->productDetail($dataID);
	   	$data['img'] = $this->Product_model->loadProductImg($dataID);
	   	$data['linkyoutube'] = $this->Product_model->getlinkyoutube($dataID);
	   	$data['fileProduct'] = $this->Product_model->loadProductFile($dataID);
	   	$data['faq'] = $this->Category_model->list_FAQ($dataID);
                $data['getservice_list'] = $this->Product_model->getservice_list('1');
        $this->load->view('fontend/product_detail' , $data);
   }
   //----------------------------------
   public function AddNewUser(){
        $name = $this->input->post('name');
        $Phone = $this->input->post('Phone');
        $Line = $this->input->post('Line');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->Product_model->AddNewUser($name , $Phone ,$Line , $email,$password);
        echo $result;
  }
  //----------------------------------
  public function loginform(){
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $result = $this->Product_model->can_login($email,$password);
       echo $result;
  }
  //----------------------------------
  public function download(){
       $product_id = $this->input->post('product_id');
       $file_id = $this->input->post('file_id');
       $member_id = $this->input->post('member_id');
       $result = $this->Product_model->download($product_id,$file_id,$member_id);
       echo $result;           
  }
    //----------------------------------
  public function logoutform (){
       $this->session->unset_userdata(array("member_id"=>"","member_name"=>"","member_phone"=>"","member_line"=>"","member_email"=>""));
		$this->session->sess_destroy();
       echo 1;
  }
  //----------------------------------
  public function checkmail(){
       $email = $this->input->post('email');
       $result = $this->Product_model->checkmail($email);
       echo $result;           
  }
  //----------------------------------
  public function cat_product($category=NULL){			
				
		$data['dataCategory'] = $this->Category_model->get_dataCategory($category);		
        $this->load->view('fontend/cat_product' , $data);
  }
  //----------------------------------
  public function Quotation(){
       $name = $this->input->post('name');
       $member_id = $this->input->post('member_id');
       $phone = $this->input->post('phone');
       $line = $this->input->post('line');
       $email = $this->input->post('email');
       $address = $this->input->post('address');
       $message = $this->input->post('message');
       $product_id = $this->input->post('product_id');
       $result = $this->Product_model->Quotation($name,$member_id,$phone,$line,$email,$address,$message,$product_id);
       $this->linenotify($result);
       $this->sendContactMail($result);
       echo $result;
  }
   //---------------------- inputName inputEmail inputPhone textareaMessage
	public function sendContactMail($DataID=NULL){
		$getquotations = $this->Product_model->getquotations($DataID);
        foreach($getquotations->result() AS $data){}
               
		$from_email = $data->email;
		$to_email = 'saleteam1@gotrading.co.th';	
		$to_email1 = 'technician@gotrading.co.th';	
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
<style>
@media print {
    body * {
        visibility:hidden;
    }
}	
	
  </style>
<body>
	<div class="card" style="margin-top: -20px;">
   
    <div class="card-body" style="height: 100%">
		 
		<div id="printThis" >
            
			<div class="row">
                            
                            <div class="col-md-5">
					<span>
                          <img src="'.base_url().'HTML_2/images/logo-dark.png" alt="" width="40%" style="text-align:center" >
           			</span>
				
				</div>
			   <div class="col-md-7" style="vertical-align:middle; padding-top: 20PX;">
				<!--	<h5 class="card-title">รายละเอียดลูกค้า</h5>-->
		
		    <div class="row">
				<div class="col-12" >Product : '.$data->product_id.'</div>
		     </div>	
		    <div class="row">
				<div class="col-12" >Name : '.$data->name.'</div>
		     </div>	
			 <div class="row">
				<div class="col-12"  >Phone : <a href="tel:'.$data->phone.'">'.$data->phone.'</a></div>
		    </div>	
		    <div class="row">
				<div class="col-12"  >Email : '.$data->email.'</div>
		    </div>	
		   <div class="row">
				<div class="col-12"  >ID LINE : '.$data->line.'</div>
		    </div>	
		   <div class="row">
				<div class="col-12"  >Address : '.$data->address.'</div>
		    </div>
				</div>
			</div>

		<hr>
		
		<h5 class="card-title"> Quotation Number: <span class="text-danger">'.$data->quotation_id.'</span>&nbsp;วันที่ : '.$data->date_add.'</h5>
		
		
			<div class="row">
				<div class="col-md-12">
					<table class="table" width="100%">
													<tr>
        <td colspan="2" style="background-color:#E1E1E1">Message</td>
													</tr>
                                                                                                        <tr>
                   <td><span>'.$data->message.'</span></td>
               </tr>

		</table>
				</div>
			</div>
		  </div>

</div>
	

</body>
</html>
';		
		 
		
		$this->email->from($from_email, 'Quote Quotation GOT AUTOMATION'); 
        $this->email->to($to_email);
        $this->email->subject('จดหมายติดต่อจากคุณ '.$data->name .'( gotautomations.com )'); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
          $this->email->from($from_email, 'Quote Quotation GOT AUTOMATION'); 
        $this->email->to($to_email1);
        $this->email->subject('จดหมายติดต่อจากคุณ '.$data->name .'( gotautomations.com )'); 
        $this->email->message($email_body); 
        $this->email->send();
        }

	}
  //-------------------
  public function linenotify($DataID){
	  	   //---------line notify----------------//
		$getquotations = $this->Product_model->getquotations($DataID);
        foreach($getquotations->result() AS $data){}
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "xESWFJ9OKbYldYrYpqQ96JIboK0TKzL7zOxEiz0VyWM";

                    
                    $DateTimeArray= explode(" ",$data->date_add);
                    $datebookingArray = explode("-",$DateTimeArray[0]);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking.' '.$DateTimeArray[1];
	 
	 			$sMessage ="\nQuotation Number : ".$data->quotation_id."\nProduct : ".$data->product_id."\nName :  ".$data->name."\nPhone :  ".$data->phone."\nLine :  ".$data->line."\nEmail : ".$data->email."\nAddress : ".$data->address."\nMessage : ".$data->message."\nDate : ".$date_add."";

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
