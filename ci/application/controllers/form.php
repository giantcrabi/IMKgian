<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {
	public function IsiRiwayat(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('nama_user', 'username', 'required');
		$this->form_validation->set_rules('nama_penyakit', 'NamaPenyakit', 'required');
		$this->form_validation->set_rules('tgl_sakit', 'TanggalSakit', 'required');
		$this->form_validation->set_rules('tgl_sembuh', 'TanggalSembuh', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if($this->form_validation->run()==FALSE){
			$this->load->view('riwayatkesehatan');
		}
		else{
			$this->load->view('formsukses');
		}
	}
}
?>