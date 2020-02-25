<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Action_model extends CI_Model
 {
	//---------------------------  
	function search_data($search=NULL,$limit = NULL, $start = NULL, $perpage = NULL){	
           
            $productID = array();
	$product_data = $this->db->query("SELECT id FROM `tbl_product_data` WHERE MATCH (name_th,overview_th,specification_th) AGAINST ('".$search."' IN BOOLEAN MODE)");
        foreach ($product_data->result() AS $product){
            array_push($productID,$product->id);
        }
        $faq_data = $this->db->query("SELECT product_id FROM `tbl_faq_data` WHERE MATCH (topic_th,desc_th) AGAINST ('".$search."' IN BOOLEAN MODE)");
        foreach ($faq_data->result() AS $faq){
            array_push($productID,$faq->product_id);
        }
        $file_data = $this->db->query("SELECT product_id FROM `tb_file_data` WHERE MATCH (txtTitle_th) AGAINST ('".$search."' IN BOOLEAN MODE)");
        foreach ($file_data->result() AS $file){
            array_push($productID,$file->product_id);
        }
        
            
            if(count($productID)>0){
               $id = array_unique($productID); 
            }else{
                $id = array(0);
            }
                if ($limit != '') {
                    $txtWhere = 'LIMIT ' . $limit;
                } else {
                    $txtWhere = '';
                }
                if (($start >= 0) && ($perpage >= 0)) {
                    $txtStart = 'LIMIT ' . $start . ',' . $perpage;
                } else {
                    $txtStart = '';
                }
                 $productcate_data = $this->db->query("SELECT id,name_th,overview_en,category1,category2,category3,category4,category5,CONCAT('1') AS type FROM tbl_product_data WHERE id IN (".implode(',',$id).") AND data_status = '1' AND show_onWeb = '1' UNION SELECT id,name_th,desc_th,category_img,detail_th,detail_en,icon,category_order,CONCAT('2') AS type FROM tbl_category_data WHERE MATCH (name_th,desc_th) AGAINST ('".$search."' IN BOOLEAN MODE) AND data_status = '1' AND show_onWeb = '1' $txtWhere $txtStart");
                        
        return $productcate_data;
//                $this->db->where_in('id', $id);
//		$this->db->select('*');	
//		$this->db->order_by('date_add','DESC');
//               
//                if ($limit != '') {
//                    $this->db->limit($limit);
//                } 
//                if (($start >= 0) && ($perpage >= 0)) {
//                    $this->db->limit($perpage,$start );
//                } 
//		$query = $this->db->get('tbl_product_data');
//                
//		return $query;	
            
	}  
 }
