<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class departamentoDashboard extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('departamentos/departamentoModel');
  }

	public function index()
	{


    $data['departamentos'] = $this->departamentoModel->getDepartamentos();

    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('departamento/main',$data);
    $this->load->view('footer');

	}

  function eliminarDepartamento(){

  $id = $this->input->get('id');
  $this->departamentoModel->deshabilitarDepartamento($id);
  redirect('/index.php/departamentos/departamentoDashboard', 'refresh');


  }
}
