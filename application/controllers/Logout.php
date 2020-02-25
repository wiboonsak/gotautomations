<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
  public function index()
	{
		$this->session->unset_userdata(array("user_id"=>"","name"=>"","userLv"=>"","depart_id"=>""));
		$this->session->sess_destroy();
		redirect(base_url('login'));
   }
 }
