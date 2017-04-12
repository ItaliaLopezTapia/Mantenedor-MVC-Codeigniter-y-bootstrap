<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadAdd extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('unidades/unidadesModel');
    $this->load->helper('form');
  }

  public function index()
  {
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $datos['arrDepartamentos'] = $this->unidadesModel->getDepartamentos();
    $this->load->view('unidades/modalAdd',$datos);
    $this->load->view('footer');

  }

  function recibirDatos(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('description','Descripción','trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules('selDepartamento','Departamento','trim|required');
    if (!$this->form_validation->run())
    {
      $this->index();
    }else{

    $data = array(
      'nombre' => $this->input->post('name'),
      'descripcion'=> $this->input->post('description'),
      'selDepartamento'=> $this->input->post('selDepartamento')
    );

    $this->unidadesModel->UnidadAdd($data);
    redirect('/index.php/unidades/unidadesDashboard', 'refresh');
  }
}

}
