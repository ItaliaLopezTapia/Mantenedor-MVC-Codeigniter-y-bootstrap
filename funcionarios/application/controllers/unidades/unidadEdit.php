<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadEdit extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('unidades/unidadesModel');
    $this->load->helper('form');

    }

	public function index()
  {
    $id = $this->input->get('id');
    $data['arrDepartamentos'] = $this->unidadesModel->getDepartamentos();
    $data['unidad'] = $this->unidadesModel->getUnidad($id);
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('unidades/modalEdit',$data);
    $this->load->view('footer');

	}

  function actualizarUnidades(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('description','Descripción','trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules('selDepartamento','Departamento','trim|required');
    if (!$this->form_validation->run())
    {
      $this->index();
    }else{
    $id = $this->input->get('id');
      $data = array(
      'nombre' => $this->input->post('name'),
      'descripcion'=> $this->input->post('description'),
      'departamento'=> $this->input->post('selDepartamento')
      );

    $this->unidadesModel->actualizarUnidad($data,$id);
    redirect('/index.php/unidades/unidadesDashboard', 'refresh');

        }
  }
}

?>
