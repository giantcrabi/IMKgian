<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Doctors_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
                $this->load->database();
	}

	public function GetAllDoctors($where = "") {
		$data = $this->db->query('select * from dokter');
		return $data->result_array();
	}

	public function GetAllGelar() {
		$data = $this->db->query('select distinct Gelar from dokter');
		return $data->result_array();
	}

	public function GetSpecificDoctors($where = "") {
		$data = $this->db->query('select * from dokter' . $where);
		return $data->result_array();
	}

	public function getDoctors($where){
		$data = $this->db->query('select * from dokter' . $where);
		return $data->result_array();	
	}

	public function getDoctorsInfo($where){
		$this->db->select('*');
		$this->db->from('dokter_tpraktek');
		$this->db->where($where);
		$this->db->join('tpraktek', 'tpraktek.IDTPraktek = dokter_tpraktek.IDTPraktek');
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function lihat($sampai,$dari){
		return $query = $this->db->get('dokter',$sampai,$dari)->result();
		
	}
 
	public function jumlah(){
		return $this->db->get('dokter')->num_rows();
	}

	public function jumlahSpesifik($where){
		//$data = $this->db->get()->num_rows();
		return $this->db->query('select * from dokter' . $where)->num_rows();
	}	

	public function lihatSpesifik($sampai,$dari,$where){
		return $query = $this->db->query('select * from dokter' . $where, $sampai, $dari )->result();
		
	}

	public function caridata($sampai,$dari){
		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get('dokter',$sampai,$dari);
		return $query->result(); 
 	}
}
