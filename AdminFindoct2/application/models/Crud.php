<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Crud extends CI_Model
{
//Start-Read
	public function GetDokter($where = "")
	{
		$data = $this->db->query('select * from dokter ' . $where);
		return $data->result_array();
	}

	public function GetGelar($where = "")
	{
		$data = $this->db->query('select * from gelar ' . $where);
		return $data->result_array();
	}

//Start Update
	public function UpdateData($tableName, $data, $where)
	{
		$res = $this->db->update($tableName, $data, $where);
		return $res;
    }

//Start Insert
    public function InsertData($tableName, $data){
    	$res = $this->db->insert($tableName, $data);
    	return $res;
    }
//Start Delete

        public function DeleteData($tableName, $data, $where)
		{
			$res = $this->db->delete($tableName, $data, $where);
			return $res;
		}

}
