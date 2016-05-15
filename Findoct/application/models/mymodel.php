<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mymodel extends CI_Model {
	public function __construct()
    {
        $this->load->database('default');
    }
	public function GetArtikel($idpenyakit = FALSE){
		if($idpenyakit == FALSE){
			$data = $this->db->get('penyakit');
			return $data->result_array();
		}
		else{
			$data = $this->db->get_where('penyakit', array('id_artikel' => $idpenyakit));
		    return $data->row_array();
		}
	}

	public function InsertData($image = FALSE){
		if($image == FALSE){
	        $datas = array(
				'judul_artikel' => $this->input->post('judul_artikel'),
				'deskripsi_artikel' => $this->input->post('deskripsi_artikel'),
				'foto' => 'noimg.jpg'      
			);
		}
		else{
			$datas = array(
				'judul_artikel' => $this->input->post('judul_artikel'),
				'deskripsi_artikel' => $this->input->post('deskripsi_artikel'),
				'foto' => $image      
			);
		}

		return $this->db->insert('penyakit', $datas);
	}

	public function DeleteData($tabelNama, $where){
		$res = $this->db->delete($tabelNama, $where);
		return $res;
	}

	public function UpdateData($id_artikel,$image = FALSE){
		if($image == FALSE){
			$data_update = array (
				'judul_artikel' => $this->input->post('judul_artikel'),
				'deskripsi_artikel' => $this->input->post('deskripsi_artikel')
			);
		}
		else{
			$data_update = array (
				'judul_artikel' => $this->input->post('judul_artikel'),
				'deskripsi_artikel' => $this->input->post('deskripsi_artikel'),
				'foto' => $image
			);
		}
		$this->db->where('id_artikel',$id_artikel);
		$res =  $this->db->update('penyakit', $data_update);
		return $res;
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function login($username, $pass){
		$query = $this->db->get_where('user', array('username' => $username,'password' => $pass), 1);
        return $query;
	}

	public function GetNama($username){
		//$data = $this->db->query("select firstname, lastname from user where username='$username'");
		$this->db->select('firstname,lastname');
		$this->db->from('user');
		$where = "username='".$username."'";
		$this->db->where($where);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function get_penyakit_doctor($idartikel){
			$query = $this->db->get_where('dokter_penyakit', array('id_artikel' => $idartikel));
		    return $query->result_array();
	}
}
