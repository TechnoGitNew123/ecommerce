<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    // $this->load->model('Transaction_Model');
  }

  /*******************************    User Information      ****************************/

    // Add New User....
    public function add_user(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $save_data = array(
          'company_id' => $eco_company_id,
          'user_name' => $this->input->post('user_name'),
          'user_mobile' => $this->input->post('user_mobile'),
          'user_city' => $this->input->post('user_city'),
          'user_password' => $this->input->post('user_password'),
          'user_addedby' => $eco_user_id,
        );
        $this->User_Model->save_data('user', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'User/user_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/user');
      $this->load->view('Include/footer');
    }

    // User List....
    public function user_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $data['user_list'] = $this->User_Model->user_list($eco_company_id);
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/user_list',$data);
      $this->load->view('Include/footer',$data);
    }

    // Edit User....
    public function edit_user($user_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $update_data = array(
          'user_name' => $this->input->post('user_name'),
          'user_mobile' => $this->input->post('user_mobile'),
          'user_email' => $this->input->post('user_email'),
          'user_city' => $this->input->post('user_city'),
          'user_password' => $this->input->post('user_password'),
          'user_addedby' => $eco_user_id,
        );
        $this->User_Model->update_info('user_id', $user_id, 'user', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'User/user_list');
      }

      $user_info = $this->User_Model->get_info('user_id', $user_id, 'user');
      if($user_info == ''){ header('location:'.base_url().'User/user_list'); }
      foreach($user_info as $info){
        $data['update'] = 'update';
        $data['user_name'] = $info->user_name;
        $data['user_mobile'] = $info->user_mobile;
        $data['user_email'] = $info->user_email;
        $data['user_city'] = $info->user_city;
        $data['user_password'] = $info->user_password;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/user',$data);
      $this->load->view('Include/footer',$data);
    }

    // Delete User....
    public function delete_user($user_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('user_id', $user_id, 'user');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'User/user_list');
    }

    /***********************     customer Information      ******************************/

    public function customer_list(){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/customer_list');
      $this->load->view('Include/footer');
    }
    public function customer(){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/customer');
      $this->load->view('Include/footer');
    }

  /***********************     manufacturer Information      ******************************/

    public function manufacturer_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $data['manufacturer_list'] = $this->User_Model->get_list($eco_company_id,'manufacturer_name','ASC','manufacturer');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/manufacturer_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add Manufacturer...
    public function manufacturer(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

      $this->form_validation->set_rules('manufacturer_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $manufacturer_status = $this->input->post('manufacturer_status');
        if(!isset($manufacturer_status)){ $manufacturer_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'manufacturer_name' => $this->input->post('manufacturer_name'),
          'manufacturer_info' => $this->input->post('manufacturer_info'),
          'manufacturer_status' => $manufacturer_status,
          'manufacturer_date' => date('d-m-Y h:m:s A'),
          'manufacturer_addedby' => $eco_user_id,
        );
        $manufacturer_id = $this->User_Model->save_data('manufacturer', $save_data);
        if(isset($_FILES['manufacturer_img']['name'])){
           $time = time();
           $image_name = 'manufacturer_'.$manufacturer_id.'_'.$time;
           $config['upload_path'] = 'assets/images/manufacturer/';
           $config['allowed_types'] = 'png|jpg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['manufacturer_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('manufacturer_img')){
             $up_image = array(
               'manufacturer_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('manufacturer_id', $manufacturer_id, 'manufacturer', $up_image);
             $this->session->set_flashdata('upload_status','success');
           }
           else{
             $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'User/manufacturer_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/manufacturer');
      $this->load->view('Include/footer');
    }

    // Edit Manufacturer...
    public function edit_manufacturer($manufacturer_id){
      $eco_user_id = $this->session->userdata('out_user_id');
      $eco_company_id = $this->session->userdata('out_company_id');
      $eco_roll_id = $this->session->userdata('out_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('manufacturer_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $manufacturer_status = $this->input->post('manufacturer_status');
        if(!isset($manufacturer_status)){ $manufacturer_status = 0; }
        $update_data = array(
          'manufacturer_name' => $this->input->post('manufacturer_name'),
          'manufacturer_info' => $this->input->post('manufacturer_info'),
          'manufacturer_status' => $manufacturer_status,
          'manufacturer_date' => date('d-m-Y h:m:s A'),
          'manufacturer_addedby' => $eco_user_id,
        );
        $this->User_Model->update_info('manufacturer_id', $manufacturer_id, 'manufacturer', $update_data);
        if(isset($_FILES['manufacturer_img']['name'])){
           $time = time();
           $image_name = 'manufacturer_'.$manufacturer_id.'_'.$time;
           $config['upload_path'] = 'assets/images/manufacturer/';
           $config['allowed_types'] = 'png|jpg';
           $config['file_name'] = $image_name;
           $filename = $_FILES['manufacturer_img']['name'];
           $ext = pathinfo($filename, PATHINFO_EXTENSION);
           $this->upload->initialize($config);
           if ($this->upload->do_upload('manufacturer_img')){
             $up_image = array(
               'manufacturer_img' => $image_name.'.'.$ext,
             );
             $this->User_Model->update_info('manufacturer_id', $manufacturer_id, 'manufacturer', $up_image);
             $old_img = $this->input->post('old_img');
             if($old_img){ unlink("assets/images/manufacturer/".$old_img); }
             $this->session->set_flashdata('upload_status','success');
           }
           else{
             $error = $this->upload->display_errors();
             $this->session->set_flashdata('upload_status',$this->upload->display_errors());
           }
         }

        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'User/manufacturer_list');
      }
      $manufacturer_info = $this->User_Model->get_info_arr('manufacturer_id',$manufacturer_id,'manufacturer');
      if(!$manufacturer_info){ header('location:'.base_url().'User/manufacturer_list'); }
      $data['update'] = 'update';
      $data['manufacturer_name'] = $manufacturer_info[0]['manufacturer_name'];
      $data['manufacturer_info'] = $manufacturer_info[0]['manufacturer_info'];
      $data['manufacturer_status'] = $manufacturer_info[0]['manufacturer_status'];
      $data['manufacturer_img'] = $manufacturer_info[0]['manufacturer_img'];

      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/manufacturer', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Manufacturer....
    public function delete_manufacturer($manufacturer_id){
      $out_user_id = $this->session->userdata('out_user_id');
      $out_company_id = $this->session->userdata('out_company_id');
      $out_roll_id = $this->session->userdata('out_roll_id');
      if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
      $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_img','manufacturer_id', $manufacturer_id, 'manufacturer');
      $this->User_Model->delete_info('manufacturer_id', $manufacturer_id, 'manufacturer');
      if($manufacturer_info){ unlink("assets/images/manufacturer/".$manufacturer_info[0]['manufacturer_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'User/manufacturer_list');
    }
}
