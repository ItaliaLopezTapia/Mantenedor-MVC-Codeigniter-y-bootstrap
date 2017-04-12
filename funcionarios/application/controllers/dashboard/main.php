<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {
  function __construct(){
    parent:: __construct();
  }

	public function index()
	{
    $this->load->view('sidebar');
    $this->load->view('headerMain');
    $this->load->view('dashboard/main');
    $this->load->view('footer');


	}
}
