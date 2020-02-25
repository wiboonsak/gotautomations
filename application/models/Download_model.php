<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Download_model extends CI_Model
 {
      public function get_user_id_from_username($username) {
        		$this->db->select('id');
        		$this->db->from('users');
        		$this->db->where('username', $username);
        		return $this->db->get()->row('id');
	   }
     //---------------------------  
	function GetthaiDateTime($day){
		$DateTimeArray= explode(" ",$day);
		$dateArray = explode("-",$DateTimeArray[0]);
		$date= $dateArray[2];
		$mon= $dateArray[1];
		$year= $dateArray[0] ;
		$monthArray = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April", "05"=>"May","06"=>"June","07"=>"July","08"=>"August","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
       //$monthArray=Array("01"=>"มกราคม ","02"=>"กุมภาพันธ์ ","03"=>"มีนาคม ","04"=>"เมษายน ","05"=>"พฤษภาคม ","06"=>"มิถุนายน ","07"=>"กรกฎาคม ","08"=>"สิงหาคม ","09"=>"กันยายน ","10"=>"ตุลาคม ","11"=>"พฤศจิกายน","12"=>"ธันวาคม");
		if($date < 10){ $date = str_replace("0", "", $date); } 
		return $date."&nbsp;".$monthArray[$mon]."&nbsp;".$year."&nbsp;".$DateTimeArray[1];
	}
    //-------------------------
    function getuserfontend(){
        $sql = $this->db->query("SELECT * FROM tbl_user_fontend ORDER BY date_add ASC");
        return $sql;
    }
    //-------------------------
    function getuserfontendbyid($userID=NULL){
        $sql = $this->db->query("SELECT * FROM tbl_user_fontend WHERE id = '$userID'");
        return $sql;
    }
    //-------------------------
    function getdownloadfile($userID=NULL,$file_id=NULL,$product_id=NULL){
        if($userID!=''){
            $txt = 'member_id = '.$userID.'  ';
        }else{
            $txt = '';
        }
        if($file_id!=''){
            $txt1 = 'file_id = '.$file_id.' AND product_id = '.$product_id.' ';
        }else{
            $txt1 = '';
        }
        $sql = $this->db->query("SELECT * FROM tbl_downloadfile_data WHERE $txt $txt1 ORDER BY date_time DESC");
        return $sql;
    }
    //-------------------------
    function getdownloadfiledistinct(){
        $sql = $this->db->query("SELECT DISTINCT file_id,product_id FROM tbl_downloadfile_data");
        return $sql;
    }
    //-------------------------
    function download_member($file_id=NULL,$product_id=NULL){
        $sql = $this->db->query("SELECT a.member_id,b.* FROM tbl_downloadfile_data AS a LEFT JOIN tbl_user_fontend AS b ON a.member_id = b.id WHERE a.file_id = '$file_id' AND a.product_id = '$product_id' ");
        return $sql;
    }
    //-------------------------
    function countdownload($file_id=NULL,$product_id=NULL){
        $sql = $this->db->query("SELECT count(*) AS count2 FROM `tbl_downloadfile_data` WHERE file_id = '".$file_id."' AND product_id = '".$product_id."'");
        return $sql;
    }
      //------------------------------------
  function Addmember($currentID =NULL , $name =NULL ,$password =NULL,$passwordold=NULL , $email =NULL, $phone =NULL, $line =NULL ){
      if($password!=''){
          $password1 = md5($password);
      }else{
          $password1 = $passwordold;
      }
       $dateUpdate = date("Y-m-d H:i:s");
       $data = array(
			'name' => $name,
			'phone' => $phone,
			'line' => $line,
			'email' => $email,
			'password' => $password1,
			'data_status' => '1',
			'date_add' => $dateUpdate
		);
        if($currentID == ''){
            if($this->db->insert('tbl_user_fontend', $data)){
                $pass = $this->db->insert_id();
            } else {
                $pass = 'Error';
            }
        } else {
            $this->db->where('id', $currentID);
            if($this->db->update('tbl_user_fontend', $data)){
                $pass = $currentID;
            } else {
                $pass = 'Error';
            }
        }
        return $pass;
  }
           //-------------------------------
          function fetch_data()
 {
  $this->db->order_by("id");
  $query = $this->db->get("tbl_user_fontend");
  return $query->result();
 }
    
 }
