<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {
	function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->model('Crud','',TRUE);
		$this->load->helper(array('url', 'form'));
	}

	public function index(){
		$data = $this->Crud->GetDokter();
		$this->load->view('Dokter/Dokter_Home',array('data'=>$data));
	}

	public function view_create_data(){
		$this->load->view('Dokter/Dokter_Create');

	}

	public function create_data(){
		$EMAIL = $_POST['EMAIL']; 
		$NAMA = $_POST['NAMA'];
		$data_insert = array(
			'Email' => $EMAIL,
			'Nama' => $NAMA,
		);
		
		$res = $this->Crud->InsertData('dokter',$data_insert);
		if($res==1){
			redirect('Menu/Dokter/','refresh');
		}

	}

	public function view_update_data($Email){
		$temp = $this->Crud->GetDokter("where Email = '$Email'");
		$data = array(
			// "ID" => $temp[0]['ID'],
			"Nama" => $temp[0]['Nama'],
			"Email" => $temp[0]['Email'],
			);
		$this->load->view('Dokter/Dokter_Update',$data);
	}

	public function update_data(){
		// $ID = $_POST['ID']; 
		$EMAIL = $_POST['Email']; 
		$NAMA = $_POST['Nama'];
		$data_insert = array(
			'Email' => $EMAIL,
			'Nama' => $NAMA,
		);
		$where = array('Email'=>$EMAIL);
		$res = $this->Crud->UpdateData('dokter', $data_insert, $where);
		if ($res==1){
			redirect('Menu/Dokter/','refresh');
		}
	}


}