<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FuncionariosAdd extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('funcionarios/funcionarioModel');
    $this->load->helper('form');
    $this->load->library('upload');
    }

	public function index()
	{
  $this->load->helper('url');
   $this->load->helper('form');
   $this->load->library('form_validation');
   $this->form_validation->set_rules('name','Nombre','required|min_length[3]|max_length[12]');
   $this->form_validation->set_rules('lastnameP','Apellido Paterno','trim|required|min_length[3]|max_length[15]');
   $this->form_validation->set_rules('lastnameM','Apellido Materno','trim|max_length[15]|min_length[3]');
   $this->form_validation->set_rules('rut','RUN','trim|required|max_length[12]|min_length[12]|is_unique[funcionario.rut]',array(
                'required'      => 'El campo %s es obligatorio.',
                'is_unique'     => 'Este %s Ya existe.'
        ));
   $this->form_validation->set_rules('selCargo','Cargo','trim|required');
   $this->form_validation->set_rules('selUnidades','Unidad','trim|required');
   $this->form_validation->set_rules('email','Correo','trim|valid_email|required');
   $this->form_validation->set_rules('anexo','Anexo','trim|required|max_length[15]|min_length[8]');
   $this->form_validation->set_rules('jefe','Jefe','trim|max_lenght[15]|min_length[8]');
   if (!$this->form_validation->run())
   {
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $datos['arrCargos'] = $this->funcionarioModel->getCargos();
    $datos['arrUnidades'] = $this->funcionarioModel->getUnidades();
    $datos['arrJefe'] = $this->funcionarioModel->getJefe();
    $this->load->view('funcionarios/modalAdd',$datos);
    $this->load->view('footer');
	}else{
    //$data = array('upload_data' => $this->upload->data());
    if (empty($_FILES['userfile']['name'])){
      $data = array(
        'nombre' => $this->input->post('name'),
        'apellidoP'=> $this->input->post('lastnameP'),
        'apellidoM'=> $this->input->post('lastnameM'),
        'rut'=> $this->input->post('rut'),
        'anexo'=> $this->input->post('anexo'),
        'correo'=> $this->input->post('email'),
        'jefe'=> $this->input->post('selJefe'),
        'unidad'=> $this->input->post('selUnidades'),
        'cargo'=> $this->input->post('selCargo'),
        'imagen' => 'default.jpg'
      );
      $this->funcionarioModel->funcionarioAdd($data);
    }else{
      $config['upload_path']          = FCPATH.'uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $this->load->library('upload', $config);
      $this->upload->initialize($config);
      if ( !$this->upload->do_upload('userfile',FALSE)) {
        $error = array('error' => $this->upload->display_errors());
      }else{
        $dataf = $this->upload->data();
        $nombre_archivo=$dataf['file_name'];
        $data = array(
          'nombre' => $this->input->post('name'),
          'apellidoP'=> $this->input->post('lastnameP'),
          'apellidoM'=> $this->input->post('lastnameM'),
          'rut'=> $this->input->post('rut'),
          'anexo'=> $this->input->post('anexo'),
          'correo'=> $this->input->post('email'),
          'jefe'=> $this->input->post('selJefe'),
          'unidad'=> $this->input->post('selUnidades'),
          'cargo'=> $this->input->post('selCargo'),
          'imagen' => $nombre_archivo
        );
        $this->funcionarioModel->funcionarioAdd($data);
      }

    }
    redirect('/index.php/funcionarios/funcionariosDashboard', 'refresh');
  }
}

}
