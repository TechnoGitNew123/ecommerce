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
                  <div class="col-md-6  offset-md-3">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>First Name</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Last Name</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_name" id="supplier_name" value="<?php if(isset($supplier_name)){ echo $supplier_name; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Date Of Birth</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_display_name" id="supplier_display_name" value="<?php if(isset($supplier_display_name)){ echo $supplier_display_name; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Mobile</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_gstin" id="supplier_gstin" value="<?php if(isset($supplier_gstin)){ echo $supplier_gstin; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Email</label>
                        <input type="email" class="form-control form-control-sm" name="supplier_pan" id="supplier_pan" value="<?php if(isset($supplier_pan)){ echo $supplier_pan; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-12">
                        <label>Password</label>
                        <input type="number" class="form-control form-control-sm" name="supplier_tds" id="supplier_tds" value="<?php if(isset($supplier_tds)){ echo $supplier_tds; } ?>" placeholder="Password" required>
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <label for="">Gender : </label>
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <div class="form-check">
                          <input class="form-check-input" value="Male" type="radio" checked="" name="member_gender">
                          Male
                        </div>
                      </div>
                      <div class="form-group col-md-2 mb-0">
                        <div class="form-check">
                          <input class="form-check-input" value="Female" type="radio" name="member_gender">
                          Female
                        </div>
                      </div>
                    </div>
                  </div>




                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="supplier_status" id="supplier_status" value="1" checked>
                      <label for="supplier_status" class="custom-control-label">Active</label>
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
  var supplier_mobile1 = $('#supplier_mobile').val();
  $('#supplier_mobile').on('change',function(){
    var supplier_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"supplier_mobile",
             "column_val":supplier_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#supplier_mobile').val(supplier_mobile1);
          toastr.error(supplier_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var supplier_email1 = $('#mobile').val();
  $('#supplier_email').on('change',function(){
    var supplier_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"supplier_email",
             "column_val":supplier_email,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#supplier_email').val(supplier_email1);
          toastr.error(supplier_email+' Email Id Exist.');
        }
      }
    });
  });
</script>
</body>
</html>
