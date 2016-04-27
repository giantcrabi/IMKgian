<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gelar extends CI_Controller {
	function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->model('Crud','',True);
		$this->load->helper(array('url', 'form'));
	}

	public function index(){
		$data = $this->Crud->GetGelar();
		$this->load->view('Gelar/Gelar_Home',array('data'=>$data));
	}

	public function view_create_data(){
		$this->load->view('Gelar/Gelar_Create');

	}

	public function create_data(){
		$EMAIL = $_POST['EMAIL']; 
		$NAMA = $_POST['NAMA'];
		$data_insert = array(
			'Email' => $EMAIL,
			'Nama' => $NAMA,
		);
		
		$res = $this->Crud->InsertData('Gelar',$data_insert);
		if($res==1){
			redirect('Menu/Gelar/','refresh');
		}

	}

	public function view_update_data($Gelar){
		$temp = $this->Crud->GetGelar("where Gelar = '$Gelar'");
		$data = array(
			// "ID" => $temp[0]['ID'],
			"Gelar" => $temp[0]['Gelar'],
			"NamaGelar" => $temp[0]['NamaGelar'],
			);
		$this->load->view('Gelar/Gelar_Update',$data);
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
		$res = $this->Crud->UpdateData('Gelar', $data_insert, $where);
		if ($res==1){
			redirect('Menu/Gelar/','refresh');
		}
	}
}