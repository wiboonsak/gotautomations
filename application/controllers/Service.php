<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
	public function index(){
		
		$data['getservice_list'] = $this->Product_model->getservice_list('1');
		$this->load->view('fontend/service',$data);
	}
	//---------------------------------
	public function service($topic=NULL,$id=NULL,$page=NULL){
            
		$perpage = 6; $limit =''; 
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
                $data['getservicebycate'] = $this->Product_model->getservicebycate($limit,$id,$start,$perpage);
                $data['topic'] = $topic;
                $data['id'] = $id;
		$this->load->view('fontend/service_data',$data);
	}
          public function Page($topic=NULL,$id=NULL,$page=NULL)
	{
           $perpage = 6; $limit =''; 
               if ($page == ''){
                   $page = 1;
               }else{
                   $page = $page;
               }
              $start = ($page - 1) * $perpage;
               $data['page'] = $page;
                $data['perpage'] = $perpage;
                $data['getservicebycate'] = $this->Product_model->getservicebycate($limit,$id,$start,$perpage);
                $data['topic'] = $topic;
                $data['id'] = $id;
		$this->load->view('fontend/service_data',$data);

        }
         public function service_detail($dataID=NULL)
	{
                $data['getserviceDetailbyid'] = $this->Product_model->getserviceDetailbyid($dataID);
                $data['imagesList']=$this->Product_model->loadserviceImg($dataID);
                $data['linkyoutube']=$this->Product_model->getlinkyoutubeservice($dataID);
		$this->load->view('fontend/service_detail',$data);
        }
      
}



