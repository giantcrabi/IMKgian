<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends CI_Controller {
 function __construct()
 {
   parent::__construct();
   $this->load->model('useries');
   $this->load->library('form_validation');
   $this->load->model('articleliburary');
   $this->load->helper(array('form'));
 }

 function index()
 {
 	if($this->session->userdata('logged_in')){
			
	        $session_data = $this->session->userdata('logged_in');
	        $donasi['firstname'] = $session_data['firstname'];
	        $donasi['lastname'] = $session_data['lastname'];
	        $donasi['email'] = $session_data['email'];
	       // $donasi['gender'] = $session_data['gender'];
	        $result=$this->anggota_model->riwayat($donasi['email']);
	        $donasi['user']=$result;
	    
		
 $data['error'] = NULL;
 $data['erroricu']= NULL;
	$data['donasi'] = $this->useries->userings($donasi['email']);
	$this->load->view('viewries/homepage_vision',$data);
}
 }

 function index2()
 {
 	if($this->session->userdata('logged_in')){
			
	        $session_data = $this->session->userdata('logged_in');
	        $donasi['firstname'] = $session_data['firstname'];
	        $donasi['lastname'] = $session_data['lastname'];
	        $donasi['email'] = $session_data['email'];
	       // $donasi['gender'] = $session_data['gender'];
	        
		
 	$data['erroricu'] = NULL;
	$result = $this->useries->userings($donasi['email']);
	$donasi['user'] = $result;
	$this->load->view('viewries/homepage_vision2',$donasi);
}
}
function index3()
 {
	$data['donasi'] = $this->useries->userings();
	$data['artic'] = $this->articleliburary->usau();
	//'where username = $donasi[username]'
	$this->load->view('viewries/homepage_vision3',$data);
}
function index4()
 {
 $data['error'] = NULL;		 
 $data['donasi'] = $this->useries->userings();
	$this->load->view('viewries/homepage_vision4', $data);
}


function insertion()
{
$data['error'] = array();
            $this->form_validation->set_rules('title','title of an arcticle','required');
            $this->form_validation->set_rules('fill', 'the fill of an article', 'required');

			if ($this->form_validation->run() === FALSE)
    	{$data['error'] ="error= pastikan semua terisi";
		$data['donasi'] = $this->useries->userings();
		$this->load->view('viewries/homepage_vision4', $data);}
		else{
$data = $this->useries->userings();
$res= $this->articleliburary->insertion('articles', array(
		"username" => $data['username'],
		"title" => $this->input->post('title'),
		"isi" => $this->input->post('fill')));
		
if($res >=1){
$data['error'] = "publishing sukses";

;}
else
{
$data['error'] = "publishing gagal pastikan nama artikel tak boleh sama";}
$data['donasi'] = $this->useries->userings();
$this->load->view('viewries/homepage_vision4', $data);}
	
}		
		

function update()
{
$data['errorpict']= array();
	$data['error'] = NULL;
            $this->form_validation->set_rules('firstname','firstname','required');
            $this->form_validation->set_rules('lastname', 'lastname', 'required');
            $this->form_validation->set_rules('email','email','required');
            $this->form_validation->set_rules('phonenumber', 'phonenumber', 'required');
$data['erroricu']= NULL;	

				if(!empty($_FILES['foto']['name'])){
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '500';
            $config['max_width']  = '1024';
            $config['max_height']  = '768';

            $this->load->library('upload');
            $this->upload->initialize($config);
}
	
if ($this->form_validation->run() === FALSE)
{

$data['error'] = "pastikan semua terisi dengan benar";
$data['donasi'] = $this->useries->userings();
	
		$this->load->view('viewries/homepage_vision', $data);
}
else{
/*if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                      $data= "error occured make sure you fill the blank correctly" ;
                        $this->load->view('doctors/formdoktor', $data);
                    }
else 
                    {
					if( !empty($_FILES['foto']['name'])
                        //$temp=$this->upload->data();
                        $image=$temp['file_name'];
                        $this->useries->($image);
                    }
					else
					{
					}*/
$res= $this->useries->update('users', array(
	"firstname" =>  $this->input->post('firstname'),
	"lastname" => $this->input->post('lastname'),
	"email" => $this->input->post('email'),
	"phonenumber" => $this->input->post('phonenumber'))
	, array(
	"username" => "hari"));
if($res >=1){
$data['error']= "update sukses";
}
else
{

$data['error']= "update gagal";
}
$data['donasi'] = $this->useries->userings();
$this->load->view('viewries/homepage_vision', $data);
}
}
function update2()
{
$data['error'] = NULL;
            $this->form_validation->set_rules('password','password','required');
            $this->form_validation->set_rules('newpass', 'new password', 'required');
            $this->form_validation->set_rules('newpassconf','new password confirmation','required');

$data['erroricu']= NULL;	
if ($this->form_validation->run() === FALSE)
{$data['erroricu'] = "pastikan semua terisi dengan benar";
$data['donasi'] = $this->useries->userings();
		$this->load->view('viewries/homepage_vision', $data);}
else{
if( $this->input->post('newpass') == $this->input->post('newpassconf'))
{$res= $this->useries->update('users', array(
	"password"=> $this->input->post('newpass'))
	, array(
	
	"password" => $this->input->post('password')));
if($res >=1){
$data['erroricu'] = "update sukses";
}
else
{
$data['erroricu']= "update gagal";}}
else { $data['erroricu']= "uncconfirmed password";}
$data['donasi'] = $this->useries->userings();
		$this->load->view('viewries/homepage_vision', $data);}
}
function update3()
{
$data['error'] = NULL;
            $this->form_validation->set_rules('firstname','firstname','required');
			$this->form_validation->set_rules('lastname','lastname','required');
            $this->form_validation->set_rules('gender','gender','required');
            $this->form_validation->set_rules('birthdate','birthdate','required');
			$this->form_validation->set_rules('country','country','required');
			//$this->form_validation->set_rules('city','city','required');
echo $this->input->post('gender');
		if ($this->form_validation->run() === FALSE)
{$data['error'] = "pastikan semua telah terisi";
$data['donasi'] = $this->useries->userings();
	$this->load->view('viewries/homepage_vision2',$data);}
	
else{
$res= $this->useries->update('users', array(
	"firstname" =>  $this->input->post('firstname'),
	"lastname" => $this->input->post('lastname'),
	"gender" => $this->input->post('gender'),
	"birthdate" => $this->input->post('birthdate'),
	"country" => $this->input->post('country'),
	"city" => $this->input->post('city')
	)
	, array(
	"username" => "hari"
	));
if($res >=1){
$data['error']="update sukses";}
else
{
$data['error']="update gagal";}
$data['donasi'] = $this->useries->userings();
	$this->load->view('viewries/homepage_vision2',$data);}

}

}