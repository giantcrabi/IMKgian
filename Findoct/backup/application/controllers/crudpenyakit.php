<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crudpenyakit extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->model('mymodel');
		$this->load->model('doctors_model');
	}
	public function IsiRiwayat(){
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		if($this->form_validation->run()==FALSE){
			$this->load->view('riwayatkesehatan');
		}
		else{
			$this->load->view('formsukses');
		}
		//$this->load->view('riwayatkesehatan');
		//$this->mymodel->InsertData('riwayatkesehatan');
	}
	public function tampil_penyakit($idpenyakit = FALSE){
		if($idpenyakit == FALSE){
			$data['penyakit'] = $this->mymodel->GetArtikel();
			$this->load->view('penyakit/penyakit.php', $data);
		}
		else{
			$data['penyakit_doctor'] = $this->mymodel->get_penyakit_doctor($idpenyakit);
                if(!empty($data['penyakit_doctor'])) {
                    $data['nama_dokter'] = array();
                    $i = 0;
                    foreach ($data['penyakit_doctor'] as $value) {
                        $data['nama_dokter'][$i] = $this->doctors_model->get_doctors2($value['KTP']);
                        $i++;
                    }
                }
			$data['d'] = $this->mymodel->GetArtikel($idpenyakit);
			$this->load->view('penyakit/currpenyakit', $data);
		}
	}

	public function do_insert()
        {
            $data['error'] = array();

            $this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'trim|required');
        	$this->form_validation->set_rules('deskripsi_artikel', 'Deksripsi Artikel', 'trim|required');

            if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './uploads/penyakit/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);
            }

            if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('penyakit/tambah_penyakit', $data);
            }
            else{
                if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                        $data['error'] = array($this->upload->display_errors());
                        $this->load->view('penyakit/tambah_penyakit', $data);
                    }
                else
                    {
                        if (!empty($_FILES['foto']['name'])){
                            $temp=$this->upload->data();
                            $image=$temp['file_name'];
                            $this->mymodel->InsertData($image);
                        }
                        else{
                            $this->mymodel->InsertData();
                        }
                        echo "<script>";
						echo 'alert("Insert Berhasil");';
						echo "window.location.href = './tampil_penyakit'";
						echo "</script>";
						exit;
                    }
            }
        }

	public function do_delete($id_artikel){
		$where = array('id_artikel' => $id_artikel);
		$hasil = $this->mymodel->DeleteData('penyakit', $where);
		if($hasil>=1){
			redirect('crudpenyakit/tampil_penyakit/');
		}
		else{
			echo "gagal";
		}

	}

	public function do_update($id_artikel){
		//echo "<pre>";
		//print_r($_POST);
		//echo "</pre>";
		$data['error'] = array();

		$data['update'] = $this->mymodel->GetArtikel($id_artikel);
		$this->form_validation->set_rules('judul_artikel', 'Judul Artikel', 'trim|required');
        $this->form_validation->set_rules('deskripsi_artikel', 'Deksripsi Artikel', 'trim|required');

        if (!empty($_FILES['foto']['name'])){
                $config['upload_path'] = './uploads/penyakit/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '500';
                $config['max_width']  = '1024';
                $config['max_height']  = '768';

                $this->load->library('upload');
                $this->upload->initialize($config);
            }

        if ($this->form_validation->run() === FALSE)
            {
                $this->load->view('penyakit/update_penyakit', $data);
            }
        else{
                if( !empty($_FILES['foto']['name']) && !$this->upload->do_upload('foto'))
                    {
                        $data['error'] = array($this->upload->display_errors());
                        $this->load->view('penyakit/tambah_penyakit', $data);
                    }
                else
            	{
	                if (!empty($_FILES['foto']['name'])){
	                    $temp=$this->upload->data();
	                    $image=$temp['file_name'];
	                    $this->mymodel->UpdateData($id_artikel,$image);
	                }
	                else{
	                    $this->mymodel->UpdateData($id_artikel);
	                }
                        echo "<script>";
						echo 'alert("Insert Berhasil");';
						echo "window.location.href = '../tampil_penyakit/'";
						echo "</script>";
						exit;
                }
			}
		}
	public function cek_login(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$result = $this->mymodel->login($username, $password);
		if($result->num_rows()){
			$array = array(
                   'username'  => $username,
                   'password' => $password,
                   'logged_in' => TRUE
               );
			//$this->session->set_userdata('logged_in',$array);
			$this->session->set_userdata($array);
			//redirect('/crudpenyakit/IsiRiwayat');
			$session_data = $this->session->all_userdata();
			$user = $session_data['username'];

//
			$data['namauser'] = $this->mymodel->GetNama($user);

			/*echo "<pre>";
			print_r($data);
			echo "</pre>";*/
			/*$firstname = $data['firstname'];
			$lastname = $data['lastname'];
			echo "$firstname"."$lastname";*/

			//redirect("/crudpenyakit/tambah_penyakit")
			//echo "Ini username dari user : $data";
			$this->load->view('tambah_penyakit', $data);
		}
		else
		{
			echo "gagal masuk";
		}
	}

	/*public function GetUser(){
		$this->mymodel->GetNama();
	}*/
}