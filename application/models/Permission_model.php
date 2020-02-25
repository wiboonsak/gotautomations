<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Permission_model extends CI_Model
 {      	
	/* function checkPermissionUrl($checVal=NULL , $userID=NULL){	 	
		$sql = "SELECT p.permission FROM `tbl_permission_data` AS p LEFT JOIN tbl_menu_data AS m ON p.menu_id = m.id WHERE p.user_id = '".$userID."' AND m.menu_url = '".$checVal."' ";
        $query=$this->db->query($sql);
       // return $query;	
		 
		 
		 $query = $this->db->get(); 
		 
		//return $query;
		$row = $query->row();
		$permission = $row->permission;
		return $permission;  
	}*/
	//---------------------------
	 function getMenuList($menu_type=NULL,$menu_cate=NULL){
		
		  $userID = $this->session->userdata('user_id');	   
		   
		  $sql = "SELECT m.menu_name , m.menu_type , m.menu_number , m.menu_cate , m.menu_url , m.id FROM `tbl_permission_data` AS p LEFT JOIN tbl_menu_data AS m ON p.menu_id = m.id WHERE p.user_id = '".$userID."' AND p.permission IN ('2','3') AND m.menu_type = '".$menu_type."' AND m.menu_cate = '".$menu_cate."' AND m.show_main='1' ORDER BY m.menu_number ASC ";
          $query=$this->db->query($sql);
          return $query;
	 } 
	 
	 
	 //---------------------------
	 function checkPermissionUrl($checVal=NULL , $userID=NULL){	
		/*$this->db->select('tbl_permission_data.permission');
		$this->db->from('tbl_permission_data');
		$this->db->join('tbl_menu_data','tbl_permission_data.menu_id=tbl_menu_data.id');		
		$this->db->where('tbl_permission_data.user_id', $userID); 
		$this->db->where('tbl_menu_data.menu_url', $checVal); 
		$query=$this->db->get(); 		 
		
		$row=$query->row();
		$permission = $row->permission;*/
		return '2';
	}
	 
	 
	  function checkPermissionUrl22($checVal=NULL , $userID=NULL){	
	  
		$this->db->select('tbl_permission_data.permission');
		$this->db->from('tbl_permission_data');
		$this->db->join('tbl_menu_data','tbl_permission_data.menu_id=tbl_menu_data.id');		
		$this->db->where('tbl_permission_data.user_id', $userID); 
		$this->db->where('tbl_menu_data.menu_url', $checVal); 
		$query=$this->db->get(); 		 
		
		$row=$query->row();
		if(isset($row)){
		$permission = $row->permission;
		}else{
			$permission = 0;
		}
	   
		//return '2';
		
		return $permission;
	}
 }
