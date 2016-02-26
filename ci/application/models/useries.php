<?php
Class Useries extends CI_Model
{
 function userings($email)
 {   
   $query = $this->db->get('anggota');
		$result= $query->result_array("where username=$email");	
    return $result[0];
	 
 }
 function update($tablename, $data, $where)
 {
  //$this->db->where('username', "cuantik");
  $res = $this->db->update($tablename, $data, $where);
  return $res;
 }
 
 }
?>