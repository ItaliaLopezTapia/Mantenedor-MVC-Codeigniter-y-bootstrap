<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  function __construct(){
    parent:: __construct();
    $this->load->model('loginModel');
    $this->load->helper('form');


  }

  public function index()
  {
    $this->load->view('headerMain');
    $this->load->view('login');
    $this->load->view('footer');

  }
  public function validateUser()
  {
    if($this->input->post('correo') == '' || $this->input->post('password') == ''){
      redirect('/');
    }else{
      $loginData=$this->loginModel->loginUser($this->input->post('correo'),$this->input->post('password'));
      if($loginData){
        $sessionData = $loginData[0];


        $newdata = array(
          'nombre' => $sessionData->nombre,
          'apellido' => $sessionData->apellido,
          'email' =>  $sessionData->correo
        );
        $this->session->set_userdata('user_info',$newdata);


        redirect('index.php/dashboard/main');

      }else{
        $this->load->view('headerMain');
        $this->load->view('errorlogin');
        $this->load->view('login');
        $this->load->view('footer');
      }
    }
  }


  public function logOutUser(){
    $this->session->sess_destroy();


    redirect('/','refresh');

  }


}
