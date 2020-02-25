<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action_page extends CI_Controller {

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
        $this->load->model('Action_model');  
        $this->load->model('Product_model');  
        $this->load->model('Category_model');  
    } 
	
	
	//---------------------------------
	public function index($page=NULL){
            $perpage = 6; $limit =''; 
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
        $data['search'] = $this->input->get('search');
        $data['search_data'] = $this->Action_model->search_data($data['search'],$limit,$start,$perpage);
        //$data['numdata'] = $data['search_data']->num_rows();
        $this->load->view('fontend/action_page',$data);
	}
	//---------------------------------
	public function Page($page=NULL){
            $perpage = 6; $limit =''; 
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
        $data['search'] = $this->input->get('search');
        $data['search_data'] = $this->Action_model->search_data($data['search'],$limit,$start,$perpage);
        $this->load->view('fontend/action_page',$data);
	}
      
}
