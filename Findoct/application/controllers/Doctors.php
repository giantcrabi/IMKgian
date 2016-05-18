<?php
class Doctors extends CI_Controller {

        function __construct()
        {
                parent::__construct();
                $this->load->helper('url_helper');
                $this->load->library('pagination');

                // $this->load->helper('url');
                // $this->load->helper('form');
                // // $this->load->library('form_validation');
                $this->load->model('Doctors_model');
                // $this->load->model('praktek_model');
                // $this->load->model('mymodel');
        }

        public function index($where = "")
        {       
                $data['dokter'] =$this->Doctors_model->GetAllDoctors($where);
                $data['title'] = 'Daftar Dokter';
                $data['data_gelar'] = $this->Doctors_model->GetAllGelar();

                $jumlah= $this->Doctors_model->jumlah();
 
                
                $config['base_url'] = base_url().'Doctors/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'Doctors/index/1';
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                
                $dari = $this->uri->segment(3,0);
                $data['dokter_page'] = $this->Doctors_model->lihat($config['per_page'],$dari);
                $this->pagination->initialize($config); 
                

                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('Doctors/index', $data);
                $this->load->view('templates/footer');


     
        }

        public function info($Email){

                $data['title'] = 'Info Dokter';
                
                $data['dokter'] = $this->Doctors_model->getDoctors(" where Email = '$Email'");
                $data['dokter_tpraktek'] = $this->Doctors_model->getDoctorsInfo(" Email = '$Email'");

                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('doctors/info', $data);
                $this->load->view('templates/footer');

        }

        public function filter($where){
                // $widget_id = str_replace(array('['?']'), '',$where);
                $replace  = str_replace("?","",$where);
                $replace2  = str_replace("%20"," ",$replace);
                // var_dump($widget_id);
                $where1 = array('Gelar' => $replace);

                $jumlah= $this->Doctors_model->jumlahSpesifik(" where Gelar = '$replace2'");
               // echo $jumlah;
                $data['data_gelar'] = $this->Doctors_model->GetAllGelar();
                
                $config['base_url'] = base_url().'Doctors/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'Doctors/index/1';
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                
                $dari = $this->uri->segment(3,0);
                $data['dokter_page'] = $this->Doctors_model->lihatSpesifik($config['per_page'],$dari, " where Gelar = '$replace2'");
                $this->pagination->initialize($config); 

                $data['dokter'] =$this->Doctors_model->GetAllDoctors($where);
                $data['title'] = 'Daftar Dokter '.$where;
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('doctors/index', $data);
                $this->load->view('templates/footer');

        }

        public function cari()
        {
            // $data['dokter_page'] = $this->Doctors_model->caridata();
             

                $data['data_gelar'] = $this->Doctors_model->GetAllGelar();

                $jumlah= $this->Doctors_model->jumlah();
 
                
                $config['base_url'] = base_url().'Doctors/index';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = 4;
                $config['uri_segment'] = 3;
                //$config['first_url'] = base_url().'Doctors/index/1';
                $config['full_tag_open'] = "<ul class='pagination'>";
                $config['full_tag_close'] ="</ul>";
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
                $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
                $config['next_tag_open'] = "<li>";
                $config['next_tagl_close'] = "</li>";
                $config['prev_tag_open'] = "<li>";
                $config['prev_tagl_close'] = "</li>";
                $config['first_tag_open'] = "<li>";
                $config['first_tagl_close'] = "</li>";
                $config['last_tag_open'] = "<li>";
                $config['last_tagl_close'] = "</li>";
                
                $dari = $this->uri->segment(3,0);
                $data['dokter_page'] = $this->Doctors_model->caridata($config['per_page'],$dari);
                if($data['dokter_page']<=$config['per_page']){$this->pagination->initialize($config);}

                if($data['dokter_page']==null) {
                echo "<script>
                alert('Maaf data yang anda cari tidak ada atau keywordnya salah');
                window.location.href='index';
                </script>";

                }
                else {
                $data['title'] = 'Hasil Pencarian Dokter';
                $this->load->view('templates/headmain', $data);
                $this->load->view('templates/header');
                $this->load->view('doctors/index', $data);
                $this->load->view('templates/footer');
                // $this->load->view('doctors/index',$data); 

                }
        }
        
}