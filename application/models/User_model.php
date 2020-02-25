<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class User_model extends CI_Model
 {
      function can_login($username, $password)
      {
           $password = md5($password);
           $this->db->where('user_name', $username);
           $this->db->where('password', $password);
           $this->db->where('data_status', '1');
           $query = $this->db->get('tbl_user_data');

           //SELECT * FROM users WHERE username = '$username' AND password = '$password'
           if($query->num_rows() > 0)
           {
            foreach ($query->result() as $row);
            $userdata = array(
                 'user_id'         => $row->id,
                 'name'              => $row->name_sname,
                 'user_type'     => $row->user_type
                 );

           $this->session->set_userdata($userdata);
           //-----------last update----------//
           date_default_timezone_set('Asia/Bangkok');
           $now = date("Y-m-d H:i:s");
           $data = array(
               'last_login' => $now
            );
          $this->db->where('id', $row->id);
          $this->db->update('tbl_user_data', $data);
			   return true;
           }
           else
           {
                return false;
           }
      }
      //---------------------------------
      public function get_user_id_from_username($username) {
        		$this->db->select('id');
        		$this->db->from('users');
        		$this->db->where('username', $username);
        		return $this->db->get()->row('id');
	   }
//      //-------------------------------
//       function getMenuList($menu_type=NULL,$menu_cate=NULL){
//  
//    $userID = $this->session->userdata('user_id');    
//     $datauser = $this->datauser($userID);
//     foreach ($datauser->result() AS $data){}
//     if($data->position_level == 4){
//     $sql = "SELECT * FROM  tbl_menu_data WHERE menu_type = '".$menu_type."' AND menu_cate = '".$menu_cate."'ORDER BY menu_number ASC ";
//     }else{
//    $sql = "SELECT m.menu_name , m.menu_type , m.menu_number , m.menu_cate , m.menu_url , m.id FROM tbl_permission_data AS p LEFT JOIN tbl_menu_data AS m ON p.menu_id = m.id WHERE p.user_id = '".$userID."' AND p.permission IN ('2','3') AND m.menu_type = '".$menu_type."' AND m.menu_cate = '".$menu_cate."' ORDER BY m.menu_number ASC ";
//     }
//          $query=$this->db->query($sql);
//          return $query;
//  }
  //-------------------------------------------
     function datauser($userID=NULL){
         $sql = "SELECT * FROM tbl_user_data WHERE id = '".$userID."'";
          $query=$this->db->query($sql);
          return $query;
     }
 }
