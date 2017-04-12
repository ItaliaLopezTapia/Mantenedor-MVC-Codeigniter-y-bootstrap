<?php

class LoginModel extends CI_Model{
  function __construct(){
    parent:: __construct();
    $this->load->database();
  }


  function loginUser($username,$password){

    $this->db-> from('usuario');
    $this->db-> where('correo', $username);
    $this->db-> where('password', $password);
    $this->db-> where('estado', 1);
    $this->db-> limit(1);

    $query = $this->db->get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }

  }

}
?>
