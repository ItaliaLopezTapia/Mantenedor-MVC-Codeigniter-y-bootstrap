<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoAdd extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('cargos/cargoModel');
    $this->load->helper('form');

    }

	public function index()
	{
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('cargo/modalAdd');
    $this->load->view('footer');

	}

  function recibirDatos(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('description','Descripción','trim|min_length[3]|max_length[150]');

    if (!$this->form_validation->run())
    {
      $this->index();
    }else{

          $data = array(
          'nombre' => $this->input->post('name'),
          'descripcion'=> $this->input->post('description'),
            );
          $this->cargoModel->cargoAdd($data);
          redirect('/index.php/cargos/cargosDashboard', 'refresh');
    }}


}
