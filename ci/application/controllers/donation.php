<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Donation extends CI_Controller {
 function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('form');
				$this->load->library('form_validation');
                $this->load->model('donat');
        }
 function index()
 {
 
    $data=$this->donat->getdonationdata();
    $this->load->view('donationform',array('data' => $data));
 }
 function insertion()
 {
  $data['error'] = array();
            $this->form_validation->set_rules('firstname','firstname','required');
            $this->form_validation->set_rules('lastname', 'lastname', 'required');
            $this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation-> set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('H_PhoneNumber', 'phonenumber', 'required');
			$this->form_validation->set_rules('amount', 'jumlahuang', 'required');
 
 
  
if ($this->form_validation->run() === FALSE)
    	{
      
                 $data=$this->donat->getdonationdata();
                $this->load->view('donationform',array('data' => $data));
            }
            else
			{
		$first= $this->input->post('firstname');
 $last= $this->input->post('lastname');
$query = $this->db->query("select * from donation where firstname='$first' and lastname='$last'");
			if ($query->num_rows()>0)
 {
  $data = array(
  
   'countrycode' => $this->input->post('country_code'),
   'city' => $this->input->post('city'),
   'email' => $this->input->post('email'),
   'phonenumber' => $this->input->post('H_PhoneNumber'),
  
);   
$tambah= $this->input->post('amount');
$this->db->set('jumlahuang', "jumlahuang+$tambah",false);
$this->db->where('firstname',$first);
$this->db->where('lastname',$last);
$this->db->update('donation',$data);
 }
 else {
 $data = array(

	
   'firstname' => $first, 
   'lastname' => $last ,
   'countrycode' => $this->input->post('country_code'),
   'city' => $this->input->post('city'),
   'email' => $this->input->post('email'),
   'phonenumber' => $this->input->post('H_PhoneNumber'),
   'jumlahuang' => intval($this->input->post('amount')),
   
);
   $this->db->insert('donation', $data);             
	redirect('donation');
				}}

						

}
}


?>