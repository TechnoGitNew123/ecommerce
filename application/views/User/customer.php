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
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-6 py-0 px-3">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Company Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_company" id="customer_company" value="<?php if(isset($customer_company)){ echo $customer_company; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Contact Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_name" id="customer_name" value="<?php if(isset($customer_name)){ echo $customer_name; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Display Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_display_name" id="customer_display_name" value="<?php if(isset($customer_display_name)){ echo $customer_display_name; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>GSTIN</label>
                        <input type="text" class="form-control form-control-sm" name="customer_gstin" id="customer_gstin" value="<?php if(isset($customer_gstin)){ echo $customer_gstin; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>PAN</label>
                        <input type="text" class="form-control form-control-sm" name="customer_pan" id="customer_pan" value="<?php if(isset($customer_pan)){ echo $customer_pan; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Composition Scheme</label>
                      </div>
                      <div class="form-group col-md-6">
                        <label>TDS</label>
                        <input type="number" class="form-control form-control-sm" name="customer_tds" id="customer_tds" value="<?php if(isset($customer_tds)){ echo $customer_tds; } ?>" placeholder="%" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Contact Mobile</label>
                        <input type="number" class="form-control form-control-sm" name="customer_mobile" id="customer_mobile" value="<?php if(isset($customer_mobile)){ echo $customer_mobile; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Work Phone</label>
                        <input type="number" class="form-control form-control-sm" name="customer_phone" id="customer_phone" value="<?php if(isset($customer_phone)){ echo $customer_phone; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Email Id</label>
                        <input type="email" class="form-control form-control-sm" name="customer_email" id="customer_email" value="<?php if(isset($customer_email)){ echo $customer_email; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Tags</label>
                        <select class="form-control select2" name="tag_id" id="tag_id" data-placeholder="Select Tags">
                          <option value="">Select Tags</option>
                          <option >1</option>
                          <option >2</option>
                          <option >3</option>
                        </select>
                      </div>
                      <div class="form-group col-md-12 select_sm mb-0">
                        <label>Ratesheet</label>
                        <select class="form-control select2" name="ratesheet_id" id="ratesheet_id" data-placeholder="Select Tags" name="">
                          <option value="">Select Tags</option>
                          <option >1</option>
                          <option >2</option>
                          <option >3</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 py-0 px-3">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Billing Address</label>
                      </div>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" name="customer_addr1" id="customer_addr1" value="<?php if(isset($customer_addr1)){ echo $customer_addr1; } ?>" placeholder="Address1" required>
                      </div>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" name="customer_addr2" id="customer_addr2" value="<?php if(isset($customer_addr2)){ echo $customer_addr2; } ?>" placeholder="Address2" required>
                      </div>
                      <div class="form-group col-md-6 mb-5">
                        <input type="text" class="form-control form-control-sm" name="customer_city" id="customer_city" value="<?php if(isset($customer_city)){ echo $customer_city; } ?>" placeholder="City/Town" required>
                      </div>
                      <div class="form-group col-md-6 mb-5">
                        <input type="number" class="form-control form-control-sm" name="customer_pin" id="customer_pin" value="<?php if(isset($customer_pin)){ echo $customer_pin; } ?>" placeholder="Postal/Zip Code" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Shipping address</label>
                      </div>
                      <div class="form-group col-md-6 text-right">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="is_addr_same" id="is_addr_same" value="1" checked>
                          <label for="is_addr_same" class="custom-control-label">Same as billing address</label>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" name="customer_s_addr1" id="customer_s_addr1" value="<?php if(isset($customer_s_addr1)){ echo $customer_s_addr1; } ?>" placeholder="Address1" required>
                      </div>
                      <div class="form-group col-md-12">
                        <input type="text" class="form-control form-control-sm" name="customer_s_addr2" id="customer_s_addr2" value="<?php if(isset($customer_s_addr2)){ echo $customer_s_addr2; } ?>" placeholder="Address2" required>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="text" class="form-control form-control-sm" name="customer_s_city" id="customer_s_city" value="<?php if(isset($customer_s_city)){ echo $customer_s_city; } ?>" placeholder="City/Town" required>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="number" class="form-control form-control-sm" name="customer_s_pin" id="customer_s_pin" value="<?php if(isset($customer_s_pin)){ echo $customer_s_pin; } ?>" placeholder="Postal/Zip Code" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="customer_status" id="customer_status" value="1" checked>
                      <label for="customer_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/customer_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
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
             "table_name":"user"},
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
             "table_name":"user"},
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
