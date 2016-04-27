<?php
class Nyoba extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
        }

        public function index()
        {
                $data['title'] = 'Nyoba Bootstrap';

                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('nyoba/home');
                $this->load->view('templates/footer');
        }
}