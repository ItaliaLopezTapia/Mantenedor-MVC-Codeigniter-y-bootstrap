<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UsersDashboard extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('users/usersModel');
    $this->load->helper('form');
  }

	public function index()
	{

    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $data['usuarios'] = $this->usersModel->getUsuarios();
    $this->load->view('users/main',$data);
    $this->load->view('footer');

	}


function eliminarUsuario(){

$id = $this->input->get('id');

$this->usersModel->deshabilitarUsuario($id);
redirect('/index.php/users/usersDashboard', 'refresh');


}


  }
