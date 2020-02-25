<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reference extends CI_Controller {

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
	public function index($page=null)
	{
             $perpage = 6; $limit =''; $notUse = '';
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
                $data['referenceDetail'] = $this->Product_model->getreferenceDetail1($limit,$notUse,$start,$perpage);
           $this->load->view('fontend/project_reference',$data);
	}
         public function Page($page=null)
	{
	
		$perpage = 6; $limit =''; $notUse = '';
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
                $data['referenceDetail'] = $this->Product_model->getreferenceDetail1($limit,$notUse,$start,$perpage);
           $this->load->view('fontend/project_reference',$data);
        }
	//---------------------------------
	public function Reference_detail($dataID=null)
	{
             $data['referenceDetail'] = $this->Product_model->getreferenceDetailByID($dataID);
             $data['imagesList']=$this->Product_model->loadreferenceImg($dataID);
             $data['linkyoutube']=$this->Product_model->getlinkyoutubereference($dataID);
           $this->load->view('fontend/project_detail',$data);
	}
}
