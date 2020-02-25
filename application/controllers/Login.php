<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	public function index()
	{
		
		$this->load->view('backend/login_body');
	
	}
	//---------------------------------------
	public function LoginUser($msg=NULL){

			$username 	= $this->security->xss_clean($this->input->post('Username'));
			$password 	= $this->security->xss_clean($this->input->post('Password'));
			$this->load->model('User_model');
			 if($this->User_model->can_login($username, $password))
				 {
					 					//$user_id = $this->user_model->get_user_id_from_username($username);
					 					//$user    = $this->user_model->get_user($user_id);
										redirect(base_url('Control'));
					 					//echo 'pass<br>';
					 					//echo 'member_id>'.$this->session->userdata('member_id');
							 }
							 else
							 {
								       if($username!='') {  
									    	$data['msg']="<i class='zmdi zmdi-hc-fw'></i> ไม่สามารถเข้าสู่ระบบได้ กรุณาลองอีกครั้ง";
									   }else{
										   $data['msg']="";
									   }
										//$this->session->set_flashdata('error', 'Invalid Username and Password');
										//redirect(base_url() . 'login');
										$this->load->view('backend/login_body' , $data);
							 }

	}
}