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
        header('location:'.base_url().'Master/user_list');
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
        header('location:'.base_url().'Master/user_list');
      }

      $user_info = $this->User_Model->get_info('user_id', $user_id, 'user');
      if($user_info == ''){ header('location:'.base_url().'Master/user_list'); }
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
      header('location:'.base_url().'Master/user_list');
    }


/***********************     customer Information      ******************************/
  // Customer List...
  public function customer_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['customer_list'] = $this->User_Model->get_list($eco_company_id,'customer_id','DESC','customer');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/customer_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Customer...
  public function customer(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('customer_fname', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $customer_status = $this->input->post('customer_status');
      if(!isset($customer_status)){ $customer_status = 0; }
      $save_data = array(
        'company_id' => $eco_company_id,
        'customer_fname' => $this->input->post('customer_fname'),
        'customer_lname' => $this->input->post('customer_lname'),
        'customer_level_id' => $this->input->post('customer_level_id'),
        'customer_dob' => $this->input->post('customer_dob'),
        'customer_gender' => $this->input->post('customer_gender'),
        'customer_mobile' => $this->input->post('customer_mobile'),
        'customer_email' => $this->input->post('customer_email'),
        'customer_password' => $this->input->post('customer_password'),
        'customer_addedby' => $eco_user_id,
        'customer_status' => $customer_status,
        'customer_date' => date('d-m-Y h:i:s A'),
      );
      $this->User_Model->save_data('customer', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/customer_list');
    }
    $data['customer_level_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'customer_level_status','1',"customer_level_id",'DESC','customer_level');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/customer', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Customer...
    public function edit_customer($customer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('customer_fname', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $customer_status = $this->input->post('customer_status');
        if(!isset($customer_status)){ $customer_status = 0; }
        $update_data = array(
        'customer_fname' => $this->input->post('customer_fname'),
        'customer_lname' => $this->input->post('customer_lname'),
        'customer_level_id' => $this->input->post('customer_level_id'),
        'customer_dob' => $this->input->post('customer_dob'),
        'customer_gender' => $this->input->post('customer_gender'),
        'customer_mobile' => $this->input->post('customer_mobile'),
        'customer_email' => $this->input->post('customer_email'),
        'customer_password' => $this->input->post('customer_password'),
        'customer_addedby' => $eco_user_id,
        'customer_status' => $customer_status,
        'customer_date' => date('d-m-Y h:i:s A'),
        );
        $this->User_Model->update_info('customer_id', $customer_id, 'customer', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/customer_list');
      }
      $customer_info = $this->User_Model->get_info_arr('customer_id',$customer_id,'customer');
      if(!$customer_info){ header('location:'.base_url().'Master/customer_list'); }
      $data['update'] = 'update';
      $data['customer_info'] = $customer_info[0];
      $data['customer_level_list'] = $this->User_Model->get_list_by_id('company_id',$eco_company_id,'customer_level_status','1',"customer_level_id",'DESC','customer_level');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/customer', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Customer....
    public function delete_customer($customer_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('customer_id', $customer_id, 'customer');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/customer_list');
    }


    /***********************     franchise Information      ******************************/

    public function franchise_list(){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/franchise_list');
      $this->load->view('Include/footer');
    }
    public function franchise_information(){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/franchise_information');
      $this->load->view('Include/footer');
    }

/***********************     tax_slab Information      ******************************/

  // Tax Slab List
  public function tax_slab_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['tax_slab_list'] = $this->User_Model->get_list($eco_company_id,'tax_title','ASC','tax');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/tax_slab_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Tax Slab...
  public function tax_slab(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('tax_title', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $tax_status = $this->input->post('tax_status');
      if(!isset($tax_status)){ $tax_status = 0; }
      $save_data = array(
        'company_id' => $eco_company_id,
        'tax_title' => $this->input->post('tax_title'),
        'tax_rate' => $this->input->post('tax_rate'),
        'tax_desc' => $this->input->post('tax_desc'),
        'tax_status' => $tax_status,
        'tax_addedby' => $eco_user_id,
        'tax_date' => date('d-m-Y h:m:s A'),
      );
      $this->User_Model->save_data('tax', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/tax_slab_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/tax_slab');
    $this->load->view('Include/footer');
  }

  // Edit Tax Slab...
  public function edit_tax_slab($tax_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('tax_title', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $tax_status = $this->input->post('tax_status');
      if(!isset($tax_status)){ $tax_status = 0; }
      $update_data = array(
        'tax_title' => $this->input->post('tax_title'),
        'tax_rate' => $this->input->post('tax_rate'),
        'tax_desc' => $this->input->post('tax_desc'),
        'tax_status' => $tax_status,
        'tax_addedby' => $eco_user_id,
        'tax_date' => date('d-m-Y h:m:s A'),
      );
      $this->User_Model->update_info('tax_id', $tax_id, 'tax', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'Master/tax_slab_list');
    }
    $tax_info = $this->User_Model->get_info_arr('tax_id',$tax_id,'tax');
    if(!$tax_info){ header('location:'.base_url().'Master/tax_list'); }
    $data['update'] = 'update';
    $data['tax_info'] = $tax_info[0];
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/tax_slab', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Tags....
  public function delete_tax_slab($tax_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('tax_id', $tax_id, 'tax');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Master/tax_slab_list');
  }

/***********************     Unit Information      ******************************/

  // Unit List...
    public function unit_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $data['unit_list'] = $this->User_Model->get_list($eco_company_id,'unit_name','ASC','unit');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/unit_list', $data);
      $this->load->view('Include/footer', $data);
    }

  // Add Unit...
    public function unit(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('unit_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $unit_status = $this->input->post('unit_status');
        if(!isset($unit_status)){ $unit_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'unit_name' => $this->input->post('unit_name'),
          'unit_status' => $unit_status,
          'unit_addedby' => $eco_user_id,
          'unit_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->save_data('unit', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/unit_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/unit');
      $this->load->view('Include/footer');
    }

  // Add Unit...
    public function edit_unit($unit_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('unit_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $unit_status = $this->input->post('unit_status');
        if(!isset($unit_status)){ $unit_status = 0; }
        $update_data = array(
          'unit_name' => $this->input->post('unit_name'),
          'unit_status' => $unit_status,
          'unit_addedby' => $eco_user_id,
          'unit_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->update_info('unit_id', $unit_id, 'unit', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/unit_list');
      }
      $unit_info = $this->User_Model->get_info_arr('unit_id',$unit_id,'unit');
      if(!$unit_info){ header('location:'.base_url().'User/unit_list'); }
      $data['update'] = 'update';
      $data['unit_info'] = $unit_info[0];
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/unit', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Unit....
    public function delete_unit($unit_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('unit_id', $unit_id, 'unit');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/unit_list');
    }

/***********************     shipping Information      ******************************/

  // Shipping List...
  public function shipping_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['shipping_list'] = $this->User_Model->get_list($eco_company_id,'shipping_name','ASC','shipping');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/shipping_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Add Shipping...
  public function shipping(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('shipping_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $shipping_status = $this->input->post('shipping_status');
      if(!isset($shipping_status)){ $shipping_status = 0; }
      $save_data = array(
        'company_id' => $eco_company_id,
        'shipping_name' => $this->input->post('shipping_name'),
        'shipping_price' => $this->input->post('shipping_price'),
        'shipping_desc' => $this->input->post('shipping_desc'),
        'shipping_status' => $shipping_status,
        'shipping_addedby' => $eco_user_id,
        'shipping_date' => date('d-m-Y h:m:s A'),
      );
      $this->User_Model->save_data('shipping', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Master/shipping_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/shipping');
    $this->load->view('Include/footer');
  }

  // Edit Shipping...
    public function edit_shipping($shipping_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('shipping_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $shipping_status = $this->input->post('shipping_status');
        if(!isset($shipping_status)){ $shipping_status = 0; }
        $update_data = array(
          'shipping_name' => $this->input->post('shipping_name'),
          'shipping_price' => $this->input->post('shipping_price'),
          'shipping_desc' => $this->input->post('shipping_desc'),
          'shipping_status' => $shipping_status,
          'shipping_addedby' => $eco_user_id,
          'shipping_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->update_info('shipping_id', $shipping_id, 'shipping', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/shipping_list');
      }
      $shipping_info = $this->User_Model->get_info_arr('shipping_id',$shipping_id,'shipping');
      if(!$shipping_info){ header('location:'.base_url().'Master/shipping_list'); }
      $data['update'] = 'update';
      $data['shipping_info'] = $shipping_info[0];
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/shipping', $data);
      $this->load->view('Include/footer', $data);
    }

    // Delete Shipping....
    public function delete_shipping($shipping_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('shipping_id', $shipping_id, 'shipping');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/shipping_list');
    }

    /***********************     customer_level Information      ******************************/

    // customer_level List...
    public function customer_level_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $data['customer_level_list'] = $this->User_Model->get_list($eco_company_id,'customer_level_name','ASC','customer_level');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/customer_level_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add customer_level...
    public function customer_level(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('customer_level_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $customer_level_status = $this->input->post('customer_level_status');
        if(!isset($customer_level_status)){ $customer_level_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'customer_level_name' => $this->input->post('customer_level_name'),
          'customer_level_price' => $this->input->post('customer_level_price'),
          'customer_level_desc' => $this->input->post('customer_level_desc'),
          'customer_level_status' => $customer_level_status,
          'customer_level_addedby' => $eco_user_id,
          'customer_level_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->save_data('customer_level', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/customer_level_list');
      }
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/customer_level');
      $this->load->view('Include/footer');
    }

  // Edit customer_level...
    public function edit_customer_level($customer_level_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('customer_level_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $customer_level_status = $this->input->post('customer_level_status');
        if(!isset($customer_level_status)){ $customer_level_status = 0; }
        $update_data = array(
          'customer_level_name' => $this->input->post('customer_level_name'),
          'customer_level_price' => $this->input->post('customer_level_price'),
          'customer_level_desc' => $this->input->post('customer_level_desc'),
          'customer_level_status' => $customer_level_status,
          'customer_level_addedby' => $eco_user_id,
          'customer_level_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->update_info('customer_level_id', $customer_level_id, 'customer_level', $update_data);
        $this->session->set_flashdata('update_success','success');
        header('location:'.base_url().'Master/customer_level_list');
      }
      $customer_level_info = $this->User_Model->get_info_arr('customer_level_id',$customer_level_id,'customer_level');
      if(!$customer_level_info){ header('location:'.base_url().'Master/customer_level_list'); }
      $data['update'] = 'update';
      $data['customer_level_info'] = $customer_level_info[0];
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/customer_level', $data);
      $this->load->view('Include/footer', $data);
    }

  // Delete customer_level....
    public function delete_customer_level($customer_level_id){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->User_Model->delete_info('customer_level_id', $customer_level_id, 'customer_level');
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'Master/customer_level_list');
    }

    /***********************     Membership Scheme Information      ******************************/
    // Membership Scheme List
    public function membership_scheme_list(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $data['membership_scheme_list'] = $this->User_Model->get_list($eco_company_id,'mem_sch_name','ASC','membership_scheme');
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/membership_scheme_list', $data);
      $this->load->view('Include/footer', $data);
    }

    // Add Membership Scheme...
    public function membership_scheme(){
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $this->form_validation->set_rules('mem_sch_name', 'Name', 'trim|required');
      if ($this->form_validation->run() != FALSE) {
        $mem_sch_status = $this->input->post('mem_sch_status');
        if(!isset($mem_sch_status)){ $mem_sch_status = 0; }
        $save_data = array(
          'company_id' => $eco_company_id,
          'mem_sch_name' => $this->input->post('mem_sch_name'),
          'mem_sch_amt' => $this->input->post('mem_sch_amt'),
          'mem_sch_valid' => $this->input->post('mem_sch_valid'),
          'mem_sch_status' => $mem_sch_status,
          'mem_sch_addedby' => $eco_user_id,
          'mem_sch_date' => date('d-m-Y h:m:s A'),
        );
        $this->User_Model->save_data('membership_scheme', $save_data);
        $this->session->set_flashdata('save_success','success');
        header('location:'.base_url().'Master/membership_scheme_list');
      }

      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/membership_scheme');
      $this->load->view('Include/footer');
    }

    // Edit Membership Scheme...
      public function edit_membership_scheme($mem_sch_id){
        $eco_user_id = $this->session->userdata('eco_user_id');
        $eco_company_id = $this->session->userdata('eco_company_id');
        $eco_roll_id = $this->session->userdata('eco_roll_id');
        if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
        $this->form_validation->set_rules('mem_sch_name', 'Name', 'trim|required');
        if ($this->form_validation->run() != FALSE) {
          $mem_sch_status = $this->input->post('mem_sch_status');
          if(!isset($mem_sch_status)){ $mem_sch_status = 0; }
          $update_data = array(
            'mem_sch_name' => $this->input->post('mem_sch_name'),
            'mem_sch_amt' => $this->input->post('mem_sch_amt'),
            'mem_sch_valid' => $this->input->post('mem_sch_valid'),
            'mem_sch_status' => $mem_sch_status,
            'mem_sch_addedby' => $eco_user_id,
            'mem_sch_date' => date('d-m-Y h:m:s A'),
          );
          $this->User_Model->update_info('mem_sch_id', $mem_sch_id, 'membership_scheme', $update_data);
          $this->session->set_flashdata('update_success','success');
          header('location:'.base_url().'Master/membership_scheme_list');
        }
        $membership_scheme_info = $this->User_Model->get_info_arr('mem_sch_id',$mem_sch_id,'membership_scheme');
        if(!$membership_scheme_info){ header('location:'.base_url().'Master/membership_scheme_list'); }
        $data['update'] = 'update';
        $data['mem_sch_info'] = $membership_scheme_info[0];
        $this->load->view('Include/head', $data);
        $this->load->view('Include/navbar', $data);
        $this->load->view('User/membership_scheme', $data);
        $this->load->view('Include/footer', $data);
      }

    // Delete Membership Scheme....
      public function delete_membership_scheme($mem_sch_id){
        $eco_user_id = $this->session->userdata('eco_user_id');
        $eco_company_id = $this->session->userdata('eco_company_id');
        $eco_roll_id = $this->session->userdata('eco_roll_id');
        if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
        $this->User_Model->delete_info('mem_sch_id', $mem_sch_id, 'membership_scheme');
        $this->session->set_flashdata('delete_success','success');
        header('location:'.base_url().'Master/membership_scheme_list');
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
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
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
      if(!$manufacturer_info){ header('location:'.base_url().'Master/manufacturer_list'); }
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
      $eco_user_id = $this->session->userdata('eco_user_id');
      $eco_company_id = $this->session->userdata('eco_company_id');
      $eco_roll_id = $this->session->userdata('eco_roll_id');
      if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
      $manufacturer_info = $this->User_Model->get_info_arr_fields('manufacturer_img','manufacturer_id', $manufacturer_id, 'manufacturer');
      $this->User_Model->delete_info('manufacturer_id', $manufacturer_id, 'manufacturer');
      if($manufacturer_info){ unlink("assets/images/manufacturer/".$manufacturer_info[0]['manufacturer_img']); }
      $this->session->set_flashdata('delete_success','success');
      header('location:'.base_url().'User/manufacturer_list');
    }
}
