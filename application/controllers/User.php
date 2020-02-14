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
        $this->session->set_userdata('eco_user_id', $login[0]['user_id']);
        $this->session->set_userdata('eco_company_id', $login[0]['company_id']);
        $this->session->set_userdata('eco_roll_id', $login[0]['roll_id']);
        header('location:'.base_url().'User/dashboard');
      }
    }
  }

/**************************      Dashboard      ********************************/
  public function dashboard(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/dashboard');
    $this->load->view('Include/footer');
  }

/**************************      Company Information      ********************************/

  // Company List...
  public function company_information_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

    $data['company_list'] = $this->User_Model->get_list($eco_company_id,'company_id','ASC','company');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/company_information_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Company...
  public function edit_company($company_id){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

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
/***********************     category Information      ******************************/
  public function category_list(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $data['category_list'] = $this->User_Model->get_list($eco_company_id,'category_name','ASC','category');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/category_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function category(){
    $eco_user_id = $this->session->userdata('eco_user_id');
    $eco_company_id = $this->session->userdata('eco_company_id');
    $eco_roll_id = $this->session->userdata('eco_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('category_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $category_status = $this->input->post('category_status');
      if(!isset($category_status)){ $category_status = 0; }
      $save_data = array(
        'company_id' => $eco_company_id,
        'category_name' => $this->input->post('category_name'),
        'main_category_id' => $this->input->post('main_category_id'),
        'category_status' => $category_status,
        'category_date' => date('d-m-Y h:m:s A'),
        'category_addedby' => $eco_user_id,
      );
      $category_id = $this->User_Model->save_data('category', $save_data);
      if(isset($_FILES['category_img']['name'])){
         $time = time();
         $image_name = 'category_'.$category_id.'_'.$time;
         $config['upload_path'] = 'assets/images/category/';
         $config['allowed_types'] = 'png|jpg';
         $config['file_name'] = $image_name;
         $filename = $_FILES['category_img']['name'];
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
         $this->upload->initialize($config);
         if ($this->upload->do_upload('category_img')){
           $up_image = array(
             'category_img' => $image_name.'.'.$ext,
           );
           $this->User_Model->update_info('category_id', $category_id, 'category', $up_image);
           $this->session->set_flashdata('upload_status','success');
         }
         else{
           $error = $this->upload->display_errors();
           $this->session->set_flashdata('upload_status',$this->upload->display_errors());
         }
       }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'User/category_list');
    }
    $data['main_category_list'] = $this->User_Model->get_list($eco_company_id,'main_category_name','ASC','main_category');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/category', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Category...
  public function edit_category($category_id){
    $eco_user_id = $this->session->userdata('out_user_id');
    $eco_company_id = $this->session->userdata('out_company_id');
    $eco_roll_id = $this->session->userdata('out_roll_id');
    if($eco_user_id == '' && $eco_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('category_name', 'Name', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $category_status = $this->input->post('category_status');
      if(!isset($category_status)){ $category_status = 0; }
      $update_data = array(
      'category_name' => $this->input->post('category_name'),
      'main_category_id' => $this->input->post('main_category_id'),
      'category_status' => $category_status,
      'category_date' => date('d-m-Y h:m:s A'),
      'category_addedby' => $eco_user_id,
      );
      $this->User_Model->update_info('category_id', $category_id, 'category', $update_data);
      if(isset($_FILES['category_img']['name'])){
         $time = time();
         $image_name = 'category_'.$category_id.'_'.$time;
         $config['upload_path'] = 'assets/images/category/';
         $config['allowed_types'] = 'png|jpg';
         $config['file_name'] = $image_name;
         $filename = $_FILES['category_img']['name'];
         $ext = pathinfo($filename, PATHINFO_EXTENSION);
         $this->upload->initialize($config);
         if ($this->upload->do_upload('category_img')){
           $up_image = array(
             'category_img' => $image_name.'.'.$ext,
           );
           $this->User_Model->update_info('category_id', $category_id, 'category', $up_image);
           $old_img = $this->input->post('old_img');
           if($old_img){ unlink("assets/images/category/".$old_img); }
           $this->session->set_flashdata('upload_status','success');
         }
         else{
           $error = $this->upload->display_errors();
           $this->session->set_flashdata('upload_status',$this->upload->display_errors());
         }
       }

      $this->session->set_flashdata('update_success','success');
      header('location:'.base_url().'User/category_list');
    }
    $category_info = $this->User_Model->get_info_arr('category_id',$category_id,'category');
    if(!$category_info){ header('location:'.base_url().'User/category_list'); }
    $data['update'] = 'update';
    $data['category_name'] = $category_info[0]['category_name'];
    $data['main_category_id'] = $category_info[0]['main_category_id'];
    $data['category_status'] = $category_info[0]['category_status'];
    $data['category_img'] = $category_info[0]['category_img'];
    $data['main_category_list'] = $this->User_Model->get_list($eco_company_id,'main_category_name','ASC','main_category');

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/category', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete Category....
  public function delete_category($category_id){
    $out_user_id = $this->session->userdata('out_user_id');
    $out_company_id = $this->session->userdata('out_company_id');
    $out_roll_id = $this->session->userdata('out_roll_id');
    if($out_user_id == '' && $out_company_id == ''){ header('location:'.base_url().'User'); }
    $category_info = $this->User_Model->get_info_arr_fields('category_img','category_id', $category_id, 'category');
    $this->User_Model->delete_info('category_id', $category_id, 'category');
    if($category_info){ unlink("assets/images/category/".$category_info[0]['category_img']); }
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'User/category_list');
  }

/***********************     Product Information      ******************************/

  public function product_list(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/product_list');
    $this->load->view('Include/footer');
  }
  public function product(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/product');
    $this->load->view('Include/footer');
  }

/***********************     Product Attr Information      ******************************/

  public function product_attri_list(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/product_attri_list');
    $this->load->view('Include/footer');
  }
  public function product_attri(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/product_attri');
    $this->load->view('Include/footer');
  }

/***********************     Inventory Information      ******************************/

  public function inventory_list(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/inventory_list');
    $this->load->view('Include/footer');
  }
  public function inventory(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/inventory');
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
