<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    // $this->load->model('Transaction_Model');
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
}
