<?php
class Praktek_model extends CI_Model {

        public function __construct()
        {
                $this->load->database('default');
        }

        public function get_praktek($idtpraktek = FALSE)
		{
		        if ($idtpraktek === FALSE)
		        {
		                $query = $this->db->get('tpraktek');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('tpraktek', array('IDTPraktek' => $idtpraktek));
		        return $query->row_array();
		}

		public function set_praktek($image = FALSE)
		{
				if($image == FALSE){
	        		$datas = array(
				        'NamaT' => $this->input->post('namat'),
				        'Foto' => 'noimg.jpg',
				        'Alamat' => $this->input->post('alamat'),
				        'Kota' => $this->input->post('kota'),
				        'Provinsi' => $this->input->post('provinsi'),
				        'KodePos' => $this->input->post('kodepos')
				    );
				}
				else{
					$datas = array(
				        'NamaT' => $this->input->post('namat'),
				        'Foto' => $image,
				        'Alamat' => $this->input->post('alamat'),
				        'Kota' => $this->input->post('kota'),
				        'Provinsi' => $this->input->post('provinsi'),
				        'KodePos' => $this->input->post('kodepos')
				    );
				}

			    $this->db->insert('tpraktek', $datas);
			    return $this->db->insert_id();
		}

		public function update_prak($idtpraktek,$image = FALSE)
		{
				if($image == FALSE){
					$datas = array(
				        'NamaT' => $this->input->post('namat'),
				        'Alamat' => $this->input->post('alamat'),
				        'Kota' => $this->input->post('kota'),
				        'Provinsi' => $this->input->post('provinsi'),
				        'KodePos' => $this->input->post('kodepos')
			    	);
				}
				else{
					$datas = array(
				        'Foto' => $image,
				        'NamaT' => $this->input->post('namat'),
				        'Alamat' => $this->input->post('alamat'),
				        'Kota' => $this->input->post('kota'),
				        'Provinsi' => $this->input->post('provinsi'),
				        'KodePos' => $this->input->post('kodepos')
			    	);
				}

				$this->db->where('IDTPraktek', $idtpraktek);
			    return $this->db->update('tpraktek', $datas);
		}

		public function delete_praktek($idtpraktek = FALSE)
		{
		        return $this->db->delete('tpraktek', array('IDTPraktek' => $idtpraktek)); 
		}

		public function get_doctor_praktek($KTP,$idtpraktek = FALSE){
				if($idtpraktek == FALSE){
					$query = $this->db->get_where('dokter_praktek', array('KTP' => $KTP));
		        	return $query->result_array();
				}
				else{
					$query = $this->db->get_where('dokter_praktek', array('KTP' => $KTP, 'IDTPraktek' => $idtpraktek));
					return $query->row_array();
				}
		}
}