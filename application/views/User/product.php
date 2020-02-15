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
            <h1>Product</h1>
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
                <h3 class="card-title">Add Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="form-group col-md-6  ">
                        <label>Product Type</label>
                        <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Select Tags">
                          <option value="">Select Tags</option>
                          <option >1</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Manufacturer</label>
                        <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Select Tags">
                          <option value="">Select Tags</option>
                          <option >1</option>
                        </select>
                      </div>

                      <div class="form-group col-md-12 select_sm">
                        <label>Category</label>
                        <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Category">
                          <option value="">Category</option>
                          <option >1</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Is Feature</label>
                        <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Is Feature">
                          <option value="">No</option>
                          <option >yes</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6 select_sm">
                        <label>Status</label>
                        <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Status">
                          <option value="">Status</option>
                          <option >Active</option>
                        </select>
                      </div>


                      <div class="form-group col-md-6">
                        <label>Product Price </label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6 select_sm ">
                        <label>Tax Slab</label>
                        <select class="form-control select2" name="tag_id" id="tag_id" data-placeholder="Tax Slab">
                          <option value="">Tax Slab</option>
                          <option >Active</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Min Order Limit</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Max Order Limit</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Product Weight</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                        <label>Product Model</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                      </div>

                      <div class="form-group col-md-6">
                          <label>Image</label>
                        <input type="file" name="package_img" id="package_img" class="form-control" id="exampleInputFile">
                      </div>

                </div>
              </div>
              <hr>
              <div class="col-md-6">
                <div class="row">
                <div class="form-group col-md-12">
                  <label>Flash Sale</label>
                  <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Flash Sale">
                    <option value="">Flash Sale</option>
                    <option >Active</option>
                  </select>
                </div>

                  <div class="form-group col-md-12">
                    <label>Flash Sale Price</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Flash Sale Start Date*</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6">
                      <label>time</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6">
                    <label>Flash Sale End Date*</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6">
                      <label>time</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Status</label>
                    <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Status">
                      <option value="">Status</option>
                      <option >Active</option>
                    </select>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="row">
                  <div class="form-group col-md-12 select_sm">
                    <label>Special</label>
                    <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Special">
                      <option value="">Special</option>
                      <option >Active</option>
                    </select>
                  </div>
                  <div class="form-group col-md-12">
                    <label>Special Price*</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-12">
                    <label>Expiry Date*</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-6 select_sm">
                    <label>Status</label>
                    <select class="form-control select2 select_sm" name="tag_id" id="tag_id" data-placeholder="Status">
                      <option value="">Status</option>
                      <option >Active</option>
                    </select>
                  </div>


                </div>
              </div>
              <hr>
              <div class="col-md-8 offset-md-2">
                <div class="form-group col-md-12">
                  <label>Product Name</label>
                  <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                </div>


              <div class="col-md-12">
                  <label>Description</label>
                  <textarea class="textarea" name="blog_details" placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> <?php if(isset($blog_details)){ echo $blog_details; } ?> </textarea>
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
