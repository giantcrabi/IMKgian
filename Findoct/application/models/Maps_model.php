<?php
class Maps_model extends CI_Model {

        public function __construct()
        {
                $this->load->database('default');
        }

        public function get_doc($email){
	        	$query = $this->db->get_where('dokter', array('Email' => $email));
	        	return $query->row_array();
        }

        public function get_doctors($gelar){
        		$query = $this->db->get_where('dokter', array('Gelar' => $gelar));
        		return $query->result_array();
        }

        public function get_maps($username)
		{
		        $this->db->select('TPRAKTEK.IDTPRAKTEK AS IDT,NAMATPRAKTEK,ALAMAT,KOTA,PROVINSI,KODEPOS',FALSE);
		        $this->db->from('TPRAKTEK');
		        $this->db->join('DOKTER_TPRAKTEK','TPRAKTEK.IDTPraktek = DOKTER_TPRAKTEK.IDTPraktek','inner');
		        $where = "TPRAKTEK.`IDTPRAKTEK` IN(SELECT IDTPRAKTEK FROM DOKTER_TPRAKTEK WHERE KTP=(SELECT KTP FROM DOKTER WHERE USERNAME='".$username."'))";
		        $this->db->where($where);
		        $query = $this->db->get();
		        return $query->result_array();
		}

		public function get_specific_maps($idtpraktek){
				$this->db->select('TPRAKTEK.IDTPRAKTEK AS IDT,NAMATPRAKTEK,ALAMAT,KOTA,PROVINSI,KODEPOS',FALSE);
		        $this->db->from('TPRAKTEK');
		        $this->db->join('DOKTER_TPRAKTEK','TPRAKTEK.IDTPraktek = DOKTER_TPRAKTEK.IDTPraktek','inner');
		        $where = "TPRAKTEK.`IDTPRAKTEK` ='".$idtpraktek."'";
			    $this->db->where($where);
			    $query = $this->db->get();
			    return $query->row_array();
		}

		public function get_tpraktek($doctors){
				$this->db->select('TPRAKTEK.IDTPRAKTEK AS IDT,EMAIL,NAMATPRAKTEK,ALAMAT,KOTA,PROVINSI,KODEPOS',FALSE);
				$this->db->from('TPRAKTEK');
		        $this->db->join('DOKTER_TPRAKTEK','TPRAKTEK.IDTPraktek = DOKTER_TPRAKTEK.IDTPraktek','inner');
		        $where = "TPRAKTEK.`IDTPRAKTEK` IN(SELECT IDTPRAKTEK FROM DOKTER_TPRAKTEK WHERE EMAIL IN ('";
		        for($i = 0, $size = count($doctors); $i < $size; ++$i) {

		        	if($i == $size - 1){
		        		$where .= $doctors[$i]['Email'];
		        	}
		        	else{
		        		$where .= $doctors[$i]['Email']."','";
		        	}
				}
		        $where .= "')) AND DOKTER_TPRAKTEK.`Email` IN ('";
				for($i = 0, $size = count($doctors); $i < $size; ++$i) {

		        	if($i == $size - 1){
		        		$where .= $doctors[$i]['Email'];
		        	}
		        	else{
		        		$where .= $doctors[$i]['Email']."','";
		        	}
				}
				$where .= "')";
				$this->db->where($where);
		        $query = $this->db->get();
		        return $query->result_array();
		}
}