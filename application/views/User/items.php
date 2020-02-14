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
            <h1>Item Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8 offset-md-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <h3 class="card-title">Add Item Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <label>Item Name*</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_company" id="supplier_company" value="<?php if(isset($supplier_company)){ echo $supplier_company; } ?>" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Type</label>
                    <select class="form-control select2" name="item_type_id" id="item_type_id" data-placeholder="Select Type">
                      <option value="">Select Type</option>
                      <option >1</option>
                      <option >2</option>
                      <option >3</option>
                    </select>
                  </div>
                  <div class="col-md-6 pt-2 mb-2 px-3 div_left">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="is_addr_same" id="is_addr_same" value="1" checked>
                          <label for="is_addr_same" class="custom-control-label">In Sales</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Rate</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_gstin" id="supplier_gstin" value="<?php if(isset($supplier_gstin)){ echo $supplier_gstin; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Discount</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_pan" id="supplier_pan" value="<?php if(isset($supplier_pan)){ echo $supplier_pan; } ?>" placeholder="%" required>
                      </div>
                      <div class="form-group col-md-12">
                        <textarea class="form-control form-control-sm" name="supplier_pan" id="supplier_pan" placeholder="Description" required><?php if(isset($supplier_pan)){ echo $supplier_pan; } ?></textarea>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Account</label>
                        <select class="form-control select2" name="sale_account_id" id="sale_account_id" data-placeholder="Select Account">
                          <option value="">Select Account</option>
                          <option >1</option>
                          <option >2</option>
                          <option >3</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pt-2 mb-2 px-3 div_right">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="is_addr_same" id="is_addr_same" value="1" checked>
                          <label for="is_addr_same" class="custom-control-label">In Purchase</label>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Rate</label>
                        <input type="text" class="form-control form-control-sm" name="supplier_gstin" id="supplier_gstin" value="<?php if(isset($supplier_gstin)){ echo $supplier_gstin; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" name="is_addr_same" id="is_addr_same" value="1" checked>
                          <label for="is_addr_same" class="custom-control-label">ITC</label>
                        </div>
                      </div>
                      <div class="form-group col-md-12">
                        <textarea class="form-control form-control-sm" name="supplier_pan" id="supplier_pan" placeholder="Description" required><?php if(isset($supplier_pan)){ echo $supplier_pan; } ?></textarea>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Account</label>
                        <select class="form-control select2" name="purchase_account_id" id="purchase_account_id" data-placeholder="Select Account">
                          <option value="">Select Account</option>
                          <option >1</option>
                          <option >2</option>
                          <option >3</option>
                        </select>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-3 select_sm" >
                    <label>Unit</label>
                    <select class="form-control select2" name="unit_id" id="unit_id" data-placeholder="Select Unit">
                      <option value="">Select Unit</option>
                      <option >1</option>
                      <option >2</option>
                      <option >3</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>SKU/Barcode</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_gstin" id="supplier_gstin" value="<?php if(isset($supplier_gstin)){ echo $supplier_gstin; } ?>" placeholder="" required>
                  </div>
                  <div class="form-group col-md-3 select_sm">
                    <label>Tax</label>
                    <select class="form-control select2" name="tax_id" id="tax_id" data-placeholder="Select Tax">
                      <option value="">Select Tax</option>
                      <option >1</option>
                      <option >2</option>
                      <option >3</option>
                    </select>
                  </div>
                  <div class="form-group col-md-3">
                    <label>HSN Code</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_gstin" id="supplier_gstin" value="<?php if(isset($supplier_gstin)){ echo $supplier_gstin; } ?>" placeholder="" required>
                  </div>

                  <div class="form-group col-md-12 select_sm">
                    <label>Category</label>
                    <select class="form-control select2" name="categort_id" id="categort_id" data-placeholder="Select Category">
                      <option value="">Select Category</option>
                      <option >1</option>
                      <option >2</option>
                      <option >3</option>
                    </select>
                  </div>

                  <div class="form-group col-md-3">
                    <div class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" name="is_addr_same" id="is_addr_same" value="1" checked>
                      <label for="is_addr_same" class="custom-control-label">Track Inventory</label>
                    </div>
                  </div>
                  <div class="form-group col-md-3">
                    <label>Stock Alert Level</label>
                    <input type="text" class="form-control form-control-sm" name="supplier_gstin" id="supplier_gstin" value="<?php if(isset($supplier_gstin)){ echo $supplier_gstin; } ?>" placeholder="" required>
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

</script>
</body>
</html>
