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
          <div class="col-sm-12 mt-1 text-center">
            <h4>PURCHASE BILL</h4>
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
            <div class="card">
            <!-- /.card-header -->
            <div class="card-body" >

              <?php if(isset($update)){ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/update_sale" method="post">
                  <input type="hidden" name="sale_id" value="<?php echo $sale_id; ?>">
              <?php } else{ ?>
                <form role="form" action="<?php echo base_url(); ?>Transaction/save_sale" method="post">
              <?php } ?>

                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2">
                    <input type="text" class="form-control form-control-sm" name="sale_bill_no" id="sale_bill_no" value="<?php if(isset($sale_bill_no)){ echo $sale_bill_no; } ?>" placeholder="Sale Bill No." readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <input type="text" class="form-control form-control-sm" name="sale_date" id="date1" data-target="#date1" data-toggle="datetimepicker" value="<?php if(isset($sale_date)){ echo $sale_date; } ?>" placeholder="Sale Bill Date" required>
                  </div>
                  <div class="form-group col-md-8 offset-md-2">
                    <select class="form-control select2 select_sm form-control-sm" name="sale_party" id="sale_party" style="width: 100%;" required>
                      <option selected="selected select_sm" value="" >Select Party Name</option>
                      <?php foreach ($party_list as $party_list1) { ?>
                        <option value="<?php echo $party_list1->party_id; ?>"
                          <?php if(isset($sale_party)){ if($party_list1->party_id == $sale_party){ echo "selected"; } }
                                elseif ($delivery_party) { if($party_list1->party_id == $delivery_party){ echo "selected"; } }
                          ?>>
                          <?php echo $party_list1->party_firm; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group col-md-2">
                  </div> -->

                  <div class="form-group col-md-4 offset-md-2">
                    <select class="form-control select2 select_sm form-control-sm sale_challan_no" name="sale_challan_no" id="sale_challan_no" required>
                      <option selected="selected" value="">Select Delivery Challan No. for sale bill</option>
                      <?php if(isset($sale_challan_no) || isset($delivery_no)){ ?>
                        <option selected="selected" value="<?php echo $delivery_id; ?>"><?php echo $delivery_no; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <select class="form-control select2 select_sm form-control-sm" name="sale_employee" required>
                      <option selected="selected" value="">Select Employee</option>
                      <?php foreach ($user_list as $user_list1) { ?>
                        <option value="<?php echo $user_list1->user_id; ?>"
                          <?php if(isset($sale_employee)){ if($user_list1->user_id == $sale_employee){ echo "selected"; } }
                                elseif ($delivery_user) { if($user_list1->user_id == $delivery_user){ echo "selected"; } }
                          ?>>
                          <?php echo $user_list1->user_name; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              <div class=" w-100 text-right">
                <button type="button" id="add_row" class="btn btn-sm btn-primary mb-3 mr-1" width="150px">Add Row</button>
              </div>
              <div class="" style="overflow-x:auto;">
                <table id="myTable" class="table table-bordered table-striped tbl_add" style="">
                  <thead>
                  <tr>
                    <th class="sr_no">Sr. No.</th>
                    <th class="sr_no">bill . No.</th>
                    <th class="td_w">GST</th>
                    <th class="td_w">Qty</th>
                    <th class="td_w">Rate</th>
                    <th class="td_w">Amount</th>
                    <th class="td_btn"></th>
                  </tr>
                  </thead>
                  <tbody>

                    <input type="hidden" name="" value="">
                    <tr>
                      <td class="sr_no"></td>


                      <td class="td_w">
                        <input type="text" class="form-control form-control-sm " name="" value="" id="" placeholder="Bill no.">
                      </td>

                      <td class="td_w">
                        <input type="number" class="form-control form-control-sm gst" name="" value="" id="" placeholder="" required>
                      </td>
                      <td class="td_w">
                        <input type="number" class="form-control form-control-sm qty" name="" value="" id="" placeholder="" required>
                      </td>
                      <td class="td_w">
                        <input type="number" class="form-control form-control-sm rate" name="" value="" id="" placeholder="" required>
                      </td>
                      <td class="td_w">
                        <input type="number" class="form-control form-control-sm amount" name="" value="" id="" placeholder="" readonly >
                      </td>
                      <td class="td_btn">
                         <a><i class="fa fa-trash text-danger"></i></a>
                        <input type="hidden" name="" class="gst_amount1 gst_amount" value="">
                      </td>
                    </tr>
                </table>
              </div>
              <div class="row">
                <div class="col-md-6">

                </div>

                <div class="col-md-6 ">
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Basic Amount</label>
                    <div class="">
                      <input type="text" name="total_base_amount" class="form-control" id="basic_amount" value="<?php if(isset($total_base_amount)){ echo $total_base_amount; } elseif (isset($delivery_basic)) { echo $delivery_basic; } ?>">
                    </div>
                  </div>
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">GST Amount</label>
                    <div class="">
                      <input type="text" name="total_gst" class="form-control" id="gst_val" value="<?php if(isset($total_gst)){ echo $total_gst; } elseif (isset($delivery_gst)) { echo $delivery_gst; } ?>">
                    </div>
                  </div>
                  <div class="form-group row pt-4 float-right">
                    <label for="inputEmail3" class=" col-form-label mr-3">Total Amount</label>
                    <div class="">
                      <input type="text" name="sale_total" class="form-control" id="sale_total" value="<?php if(isset($sale_total)){ echo $sale_total; } elseif (isset($delivery_total)) { echo $delivery_total; } ?>" readonly>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
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

  $('#add_row').click(function(){
    i++;
    var row = '';
        row += '<tr ><td class="sr_no">'+i+'</td>';
              row += '<td>';
              row += '<select class="form-control form-control-sm make_id" name="input['+i+'][make_id]"  style="width: 100%;">';
              row += '<option value="0">Select Make</option>';
              <?php foreach ($make_list as $make_list1) { ?>
                row += '<option value="<?php echo $make_list1->make_id; ?>"><?php echo $make_list1->make_name ?></option>';
              <?php } ?>
              row += '</select>';
              row += '</td>';
              row += '<td>';
              row += '<select class="form-control form-control-sm model_no" name="input['+i+'][model_no_id]" style="width: 100%;">';
              row += '<option value="">Select Model</option>';
                <?php foreach ($model_list as $model_list1) { ?>
              row += '<option value="<?php echo $model_list1->product_id; ?>"><?php echo $model_list1->product_model_no ?></option>';
              <?php } ?>
              row += '</select>';
              row += '</td>';
              row += '<td><input type="text" class="form-control form-control-sm" name="input['+i+'][machine_serial_no]" id="" placeholder="Machine Serial No."></td>';
              row += '<td>';
              row += '<select class="form-control form-control-sm capacity" name="input['+i+'][capacity_id]">';
              row += '<option value="">Select Capacity</option>';
                <?php foreach ($capacity_list as $capacity_list1) { ?>
              row += '<option value="<?php echo $capacity_list1->capacity_id; ?>"><?php echo $capacity_list1->capacity_name ?></option>';
                <?php } ?>
              row += '</select>';
              row += '</td>';
              row += '<td>';
              row += '<select class="form-control form-control-sm accuracy" name="input['+i+'][accuracy_id]">';
              row += '<option value="">Select Accuracy</option>';
              <?php foreach ($accuracy_list as $accuracy_list1) { ?>
              row += '<option value="<?php echo $accuracy_list1->accuracy_id; ?>"><?php echo $accuracy_list1->accuracy_name ?></option>';
              <?php } ?>
              row += '</select>';
              row += '</td>';
              row += '<td>';
              row += '<select class="form-control form-control-sm class" name="input['+i+'][class_id]">';
              row +='<option value="">Select Class</option>';
              <?php foreach ($class_list as $class_list1) { ?>
              row +='<option value="<?php echo $class_list1->class_id; ?>"><?php echo $class_list1->class_name ?></option>';
              <?php } ?>
              row += '</select>';
              row += '</td>';
              row += '<td>';
              row += '<select class="form-control form-control-sm platter" name="input['+i+'][platter_id]">';
              row += '<option value="">Select Platter</option>';
                <?php foreach ($platter_list as $platter_list1) { ?>
              row += '<option value="<?php echo $platter_list1->platter_id; ?>"><?php echo $platter_list1->platter_size ?></option>';
              <?php } ?>
              row += '</select>';
              row += '</td>';
              row += '<td class="td_w"><input type="text" class="form-control form-control-sm gst" name="input['+i+'][sale_trans_gst]" id="" placeholder="GST" required></td>';
              row += '<td class="td_w"><input type="text" class="form-control form-control-sm qty" name="input['+i+'][sale_trans_qty]" id="" placeholder="Qty" required></td>';
              row += '<td class="td_w"><input type="text" class="form-control form-control-sm rate" name="input['+i+'][sale_trans_rate]" id="" placeholder="Rate" required></td>';
              row += '<td class="td_w"><input type="text" class="form-control form-control-sm amount" name="input['+i+'][sale_trans_amount]" id="" placeholder="Amount" required readonly></td>';
              row += '<td class="td_btn"><a> <i class="fa fa-trash text-danger"></i> </a>'
              row += '<input type="hidden" name="input['+i+'][sale_trans_gst_amount]" class="gst_amount1 gst_amount" value=""></td>';
              row += '</tr>';
    $('#myTable').append(row);
  });
</script>
</body>
</html>
