<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    // $this->load->model('Transaction_Model');
  }

  public function logout(){
    $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

/**************************      Login      ********************************/
  public function index(){
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
    	$this->load->view('User/login');
    } else{
      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $login = $this->User_Model->check_login($email, $password);
      // print_r($login);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      } else{
        // echo 'null not';
        $this->session->set_userdata('out_user_id', $login[0]['user_id']);
        $this->session->set_userdata('out_company_id', $login[0]['company_id']);
        $this->session->set_userdata('out_roll_id', $login[0]['roll_id']);
        header('location:'.base_url().'User/dashboard');
      }
    }
  }

/**************************      Dashboard      ********************************/
  public function dashboard(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/dashboard');
    $this->load->view('Include/footer');
  }

/**************************      Company Information      ********************************/

  // Company List...
  public function company_information_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }

    $data['company_list'] = $this->User_Model->get_list($out_company_id,'company_id','ASC','company');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/company_information_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Company...
  public function edit_company($company_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('company_name', 'company_name', 'trim|required');
    $this->form_validation->set_rules('company_address', 'company_address', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $up_data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_statecode' => $this->input->post('company_statecode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_lic1' => $this->input->post('company_lic1'),
        'company_lic2' => $this->input->post('company_lic2'),
        'company_start_date' => $this->input->post('company_start_date'),
        'company_end_date' => $this->input->post('company_end_date'),
      );
      $this->User_Model->update_info('company_id', $company_id, 'company', $up_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/company_information_list');
    }
    $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
    if($company_info){
      foreach($company_info as $info){
        $data['update'] = 'update';
        $data['company_id'] = $info->company_id;
        $data['company_name'] = $info->company_name;
        $data['company_address'] = $info->company_address;
        $data['company_city'] = $info->company_city;
        $data['company_state'] = $info->company_state;
        $data['company_district'] = $info->company_district;
        $data['company_statecode'] = $info->company_statecode;
        $data['company_mob1'] = $info->company_mob1;
        $data['company_mob2'] = $info->company_mob2;
        $data['company_email'] = $info->company_email;
        $data['company_website'] = $info->company_website;
        $data['company_pan_no'] = $info->company_pan_no;
        $data['company_gst_no'] = $info->company_gst_no;
        $data['company_lic1'] = $info->company_lic1;
        $data['company_lic2'] = $info->company_lic2;
        $data['company_start_date'] = $info->company_start_date;
        $data['company_end_date'] = $info->company_end_date;
      }
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/company_information', $data);
      $this->load->view('Include/footer', $data);
    }
  }

/**************************************************************************************/
/*******                                Master Forms                          *********/
/**************************************************************************************/


