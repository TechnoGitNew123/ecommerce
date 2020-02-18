<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller{

  public function index(){
    $this->load->view('Website/index');
  }
  public function contact(){
    $this->load->view('Website/contact');
  }
}
?>
