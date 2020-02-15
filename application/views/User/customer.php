<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Customer</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-6 offset-md-3">
                    <div class="row">
                      <div class="form-group col-md-12 select_sm">
                        <label>Customer Level</label>
                        <select class="form-control select2" name="customer_level_id" id="customer_level_id" data-placeholder="Select Customer Level">
                          <option value="">Select Customer Level</option>
                          <?php if(isset($customer_level_list)){ foreach ($customer_level_list as $list) { ?>
                          <option value="<?php echo $list->customer_level_id; ?>" <?php if(isset($customer_info) && $customer_info['customer_level_id'] == $list->customer_level_id){ echo 'selected'; } ?>><?php echo $list->customer_level_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>First Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_fname" id="customer_fname" value="<?php if(isset($customer_info)){ echo $customer_info['customer_fname']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_lname" id="customer_lname" value="<?php if(isset($customer_info)){ echo $customer_info['customer_lname']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date Of Birth</label>
                        <input type="text" class="form-control form-control-sm" name="customer_dob" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($customer_info)){ echo $customer_info['customer_dob']; } else{ echo date('d-m-Y'); } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-3 mb-0">
                        <label for="">Gender : </label>
                        <div class="form-check">
                          <input class="form-check-input" value="Male" type="radio" name="customer_gender" <?php if(isset($customer_info) && $customer_info['customer_gender'] == 'Male'){ echo 'checked'; } elseif (!isset($customer_info)){ echo 'checked'; } ?>>
                          Male
                        </div>
                      </div>
                      <div class="form-group col-md-3 mb-0">
                        <div class="form-check" style="margin-top:22px;">
                          <input class="form-check-input" value="Female" type="radio" name="customer_gender" <?php if(isset($customer_info) && $customer_info['customer_gender'] == 'Female'){ echo 'checked'; } ?>>
                          Female
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Mobile</label>
                        <input type="number" class="form-control form-control-sm" name="customer_mobile" id="customer_mobile" value="<?php if(isset($customer_info)){ echo $customer_info['customer_mobile']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm" name="customer_email" id="customer_email" value="<?php if(isset($customer_info)){ echo $customer_info['customer_email']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="password" class="form-control form-control-sm" name="customer_password" id="customer_password" value="<?php if(isset($customer_info)){ echo $customer_info['customer_password']; } ?>" placeholder="Password" required>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="customer_status" id="customer_status" value="1" <?php if(isset($customer_info) && $customer_info['customer_status'] == 1){ echo 'checked'; } elseif (!isset($customer_info)){ echo 'checked'; } ?>>
                      <label for="customer_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/supplier_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
// Check Mobile Duplication..
  var customer_mobile1 = $('#customer_mobile').val();
  $('#customer_mobile').on('change',function(){
    var customer_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_mobile",
             "column_val":customer_mobile,
             "table_name":"customer"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_mobile').val(customer_mobile1);
          toastr.error(customer_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var customer_email1 = $('#mobile').val();
  $('#customer_email').on('change',function(){
    var customer_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_email",
             "column_val":customer_email,
             "table_name":"customer"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_email').val(customer_email1);
          toastr.error(customer_email+' Email Id Exist.');
        }
      }
    });
  });
</script>
</body>
</html>
