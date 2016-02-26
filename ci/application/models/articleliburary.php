<?php
Class Articleliburary extends CI_Model
{
 function usau()
 { 
	$this->db->where('username',"cuantik","isi");
   $query = $this->db->get('articles');
		$result= $query->result_array();	
    return $result;
	 
 }
 function insertion($tablename, $data)
 {
  $res = $this->db->insert($tablename, $data);
  return $res;
 }
 }
?>