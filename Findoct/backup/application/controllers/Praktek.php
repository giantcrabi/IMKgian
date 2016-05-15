<?php
class Praktek extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->model('praktek_model');
        }

        public function index()
        {
                $data['praktek'] = $this->praktek_model->get_praktek();
                $data['title'] = 'Daftar Tempat Praktek';

                $this->load->view('templates/header', $data);
                $this->load->view('praktek/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($idtpraktek = NULL)
        {
                $data['praktek_item'] = $this->praktek_model->get_praktek($idtpraktek);
                if (empty($data['praktek_item']))
                {
                        show_404();
                }

                $data['title'] = 'Info Tempat Praktek';

                $this->load->view('templates/header', $data);
                $this->load->view('praktek/view', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
            $data['title'] = 'Registrasi Tempat Praktek';
            $data['error'] = array();

            $this->form_validation->set_rules('namat', 'Nama Tempat', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|callback_alpha_dash_space_dot_natural');
            $this->form_validation->set_rules('kota', 'Kota', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required|is_natural');

            if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './uploads/tempatpraktek/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);
            }

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('praktek/formpraktek', $data);
            }
            else{
                if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                        $data['error'] = array($this->upload->display_errors());
                        $this->load->view('praktek/formpraktek', $data);
                    }
                else
                    {
                        if (!empty($_FILES['foto']['name'])){
                            $temp=$this->upload->data();
                            $image=$temp['file_name'];
                            $data['idtempat'] = $this->praktek_model->set_praktek($image);
                        }
                        else{
                            $data['idtempat'] = $this->praktek_model->set_praktek();
                        }
                        $this->load->view('praktek/success', $data);
                    }
            }
        }

        public function update_praktek($idtpraktek = NULL)
        {
            $data['praktek_item'] = $this->praktek_model->get_praktek($idtpraktek);
            if (empty($data['praktek_item']))
            {
                show_404();
            }
            $data['title'] = 'Edit Tempat Praktek';
            $data['error'] = array();

            $this->form_validation->set_rules('namat', 'Nama Tempat', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required|callback_alpha_dash_space_dot_natural');
            $this->form_validation->set_rules('kota', 'Kota', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('kodepos', 'Kode Pos', 'trim|required|is_natural');

            if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './uploads/tempatpraktek/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);
            }

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('praktek/updatepraktek', $data);
            }
            else{
                if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                        $data['error'] = array($this->upload->display_errors());
                        $this->load->view('praktek/updatepraktek', $data);
                    }
                else
                    {
                        if (!empty($_FILES['foto']['name'])){
                            $temp=$this->upload->data();
                            $image=$temp['file_name'];
                            $this->praktek_model->update_prak($idtpraktek,$image);
                        }
                        else{
                            $this->praktek_model->update_prak($idtpraktek);
                        }
                        $this->load->view('praktek/successup', $data);
                    }
            }
        }

        public function delete($idtpraktek = NULL){
            $this->praktek_model->delete_praktek($idtpraktek);
            $this->load->view('praktek/successdel');
        }

        public function alpha_dash_space($str)
        {
            return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
        }
        public function alpha_dash_space_dot_natural($str)
        {
            return ( ! preg_match("/^([-a-z_.0-9 ])+$/i", $str)) ? FALSE : TRUE;
        }
}