/*******************************    User Information      ****************************/

  // Add New User....
  public function add_user(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data = array(
        'company_id' => $out_company_id,
        'user_name' => $this->input->post('user_name'),
        'user_mobile' => $this->input->post('user_mobile'),
        'user_city' => $this->input->post('user_city'),
        'user_password' => $this->input->post('user_password'),
        'user_addedby' => $out_user_id,
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
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['user_list'] = $this->User_Model->user_list($out_company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/user_list',$data);
    $this->load->view('Include/footer',$data);
  }

  // Edit User....
  public function edit_user($user_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('user_name', 'First Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = array(
        'user_name' => $this->input->post('user_name'),
        'user_mobile' => $this->input->post('user_mobile'),
        'user_email' => $this->input->post('user_email'),
        'user_city' => $this->input->post('user_city'),
        'user_password' => $this->input->post('user_password'),
        'user_addedby' => $out_user_id,
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
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('user_id', $user_id, 'user');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/user_list');
  }

/***********************     Item Account Group Information      ******************************/

  // Item Account Group List...
  public function item_group_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['item_group_list'] = $this->User_Model->get_list($out_company_id,'item_group_id','ASC','item_group');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/item_group_list',$data);
    $this->load->view('Include/footer',$data);
  }

  // Add Item Account Group...
  public function item_group(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('item_group_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data['item_group_name'] = $this->input->post('item_group_name');
      $save_data['company_id'] = $out_company_id;
      $save_data['item_group_addedby'] = $out_user_id;
      $this->User_Model->save_data('item_group', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/item_group_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/item_group');
    $this->load->view('Include/footer');
  }

  // Edit Item Account Group...
  public function edit_item_group($item_group_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('item_group_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data['item_group_name'] = $this->input->post('item_group_name');
      $this->User_Model->update_info('item_group_id', $item_group_id, 'item_group', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/item_group_list');
    }
    $item_group_info = $this->User_Model->get_info_arr('item_group_id',$item_group_id,'item_group');
    if(!$item_group_info){ header('location:'.base_url().'User/item_group_list'); }
    $data['update'] = 'update';
    $data['item_group_name'] = $item_group_info[0]['item_group_name'];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/item_group', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete User....
  public function delete_item_group($item_group_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('item_group_id', $item_group_id, 'item_group');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/item_group_list');
  }

/*****************************   Item Account Information   *****************************/

  public function item_account_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['item_account_list'] = $this->User_Model->get_list($out_company_id,'item_account_id','ASC','item_account');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/item_account_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function item_account(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('item_account_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data['item_group_id'] = $this->input->post('item_group_id');
      $save_data['item_account_name'] = $this->input->post('item_account_name');
      $save_data['company_id'] = $out_company_id;
      $save_data['item_account_addedby'] = $out_user_id;
      $this->User_Model->save_data('item_account', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/item_account_list');
    }
    $data['item_group_list'] = $this->User_Model->get_list($out_company_id,'item_group_id','ASC','item_group');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/item_account', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Item Account...
  public function edit_item_account($item_account_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('item_account_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data['item_group_id'] = $this->input->post('item_group_id');
      $update_data['item_account_name'] = $this->input->post('item_account_name');
      $this->User_Model->update_info('item_account_id', $item_account_id, 'item_account', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/item_account_list');
    }
    $item_account_info = $this->User_Model->get_info_arr('item_account_id',$item_account_id,'item_account');
    if(!$item_account_info){ header('location:'.base_url().'User/item_account_list'); }
    $data['update'] = 'update';
    $data['item_group_id'] = $item_account_info[0]['item_group_id'];
    $data['item_account_name'] = $item_account_info[0]['item_account_name'];
    $data['item_group_list'] = $this->User_Model->get_list($out_company_id,'item_group_id','ASC','item_group');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/item_account', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Item Account....
  public function delete_item_account($item_account_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('item_account_id', $item_account_id, 'item_account');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/item_account_list');
  }

/*******************************  Tags Information  ****************************/

  // Tags List...
  public function tags_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['tags_list'] = $this->User_Model->get_list($out_company_id,'tags_id','ASC','tags');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/tags_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Tags
  public function tags(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('tags_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $save_data['tags_name'] = $this->input->post('tags_name');
      $save_data['company_id'] = $out_company_id;
      $save_data['tags_addedby'] = $out_user_id;
      $this->User_Model->save_data('tags', $save_data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/tags_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/tags');
    $this->load->view('Include/footer');
  }

  // Edit Tags...
  public function edit_tags($tags_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('tags_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data['tags_name'] = $this->input->post('tags_name');
      $this->User_Model->update_info('tags_id', $tags_id, 'tags', $update_data);
      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/tags_list');
    }
    $tags_info = $this->User_Model->get_info_arr('tags_id',$tags_id,'tags');
    if(!$tags_info){ header('location:'.base_url().'User/tags_list'); }
    $data['update'] = 'update';
    $data['tags_name'] = $tags_info[0]['tags_name'];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/tags', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Tags....
  public function delete_tags($tags_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('tags_id', $tags_id, 'tags');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/tags_list');
  }

/**************************************************************************************/
/*******                           Manage Forms                               *********/
/**************************************************************************************/

/***************************      Customer Information     *****************************/

  public function customer_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['user_list'] = $this->User_Model->user_list($out_company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/customer_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function customer(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/customer');
    $this->load->view('Include/footer');
  }

/**********************      Suppliers Information      *****************************/

  // Suppliers List...
  public function supplier_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['supplier_list'] = $this->User_Model->user_list($out_company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/supplier_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Supplier
  public function supplier(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/supplier');
    $this->load->view('Include/footer');
  }

/**********************     Item Information      **********************/

  // Items List...
  public function items_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['items_list'] = $this->User_Model->user_list($out_company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/items_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Item
  public function items(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/items');
    $this->load->view('Include/footer');
  }

/*******************************  Stock Information  ****************************/

  // Stock List...
  public function stock_list(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $data['stock_list'] = $this->User_Model->user_list($out_company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/stock_list',$data);
    $this->load->view('Include/footer',$data);
  }

  //Add Stock
  public function stock(){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/stock');
    $this->load->view('Include/footer');
  }









/*******************************  Check Duplication  ****************************/
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->User_Model->check_dupli_num($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }


}
?>
