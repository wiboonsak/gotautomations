<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends CI_Controller {

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
		 if($this->session->userdata('user_id')==''){
			    redirect(base_url('login'), 'refresh');
			    exit();			 
		  }
			
          $this->load->model('Product_model');  
          $this->load->model('User_model');  
          $this->load->model('Category_model');		 
    }
	//---------------------
	public function index(){
		
		$data['categoryList'] = $this->Category_model->listcategory('0','0');		
		$this->load->view('backend/header');
		$this->load->view('backend/product_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/product_list_script');
	}
    //---------------------
    public function category(){
		$this->load->view('backend/header');
		$this->load->view('backend/category');
		$this->load->view('backend/footer');
		$this->load->view('backend/category_script');
	}
    //-----------------
	public function category_add($cateID=NULL){
		if($cateID!=''){
			$selectData=$this->Product_model->pCategoryDetail($cateID);
			foreach($selectData->result() AS $abc){ }
			$data['category_title']= $abc->category_title;			
			$data['category_img']= $abc->images;			
			$data['dataID']= $cateID;
		}else{
			$data['category_title']='';			
			$data['category_img']='';			
			$data['dataID']= $cateID;
		}

		$this->load->view('backend/header');
		$this->load->view('backend/category_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/category_script');
	}
	//-----------------
	public function detail_category($data_id=NULL){
		
		$data['detail'] = $this->Category_model->get_dataCategory($data_id);	
		/*if($cateID!=''){
			$selectData=$this->Product_model->pCategoryDetail($cateID);
			foreach($selectData->result() AS $abc){ }
			$data['category_title']= $abc->category_title;			
			$data['category_img']= $abc->images;			
			$data['dataID']= $cateID;
		}else{
			$data['category_title']='';			
			$data['category_img']='';			
			$data['dataID']= $cateID;
		}*/

		$this->load->view('backend/header');
		$this->load->view('backend/category_add',$data);		
		$this->load->view('backend/footer');
		$this->load->view('backend/category_script');
	}
	//---------------
	public function DoAddProductCategory(){
		
		$category_title = $this->input->post('name_th');
		$dataID = $this->input->post('dataID');
		$imgold = $this->input->post('imgold'); 
		$category_img = $this->input->post('category_img');
		$desc_th = $this->input->post('desc_th');
		$detail_th = $this->input->post('detail_th');
		$icon = $this->input->post('icon');
		
        /*if(($category_img != '') && ($imgold != '')){
            @unlink('./uploadfile/'.$imgold);
        }*/
		$upload_path = './uploadfile';
		$upload_pathName = 'uploadfile';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'jpg|png|gif';
		//allowed max file size. 0 means unlimited file size
		$config['max_size'] = '0';
		//max file name size
		$config['max_filename'] = '255';
		//whether file name should be encrypted or not
		$config['encrypt_name'] = FALSE;
		//store image info once uploaded
		$image_data = array();
		//check for errors
		$is_file_error = FALSE;
		 	
		$this->load->library('upload', $config);         
		//---------------------------
		$_FILES['userFile']['name'] = $_FILES['category_img']['name'];
        $_FILES['userFile']['type'] = $_FILES['category_img']['type'];
        $_FILES['userFile']['tmp_name'] = $_FILES['category_img']['tmp_name'];
        $_FILES['userFile']['error'] = $_FILES['category_img']['error'];
        $_FILES['userFile']['size'] = $_FILES['category_img']['size'];


        $this->upload->initialize($config);
        if($this->upload->do_upload('userFile')){
			
			if($imgold != ''){
            	@unlink('./uploadfile/'.$imgold);
        	}
			
            $fileData = $this->upload->data();
            $uploadData['file_name'] = $fileData['file_name'];
			$resultUpdateBooking = $this->Category_model->update_dataCategory($category_title, $dataID, $uploadData['file_name'], $desc_th, $detail_th, $icon);
			
        } else {
			
            $resultUpdateBooking = $this->Category_model->update_dataCategory($category_title, $dataID, $imgold, $desc_th, $detail_th, $icon);
        }
		echo $resultUpdateBooking;
	}
    //---------------------------
    public function updateOrderCate(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->Category_model->updateOrderCate($dataID,$changeValue);
		echo $result;		
	}
    //------------------------
	public function deletePcate(){
		
		$result = 'x';
		$result2 = 'x';
		$DataID = $this->input->post('DataID');
		$level = $this->input->post('level');
		$field = 'category';
		$field = $field.$level;
		
		$result = $this->Category_model->checkData_forDeleteCate($field,'tbl_product_data',$DataID); 
		if($result == '2'){
			
			$result2 = $this->Category_model->checkData_forDeleteCate('mainCate_id','tbl_category_data',$DataID);
			if($result2 == '2'){
				
				$this->Category_model->update_ShowOnWeb($DataID,'0','tbl_category_data','data_status');
				
			} else if($result2 == '3'){
				$this->Category_model->update_ShowOnWeb($DataID,'0','tbl_category_data','data_status');
				$result2 = '2';
			}
			
		} else if($result == '3'){
			
			$result2 = $this->Category_model->checkData_forDeleteCate('mainCate_id','tbl_category_data',$DataID);
			if($result2 == '2'){
				
				$this->Category_model->update_ShowOnWeb($DataID,'0','tbl_category_data','data_status');
				
			} else if($result2 == '3'){
				$this->Product_model->deletePcate($DataID);
				$result2 = '2';
			}
		} 
		echo $result2;
	}
    //---------------------------
    public function Product_add($currentID=NULL){
		
		$data['categoryList'] = $this->Category_model->listcategory('0','0');
		$data['productData'] = $this->Category_model->productDetail($currentID);
		$data['currentID'] = $currentID;
		
		/*if($productData->num_rows() > 0){
			foreach($productData->result() AS $product){}
			$data['product_nameth']=$product->product_nameth;
			$data['product_nameen']=$product->product_nameen;
			$data['product_topic']=$product->product_topic;
			$data['product_category']=$product->product_category;
			$data['product_desc']=$product->product_desc;
            $data['product_price']=$product->product_price;                        
			$data['currentID']=$product->id;
		
		 }else{
			$data['product_category']=0;			
		}*/
		$this->load->view('backend/header');
		//$this->load->view('backend/product_add',$data);
		$this->load->view('backend/product_add2',$data);
		$this->load->view('backend/footer');
		//$this->load->view('backend/product_script');
		$this->load->view('backend/product_script2');
	}
    //-----------------------------------------------
    public function addProduct(){ 
		
		 $name_th = $this->input->post('name_th');
		 $instock = $this->input->post('instock');
		 $overview_th = $this->input->post('overview_th');
		 $specification_th = $this->input->post('specification_th');		
		 $category = $this->input->post('category');		
		 $youtube = $this->input->post('youtube');
		 $txtTitle_th = $this->input->post('txtTitle_th');
		 $group2 = $this->input->post('group2');
		 $currentID = $this->input->post('currentID'); 
		 $file_name2 = $this->input->post('video_file_name'); 
		
		 if($instock == ''){ $instock = '0'; }		
		 
		 $currentID = $this->Category_model->addProduct($currentID,$name_th,$overview_th,$specification_th,$instock);
		
		 //if($category != ''){
		 if(count($category) > 0){
			 
			for($x=0; $x < count($category); $x++){			
				
				 $this->Category_model->update_categoryProduct($currentID,$category[$x],$x+1);				 
			}
			if(5 - count($category) > 0){ 
				 
				 for($x2=1; $x2 <= 5 - count($category); $x2++){
				 
					 $this->Category_model->update_categoryProduct($currentID,'0',$x+$x2);				 
				 }
			} 
			 /*for($x=0; $x < 5; $x++){
				 
				 if($category[$x] != ''){
					 
					 $category = $category[$x];
						 
				 } else {					 
					 
					 $category = '0';
				 }
				
				 $this->Category_model->update_categoryProduct($currentID,$category,$x+1);				 				 
			 }*/
			 
			 
			 
         }		 
         if($youtube!=''){
             foreach($youtube AS $value){
                 if($value !=''){
                     $this->Product_model->addyoutube($currentID,$value);                        
                 }  
             }
         }
		 
		 //--------upload file------------//
		 
		 $countFiles = count($_FILES['userFiles']['name']);
		   
		 $upload_path = './uploadfile/product';
		 $upload_pathName = 'uploadfile/product';
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
         if($countFiles > 0){ 
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
					$this->Product_model->AddImagesData($uploadData[$i]['file_name'],$currentID);
                }				
			}
		}
	//-----------------------------------
		/*$countFiles2 = count($_FILES['catFiles']['name']);
		   
		$upload_path = './uploadfile/catalogue';
		$upload_pathName = 'uploadfile/catalogue';
		$config['upload_path'] = $upload_path;
		//allowed file types. * means all types
		$config['allowed_types'] = 'jpg|png|gif|xls|xlsx|pdf|doc|docx';
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
        if($countFiles2 > 0){ 
			for($i=0; $i<$countFiles2; $i++){           
				//---------------------------
				$_FILES['userFile']['name'] = $_FILES['catFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['catFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['catFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['catFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['catFiles']['size'][$i];

                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
					//$this->Control_model->AddImagesData($uploadData[$i]['file_name'],$currentID);
					$this->Product_model->AddCatalogueData($uploadData[$i]['file_name'], $currentID, $txtTitle_th[$i], $group2[$i]);
                }				
			}
		}*/ 
		if($file_name2 != ''){
			$this->Product_model->AddCatalogueData($file_name2, $currentID, $txtTitle_th, $group2);
		}		
		echo $currentID;		
	 }
     //------------------------------------
     public function loadProductImg(){
		 $ProID = $this->input->post('ProID');
		 $imglist = $this->Product_model->loadProductImg($ProID);
		 echo '<table class="table table-bordered table-hover">';
		 foreach($imglist->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/product/').$data->imge_name.'" style="width:150px;" class="thumbnail"></span></td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="comfirmDelete(\''.$data->id.'\' , \'imgfile\', \''.$data->imge_name.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
	 } 
     //------------------------------------
     public function loadcateImg(){
		 $ProID = $this->input->post('ProID');
		 $imglist = $this->Category_model->loadcateImg($ProID);
		 echo '<table class="table table-bordered table-hover">';
		 foreach($imglist->result() AS $data){ 
			 echo '<tr id = "RowImg'.$data->id.'">';
			 echo '<td><span class="text-danger"><img src="'.base_url('uploadfile/').$data->category_img.'" style="width:150px;" class="thumbnail"></span></td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="imgDelete(\''.$data->id.'\',\''.$data->category_img.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
	 } 
     //-------------------------------
	 public function deletePorductFile1(){ 
	 	 $fileType = $this->input->post('fileType');
	 	 $DataID = $this->input->post('DataID');
	 	 $FileName = $this->input->post('FileName');
		 $num = 0;
		 
		 if($fileType == 'catalgoue'){
			 
			 $chDownload = $this->Category_model->check_relatedData('file_id','tbl_downloadfile_data',$DataID);
			 $num = $chDownload->num_rows();
		 }
		 if($num > 0){
			 $this->Category_model->update_ShowOnWeb($DataID,'0','tb_file_data','data_status');
			 
		 } else if($num == 0){
			 $result = $this->Product_model->deleteProductFile1($DataID, $fileType, $FileName);
		 }	 
		 echo $result;
	 }
     //-------------------------------
	 public function deletecateimg(){
         $img = '';
	 	 $DataID = $this->input->post('DataID');
	 	 $FileName = $this->input->post('FileName');
		 $result = $this->Category_model->deletecateimg($DataID,$FileName,$img);
		 echo $result;
	 }
     //----------------------------------------------- 
	 public function loadProductFile(){
		 $ProID = $this->input->post('ProID');
		 $imglist = $this->Product_model->loadProductFile($ProID);
		 echo '<table class="table table-bordered table-hover">';
		 foreach($imglist->result() AS $data){ 
			 
			 switch($data->group2){ 
				case 1:
					$group2 = "Type : File Catalog";
					break;	 
				case 2:
					$group2 = "Type : Manual";
					break;
				case 3:
					$group2 = "Type : Spication";
					break;
				case 4:
					$group2 = "Type : Brochure";
					break;
				 case 5:
					$group2 = "Type : Other";
					break;				 
			}			 
			 
			 echo '<tr id = "RowFile'.$data->id.'">';
			 echo '<td><span class="text-suceess">';
			 echo'<a href="'.base_url('uploadfile/catalogue/').$data->imge_name.'" target="_blanl"><i class="icon-arrow-down-circle">&nbsp;'.$data->txtTitle_th.'</i></a></span></td>';			 
			 echo'<td><span class="text-suceess">'.$group2.'</span></td>';
			 echo '<td width="30"><button type="button" class="btn btn-danger btn-sm" onclick="comfirmDelete(\''.$data->id.'\' , \'catalgoue\' , \''.$data->imge_name.'\')"><i class="icon-trash"></i></button></td>';
			 echo '</tr>';
		 }
		 echo '</table>';
	 }
    //-------------------
    public function deleteyoutube(){
        $dataID = $this->input->post('dataID');
        $table = $this->input->post('table');
        $result = $this->Product_model->delete_data($dataID, $table);
        echo $result;
    }  
    //-----------------------
    public function Product_list(){
		//$data['productList']=$this->Product_model->getproductList();
		$data['categoryList'] = $this->Category_model->listcategory('0','0');
		
		$this->load->view('backend/header');
		$this->load->view('backend/product_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/product_list_script');
	}
	//-----------------------
    public function Product($category=NULL){ 
		//$data['productList']=$this->Product_model->getproductList();
		$x ='';
		$data['productList'] = $this->Category_model->get_productData($x,$category);
		$category = $this->Category_model->get_dataCategory($category);
		foreach($category->result() AS $category2){}
		$data['category1_txt'] = $category2->name_th;
		$data['category1'] = $category;
		
		$this->load->view('backend/header');
		$this->load->view('backend/product',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/product_list_script');
	}
    //-------------------------------
	public function news_add($curentID=NULL){
		
		$NewDetail = $this->Product_model->getNewDetail($curentID);
		if($NewDetail->num_rows() > 0){
			foreach($NewDetail->result() AS $news){}
			$data['news_title']=$news->news_title;
			$data['news_detail']=$news->news_detail; 
			$data['currentID']=$news->id;
			$data['news_date_add']=$news->news_date_add;
		 }else{
			$data['news_title']='';
			$data['news_detail']=''; 
			$data['currentID']='';
			$data['news_date_add']='';
		}
		$this->load->view('backend/header2',$data);
		$this->load->view('backend/news_add',$data);
		$this->load->view('backend/footer2');
		$this->load->view('backend/news_add_script');		
	}
    //-------------------------------
	public function reference_add($curentID=NULL){
		
		$referenceDetail = $this->Product_model->getreferenceDetail($curentID);
		if($referenceDetail->num_rows() > 0){
			foreach($referenceDetail->result() AS $reference){}
			$data['reference_title']=$reference->reference_title;
			$data['reference_detail']=$reference->reference_detail; 
			$data['currentID']=$reference->id;
			$data['reference_date_add']=$reference->reference_date_add;
		 }else{
			$data['reference_title']='';
			$data['reference_detail']=''; 
			$data['currentID']='';
			$data['reference_date_add']='';
		}
		$this->load->view('backend/header_reference',$data);
		$this->load->view('backend/reference_add',$data);
		$this->load->view('backend/footer2');
		$this->load->view('backend/reference_add_script');		
	}
    //-------------------------------   // imageID 
	public function deleteNewsImg(){
		$imageID = $this->input->post('imageID');
		$imageName = $this->input->post('imageName');
		$result = $this->Product_model->deleteNewsImg($imageID,$imageName);
		echo $result;
	} 
    //-------------------------------   // imageID 
	public function deletereferenceImg(){
		$imageID = $this->input->post('imageID');
		$imageName = $this->input->post('imageName');
		$result = $this->Product_model->deletereferenceImg($imageID,$imageName);
		echo $result;
	} 
    //-------------------------------    
	public function addNews(){
		$currentID =$this->input->post('currentID');
		$news_detail =$this->input->post('news_detail');
		$news_title =$this->input->post('news_title');
		$news_date_add =$this->input->post('news_date_add');
		$youtube =$this->input->post('youtube');
		 
		$currentID = $this->Product_model->addNews($news_title , $news_detail ,$currentID , $news_date_add );
                 
        if($youtube!=''){
            foreach($youtube AS $value){
                if($value !=''){
                    $result_id2 = $this->Product_model->addyoutubeNew($currentID , $value);                        
                }  
            }
        }
		 //--------uploadfile------------//
		$countFiles = count($_FILES['userFiles']['name']);
		   
		$upload_path = './uploadfile/news';
		$upload_pathName = 'uploadfile/news';
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
					$this->Product_model->AddNewsImg($uploadData[$i]['file_name'],$currentID);
                }				
			}
		}		
		echo $currentID;		 
	}
    //-------------------------------    
	public function addreference(){
		
		 $currentID =$this->input->post('currentID');
		 $reference_detail =$this->input->post('reference_detail');
		 $reference_title =$this->input->post('reference_title');
		 $reference_date_add =$this->input->post('reference_date_add');
		 $youtube =$this->input->post('youtube');
		 
		 $currentID = $this->Product_model->addreference($reference_title, $reference_detail, $currentID, $reference_date_add);
                 
         if($youtube!=''){
            foreach($youtube AS $value){
               if($value !=''){
                   $result_id2 = $this->Product_model->addyoutubereference($currentID,$value);                        
               }  
            }
         }
		 //--------uploadfile------------//
		$countFiles = count($_FILES['userFiles']['name']);
		   
		 		$upload_path = './uploadfile/reference';
				$upload_pathName = 'uploadfile/reference';
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
					$this->Product_model->AddreferenceImg($uploadData[$i]['file_name'],$currentID);
                }
				
			}
		}
		
		 echo $currentID;
		 
	}
    //-------------------------------
	public function loadNewsImages(){
		$ProID=$this->input->post('ProID');
		$data['newsImg'] = $this->Product_model->loadNewsImg($ProID);
		$this->load->view('backend/news_images_list',$data);
		
	}
    //-------------------------------
	public function loadreferenceImages(){
		$ProID=$this->input->post('ProID');
		$data['referenceImg'] = $this->Product_model->loadreferenceImg($ProID);
		$this->load->view('backend/reference_images_list',$data);
		
	}
    //-------------------------------
	public function news_list(){
		$data['NewsList']=$this->Product_model->news_list();
		$this->load->view('backend/header');
		$this->load->view('backend/news_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/news_list_script');	
	}
    //-------------------------------
	public function reference_list(){
		$data['referenceList']=$this->Product_model->reference_list();
		$this->load->view('backend/header');
		$this->load->view('backend/reference_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/reference_list_script');	
	}
    //------------------------------- deleteNews 
	public function deleteNews(){
		$DataID = $this->input->post('dataID');
		$result = $this->Product_model->deleteNews($DataID);
		echo $result;
	}
    //------------------------------- deleteNews 
	public function deletereference(){
		$DataID = $this->input->post('dataID');
		$result = $this->Product_model->deletereference($DataID);
		echo $result;
	}
    //-------------------------------
	public function slide_add($curentID=NULL){
		
		$slideDetail = $this->Product_model->getslideDetail($curentID);
		if($slideDetail->num_rows() > 0){
			foreach($slideDetail->result() AS $slide){}
			$data['slide_title']=$slide->slide_title;
			$data['slide_detail']=$slide->slide_detail;
			$data['slide_desc']=$slide->slide_desc;
			$data['learnMore']=$slide->learnMore;
			$data['currentID']=$slide->id;
			
		}else{
			
			$data['slide_title']='';
			$data['slide_detail']='';
			$data['slide_desc']='';
			$data['learnMore']='';
			$data['currentID']='';			
		}
		$this->load->view('backend/header');
		$this->load->view('backend/slide_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_add_script');		
	}
    //-------------------------------deleteSlideImg 
	public function deleteSlideImg(){
		$DataID=$this->input->post('imageID');
		$imge_name=$this->input->post('imageName');
		$result = $this->Product_model->deleteSlideImg($DataID,$imge_name);
		echo $result;
	}
    //-------------------------------    
	public function addSlide(){
		 $currentID =$this->input->post('currentID');
		 $slide_title =$this->input->post('comment');
		 $slide_detail =$this->input->post('comment1');
		 $slide_desc =$this->input->post('comment2');
		 $learnMore =$this->input->post('learnMore');
                 $img = $this->input->post('img_old');
		 $currentID = $this->Product_model->addSlide($slide_title , $slide_detail ,$currentID , $slide_desc,$learnMore );
		 //--------uploadfile------------//
                 
              
        

		$countFiles = count($_FILES['userFiles']['name']);
		  
		 		$upload_path = './uploadfile/banner';
				$upload_pathName = 'uploadfile/banner';
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
                    if($img!=''){$this->Product_model->deleteSlideImg($currentID,$img);}
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                    $this->Product_model->AddSlideImg($uploadData[$i]['file_name'],$currentID);
                }
                 
				
			}
		}		
		echo $currentID;
		 
	}
    //-------------------------------
	public function loadSlideImages(){
		$ProID=$this->input->post('ProID');
		$data['slideImg'] = $this->Product_model->loadSlideImg($ProID);
        $this->load->view('backend/slide_images_list',$data);		
	}
    //-------------------
    public function set_ShowOnWeb(){
        $dataID = $this->input->post('dataID');
        $check = $this->input->post('check');
        $table = $this->input->post('table');
        $result = $this->Product_model->update_ShowOnWeb($dataID, $check, $table);
        echo $result;
    }
    //-------------------------------
    public function deleteSlide(){
		$DataID=$this->input->post('DataID');
		$result = $this->Product_model->deleteSlide($DataID);
		echo $result;
	}
    //-------------------------------
	public function slide_list(){
            
		$data['SlideList']=$this->Product_model->slide_list();
		$this->load->view('backend/header');
		$this->load->view('backend/slide_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/slide_list_script');	
	}
    //-------------------------------	
    public function cangePassForm(){
	   $this->load->view('backend/changepassform');
    }
   	//-------------------------------  doChangePass') ', { newpass
    public function doChangePass(){
		$id = $this->input->post('id');
		$newpass = trim($this->input->post('newpass'));
		
		$result = $this->Product_model->doChangePass($newpass,$id);
		echo $result;
	}
    //-----------------
	public function admin_add($dataID=NULL){
		if($dataID!=''){
			$selectData=$this->Product_model->getuserdata($dataID);
			foreach($selectData->result() AS $abc){ }
			$data['name_sname']= $abc->name_sname;			
			$data['user_name']= $abc->user_name;			
			$data['password']= $abc->password;			
			$data['dataID']= $dataID;
		}else{
			$data['name_sname']= '';			
			$data['user_name']= '';			
			$data['password']= '';			
			$data['dataID']= '';
		}

		$this->load->view('backend/header');
		$this->load->view('backend/addmin_add',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/addmin_add_script');
	 }
     //-----------------------------
     public function chk_user(){
             $username = $this->input->post('username');
             $result = $this->Product_model->chk_user($username);
             $numresult = $result->num_rows();
		echo $numresult;
     }
     //-----------------------------
     public function add_admin(){
             $Name = $this->input->post('Name');
             $username = $this->input->post('username');
             $Password = $this->input->post('Password');
             $password_old = $this->input->post('password_old');
             $dataID = $this->input->post('dataID');
             $result = $this->Product_model->add_admin($Name,$username,$Password,$password_old,$dataID);

		echo $result;
     }
     //-------------------------------
	 public function admin_list(){
            
		$data['adminList']=$this->Product_model->admin_list();
		$this->load->view('backend/header');
		$this->load->view('backend/admin_list',$data);
		$this->load->view('backend/footer');
		$this->load->view('backend/admin_list_script');	
	}
	//-------------------------------
	public function load_category(){
		
		$dataID = '';
		$category = $this->Category_model->listcategory('0','0'); ?>
            
		<table class="table table-bordered table-hover table-strip">
          <thead>
            <tr>
               <th width="5%" style="text-align: center !important">No.</th>
               <th>Category</th>
               <th width="20%">Order</th>
               <th width="12%" style="text-align: center !important">Add Sub Category</th>
               <th width="10%" style="text-align: center !important">Add Detail</th>
               <th width="10%" style="text-align: center !important">Delete</th>
            </tr>
          </thead>
          <tbody>
		  <?php $n=1; foreach($category->result() as $category2){ ?>	  
               <tr>
                   <td align="center"><?php echo $n?>.</td>
                   <td><input type="text" value="<?php echo $category2->name_th?>" class="form-control form-control-sm" onChange="updateCategory('<?php echo $category2->id?>',this.value)" ></td>
                   <td align="center"><input id="order<?php echo $category2->id?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $category2->category_order?>" onChange="updateOrder('<?php echo $category2->id?>', 'category_order', this.value)">
                       <input type="hidden" id="chkOrder<?php echo $category2->id?>" value="<?php echo $category2->category_order?>"></td>
                   <td align="center">
					   <?php if($category2->level < 3){ ?>
					   <button type="button" class="btn btn-sm btn-info waves-light waves-effect" onClick="add_subCategory('<?php echo $category2->id?>','<?php echo $category2->level + 1?>')"><i class="icon-list"></i></button>
				   	   <?php } ?>	
				   </td>
				   <td align="center"><button type="button" class="btn btn-sm btn-success waves-light waves-effect" onClick="window.location.href = '<?php echo base_url()?>control/detail_category/<?php echo $category2->id?>';"><i class="icon-note"></i></button></td>
                   <td align="center"><button type="button" class="btn btn-sm btn-danger waves-light waves-effect" <?php //if($numdetailcate >0){disabled?><?php //} ?> onClick="comfirmDelete('<?php echo $category2->id?>', '<?php echo $category2->name_th?>', '<?php echo $category2->level + 1?>')"><i class="icon-trash"></i></button></td>
              </tr>			  
			  <?php $sub_category1 = $this->Category_model->listcategory($category2->id,$category2->level + 1); 
			  		$num_subCategory = $sub_category1->num_rows();  
		
					if($num_subCategory >0){ $a = 1;
			  		foreach($sub_category1->result() as $sub_category){			  
			  ?>
			  <tr>
                   <td align="center"><?php echo $n.'.'.$a;?></td>
                   <td><input type="text" value="<?php echo $sub_category->name_th?>" class="form-control form-control-sm" onChange="updateCategory('<?php echo $sub_category->id?>',this.value)" style="margin-left: 5%; width: 95%;" ></td>
                   <td align="center"><input id="order<?php echo $sub_category->id?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $sub_category->category_order?>" onChange="updateOrder('<?php echo $sub_category->id?>', 'category_order', this.value)">
                       <input type="hidden" id="chkOrder<?php echo $sub_category->id?>" value="<?php echo $sub_category->category_order?>"></td>
                   <td align="center">
					   <?php if($sub_category->level < 3){ ?>
					   <button type="button" class="btn btn-sm btn-info waves-light waves-effect" onClick="add_subCategory('<?php echo $sub_category->id?>','<?php echo $sub_category->level + 1?>')"><i class="icon-list"></i></button>
				   	   <?php } ?>	
				   </td>
				   <td align="center"><button type="button" class="btn btn-sm btn-success waves-light waves-effect" onClick="window.location.href = '<?php echo base_url()?>control/detail_category/<?php echo $sub_category->id?>';"><i class="icon-note"></i></button></td>
                   <td align="center"><button type="button" class="btn btn-sm btn-danger waves-light waves-effect" <?php //if($numdetailcate >0){disabled?><?php //} ?> onClick="comfirmDelete('<?php echo $sub_category->id?>', '<?php echo $sub_category->name_th?>', '<?php echo $sub_category->level + 1?>')"><i class="icon-trash"></i></button></td>
              </tr>
			  <?php $sub_category2 = $this->Category_model->listcategory($sub_category->id,$sub_category->level + 1); 
			  		$num_subCategory2 = $sub_category2->num_rows();  
		
					if($num_subCategory2 >0){ $a2 = 1;
			  		foreach($sub_category2->result() as $sub_category3){		  
			  ?>
			  <tr>
                   <td align="center"><?php echo $n.'.'.$a.'.'.$a2;?></td>
                   <td><input type="text" value="<?php echo $sub_category3->name_th?>" class="form-control form-control-sm" onChange="updateCategory('<?php echo $sub_category3->id?>',this.value)" style="margin-left: 10%; width: 90%;" ></td>
                   <td align="center"><input id="order<?php echo $sub_category3->id?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $sub_category3->category_order?>" onChange="updateOrder('<?php echo $sub_category3->id?>', 'category_order', this.value)">
                       <input type="hidden" id="chkOrder<?php echo $sub_category3->id?>" value="<?php echo $sub_category3->category_order?>"></td>
                   <td align="center">
					   <?php if($sub_category3->level < 3){ ?>
					   <button type="button" class="btn btn-sm btn-info waves-light waves-effect" onClick="add_subCategory('<?php echo $sub_category3->id?>','<?php echo $sub_category3->level + 1?>')"><i class="icon-list"></i></button>
				   	   <?php } ?>	
				   </td>
				   <td align="center"><button type="button" class="btn btn-sm btn-success waves-light waves-effect" onClick="window.location.href = '<?php echo base_url()?>control/detail_category/<?php echo $sub_category3->id?>';"><i class="icon-note"></i></button></td>
                   <td align="center"><button type="button" class="btn btn-sm btn-danger waves-light waves-effect" <?php //if($numdetailcate >0){disabled?><?php //} ?> onClick="comfirmDelete('<?php echo $sub_category3->id?>', '<?php echo $sub_category3->name_th?>', '<?php echo $sub_category3->level + 1?>')"><i class="icon-trash"></i></button></td>
              </tr>
			  <?php $sub_category4 = $this->Category_model->listcategory($sub_category3->id,$sub_category3->level + 1); 
			  		$num_subCategory3 = $sub_category4->num_rows();  
		
					if($num_subCategory3 >0){ $a3 = 1;
			  		foreach($sub_category4->result() as $sub_category5){		  
			  ?>
			  <tr>
                   <td align="center"><?php echo $n.'.'.$a.'.'.$a2.'.'.$a3;?></td>
                   <td><input type="text" value="<?php echo $sub_category5->name_th?>" class="form-control form-control-sm" onChange="updateCategory('<?php echo $sub_category5->id?>',this.value)" style="margin-left: 15%; width: 85%;" ></td>
                   <td align="center"><input id="order<?php echo $sub_category5->id?>" type="text" class="form-control form-control-sm OrderCate" value="<?php echo $sub_category5->category_order?>" onChange="updateOrder('<?php echo $sub_category5->id?>', 'category_order', this.value)">
                       <input type="hidden" id="chkOrder<?php echo $sub_category5->id?>" value="<?php echo $sub_category5->category_order?>"></td>
                   <td align="center">
					   <?php if($sub_category5->level < 3){ ?>
					   <button type="button" class="btn btn-sm btn-info waves-light waves-effect" onClick="add_subCategory('<?php echo $sub_category5->id?>','<?php echo $sub_category5->level + 1?>')"><i class="icon-list"></i></button>
				   	   <?php } ?>	
				   </td>
				   <td align="center"><button type="button" class="btn btn-sm btn-success waves-light waves-effect" onClick="window.location.href = '<?php echo base_url()?>control/detail_category/<?php echo $sub_category5->id?>';"><i class="icon-note"></i></button></td>
                   <td align="center"><button type="button" class="btn btn-sm btn-danger waves-light waves-effect" <?php //if($numdetailcate >0){disabled?><?php //} ?> onClick="comfirmDelete('<?php echo $sub_category5->id?>', '<?php echo $sub_category5->name_th?>', '<?php echo $sub_category5->level + 1?>')"><i class="icon-trash"></i></button></td>
              </tr>			  
		  <?php $a3++; } } $a2++; } } $a++; } } $n++; } ?>	  
        </tbody>
      </table>	
<?php
	}  
	//-----------------------------
    public function do_addCategory(){
		
		$x ='';
		
        $category_title = $this->input->post('category_title');
        $mainCate_id = $this->input->post('mainCate_id');
        $level = $this->input->post('level');        
        $result = $this->Category_model->DoAddProductCategory($category_title,$mainCate_id,$x,$level);
		echo $result;
    }
	//---------------------------
    public function update_category(){
		$dataID = $this->input->post('dataID');
		$changeValue = $this->input->post('changeValue');
		$result = $this->Category_model->do_updateCategory($dataID,$changeValue);
		echo $result;		
	}
    //-------------------------------
	public function do_get_subCategory(){
		$mainCate_id = $this->input->post('mainCate_id');
		$level = $this->input->post('level');		
		//$category2 = $this->Category_model->get_dataCategory($mainCate_id); 				
		$category2 = $this->Category_model->listcategory($mainCate_id,$level);
		$num = $category2->num_rows();
		
		if($num > 0){ ?>				
		
		<div class="form-group row category2" id="sub<?php echo $level+1?>">
			<label class="col-3 col-form-label">Sub Category</label>
			<div class="col-9">
				<select id="category<?php echo $level+1?>" name="category[]" class="form-control form-control-sm" onChange="get_subCategory(this.value,'<?php echo $level+1?>')" >
					<option value="0">---Select---</option>
					<?php foreach($category2->result() AS $category){ ?>
					<option value="<?php echo $category->id?>" <?php //if($category->id==$product_category){ echo "selected"; } ?> ><?php echo $category->name_th?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		
<?php  }  }  
		
	//------------------- 
	public function addFAQ(){ 				
		$topic_th = $this->input->post('topic_th');	
		$desc_th = $this->input->post('desc_th');
		$faqID = $this->input->post('faqID');
		$product_id = $this->input->post('currentID');
		$result = $this->Category_model->do_addFAQ($faqID,$topic_th,$desc_th,$product_id);
		echo $result;
	} 
	//-------------------------------  
	public function load_FAQ(){
		$ProID = $this->input->post('ProID');					
		$FAQ = $this->Category_model->list_FAQ($ProID);
		$num = $FAQ->num_rows(); ?>

		<div class="col-lg-11 offset-lg-1" id="showFAQ">
		
	<?php	if($num > 0){ 
			foreach($FAQ->result() AS $FAQ2){	
	?>	
          <div>
            <div class="question-q-box">Q.</div>
            <h4 class="question" data-wow-delay=".1s"><?php echo $FAQ2->topic_th?>
			  <button type="button" class="btn btn-danger btn-sm" onclick="deleteFAQ('<?php echo $FAQ2->id?>')" style="float: right; margin-right: 5%;"><i class="icon-trash"></i></button>
			  <button type="button" class="btn btn-success btn-sm" style="float: right; margin-right: 10px;" onclick="editFAQ('<?php echo $FAQ2->id?>','<?php echo $FAQ2->topic_th?>')"><i class="icon-pencil"></i></button>			  
			</h4>			
            <div class="answer col-9"><?php echo $FAQ2->desc_th?></div>         	
          </div>	
	<?php } ?>
		  </div>	
		
	<?php  } }  
	
	//-------------------------------
	 public function deleteFAQ(){ 
	 	 $DataID = $this->input->post('DataID');	 	 
		 $result = $this->Category_model->do_deleteFAQ($DataID);
		 echo $result;
	 }
	//-------------------
	public function editFAQ(){ 
		 $txt = '';
	 	 $dataID = $this->input->post('dataID');	 	 
	 	 $product_id = $this->input->post('currentID');	 	 
		 $FAQ = $this->Category_model->list_FAQ($product_id,$dataID);
		 foreach($FAQ->result() AS $FAQ2){}
		 $txt = $FAQ2->desc_th;
		
		 echo $txt;
	 }
	//-------------------
	public function set_ShowOnWeb2(){
        $dataID = $this->input->post('dataID');
        $check = $this->input->post('check');
        $table = $this->input->post('table');
        $result = $this->Category_model->update_ShowOnWeb($dataID,$check,$table,'show_onWeb');
        echo $result;
    }
	//-------------------------------  
	public function deleteData(){
		$result = '0';
		$DataID = $this->input->post('dataID');
		$chDownload = $this->Category_model->check_relatedData('product_id','tbl_downloadfile_data',$DataID);
		$chQuotation = $this->Category_model->check_relatedData('product_id','tbl_quote_quotation',$DataID);
		
		if(($chDownload->num_rows() < 1) && ($chQuotation->num_rows() < 1)){
			
			$this->Category_model->do_deleteData('product_id','tbl_youtube_link',$DataID);
			$this->Category_model->do_deleteData('product_id','tb_file_data',$DataID);
			$this->Category_model->do_deleteData('product_id','tb_img_data',$DataID);
			$this->Category_model->do_deleteData('product_id','tbl_faq_data',$DataID);
			$this->Category_model->do_deleteData('id','tbl_product_data',$DataID);
			$result = '1';
			
		} else {
			
			$this->Category_model->update_ShowOnWeb($DataID,'0','tbl_product_data','data_status');
			$result = '1';
		}			
		echo $result;
	}
	//---------------------- inputName inputEmail inputPhone textareaMessage
	public function sendmail(){
		$currentID = $this->input->post('currentID');
                $status = '1';
                $getuserfontend = $this->Product_model->getuserfontend($status);

                foreach ($getuserfontend->result() AS $userfontend){
                $NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			$news_title=$news->news_title;
			$news_detail=$news->news_detail; 
		
                        $imgnew = $this->Product_model->loadNewsImg($currentID);  
 foreach ($imgnew->result() AS $imgnew3){}
                $images_name = $imgnew3->images_name;
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
      <td align="center" bgcolor="#efb40b" style="color:#FFFFFF;"><h2>'.$news_title.'</h2>www.gotautomations.com/News<br><br></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top" style="font-size: 11pt; color: #666666; padding-left: 25px;">
	<img src="'.base_url().'uploadfile/news/'.$images_name.'" align="center" width="500"  style="margin-top: -55px; padding-left: 15px;">
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px; padding-left: 25px;">
		  <p>'.$this->Product_model->str_limit_html($news_detail,450).'</p><br></td>
    </tr>
    <tr>
      <td align="center"><a href="'.base_url().'News/news_detail/'.$currentID.'" style="padding:20px;background-color:#efb40b;color:white">คลิก อ่านต่อ...</a></td>
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
		 
		
		$this->email->from($from_email, 'GOT AUTOMATION NEWS'); 
        $this->email->to($to_email);
        $this->email->subject('จดหมายติดต่อจาก GOT AUTOMATION( gotautomations.com )'); 
        $this->email->message($email_body); 
        $this->email->send();
        
                }
                $this->linenotify($currentID);
                $this->linenotify2($currentID);
                $this->linenotify3($currentID);
                $this->linenotify4($currentID);
                $this->linenotify5($currentID);
                $this->linenotify6($currentID);
                $this->linenotify7($currentID);
                $this->linenotify8($currentID);
                $this->linenotify9($currentID);
                $this->linenotify10($currentID);
                $this->linenotify11($currentID);
                $this->linenotify12($currentID);
                $this->linenotify13($currentID);
                $this->linenotify14($currentID);
                $this->linenotify15($currentID);
                echo 1;
	}
	//---------------------- inputName inputEmail inputPhone textareaMessage
	public function sendmailreference(){
		$currentID = $this->input->post('currentID');
                $status = '1';
                $getuserfontend = $this->Product_model->getuserfontend($status);

                foreach ($getuserfontend->result() AS $userfontend){
                $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
		
                        $referenceImg = $this->Product_model->loadreferenceImg($currentID);  
 foreach ($referenceImg->result() AS $imgreference3){}
                $images_name = $imgreference3->images_name;
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
      <td align="center" bgcolor="#efb40b" style="color:#FFFFFF;"><h2>'.$reference_title.'</h2>www.gotautomations.com/News<br><br></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" valign="top" style="font-size: 11pt; color: #666666; padding-left: 25px;">
	<img src="'.base_url().'uploadfile/reference/'.$images_name.'" align="center" width="500"  style="margin-top: -55px; padding-left: 15px;">
    </tr>
    <tr>
      <td align="left" valign="top" style="font-size: 11pt; color: #666666; line-height: 25px; padding-left: 25px;">
		  <p>'.$this->Product_model->str_limit_html($reference_detail,450).'</p><br></td>
    </tr>
    <tr>
      <td align="center"><a href="'.base_url().'Reference/Reference_detail/'.$currentID.'" style="padding:20px;background-color:#efb40b;color:white">คลิก อ่านต่อ...</a></td>
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
		 
		
		$this->email->from($from_email, 'GOT AUTOMATION REFERENCE'); 
        $this->email->to($to_email);
        $this->email->subject('จดหมายติดต่อจาก GOT AUTOMATION( gotautomations.com )'); 
        $this->email->message($email_body); 
        $this->email->send();
       
                }
                 $this->linenotifyref($currentID);
                 $this->linenotifyref2($currentID);
                 $this->linenotifyref3($currentID);
                 $this->linenotifyref4($currentID);
                 $this->linenotifyref5($currentID);
                 $this->linenotifyref6($currentID);
                 $this->linenotifyref7($currentID);
                 $this->linenotifyref8($currentID);
                 $this->linenotifyref9($currentID);
                 $this->linenotifyref10($currentID);
                 $this->linenotifyref11($currentID);
                 $this->linenotifyref12($currentID);
                 $this->linenotifyref13($currentID);
                 $this->linenotifyref14($currentID);
                 $this->linenotifyref15($currentID);
                echo 1;
	}
          //----------------------------------
  public function checkmail(){
       $email = $this->input->post('email');
       $result = $this->Product_model->checkmail($email);
       echo $result;           
  }
  //-------------------
  public function linenotify($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "x90LByhjZwRceboe0brPHw8FukJvJUCxYEetbAIxd6S";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify2($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "krybOHRNYUNBpSUOXlx1D6ULUgfJGcNuLYGjfTNGLHE";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify3($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "24DmLQTQxgWjFkNSm1WvTzs3ZVYcm1ghJMP7x8cPtBv";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify4($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "2FhexaxFwKrzXQ9q9otsA1JzpfGgox96R63s7KuJtlo";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify5($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "DZJP86alrlUOG8WPl1lxU0F4uQsAE5t0ohBfmTP1lwG";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify6($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "5VguGn2ntu87d0leQZcc1cI0FvauCIwqvmTjgsbpDAX";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify7($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "qISRueQZkSm1KKqNYkE9nFEwuYSDlUxN9A7kqhSYrAy";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify8($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "yn7NT6JIzQ7Mr29AtyhrHITTlv24rFNH4hf8BOuYWM3";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify9($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "RlvntzLVROsim5UX5dncL5M2xF6ii552Tw0oUoiVhfY";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify10($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "dxmdB0AhN9MhJvTb444tNjbFktOcjc9oWuyrNefTs92";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify11($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "SsqZEULfajUT7THBQAcvK2kKiFGgaL6CEflwJJ43fE9";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify12($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "X9aGxyuKxddQy7o8gsfxNciXLzJDnyL1VfysNRkRtxf";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify13($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "IzTuCGvb3W7zfRK3kpq5785TiouWpoptbw6ZyZl7mLR";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify14($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "9VdYukJLKd5qckZmI43RKs9eBQMFSSZD4Bg2jEYVEou";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotify15($currentID){
	  	   //---------line notify----------------//
		$NewDetail = $this->Product_model->getNewDetail($currentID);
		
			foreach($NewDetail->result() AS $news){}
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "tJGT9KwoWYdUFi8R0u0Kca74aygUbJvBOiAGmOMGrzM";

                    $datebookingArray = explode("-",$news->news_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nNews Date : ".$date_add."\nNews Title : ".$news->news_title."\nNews Detail : ".$news->news_detail."";

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
  public function linenotifyref($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "x90LByhjZwRceboe0brPHw8FukJvJUCxYEetbAIxd6S";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref2($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "krybOHRNYUNBpSUOXlx1D6ULUgfJGcNuLYGjfTNGLHE";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref3($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "24DmLQTQxgWjFkNSm1WvTzs3ZVYcm1ghJMP7x8cPtBv";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref4($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "2FhexaxFwKrzXQ9q9otsA1JzpfGgox96R63s7KuJtlo";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref5($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "DZJP86alrlUOG8WPl1lxU0F4uQsAE5t0ohBfmTP1lwG";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref6($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "5VguGn2ntu87d0leQZcc1cI0FvauCIwqvmTjgsbpDAX";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref7($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "qISRueQZkSm1KKqNYkE9nFEwuYSDlUxN9A7kqhSYrAy";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref8($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "yn7NT6JIzQ7Mr29AtyhrHITTlv24rFNH4hf8BOuYWM3";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref9($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "RlvntzLVROsim5UX5dncL5M2xF6ii552Tw0oUoiVhfY";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref10($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "dxmdB0AhN9MhJvTb444tNjbFktOcjc9oWuyrNefTs92";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref11($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "SsqZEULfajUT7THBQAcvK2kKiFGgaL6CEflwJJ43fE9";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref12($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "X9aGxyuKxddQy7o8gsfxNciXLzJDnyL1VfysNRkRtxf";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref13($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "IzTuCGvb3W7zfRK3kpq5785TiouWpoptbw6ZyZl7mLR";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref14($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "9VdYukJLKd5qckZmI43RKs9eBQMFSSZD4Bg2jEYVEou";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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
  public function linenotifyref15($currentID){
	  	   //---------line notify----------------//
		 $referenceDetail = $this->Product_model->getreferenceDetail($currentID);
		
			foreach($referenceDetail->result() AS $reference){}
			$reference_title=$reference->reference_title;
			$reference_detail=$reference->reference_detail; 
			 
        
		date_default_timezone_set("Asia/Bangkok");

		$sToken = "tJGT9KwoWYdUFi8R0u0Kca74aygUbJvBOiAGmOMGrzM";

                    $datebookingArray = explode("-",$reference->reference_date_add);
                    $datebooking = $datebookingArray[2];
                    $monbooking = $datebookingArray[1];
                    $yearbooking = $datebookingArray[0] ;
                    $date_add = $datebooking.'-'.$monbooking.'-'.$yearbooking;
	 
	 			$sMessage ="\nReference Date : ".$date_add."\nReference Title : ".$reference_title."\nReference Detail : ".$reference_detail."";

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