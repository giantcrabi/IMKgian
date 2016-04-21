<?php
class Maps_model extends CI_Model {

        public function __construct()
        {
                $this->load->database('default');
        }

        public function get_docname($username){
	        	$query = $this->db->get_where('dokter', array('Username' => $username));
	        	return $query->row_array();
        }

        public function get_maps($username)
		{
		        $this->db->select('TPRAKTEK.IDTPRAKTEK AS IDT,NAMAT,ALAMAT,KOTA,PROVINSI,KODEPOS,SENIN,SELASA,RABU,KAMIS,JUMAT,SABTU,MINGGU',FALSE);
		        $this->db->from('TPRAKTEK');
		        $this->db->join('DOKTER_PRAKTEK','TPRAKTEK.IDTPraktek = DOKTER_PRAKTEK.IDTPraktek','inner');
		        $where = "TPRAKTEK.`IDTPRAKTEK` IN(SELECT IDTPRAKTEK FROM DOKTER_PRAKTEK WHERE KTP=(SELECT KTP FROM DOKTER WHERE USERNAME='".$username."'))";
		        $this->db->where($where);
		        $query = $this->db->get();
		        return $query->result_array();
		}

		public function get_specific_maps($idtpraktek){
				$this->db->select('TPRAKTEK.IDTPRAKTEK AS IDT,NAMAT,ALAMAT,KOTA,PROVINSI,KODEPOS,SENIN,SELASA,RABU,KAMIS,JUMAT,SABTU,MINGGU',FALSE);
		        $this->db->from('TPRAKTEK');
		        $this->db->join('DOKTER_PRAKTEK','TPRAKTEK.IDTPraktek = DOKTER_PRAKTEK.IDTPraktek','inner');
		        $where = "TPRAKTEK.`IDTPRAKTEK` ='".$idtpraktek."'";
			    $this->db->where($where);
			    $query = $this->db->get();
			    return $query->row_array();
		}
}