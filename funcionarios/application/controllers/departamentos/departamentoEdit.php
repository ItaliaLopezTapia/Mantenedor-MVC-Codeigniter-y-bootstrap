<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class departamentoEdit extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('departamentos/departamentoModel');
    $this->load->helper('form');

    }

	public function index()
  {
    $id = $this->input->get('id');
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $data['departamento'] = $this->departamentoModel->getDepartamento($id);
    $data['arrSubdirecciones'] = $this->departamentoModel->getSubdirecciones();
    $this->load->view('departamento/modalEdit',$data);
    $this->load->view('footer');

	}

  function actualizarDepartamento(){

    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('description','Descripción','trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules('selSubdirecciones','Subdirección','trim|required');
    if (!$this->form_validation->run())
    {
      $this->index();
    }else{
     $id = $this->input->get('id');
      // $id = $this->uri->segment(4);
      $data = array(
      'name' => $this->input->post('name'),
      'descripcion'=> $this->input->post('description'),
      'subdirecciones'=> $this->input->post('selSubdirecciones')
      );

    $this->departamentoModel->actualizarDepartamento($data,$id);
    redirect('/index.php/departamentos/departamentoDashboard', 'refresh');
}
        }
  }


?>
