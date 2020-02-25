<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Category_model extends CI_Model
 {
     
    function DoAddProductCategory($category_title=NULL, $mainCate_id=NULL, $dataID=NULL, $level=NULL){
		
		$pass = 0;
		
        if($dataID == ''){
			
            $sql = $this->db->query("SELECT MAX(category_order) AS nNax FROM tbl_category_data WHERE data_status = '1' ");
            foreach ($sql->result() AS $data){}
            $nMaxIns = $data->nNax + 1;

            $data = array(
				'name_th' => $category_title,
				'category_order' => $nMaxIns,				
				'mainCate_id' => $mainCate_id,
				'date_add' => date("Y-m-d H:i:s"),
				'level' => $level
			
			);
            if($this->db->insert('tbl_category_data', $data)){
                $pass = $this->db->insert_id();
                
            } else {
                $pass = 'Error';
            }
        } /*else {
            $data = array('category_title' => $category_title,'images' => $img);
            $this->db->where('id', $dataID);
            if ($this->db->update('tbl_category_data', $data)) {
                $pass = $dataID;
            } else {
                $pass = 'Error';
            }
        }*/

        return $pass;
    }
	//---------------------------  
	function listcategory($mainCate_id=NULL,$level=NULL){			
							
		if($mainCate_id != ''){
			$this->db->where('mainCate_id', $mainCate_id);		
		}
		if($level != ''){
			$this->db->where('level', $level);
		}		
		$this->db->where('data_status', '1');						
		$this->db->select('*');	
		$this->db->order_by('category_order','ASC');
		$query = $this->db->get('tbl_category_data');		
		return $query;		
	}  
 	//---------------------------  
	function get_dataCategory($data_id=NULL){			
							
		if($data_id != ''){
			$this->db->where('id', $data_id);		
		}							
		$this->db->select('*');	
		$query = $this->db->get('tbl_category_data');		
		return $query;		
	}
	//---------------------------
	function update_dataCategory($category_title=NULL, $dataID=NULL, $imgold=NULL, $desc_th=NULL, $detail_th=NULL, $icon=NULL){	 
				
		$data = array(
        'name_th' => $category_title,
        'category_img' => $imgold,     
        'desc_th' => $desc_th,     
        'icon' => $icon,         		  
        'detail_th' => $detail_th);         		  
         
		$this->db->where('id', $dataID);
		if($this->db->update('tbl_category_data', $data)){	
			//$pass = $this->db->insert_id();
			$pass = $dataID; 
		 }else{
			$pass=0;			
		 }		
		 return $pass;		 
	} 
	//---------------------------------
    function loadcateImg($ProID=NULL){
        $sql = $this->db->query("SELECT * FROM `tbl_category_data` WHERE id = '".$ProID."' ");
        return $sql;
    } 
	//------------------------------------------
    function deletecateimg($DataID=NULL,$fileName=NULL,$img=NULL){ 
         $data = array('category_img' => $img );
         $this->db->where('id', $DataID);
         if($this->db->update('tbl_category_data', $data)){
             $pass = 1;
             @unlink('./uploadfile/'.$fileName);
         } else {
             $pass = 0;
         }
        return $pass;
    }
	//-----------------------------
    function updateOrderCate($dataID=NULL,$changeValue=NULL){
        $data = array('category_order' => $changeValue);
        $this->db->where('id', $dataID);
        if($this->db->update('tbl_category_data', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
	//-----------------------------
    function do_updateCategory($dataID=NULL,$changeValue=NULL){
        $data = array('name_th' => $changeValue);
        $this->db->where('id', $dataID);
        if($this->db->update('tbl_category_data', $data)){
            $pass = 1;
        } else {
            $pass = 0;
        }
        return $pass;
    }
	//----------------------------------------
    function addProduct($currentID=NULL,$name_th=NULL,$overview_th=NULL,$specification_th=NULL,$instock=NULL){	
		
        $data = array(
			'name_th' => $name_th,
            'overview_th' => $overview_th,
            'specification_th' => $specification_th,
            'instock' => $instock,
            'date_add' => date("Y-m-d H:i:s")
        );

        if($currentID == ''){

            if($this->db->insert('tbl_product_data', $data)){
                $currentID = $this->db->insert_id();
            } else {
                $currentID = 'Error';
            }
			
        } else if($currentID != ''){
			
            $this->db->where('id', $currentID);
            if($this->db->update('tbl_product_data', $data)){
                $currentID = $currentID;
            } else {
                $currentID = 'Error';
            }
        }

        return $currentID;
    }
	//----------------------------------------
    function update_categoryProduct($currentID=NULL,$category=NULL,$field=NULL){		
		
        $data = array(
			'category'.$field => $category
        );

        $this->db->where('id', $currentID);
        if($this->db->update('tbl_product_data', $data)){
            $currentID = $currentID;
        } else {
             $currentID = 'Error';
        }
        return $currentID;
    }
	//-------------------------------------
    function productDetail($productID=NULL){
        
		if($productID != ''){
			$this->db->where('id', $productID);		
		}							
		$this->db->select('*');	
		$query = $this->db->get('tbl_product_data');		
		return $query;
    } 
	//----------------------------------------
    function do_addFAQ($faqID=NULL,$topic_th=NULL,$desc_th=NULL,$product_id=NULL){       

        if($faqID == ''){
			$data = array(
				'product_id' => $product_id,
				'topic_th' => $topic_th,
				'desc_th' => $desc_th,
				'date_add' => date("Y-m-d H:i:s")
			);
            if($this->db->insert('tbl_faq_data', $data)){
                $faqID = $this->db->insert_id();
            } else {
                $faqID = 'Error';
            }
			
        } else if($faqID != ''){
			
			$data = array(
				'topic_th' => $topic_th,
				'desc_th' => $desc_th
			);			
            $this->db->where('id', $faqID);
            if($this->db->update('tbl_faq_data', $data)){
                $faqID = $faqID;
            } else {
                $faqID = 'Error';
            }
        }
        return $faqID;
    } 
    //---------------------------------
	function list_FAQ($productID=NULL,$dataID=NULL){
        
		if($productID != ''){
			$this->db->where('product_id', $productID);		
		}
		if($dataID != ''){
			$this->db->where('id', $dataID);		
		}							
		$this->db->select('*');	
		$this->db->order_by('id','DESC');
		$query = $this->db->get('tbl_faq_data');		
		return $query;
    } 
	//---------------------
    function do_deleteFAQ($DataID=NULL){
        $this->db->where('id', $DataID);
        if($this->db->delete('tbl_faq_data')){
            $pass = '1';
        } else {
            $pass = 'Error';
        }
        return $pass;
    } 
	//---------------------------------------- 
	function get_productData($productID=NULL,$category1=NULL){
        
		if($productID != ''){
			$this->db->where('id', $productID);		
		}
		if($category1 != ''){
			$this->db->where('category1', $category1);		
		}							
		$this->db->select('*');	
		$this->db->order_by('id','DESC');
		$query = $this->db->get('tbl_product_data');		
		return $query;
    }
	//---------------------------------------- 
	function get_productData2($dataID=NULL,$field=NULL,$limit2=NULL,$notin=NULL){        
		
		$this->db->where($field, $dataID);									
		$this->db->select('*');	
		$this->db->order_by('id','DESC');
		if($limit2 != ''){
			$this->db->limit($limit2); 
		}
		if($notin != ''){
			$this->db->where_not_in('id', $notin);
		}
		$query = $this->db->get('tbl_product_data');		
		return $query;
    }	 
	//---------------------------------
    function name_category($productID=NULL,$category1=NULL){		
		
        $sql = $this->db->query("SELECT c2.name_th AS nameC2, c3.name_th AS nameC3, c4.name_th AS nameC4  FROM `tbl_product_data` AS p LEFT JOIN tbl_category_data AS c2 ON p.category2 = c2.id LEFT JOIN tbl_category_data AS c3 ON p.category3 = c3.id LEFT JOIN tbl_category_data AS c4 ON p.category4 = c4.id WHERE p.id = '".$productID."' AND p.category1 = '".$category1."' AND p.data_status = '1' ");
		foreach($sql->result() AS $data){}
		$name ='';
		if($data->nameC2 != ''){ $name = $data->nameC2; }
		if($data->nameC3 != ''){ $name = $name.' > '.$data->nameC3; }
		if($data->nameC4 != ''){ $name = $name.' > '.$data->nameC2; }
		
        //$name = $data->nameC2.' > '.$data->nameC3.' > '.$data->nameC4;
        return $name;
    } 
	//---------------------------	 
    function update_ShowOnWeb($dataID=NULL,$check=NULL,$table=NULL,$field=NULL){
        $data = array(
            $field => $check
        );
        $this->db->where('id', $dataID);
        if($this->db->update($table, $data)){
            $pass = 1;
        } else {
            $pass = 0;            
        }
        return $pass;
    } 
	//------------------------------------------
	function check_relatedData($field=NULL,$table=NULL,$val2=NULL){        
		
		if($field != ''){
			$this->db->where($field, $val2);		
		}							
		$this->db->select('*');	
		$query = $this->db->get($table);		
		return $query;
    }	 
	//---------------------------------
	function do_deleteData($field=NULL,$table=NULL,$val2=NULL){        
		
		$this->db->where($field, $val2); 
        if($this->db->delete($table)){
            $pass = '1';
        } else {
            $pass = 'Error';
        }
        return $pass;
    }	 
	//---------------------------------	 
	function getDistinct_file(){   	
		
		$sql = $this->db->query("SELECT DISTINCT f.product_id , p.name_th FROM `tb_file_data` AS f LEFT JOIN tbl_product_data AS p ON f.product_id = p.id WHERE f.product_id = p.id AND p.data_status = '1' AND p.show_onWeb = '1' ORDER BY f.product_id DESC ");
        return $sql;		
    }	 
	//---------------------
    function getFile_byGroup($productID=NULL,$group2=NULL){
		
		if($productID != ''){
			$this->db->where('product_id', $productID);		
		}		
		if($group2 != ''){
			$this->db->where('group2', $group2);		
		}	
		$this->db->where('data_status', '1');
		$this->db->select('*');	
		$query = $this->db->get('tb_file_data');		
		return $query;		
    } 
	//------------------------------------------
	function checkData_forDeleteCate($field=NULL,$table=NULL,$val2=NULL){ 		
		
        $pass = '0';
		$this->db->where($field, $val2);
        $this->db->where('data_status', '1');
        $query = $this->db->get($table);

        if($query->num_rows() > 0){
			$pass = '1';			
		} else {
			
			$this->db->where($field, $val2);
        	$this->db->where('data_status', '0');
        	$query2 = $this->db->get($table);
			if($query2->num_rows() > 0){
				$pass = '2';
				
			} else {
				$pass = '3';
			}
		}
		return $pass;
    } 
	 
  
 }
