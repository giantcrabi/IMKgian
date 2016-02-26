<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');   
    }
	public function index()
	{
        //$this->load->helper('url');
        $this->load->view('home');
      /* $this->load->view('header');
        $this->load->view('body');
        $this->load->view('footer');*/
	}
    
    public function ShowImage(){
           
    }
    
    public function printMessage($id){
        
    }
}
