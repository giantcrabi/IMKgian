<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Crud extends CI_Model {
//Start-Read
	public function GetAgama($where = "") {
		$data = $this->db->query('select * from agama' . $where);
		return $data->result_array();
	}
	public function GetAt($where = "") {
		$data = $this->db->query('select * from alat_transportasi' . $where);
		return $data->result_array();
	}
	public function GetBl($where = "") {
		$data = $this->db->query('select * from based_line' . $where);
		return $data->result_array();
	}
	public function GetCk($where = "") {
		$data = $this->db->query('select * from ciri_kepribadian' . $where);
		return $data->result_array();
	}
	public function GetDa($where = "") {
		$data = $this->db->query('select * from data_asesmen' . $where);
		return $data->result_array();
	}
	public function GetDjk($where = "") {
		$data = $this->db->query('select * from detil_jurnal_kelas' . $where);
		return $data->result_array();
	}
	public function GetDjm($where = "") {
		$data = $this->db->query('select * from detil_jurnal_materi' . $where);
		return $data->result_array();
	}
	public function GetDk($where = "") {
		$data = $this->db->query('select * from detil_kebutuhan' . $where);
		return $data->result_array();
	}
	public function GetDp($where = "") {
		$data = $this->db->query('select * from detil_penempatan' . $where);
		return $data->result_array();
	}
	public function GetDrs($where = "") {
		$data = $this->db->query('select * from detil_rombel_siswa' . $where);
		return $data->result_array();
	}
	public function GetGuru($where = "") {
		$data = $this->db->query('select * from guru ' . $where);
		return $data->result_array();
	}
	public function GetHa($where = "") {
		$data = $this->db->query('select * from hasil_asesmen' . $where);
		return $data->result_array();
	}
	public function GetImunisasi($where = "") {
		$data = $this->db->query('select * from imunisasi' . $where);
		return $data->result_array();
	}
	public function GetIk($where = "") {
		$data = $this->db->query('select * from indikator_keberhasilan' . $where);
		return $data->result_array();
	}
	public function GetJt($where = "") {
		$data = $this->db->query('select * from jenis_tinggal' . $where);
		return $data->result_array();
	}
	public function GetJp($where = "") {
		$data = $this->db->query('select * from jenjang_pendidikan' . $where);
		return $data->result_array();
	}
	public function GetJk($where = "") {
		$data = $this->db->query('select * from jurnal_kelas' . $where);
		return $data->result_array();
	}
	public function GetJm($where = "") {
		$data = $this->db->query('select * from jurnal_materi' . $where);
		return $data->result_array();
	}
	public function GetJps($where = "") {
		$data = $this->db->query('select * from jurnal_pribadi_siswa' . $where);
		return $data->result_array();
	}
	public function GetKk($where = "") {
		$data = $this->db->query('select * from kebutuhan_khusus' . $where);
		return $data->result_array();
	}
	public function GetKsiswa($where = "") {
		$data = $this->db->query('select * from kebutuhan_siswa' . $where);
		return $data->result_array();
	}
	public function GetKeckom($where = "") {
		$data = $this->db->query('select * from kecakapan_kompensatoris' . $where);
		return $data->result_array();
	}
	public function GetKes($where = "") {
		$data = $this->db->query('select * from kekuatan_siswa' . $where);
		return $data->result_array();
	}
	public function GetKt($where = "") {
		$data = $this->db->query('select * from kelainantubuh' . $where);
		return $data->result_array();
	}
	public function GetMp($where = "") {
		$data = $this->db->query('select * from mata_pelajaran' . $where);
		return $data->result_array();
	}
	public function GetPekerjaan($where = "") {
		$data = $this->db->query('select * from pekerjaan' . $where);
		return $data->result_array();
	}
	public function GetPenghasilan($where = "") {
		$data = $this->db->query('select * from penghasilan' . $where);
		return $data->result_array();
	}
	public function GetPt($where = "") {
		$data = $this->db->query('select * from personal_terlibat' . $where);
		return $data->result_array();
	}
	public function GetPpi($where = "") {
		$data = $this->db->query('select * from ppi ' . $where);
		return $data->result_array();
	}
	public function GetPlk($where = "") {
		$data = $this->db->query('select * from program_layanan_kompensatoris' . $where);
		return $data->result_array();
	}
	public function GetRkksw($where = "") {
		$data = $this->db->query('select * from rel_kebkhusus_sw' . $where);
		return $data->result_array();
	}
	public function GetRpsw($where = "") {
		$data = $this->db->query('select * from rel_kepribadian_sw' . $where);
		return $data->result_array();
	}
	public function GetRombel($where = "") {
		$data = $this->db->query('select * from rombel' . $where);
		return $data->result_array();
	}
	public function GetSk($where = "") {
		$data = $this->db->query('select * from saudara_kandung' . $where);
		return $data->result_array();
	}
	public function GetSiswa($where = " where NIS and NISN is not null") {
		$data = $this->db->query('select * from siswa' . $where);
		return $data->result_array();
	}

	public function ViewSiswa($where = "") {
		$data = $this->db->query('select * from siswa where NIS and NISN ');
		return $data->result_array();
	}
	public function GetTp($where = "") {
		$data = $this->db->query('select * from tim_pengembang' . $where);
		return $data->result_array();
	}
	public function GetUk($where = "") {
		$data = $this->db->query('select * from uraian_kegiatan' . $where);
		return $data->result_array();
	}
	public function GetWm($where = "") {
		$data = $this->db->query('select * from wali_murid' . $where);
		return $data->result_array();
	}
	public function GetWarganegara($where = "") {
		$data = $this->db->query('select * from warganegara' . $where);
		return $data->result_array();
	}
	public function GetPendaftar() {
		//$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
		//$data = $this->db->get('siswa');
		$data = $this->db->query('select * from siswa where NIS is null and NISN is null');
		//var_dump($data);
		return $data->result_array();
	}
//End-Read

//Start-Delete
	public function DeleteData($tableName, $where) {
		$res = $this->db->delete($tableName, $where);
		return $res;
	}
//End-Delete

//Start-Update
	public function UpdateData($tableName, $data, $where) {
		$res = $this->db->update($tableName, $data, $where);
		return $res;
	}
//End-Update

//Start-Insert
	public function InsertData($tableName, $data) {
		$res = $this->db->insert($tableName, $data);
		return $res;
	}
//End-Insert
}