<?php
class Nasabah extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('nasabah_model');
        }

        public function index()
        {
                $data['news'] = $this->nasabah_model->get_news();
                $data['title'] = 'Daftar Nasabah';

                $this->load->view('templates/header', $data);
                $this->load->view('nasabah/index', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('ktp', 'KTP', 'required');

            $data['title'] = 'Input Data Nasabah';

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('nasabah/create');
                $this->load->view('templates/footer');

            }
            else
            {
                $this->nasabah_model->set_news();
                $this->load->view('nasabah/success');
            }
        }
}