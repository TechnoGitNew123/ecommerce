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
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="form-group col-md-6">
                        <label>Coupon Code </label>
                        <input type="text" class="form-control form-control-sm" name="coupon_code" id="coupon_code" value="<?php if(isset($coupon_info['coupon_code'])){ echo $coupon_info['coupon_code']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6 select_sm ">
                        <label>Discount Type</label>
                        <select class="form-control select2" name="coupon_disc_type" id="coupon_disc_type" data-placeholder="Discount Type">
                          <option value="">Discount Type</option>
                          <option value="1" <?php if(isset($coupon_info['coupon_disc_type']) && $coupon_info['coupon_disc_type'] == '1'){ echo 'selected'; } ?>>Cart Discount</option>
                          <option value="2" <?php if(isset($coupon_info['coupon_disc_type']) && $coupon_info['coupon_disc_type'] == '2'){ echo 'selected'; } ?>>Cart % Discount</option>
                          <option value="3" <?php if(isset($coupon_info['coupon_disc_type']) && $coupon_info['coupon_disc_type'] == '3'){ echo 'selected'; } ?>>Product Discount</option>
                          <option value="4" <?php if(isset($coupon_info['coupon_disc_type']) && $coupon_info['coupon_disc_type'] == '4'){ echo 'selected'; } ?>>Product % Discount</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Description (Optional)</label>
                        <textarea name="coupon_desc" id="coupon_desc" class="form-control" rows="3" cols="65"><?php if(isset($coupon_info['coupon_desc'])){ echo $coupon_info['coupon_desc']; } ?></textarea>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Coupon Amount</label>
                        <input type="number" min="1" class="form-control form-control-sm" name="coupon_amt" id="coupon_amt" value="<?php if(isset($coupon_info['coupon_amt'])){ echo $coupon_info['coupon_amt']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Allow Free Shipping</label>
                        <div class="custom-control custom-checkbox ml-2">
                          <input class="custom-control-input" type="checkbox" name="free_shipping" id="free_shipping" value="1" <?php if(isset($coupon_info['free_shipping']) && $coupon_info['free_shipping'] == '1'){ echo 'checked'; } ?>>
                          <label for="free_shipping" class="custom-control-label">Check this box if the coupon grants free shipping. A free shipping method must be enabled in your shipping zone and be set to require "a valid free shipping coupon" (see the "Free Shipping Requires" setting).</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Coupon Expiry Date</label>
                        <input type="text" class="form-control form-control-sm" name="coupon_exp_date" id="coupon_exp_date" value="<?php if(isset($coupon_info['coupon_exp_date'])){ echo $coupon_info['coupon_exp_date']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Minimum Spend</label>
                        <input type="text" class="form-control form-control-sm" name="coupon_min_spend" id="coupon_min_spend" value="<?php if(isset($coupon_info['coupon_min_spend'])){ echo $coupon_info['coupon_min_spend']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Maximum Spend</label>
                        <input type="text" class="form-control form-control-sm" name="coupon_max_spend" id="coupon_max_spend" value="<?php if(isset($coupon_info['coupon_max_spend'])){ echo $coupon_info['coupon_max_spend']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Individual Use Only</label>
                        <div class="custom-control custom-checkbox ml-2">
                          <input class="custom-control-input" type="checkbox" name="coupon_individual_use" id="coupon_individual_use" value="1" <?php if(isset($coupon_info['coupon_individual_use']) && $coupon_info['coupon_individual_use'] == '1'){ echo 'checked'; } ?>>
                          <label for="coupon_individual_use" class="custom-control-label">Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are no sale items in the cart.</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Exclude Sale Items</label>
                        <div class="custom-control custom-checkbox ml-2">
                          <input class="custom-control-input" type="checkbox" name="coupon_excl_sale_item" id="coupon_excl_sale_item" value="1" <?php if(isset($coupon_info['coupon_excl_sale_item']) && $coupon_info['coupon_excl_sale_item'] == '1'){ echo 'checked'; } ?>>
                          <label for="coupon_excl_sale_item" class="custom-control-label">Check this box if the coupon should not apply to items on sale. Per-item coupons will only work if the item is not on sale. Per-cart coupons will only work if there are no sale items in the cart.</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Products</label>
                        <select class="select2 form-control form-control-sm" name="coupon_products" id="coupon_products" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <?php if(isset($product_list)){ foreach ($product_list as $list) { ?>
                            <option value="<?php echo $list->product_id; ?>"><?php echo $list->product_name; ?></option>
                          <?php }} ?>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Exclude Products</label>
                        <select class="select2 form-control form-control-sm" name="coupon_excl_products" id="coupon_excl_products" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Categories</label>
                        <select class="select2 form-control form-control-sm" name="coupon_categories" id="coupon_categories" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6 select_sm">
                        <label>Exclude Categories</label>
                        <select class="select2 form-control form-control-sm" name="coupon_excl_categories" id="coupon_excl_categories" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                          <option>Alabama</option>
                          <option>Alaska</option>
                          <option>California</option>
                          <option>Delaware</option>
                          <option>Tennessee</option>
                          <option>Texas</option>
                          <option>Washington</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Email Restrictions</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($coupon_info[''])){ echo $coupon_info['']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Usage Limit Per Coupon</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($coupon_info[''])){ echo $coupon_info['']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Usage Limit Per User</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($coupon_info[''])){ echo $coupon_info['']; } ?>" placeholder="" required>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="card-footer row m-0">
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
              </div>
              </form>
            </div>
          </div>
        </div>
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
