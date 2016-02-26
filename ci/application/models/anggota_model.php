<?php 
class Anggota_model extends CI_Model {

    var $nama   = '';
    var $noktp = '';
    var $alamat    = '';
    var $email    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database('default');
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    function insert_entry($firstname, $lastname, $birthday, $gender, $email, $password)
    {
        $data = array(
           'firstname' => $firstname ,
           'lastname' => $lastname,
           'birthday' => $birthday,
           'gender' =>$gender,
           'email' =>$email,
           'password' => $password,
           'previllage' => 'U'
        );
        $this->db->insert('anggota', $data);
        // if ($this->db->_error_message())
        // {
        //     return 0;
        // }
        return 1;
    }
    
   function riwayat($username)
    {
       
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->where('username', $username);
        $query=$this->db->get(); 
        return $query->result_array();
    }

    function login($username,$password)
    {
        $query = $this->db->get_where('anggota', array('username' => $username,'password' => $password));
        return $query->row_array();
    }
    function update_entry()
    {
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }

}

 ?>