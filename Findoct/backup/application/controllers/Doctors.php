<?php
class Doctors extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->library('form_validation');
                $this->load->model('doctors_model');
                $this->load->model('praktek_model');
                $this->load->model('mymodel');
        }

        public function index()
        {
                $data['doctors'] = $this->doctors_model->get_doctors();
                $data['title'] = 'Daftar Dokter';

                $this->load->view('templates/header', $data);
                $this->load->view('doctors/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($username = NULL)
        {
                $data['title'] = 'About';
                $data['doctors_item'] = $this->doctors_model->get_doctors($username);
                $data['penyakit'] = $this->mymodel->GetArtikel();
                if (empty($data['doctors_item']))
                {
                        show_404();
                }
                $data['doctor_praktek'] = $this->praktek_model->get_doctor_praktek($data['doctors_item']['KTP']);
                if(!empty($data['doctor_praktek'])) {
                    $data['nama_praktek'] = array();
                    $i = 0;
                    foreach ($data['doctor_praktek'] as $value) {
                        $data['nama_praktek'][$i] = $this->praktek_model->get_praktek($value['IDTPraktek']);
                        $i++;
                    }
                }
                $data['doctor_penyakit'] = $this->doctors_model->get_doctor_penyakit($data['doctors_item']['KTP']);
                if(!empty($data['doctor_penyakit'])) {
                    $data['nama_penyakit'] = array();
                    $j = 0;
                    foreach ($data['doctor_penyakit'] as $value) {
                        $data['nama_penyakit'][$j] = $this->mymodel->GetArtikel($value['id_artikel']);
                        $j++;
                    }
                }
                $this->form_validation->set_rules('id_artikel', 'ID Artikel', 'trim|required|is_unique[dokter_penyakit.id_artikel]');
                $this->load->view('templates/header', $data);
                if ($this->form_validation->run() != FALSE)
                {
                    $this->doctors_model->tambah_penyakit($data['doctors_item']['KTP']);
                }
                $this->load->view('doctors/view', $data);
                $this->load->view('templates/footer');
        }

        public function create()
        {
            $data['title'] = 'Doctor Registration';
            $data['error'] = array();

            $this->form_validation->set_rules('ktp', 'KTP', 'trim|required|is_natural|exact_length[16]|is_unique[dokter.KTP]');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|min_length[5]|max_length[20]|is_unique[dokter.Username]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|alpha_numeric|min_length[5]|max_length[20]|matches[passconf]|md5');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('gelar', 'Gelar', 'trim|required');
            $this->form_validation->set_rules('bidang', 'Bidang', 'trim|required');

            if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './uploads/doctors/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);
            }

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('doctors/formdoktor', $data);
            }
            else{
                if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                        $data['error'] = array($this->upload->display_errors());
                        $this->load->view('doctors/formdoktor', $data);
                    }
                else
                    {
                        if (!empty($_FILES['foto']['name'])){
                            $temp=$this->upload->data();
                            $image=$temp['file_name'];
                            $this->doctors_model->set_doctors($image);
                        }
                        else{
                            $this->doctors_model->set_doctors();
                        }
                        $data['user'] = $this->input->post('username');
                        $this->load->view('doctors/success', $data);
                    }
            }
        }

        public function update_profile($username = NULL)
        {
            $data['doctors_item'] = $this->doctors_model->get_doctors($username);
            if (empty($data['doctors_item']))
            {
                show_404();
            }
            $data['title'] = 'Edit Profile';
            $data['error'] = array();

            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|callback_alpha_dash_space');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('gelar', 'Gelar', 'trim|required');
            $this->form_validation->set_rules('bidang', 'Bidang', 'trim|required');

            if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './uploads/doctors/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);
            }

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('doctors/updateprof', $data);
            }
            else{
                if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                        $data['error'] = array($this->upload->display_errors());
                        $this->load->view('doctors/updateprof', $data);
                    }
                else
                    {
                        if (!empty($_FILES['foto']['name'])){
                            $temp=$this->upload->data();
                            $image=$temp['file_name'];
                            $this->doctors_model->update_doctors($username,$image);
                        }
                        else{
                            $this->doctors_model->update_doctors($username);
                        }
                        $this->load->view('doctors/successup', $data);
                    }
            }
        }

        public function tempat_kerja($username = NULL){
            $data['praktek'] = $this->praktek_model->get_praktek();
            $data['doctors_item'] = $this->doctors_model->get_doctors($username);
            $data['title'] = 'Tempat dan Jadwal Praktek'.' '.$data['doctors_item']['Nama'].', '.$data['doctors_item']['Gelar'];

            $this->form_validation->set_rules('idtpraktek', 'ID Tempat Praktek', 'trim|required|is_unique[dokter_praktek.IDTPraktek]');
            $this->form_validation->set_rules('senin', 'Senin', 'trim|callback_time');
            $this->form_validation->set_rules('selasa', 'Selasa', 'trim|callback_time');
            $this->form_validation->set_rules('rabu', 'Rabu', 'trim|callback_time');
            $this->form_validation->set_rules('kamis', 'Kamis', 'trim|callback_time');
            $this->form_validation->set_rules('jumat', 'Jumat', 'trim|callback_time');
            $this->form_validation->set_rules('sabtu', 'Sabtu', 'trim|callback_time');
            $this->form_validation->set_rules('minggu', 'Minggu', 'trim|callback_time');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('doctors/tempatkerja', $data);
            }
            else{
                $this->doctors_model->tambah_tempat($data['doctors_item']['KTP']);
                $this->load->view('doctors/successup', $data);
            }
        }

        public function edit_jadwal($username,$idtkerja){
            $data['doctors_item'] = $this->doctors_model->get_doctors($username);
            $data['doctor_praktek'] = $this->praktek_model->get_doctor_praktek($data['doctors_item']['KTP'],$idtkerja);
            $data['praktek_item'] = $this->praktek_model->get_praktek($idtkerja);
            $data['title'] = 'Tempat dan Jadwal Praktek'.' '.$data['doctors_item']['Nama'].', '.$data['doctors_item']['Gelar'];

            $this->form_validation->set_rules('senin', 'Senin', 'trim|callback_time');
            $this->form_validation->set_rules('selasa', 'Selasa', 'trim|callback_time');
            $this->form_validation->set_rules('rabu', 'Rabu', 'trim|callback_time');
            $this->form_validation->set_rules('kamis', 'Kamis', 'trim|callback_time');
            $this->form_validation->set_rules('jumat', 'Jumat', 'trim|callback_time');
            $this->form_validation->set_rules('sabtu', 'Sabtu', 'trim|callback_time');
            $this->form_validation->set_rules('minggu', 'Minggu', 'trim|callback_time');

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('doctors/updatejadwal', $data);
            }
            else{
                $this->doctors_model->editjadwal($data['doctors_item']['KTP'],$idtkerja);
                $this->load->view('doctors/successupjdwl', $data);
            }
        }

        public function delete($username = NULL){
            $this->doctors_model->delete_doctors($username);
            $this->load->view('doctors/successdel');
        }

        public function delete_kerja($username,$idtkerja){
            $data['doctors_item'] = $this->doctors_model->get_doctors($username);
            $this->doctors_model->deletekerja($data['doctors_item']['KTP'],$idtkerja);
            $this->load->view('doctors/successupjdwl', $data);
        }

        public function alpha_dash_space($str)
        {
            return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
        } 
        public function time($str)
        {
            return ( ! preg_match("/^([-0-9: ])*$/i", $str)) ? FALSE : TRUE;
        } 
}