<?php
class Doctors_model extends CI_Model {

        public function __construct()
        {
                $this->load->database('default');
        }

        public function get_doctors($username = FALSE)
		{
		        if ($username === FALSE)
		        {
		                $query = $this->db->get('dokter');
		                return $query->result_array();
		        }

		        $query = $this->db->get_where('dokter', array('Username' => $username));
		        return $query->row_array();
		}

		public function get_doctors2($KTP = FALSE)
		{

		        $query = $this->db->get_where('dokter', array('KTP' => $KTP));
		        return $query->row_array();
		}

		public function set_doctors($image = FALSE)
		{
				if($image == FALSE){
	        		$datas = array(
				        'KTP' => $this->input->post('ktp'),
				        'Username' => $this->input->post('username'),
				        'Password' => $this->input->post('password'),
				        'Foto' => 'profileblank.png',
				        'Nama' => $this->input->post('nama'),
				        'Email' => $this->input->post('email'),
				        'Gelar' => $this->input->post('gelar'),
				        'Bidang' => $this->input->post('bidang'),
				        'Info' => $this->input->post('info')
				    );
				}
				else{
					$datas = array(
				        'KTP' => $this->input->post('ktp'),
				        'Username' => $this->input->post('username'),
				        'Password' => $this->input->post('password'),
				        'Foto' => $image,
				        'Nama' => $this->input->post('nama'),
				        'Email' => $this->input->post('email'),
				        'Gelar' => $this->input->post('gelar'),
				        'Bidang' => $this->input->post('bidang'),
				        'Info' => $this->input->post('info')
				    );
				}

			    return $this->db->insert('dokter', $datas);
		}

		public function update_doctors($username,$image = FALSE)
		{
				if($image == FALSE){
					$datas = array(
				        'Nama' => $this->input->post('nama'),
				        'Email' => $this->input->post('email'),
				        'Gelar' => $this->input->post('gelar'),
				        'Bidang' => $this->input->post('bidang'),
				        'Info' => $this->input->post('info')
			    	);
				}
				else{
					$datas = array(
				        'Foto' => $image,
				        'Nama' => $this->input->post('nama'),
				        'Email' => $this->input->post('email'),
				        'Gelar' => $this->input->post('gelar'),
				        'Bidang' => $this->input->post('bidang'),
				        'Info' => $this->input->post('info')
			    	);
				}

				$this->db->where('Username', $username);
			    return $this->db->update('dokter', $datas);
		}

		public function delete_doctors($username = FALSE)
		{
		        return $this->db->delete('dokter', array('Username' => $username)); 
		}

		public function tambah_tempat($KTP = FALSE)
		{
	        	$datas = array(
				    'KTP' => $KTP,
				    'IDTPraktek' => $this->input->post('idtpraktek'),
				    'Senin' => $this->input->post('senin'),
				    'Selasa' => $this->input->post('selasa'),
				    'Rabu' => $this->input->post('rabu'),
				    'Kamis' => $this->input->post('kamis'),
				    'Jumat' => $this->input->post('jumat'),
				    'Sabtu' => $this->input->post('sabtu'),
				    'Minggu' => $this->input->post('minggu')
				);

			    return $this->db->insert('dokter_praktek', $datas);
		}

		public function tambah_penyakit($KTP = FALSE)
		{
	        	$datas = array(
				    'KTP' => $KTP,
				    'id_artikel' => $this->input->post('id_artikel'),
				);

			    return $this->db->insert('dokter_penyakit', $datas);
		}

		public function editjadwal($KTP,$idtpraktek)
		{
	        	$datas = array(
				    'Senin' => $this->input->post('senin'),
				    'Selasa' => $this->input->post('selasa'),
				    'Rabu' => $this->input->post('rabu'),
				    'Kamis' => $this->input->post('kamis'),
				    'Jumat' => $this->input->post('jumat'),
				    'Sabtu' => $this->input->post('sabtu'),
				    'Minggu' => $this->input->post('minggu')
				);

	        	$this->db->where('KTP',$KTP);
	        	$this->db->where('IDTPraktek',$idtpraktek);
			    return $this->db->update('dokter_praktek', $datas);
		}

		public function deletekerja($KTP,$idtpraktek)
		{
		        return $this->db->delete('dokter_praktek', array('KTP' => $KTP, 'IDTPraktek' => $idtpraktek)); 
		}

		public function get_doctor_penyakit($KTP,$idartikel = FALSE){
				if($idartikel == FALSE){
					$query = $this->db->get_where('dokter_penyakit', array('KTP' => $KTP));
		        	return $query->result_array();
				}
				else{
					$query = $this->db->get_where('dokter_penyakit', array('KTP' => $KTP, 'id_artikel' => $idartikel));
					return $query->row_array();
				}
		}
}