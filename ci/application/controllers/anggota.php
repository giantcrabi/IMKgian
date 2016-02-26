<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
 		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model('anggota_model');
        $this->load->model('doctors_model');
        //$this->load->model('articleliburary');

		
	}
	public function index()
	{
		$this->load->view('anggota/index');
	}
	
	public function pendaftaran()
	{
		$this->load->view('template/header');
		$this->load->view('anggota/pendaftaran');

		// $this->load->view('template/header_petugas');
		// $this->load->view('petugas/petugas_pendaftaran');
		// $this->load->view('template/footer');
	}
	public function daftar()
	{
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$gender=$_POST['gender'];
		$birthday=$_POST['birthday'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$retval=$this->anggota_model->insert_entry($firstname,$lastname,$gender,$birthday,$email,$password);
		if($retval){
			$arr = array('status' => "Success");
			echo json_encode($arr);
		}
		else
		{
			$arr = array('status' => "failed");
			echo json_encode($arr);
		}
	}
	public function masuk()
	{
		$this->load->view('template/header');
		$this->load->view('anggota/index');
	}
	/*public function cek_login()
	{
		
		$email=$_POST['email'];
		$password=$_POST['password'];
		$result=$this->anggota_model->login($email,$password);
		if($result->num_rows()){
			$array = array(
                   'email'  => $email,
                   'logged_in' => TRUE,
                   'firstname' => $result->result()[0]->firstname,
                   'lastname' =>$result->result()[0]->lastname,
                   'hak' => 'anggota'
               );
			$this->session->set_userdata('logged_in',$array);
			
			redirect('/anggota/riwayat'); //ini harus dirubah ke homepage user
		}
		else
		{
			redirect('/anggota/masuk?login=failed');
		}
		
	}*/
	public function cek_login()
	{
		
		$username=$_POST['username'];
		$password=$_POST['password'];
		$resultanggota=$this->anggota_model->login($username,$password);
		$resultdokter = $this->doctors_model->login($username,$password);
		if(count($resultanggota) > 0){
			$array = array(
                   'username'  => $username,
                   'logged_in' => TRUE,
                   
                   'hak' => 'anggota'
               );
			$this->session->set_userdata($array);
		}
		else if(count($resultdokter) > 0){
			$array = array(
                   'username' => $username,
                   'logged_in' => TRUE,
                   'hak' => 'petugas'
               );
			$this->session->set_userdata($array);
		}
		else
		{
			redirect('/anggota/masuk?login=failed');
		}
		
	}
	public function log_out(){
		$this->session->sess_destroy();
		redirect('/anggota/masuk');
	}


	public function riwayat()
	{ 

		if($this->session->userdata('logged_in')){
			
	        $session_data = $this->session->userdata('logged_in');
	        $donasi['firstname'] = $session_data['firstname'];
	        $donasi['lastname'] = $session_data['lastname'];
	        $donasi['email'] = $session_data['email'];
	       // $donasi['gender'] = $session_data['gender'];
	        $result=$this->anggota_model->riwayat($donasi['email']);
	        $donasi['user']=$result;
	    
	        $this->load->view('template/header');
	        //$this->load->view('template/sidebar');		
			$this->load->view('anggota/homepage_vision',$donasi);	
		}
		else
		{
			redirect('/anggota/masuk');
		}
	}
	public function reservasi()
	{
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
	        $data['user'] = $session_data['nama'];
	        $data['noktp'] = $session_data['noktp'];
	    
	        $this->load->view('template/header');
	        $this->load->view('template/sidebar');		
			$this->load->view('anggota/reservasi',$data);	
		}
		else
		{
			redirect('/anggota/masuk');
		}
	}

	public function booking()
	{
		$id_p['new']=$this->anggota_model->check_id();
		$reservation  = $_POST['reservation'];
		$tanggal = explode(" - ", $reservation);
		
		$t1 = explode("/", $tanggal[0]);
		$t2 = explode("/", $tanggal[1]);

		$id_peminjaman=$id_p['new'];
		$tanggal_peminjaman=$t1[2] . '-' . $t1[0] . '-' . $t1[1];
		$tanggal_pengembalian=$t2[2] . '-' . $t2[0] . '-' . $t2[1];
		$noktp=$_POST['noktp'];
		$jml1=$_POST['jml1'];
		$jml2=$_POST['jml2'];
		$jml3=$_POST['jml3'];
		$jml4=$_POST['jml4'];
		$biaya=$_POST['biaya'];
		$status="booking";
		$retval=$this->anggota_model->booking_sepeda($id_peminjaman,$noktp,$tanggal_peminjaman,$tanggal_pengembalian,$jml1,$jml2,$jml3,$jml4,$biaya,$status);
		if($retval){
			$arr = array('status' => "sukses");
			echo json_encode($arr);
			redirect(site_url().'/anggota/reservasi?status=sukses&id='.$id_peminjaman);
		}
		else
		{
			$arr = array('status' => "gagal");
			echo json_encode($arr);
			redirect(site_url().'/anggota/reservasi?status=gagal');
		}
	}

}
