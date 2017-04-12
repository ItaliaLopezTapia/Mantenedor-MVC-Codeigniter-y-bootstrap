<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class funcionariosDashboard extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('funcionarios/funcionarioModel');
    $this->load->helper('form');
    // $this->load->library('upload');
  }

  public function index()
  {

    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $data['funcionarios'] = $this->funcionarioModel->getFuncionarios();

    // if ($data['funcionario']){
    $this->load->view('funcionarios/main',$data);


    // }else{
    //   $this->load->view('emptyTable');
    // }
    $this->load->view('footer');

  }
  function recibirDatos(){
    $this->load->helper('url');
    $this->load->helper('form');
   $this->load->library('form_validation');
  //hacemos las comprobaciones que deseemos en nuestro formulario
    $this->form_validation->set_rules('name','Nombre','trim|required|xss_clean|max_lenght[10]|min_length[3]');
    $this->form_validation->set_rules('lastnameP','Apellido Paterno','trim|required|xss_clean|max_lenght[10]|min_length[3]');
    $this->form_validation->set_rules('lastnameM','Apellido Materno','trim|xss_clean|max_lenght[10]|min_length[3]');
    $this->form_validation->set_rules('rut','RUN','trim|required|xss_clean|max_lenght[12]|min_length[12]');
    $this->form_validation->set_rules('cargo','Cargo','trim|required|xss_clean');
    $this->form_validation->set_rules('unidad','Unidad','trim|required|xss_clean');
    $this->form_validation->set_rules('departamento','Departamento','trim|required|xss_clean');
    $this->form_validation->set_rules('correo','Correo','trim|valid_email|required|xss_clean');
    $this->form_validation->set_rules('anexo','Anexo','trim|required|xss_clean|max_lenght[15]|min_length[8]');
    $this->form_validation->set_rules('jefe','Jefe','trim|xss_clean|max_lenght[15]|min_length[8]');
  if (!$this->form_validation->run())
  {
    //si no pasamos la validación volvemos al formulario mostrando los errores
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $datos['arrCargos'] = $this->funcionarioModel->getCargos();
    $datos['arrUnidades'] = $this->funcionarioModel->getUnidades();
    $datos['arrJefe'] = $this->funcionarioModel->getJefe();
    $this->load->view('funcionarios/modalAdd',$datos);
    $this->load->view('footer');
    $this->load->view('footer');
  }
  //si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
  else
  {
    $config['upload_path']          = './uploads/';
    $config['allowed_types']        = 'gif|jpg|png';

    $this->load->library('upload', $config);
    // si imagen esta seteada (iiset){
    if ( ! $this->upload->do_upload())
    {
      $error = array('error' => $this->upload->display_errors());

        //  $this->load->view('upload_form', $error);
        // $this->load->view('funcionarios/main',$error);

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
        redirect('/index.php/funcionarios/funcionariosDashboard', 'refresh');


    }
    else
    {
      $data = array('upload_data' => $this->upload->data());
 // } Sino
  //imagen= imagen por defecto
  // }


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
        'imagen' => $this->upload->data('file_name')

      );
      $this->funcionarioModel->funcionarioAdd($data);

      redirect('/index.php/funcionarios/funcionariosDashboard', 'refresh');

      $this->load->view('funcionarios/main');
    }
  }}



  function eliminarFuncionario(){

    $id = $this->input->get('id');

    $this->funcionarioModel->deshabilitarFuncionario($id);
    redirect('/index.php/funcionarios/funcionariosDashboard', 'refresh');


  }




  //---------------------------------------
  // function recibirDatos($data){
  //   if($this->input->post('submit'))
  //   {
  //     //hacemos las comprobaciones que deseemos en nuestro formulario
  //     $this->form_validation->set_rules('name','Nombre','trim|required|xss_clean|max_lenght[10]|min_length[2]');
  //     $this->form_validation->set_rules('lastnameP','Apellido Paterno','trim|required|xss_clean|max_lenght[10]|min_length[2]');
  //     $this->form_validation->set_rules('lastnameM','Apellido Materno','trim|required|xss_clean|max_lenght[10]|min_length[2]');
  //     $this->form_validation->set_rules('rut','RUN','trim|required|xss_clean|max_lenght[10]|min_length[10]');
  //     $this->form_validation->set_rules('cargo','Cargo','trim|required|xss_clean');
  //     $this->form_validation->set_rules('unidad','Unidad','trim|required|xss_clean');
  //     $this->form_validation->set_rules('departamento','Departamento','trim|required|xss_clean');
  //     $this->form_validation->set_rules('correo','Correo','trim|valid_email|required|xss_clean');
  //     $this->form_validation->set_rules('anexo','Anexo','trim|required|xss_clean|max_lenght[15]|min_length[8]');
  //     $this->form_validation->set_rules('jefe','Jefe','trim|xss_clean|max_lenght[15]|min_length[8]');
  //
  //     //validamos que se introduzcan los campos requeridos con la función de ci required
  //     $this->form_validation->set_message('required', 'Campo %s es obligatorio');
  //     //validamos el email con la función de ci valid_email
  //     $this->form_validation->set_message('valid_email', 'El %s no es v&aacute;lido');
  //     //comprobamos que se cumpla el mínimo de caracteres introducidos
  //     $this->form_validation->set_message('min_length', 'Campo %s debe tener al menos %s car&aacute;cteres');
  //     //comprobamos que se cumpla el máximo de caracteres introducidos
  //     $this->form_validation->set_message('max_length', 'Campo %s debe tener menos %s car&aacute;cteres');
  //
  //     if (!$this->form_validation->run())
  //     {
  //       //si no pasamos la validación volvemos al formulario mostrando los errores
  //       $this->load->controller('funcionarios/funcionariosDashboard');
  //     }
  //     //si pasamos la validación correctamente pasamos a hacer la inserción en la base de datos
  //     else
  //     {
  //       $data = array(
  //       'name' => $this->input->post('nombre'),
  //       'lastnameP'=> $this->input->post('apellidoP'),
  //       'lastnameM'=> $this->input->post('apellidoM'),
  //       'rut'=> $this->input->post('rut'),
  //       'cargo'=> $this->input->post('cargo'),
  //       'unidad'=> $this->input->post('unidad'),
  //       'departamento'=> $this->input->post('departamento'),
  //       'email'=> $this->input->post('correo'),
  //       'anexo'=> $this->input->post('anexo'),
  //       'boss'=> $this->input->post('jefe'),
  //       );
  //       $this->usersModel->funcionarioAdd($data);
  //       $this->load->view('sidebar');
  //       $this->load->view('headerMain');
  //       $this->load->view('funcionarios/main');
  //       $this->load->view('footer');
  //     }
  //   }
  //
  //
  //
  //   }
}
