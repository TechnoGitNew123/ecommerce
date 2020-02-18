<?php
class User_Model extends CI_Model{

  function check_login($email, $password){
    $query = $this->db->select('*')
      ->where('user_email', $email)
      ->where('user_password', $password)
      ->from('user')
      ->get();
    $result = $query->result_array();
    return $result;
  }

  public function save_data($tbl_name, $data){
    $this->db->insert($tbl_name, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function get_list($company_id,$id,$order,$tbl_name){
    $this->db->select('*');
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->order_by($id, $order);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list2($id,$order,$tbl_name){
    $this->db->select('*');
    $this->db->order_by($id, $order);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id($col_name1,$col_val1,$col_name2,$col_val2,$order_col,$order,$tbl_name){
    $this->db->select('*');
    if($col_name1 != ''){
      $this->db->where($col_name1,$col_val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2,$col_val2);
    }
    if($order_col != ''){
      $this->db->order_by($order_col, $order);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_list_by_id_com($company_id,$col_name1,$col_val1,$col_name2,$col_val2,$order_col,$order,$tbl_name){
    $this->db->select('*');
    if($company_id != ''){
      $this->db->where('company_id',$company_id);
    }
    if($col_name1 != ''){
      $this->db->where($col_name1,$col_val1);
    }
    if($col_name2 != ''){
      $this->db->where($col_name2,$col_val2);
    }
    if($order_col != ''){
      $this->db->order_by($order_col, $order);
    }
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_info($id_type, $id, $tbl_name){
    $this->db->select('*');
    $this->db->where($id_type, $id);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function get_info_arr($id_type, $id, $tbl_name){
    $this->db->select('*');
    $this->db->where($id_type, $id);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_info_arr_fields($fields,$id_type, $id, $tbl_name){
    $this->db->select($fields);
    $this->db->where($id_type, $id);
    $this->db->from($tbl_name);
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function update_info($id_type, $id, $tbl_name, $data){
    $this->db->where($id_type, $id)
    ->update($tbl_name, $data);
  }

  public function delete_info($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id)
    ->delete($tbl_name);
  }

  public function check_duplication($company_id,$value,$field_name,$table_name){
    $this->db->select($field_name);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  public function user_list($company_id){
    $this->db->select('*');
    $this->db->where('is_admin', 0);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->from('user');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function check_dupli_num($company_id,$value,$field_name,$table_name){
    $this->db->select($field_name);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $num = $query->num_rows();
    return $num;
  }

  // Get Count...
  public function get_count($id_type,$company_id,$added_by,$mat_user_id,$status_col,$status_key,$tbl_name){
    $this->db->select($id_type);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    if($added_by != ''){
      $this->db->where($added_by, $mat_user_id);
    }
    if($status_col != ''){
      $this->db->where($status_col, $status_key);
    }

    $this->db->from($tbl_name);
      $query =  $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  // function check_otp($otp, $user_id){
  //   $query = $this->db->select('*')
  //       ->where('user_otp', $otp)
  //       ->where('user_id', $user_id)
  //       ->from('law_user')
  //       ->get();
  //   $result = $query->result_array();
  //   return $result;
  // }
  //
  // function check_pwd($user_id,$old_password){
  //   $query = $this->db->select('user_id')
  //       ->where('user_password', $old_password)
  //       ->where('user_id', $user_id)
  //       ->from('law_user')
  //       ->get();
  //   $result = $query->result_array();
  //   return $result;
  // }

  // public function get_count($id_type,$company_id,$key,$tbl_name){
  //   $this->db->select($id_type);
  //   if($key != ''){
  //     $this->db->where('application_status', $key);
  //   }
  //   $this->db->where('company_id', $company_id);
  //   $this->db->from($tbl_name);
  //     $query =  $this->db->get();
  //   $result = $query->num_rows();
  //   return $result;
  // }
  // public function get_count2($id_type,$key,$tbl_name){
  //   $this->db->select($id_type);
  //   if($key != ''){
  //     $this->db->where('application_status', $key);
  //   }
  //   $this->db->from($tbl_name);
  //     $query =  $this->db->get();
  //   $result = $query->num_rows();
  //   return $result;
  // }


}
?>
