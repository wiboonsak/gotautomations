<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index($page=null){
        $perpage = 3; $limit =''; $notUse = '';
        if($page == ''){
            $page = 1;
        }else{
            $page = $page;
        }
        $start = ($page - 1) * $perpage;
        $data['page'] = $page;
        $data['perpage'] = $perpage;
        $data['newsDetail'] = $this->Product_model->getNewsDetail1($limit,$notUse,$start,$perpage);
        $data['referenceDetail'] = $this->Product_model->getreferenceDetail1($limit,$notUse,$start,$perpage);
        $data['SlideDetail'] = $this->Product_model->getSlideDetail1();
        $data['Category'] = $this->Category_model->listcategory('0','0');
        $this->load->view('fontend/index', $data);
	}

}
