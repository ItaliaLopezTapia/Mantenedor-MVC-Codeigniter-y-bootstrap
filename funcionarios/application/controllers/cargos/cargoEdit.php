<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CargoEdit extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('cargos/cargoModel');
    $this->load->helper('form');

    }

	public function index()
	{

    $id = $this->input->get('id');
    $data['cargo'] = $this->cargoModel->getCargo($id);
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('cargo/modalEdit',$data);
    $this->load->view('footer');
	}


  function actualizarCargo(){
    $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[35]');
    $this->form_validation->set_rules('description','Descripción','trim|min_length[3]|max_length[150]');
    if (!$this->form_validation->run())
    {
      $this->index();
    }else{
     $id = $this->input->get('id');
     $data = array(
      'name' => $this->input->post('name'),
      'descripcion'=> $this->input->post('description'),
    );

    $this->cargoModel->actualizarCargo($data,$id);
    redirect('/index.php/cargos/cargosDashboard', 'refresh');

  }
}
}

?>
