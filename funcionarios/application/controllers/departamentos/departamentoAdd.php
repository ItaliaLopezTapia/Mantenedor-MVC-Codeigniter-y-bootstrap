<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartamentoAdd extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('departamentos/departamentoModel');
    $this->load->helper('form');
    }

	public function index()
	{
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $datos['arrSubdirecciones'] = $this->departamentoModel->getSubdirecciones();
    $this->load->view('departamento/modalAdd',$datos);
    $this->load->view('footer');

	}

  function recibirDatos(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[45]');
    $this->form_validation->set_rules('descripcion','Descripción','trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules('selSubdirecciones','Subdirección','trim|required');
    if (!$this->form_validation->run())
    {
      $this->index();
    }else{

      $data = array(
      'name' => $this->input->post('name'),
      'descripcion'=> $this->input->post('descripcion'),
      'subdirecciones'=> $this->input->post('selSubdirecciones')
      );
      $this->departamentoModel->departamentosAdd($data);
      redirect('/index.php/departamentos/departamentoDashboard', 'refresh');
    }


    }


}
