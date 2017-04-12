<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cargosDashboard extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('cargos/cargoModel');
    $this->load->helper('form');
  }

	public function index()
	{

    $data['cargos'] = $this->cargoModel->getCargos();

    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('cargo/main',$data);
    $this->load->view('footer');

	}


  function eliminarCargo(){

  $id = $this->input->get('id');

  $this->cargoModel->deshabilitarCargo($id);
  redirect('/index.php/cargos/cargosDashboard', 'refresh');


  }


}
