<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersAdd extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('users/usersModel');
    $this->load->helper('form');
    }

	public function index()
	{
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('users/modalAdd');
    $this->load->view('footer');

	}
  function recibirDatos(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('lastname','Apellido','trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules('rut','RUN','trim|required|is_unique[usuario.rut]',array(
                 'required'      => 'El campo %s es obligatorio.',
                 'is_unique'     => 'Este %s Ya existe.'
         ));
    $this->form_validation->set_rules('email','Correo','trim|required|valid_email');
    $this->form_validation->set_rules('pass','Password','trim|required|min_length[8]|max_length[15]');
    if (!$this->form_validation->run())
    {
      $this->index();
    }else{

          $data = array(
          'nombre' => $this->input->post('name'),
          'apellido'=> $this->input->post('lastname'),
          'rut'=> $this->input->post('rut'),
          'email'=> $this->input->post('email'),
          'password'=> $this->input->post('pass'),
          );

          $this->usersModel->userAdd($data);
          redirect('/index.php/users/usersDashboard', 'refresh');
    }}


}
