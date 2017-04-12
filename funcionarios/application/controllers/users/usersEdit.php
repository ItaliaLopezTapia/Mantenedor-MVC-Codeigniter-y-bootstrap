<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersEdit extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('users/usersModel');
    $this->load->helper('form');

    }

	public function index()
	{
    $id = $this->input->get('id');
    $data['usuario'] = $this->usersModel->getUsuario($id);
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('users/modalEdit',$data);
    $this->load->view('footer');
	}


  function actualizarUsuario(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('lastname','Apellido','trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules('rut','RUN','trim|required|is_unique[usuario.rut]',array(
                 'required'      => 'El campo %s es obligatorio.',
                 'is_unique'     => 'Este %s Ya existe.'
         ));
    $this->form_validation->set_rules('email','Correo','trim|required|valid_email');

    if (!$this->form_validation->run())
    {
      $this->index();
    }else{
    $id = $this->input->get('id');
    $data = array(
    'nombre' => $this->input->post('name'),
    'apellido'=> $this->input->post('lastname'),
    'rut'=> $this->input->post('rut'),
    'email'=> $this->input->post('email'),
    'password'=> $this->input->post('pass'),
    );

    $this->usersModel->userUpdate($data,$id);
    redirect('/index.php/users/usersDashboard', 'refresh');

  }
}
}

?>
