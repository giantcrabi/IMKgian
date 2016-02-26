<?php
class Nasabah_model extends CI_Model {

        public function __construct()
        {
                $this->load->database('default');
        }

        public function get_news($slug = FALSE)
		{
		        if ($slug === FALSE)
		        {
		                $query = $this->db->get('nasabah');
		                return $query->result_array();
		        }
		}

		public function set_news()
		{

		    $data = array(
		        'KTP' => $this->input->post('ktp'),
		        'Nama' => $this->input->post('nama'),
		        'Alamat' => $this->input->post('alamat'),
		        'Umur' => $this->input->post('umur'),
		        'StatusKawin' => $this->input->post('statuskawin'),
		        'Pekerjaan' => $this->input->post('pekerjaan'),
		        'SlipGaji' => $this->input->post('slipgaji')
		    );

		    return $this->db->insert('nasabah', $data);
		}
}