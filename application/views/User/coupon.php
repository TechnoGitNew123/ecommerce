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
            <h1>Coupon</h1>
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
                <h3 class="card-title">Add Coupon</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-12 ">
                    <div class="row">

                      <div class="form-group col-md-6">
                        <label>Coupon Code </label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6 select_sm ">
                        <label>Discount Type</label>
                        <select class="form-control select2" name="tag_id" id="tag_id" data-placeholder="Discount Type">
                          <option value="">Discount Type</option>
                          <option >Active</option>
                        </select>
                      </div>


                      <div class="form-group col-md-6">
                        <label>Description (Optional)</label>
                      <textarea name="name" class="form-control" rows="3" cols="65"></textarea>  </div>

                      <div class="form-group col-md-6">
                        <label>Coupon Amount</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Allow Free Shipping</label>
                        <div class="custom-control custom-checkbox ml-2">
                          <input class="custom-control-input" type="checkbox" name="supplier_status" id="free_shipping" value="1" >
                          <label for="free_shipping" class="custom-control-label">Check this box if the coupon grants free shipping. A free shipping method must be enabled in your shipping zone and be set to require "a valid free shipping coupon" (see the "Free Shipping Requires" setting).</label>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Coupon Expiry Date</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Minimum Spend</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Maximum Spend</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Individual Use Only</label>
                        <div class="custom-control custom-checkbox ml-2">
                          <input class="custom-control-input" type="checkbox" name="supplier_status" id="supplier_status" value="1" >
                          <label for="supplier_status" class="custom-control-label">Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are no sale items in the cart.</label>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Exclude Sale Items</label>
                        <div class="custom-control custom-checkbox ml-2">
                          <input class="custom-control-input" type="checkbox" name="supplier_status" id="exclude_sale" value="1" >
                          <label for="exclude_sale" class="custom-control-label">Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are no sale items in the cart.</label>
                        </div>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Products</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Exclude Products</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Categories</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Exclude Categories</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Email Restrictions</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Usage Limit Per Coupon</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Usage Limit Per User</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
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
                    <a href="<?php echo base_url() ?>User/manufacturer_list" class="btn btn-default ml-4">Cancel</a>
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
