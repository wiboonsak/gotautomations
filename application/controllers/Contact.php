<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

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
    }
	
	
	//---------------------------------
	public function index()
	{
           $this->load->view('fontend/contact');
	}
          //-------------------------------    
	public function submitdata(){
		$name =$this->input->post('name');
		$lastname =$this->input->post('lastname');
		$company =$this->input->post('company');
		$job_title =$this->input->post('job_title');
		$address =$this->input->post('address');
		$city =$this->input->post('city');
		$state =$this->input->post('state');
		$postal_code =$this->input->post('postal_code');
		$country =$this->input->post('country');
		$tel =$this->input->post('tel');
		$fax =$this->input->post('fax');
		$email =$this->input->post('email');
		$website =$this->input->post('website');
		$message =$this->input->post('message');
		$interest =$this->input->post('interest');
		$where =$this->input->post('where');
		 
		$currentID = $this->Product_model->Addcontact($name , $lastname ,$company , $job_title,$address,$city,$state,$postal_code,$country,$tel,$fax,$email,$website,$message,$where );
                 
        if($interest!=''){
            foreach($interest AS $value){
                if($value !=''){
                    $result_id2 = $this->Product_model->addinterest($currentID , $value);            
                }  
            }
        }
        //$this->sendContactMail($currentID);
		echo $currentID;
	}
     //---------------------- inputName inputEmail inputPhone textareaMessage
	public function sendContactMail(){
            $DataID = $this->input->post('DataID');
            
            $where = '';
		$getcontact_data = $this->Product_model->getcontact_data($DataID);
        foreach($getcontact_data->result() AS $data){}
        if($data->hear_about_us == 1){
            $where = 'Google';
        }else if($data->hear_about_us == 2){
            $where = 'Other Search';
        }else if($data->hear_about_us == 3){
            $where = 'Magazine Feature';
        }else if($data->hear_about_us == 4){
            $where = 'Recomendation';
        }else{
            $where = 'Other';
        }
               $getsectors_of_interest = $this->Product_model->getsectors_of_interest($DataID);
		$from_email = $data->email;
		$to_email = 'saleteam1@gotrading.co.th';	
		$to_email1 = 'technician@gotrading.co.th';	
		$email_body = '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<style type="text/css">
.share {
	-moz-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	-webkit-box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	box-shadow:inset 0px 1px 0px 0px #c1ed9c;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #9dce2c), color-stop(1, #8cb82b) );
	background:-moz-linear-gradient( center top, #9dce2c 5%, #8cb82b 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#9dce2c", endColorstr="#8cb82b");
	background-color:#9dce2c;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #83c41a;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:177px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #689324;
}
.share:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8cb82b), color-stop(1, #9dce2c) );
	background:-moz-linear-gradient( center top, #8cb82b 5%, #9dce2c 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8cb82b", endColorstr="#9dce2c");
	background-color:#8cb82b;
}.share:active {
	position:relative;
	top:1px;
}
.book {
	-moz-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	-webkit-box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	box-shadow:inset 0px 1px 0px 0px #bbdaf7;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #79bbff), color-stop(1, #378de5) );
	background:-moz-linear-gradient( center top, #79bbff 5%, #378de5 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#79bbff", endColorstr="#378de5");
	background-color:#79bbff;
	-webkit-border-top-left-radius:6px;
	-moz-border-radius-topleft:6px;
	border-top-left-radius:6px;
	-webkit-border-top-right-radius:6px;
	-moz-border-radius-topright:6px;
	border-top-right-radius:6px;
	-webkit-border-bottom-right-radius:6px;
	-moz-border-radius-bottomright:6px;
	border-bottom-right-radius:6px;
	-webkit-border-bottom-left-radius:6px;
	-moz-border-radius-bottomleft:6px;
	border-bottom-left-radius:6px;
	text-indent:0;
	border:1px solid #84bbf3;
	display:inline-block;
	color:#ffffff;
	font-family:Arial;
	font-size:15px;
	font-weight:normal;
	font-style:normal;
	height:40px;
	line-height:40px;
	width:118px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #528ecc;
}
.book:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #378de5), color-stop(1, #79bbff) );
	background:-moz-linear-gradient( center top, #378de5 5%, #79bbff 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#378de5", endColorstr="#79bbff");
	background-color:#378de5;
}.book:active {
	position:relative;
	top:1px;
}</style>
</head>

<body>
<table width="60%" height="393" border="0" align="center" cellpadding="0" cellspacing="0" style="font-family: arial; font-size: 11pt; border:1px solid #D5D5D5;">
  <tbody>
    <tr>
      <td height="70" align="center"  bgcolor="#5F5F5F" style="color:#FFFFFF; font-size: 16pt;"><span style="font-size: 16pt; color: #ffffff; font-weight: 400; text-align: center">The contact information from website.</span></td>
    </tr>
    <tr>
      <td height="223" align="center" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px;"><p><br>
        </p>
        <table width="90%" border="0" align="center" cellpadding="3" cellspacing="0">
          <tbody>
            <tr>
              <td height="40" colspan="5" align="center" bgcolor="#E7E5E5"><strong>Contact Form</strong></td>
            </tr>
            <tr>
              <td width="27%" height="40" align="right" bgcolor="#F7F7F7"><strong>Name : </strong></td>
              <td width="1%" height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td height="40" colspan="3" bgcolor="#F7F7F7" style="font-size: 16pt; color:#F07700">'.$data->name.' '.$data->lastname.'</td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Company :</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40" colspan="3">'.$data->company.'</td>
            </tr>
            <tr>
              <td height="40" align="right" bgcolor="#F7F7F7"><strong>Job Title :</strong></td>
              <td height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td height="40" colspan="3" bgcolor="#F7F7F7">'.$data->job_title.'</td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Address :</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40" colspan="3">'.$data->address.'</td>
            </tr>
            <tr>
              <td height="40" align="right" bgcolor="#F7F7F7"><strong>Town / City :</strong></td>
              <td height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td width="24%" height="40" bgcolor="#F7F7F7">'.$data->city.' </td>
              <td width="16%" align="right" bgcolor="#F7F7F7"><strong>Province / State:</strong></td>
              <td width="32%" bgcolor="#F7F7F7">'.$data->state.'</td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Postel Code:</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.$data->postal_code.'</td>
              <td align="right"><strong>Country:</strong></td>
              <td>'.$data->country.'</td>
            </tr>
            <tr>
              <td height="40" align="right" bgcolor="#F7F7F7"><strong>Tel :</strong></td>
              <td height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td height="40" bgcolor="#F7F7F7">'.$data->tel.'</td>
              <td align="right" bgcolor="#F7F7F7"><strong>Fax :</strong></td>
              <td bgcolor="#F7F7F7">'.$data->fax.'</td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>E-mail :</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40">'.$data->email.'</td>
              <td align="right"><strong>Website :</strong></td>
              <td>'.$data->website.'</td>
            </tr>
            <tr>
              <td height="40" align="right" bgcolor="#F7F7F7"><strong>Message :</strong></td>
              <td height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td height="40" colspan="3" bgcolor="#F7F7F7">&nbsp;</td>
            </tr>
            <tr>
              <td height="40" align="right">&nbsp;</td>
              <td height="40">&nbsp;</td>
              <td height="40" colspan="3">'.$data->message.'</td>
            </tr>
            <tr>
              <td height="40" align="right" bgcolor="#F7F7F7"><h4>Sectors of interest<strong> :</strong></h4></td>
              <td height="40" bgcolor="#F7F7F7">&nbsp;</td>
              <td height="40" colspan="3" bgcolor="#F7F7F7"><p>';
               $n=1; foreach ($getsectors_of_interest->result() AS $sectors_of_interest){
                $email_body = $email_body.'
              
'.$n.'. '.$sectors_of_interest->name_th.'<br>';
              $n++; }
               $email_body = $email_body.'
              </p></td>
            </tr>
            <tr>
              <td height="40" align="right"><strong>Where did you hear about us?</strong></td>
              <td height="40">&nbsp;</td>
              <td height="40" colspan="3">'.$where.'</td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td align="center" >
      <div style="padding:20px;background-color:#eaeaea;">
      <p><strong>Great Oriental Trading Co.,Ltd.</strong><br>
    1049 Ruamtam Rd., T.Khohong Hatyai Songkhla 90110 Thailand<br>
    Telephone: +66 74-300212-4   Fax: +66 74-300215<br>
    Email: <a href="mailto:saleteam1@gotrading.co.th" target="_blank">saleteam1@gotrading.co.th</a>    &nbsp;&nbsp;&nbsp;Facebook: <a href="https://www.facebook.com/GreatOrientalTrading/" target="_blank">GreatOrientalTrading</a> &nbsp;&nbsp;&nbsp;Line ID: <a href="http://line.me/ti/p/@gotrading" target="_blank">@gotrading</a></p>
</div>
</td>
    </tr>
  </tbody>
</table>
</body>
</html>
';		
		 
		
		$this->email->from($from_email, 'CONTACT GOT AUTOMATION'); 
        $this->email->to($to_email);
        $this->email->subject('จดหมายติดต่อจากคุณ '.$data->name .'( gotautomations.com )'); 
        $this->email->message($email_body); 
        //Send mail 
        if($this->email->send()){ 
          $this->email->from($from_email, 'CONTACT GOT AUTOMATION'); 
        $this->email->to($to_email1);
        $this->email->subject('จดหมายติดต่อจากคุณ '.$data->name .'( gotautomations.com )'); 
        $this->email->message($email_body); 
        $this->email->send();
        }
echo 1;
	}
      
}
