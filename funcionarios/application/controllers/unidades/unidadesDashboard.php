<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UnidadesDashboard extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('unidades/unidadesModel');
    $this->load->helper('form');
  }

	public function index()
	{
    $this->load->view('sidebar');
    $this->load->view('headerMain');

      $data['unidades'] = $this->unidadesModel->getUnidades();

      if ($data['unidades']){
        $this->load->view('unidades/main',$data);


      }else{
        $this->load->view('emptyTable');
      }
    $this->load->view('footer');



	}

  function recibirDatos(){


          $data = array(
          'nombre' => $this->input->post('name'),
          'descripcion'=> $this->input->post('descripcion'),
          'departamento'=> $this->input->post('selDepartamento'),
          );

          $this->unidadesModel->unidadAdd($data);
          redirect('/index.php/unidades/unidadesDashboard', 'refresh');
    }



  function eliminarUnidad(){

  $id = $this->input->get('id');

$this->unidadesModel->deshabilitarUnidad($id);
redirect('/index.php/unidades/unidadesDashboard', 'refresh');


}
}
