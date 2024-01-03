<style type="text/css">
  .paging-nav {
    text-align: right;
    padding-top: 2px;
  }

  .paging-nav a {
    margin: auto 1px;
    text-decoration: none;
    display: inline-block;
    padding: 1px 7px;
    background: #91b9e6;
    color: white;
    border-radius: 3px;
  }

  .paging-nav .selected-page {
    background: #187ed5;
    font-weight: bold;
  }

  .paging-nav,
  #tableData {


    text-align: center;
  }

  th,
  td {
    font-size: 12px;
    text-align: center;
  }

  td {
    font-weight: 600;
    font-variant: small-caps;
  }
</style>
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>

<!-- /.box-header -->
<div class="box-body table-responsive no-padding">
  <?php /*?><form action="<?php echo base_url() ?>Dashboard/date_wise_mpr_list_xls" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="row padall">
      <div class="col-lg-12">
        <div class="float-right">
          <?php
          foreach ($ul as $row1) { ?>
            <input type="hidden" name="pd" value="<?php echo $pd; ?>" />
            <input type="hidden" name="wd" value="<?php echo $wd; ?>" />
          <?php
          }
          ?>
          <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
          <input type="radio" name="export_type" value="xls"> .xls
          <input type="radio" name="export_type" value="csv"> .csv
          <button type="submit" name="import" class="btn btn-primary btn-xs">Export</button>
        </div>
      </div>
    </div>
  </form><?php */ ?>
  <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/jobno_wise_fabric_receive_insert" method="post" enctype="multipart/form-data">
    <?php /*?>  <div class="text-right-input">
                                	<div class="row">
                                		<div class="col-md-3 col-md-offset-9">
                                			<input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'> 
                                		</div>
                                	</div> 
                                </div>
                                <br/><?php */ ?>
    <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Receive Date<em>*</em></label>
        <input type="text" class="form-control pd" name="frcdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Supplier<em>*</em></label>
        <select class="form-control" name="supplierid" id="supplierid">
          <option value="">Select....</option>
          <?php
          foreach ($sl as $row) {
          ?>
            <option value="<?php echo $row['supplierid']; ?>"><?php echo $row['supplier']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Challan Number<em>*</em></label>
        <input type="text" class="form-control" name="challanno" placeholder="Enter Challan">
        <?php echo form_error('challan', '<div class="error">', '</div>');  ?>
      </div>
      <?php /*?><div class="col-sm-12 col-md-2 col-lg-2">
        <label>Batch/Lotno<em>*</em></label>
        <input type="text" class="form-control" name="lotno" placeholder="Enter Batch/Lotno">
        <?php echo form_error('lotno', '<div class="error">', '</div>');  ?>
      </div><?php */?>
      
    </div>

    <div class="text-right-input">
      <div class="row">
        <div class="col-md-3 col-md-offset-9">
          <input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'>
        </div>
      </div>
    </div>
    <br />
    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;">
        <tr>
          <th>SL</th>

          
          
          <th>Buyer</th>
          <th style="display:none;">Buyer ID</th>
          <th>Job No</th>
          <th style="display:none;">Job ID</th>
          <th>Style</th>
          <th style="display:none;">Style ID</th>
          <th>Order</th>
          <th style="display:none;">Order ID</th>
          <th>Color</th>
          <th style="display:none;">Color ID</th>
          <th>Fabric Part</th>
          <th style="display:none;">Fabric Part ID</th>
          <th>Total Booking Qty</th>
          <th>Booking Dia</th>
          <th>UOM</th>
          <th>Booking Type</th>
          <th>Batch/Lotno</th>
          <th>DIA</th>
          <th>Receive Qty</th>
          <th>Rack No</th>

        </tr>
      </thead>
      <tbody>

        <?php
        $i = 1;
        foreach ($ul as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>

            
            
            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="buyerid[]" value="<?php echo $row['buyerid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="jobnoid[]" value="<?php echo $row['jobnoid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="styleid[]" value="<?php echo $row['styleid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="orderid[]" value="<?php echo $row['orderid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['colorname']; ?></td>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="colorid[]" value="<?php echo $row['colorid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['fabricpart']; ?></td>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="fabricpartid[]" value="<?php echo $row['fabricpartid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['bqty']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['bdia']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
            <td style="vertical-align:middle;"><select class="form-control" name="bookingtypeid[]" id="bookingtypeid">
                <!--<option value="">Select....</option>-->
                <?php
                foreach ($bl as $row1) {
                ?>
                  <option value="<?php echo $row1['bookingtypeid']; ?>"><?php echo $row1['bookingtype']; ?></option>
                <?php
                }
                ?>
              </select>
            </td>
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="lotno[]" placeholder="Enter Batch/Lotno"></td>
            <td style="vertical-align:middle;"><input type="text" class="form-control" name="dia[]" placeholder="Enter Dia"></td>
            <td style="vertical-align:middle;"><input type="text" class="form-control" id="rqty" name="rqty[]" placeholder="Enter Receive Qty"></td>
            <td style="vertical-align:middle;"><select class="form-control" name="racknoid[]" id="racknoid">
                <option value="">Select....</option>
                <?php
                foreach ($rl as $row1) {
                ?>
                  <option value="<?php echo $row1['racknoid']; ?>"><?php echo $row1['rackno']; ?></option>
                <?php
                }
                ?>
              </select>
            </td>
          </tr>
      </tbody>
    <?php } ?>
    </table>
    <div class="col-sm-12 col-md-2 col-lg-2 col-md-offset-5 col-lg-offset-5">
      <label>&nbsp;</label>
      <input type="submit" class="btn btn-primary " name="submit" id="btn" value="Submit" />
    </div>
  </form>
</div>
<script type='text/javascript'>
  $(document).ready(function() {


    // Search all columns

    $('#txt_searchall').keyup(function() {

      var search = $(this).val();


      $('table tbody tr').hide();


      var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;


      if (len > 0) {

        $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {

          $(this).closest('tr').show();

        });

      } else {

        $('.notfound').show();

      }



    });

  });

  // Case-insensitive searching (Note - remove the below script for Case sensitive search )

  $.expr[":"].contains = $.expr.createPseudo(function(arg) {

    return function(elem) {

      return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;

    };

  });
</script>




<script>
  $(function() {
    $("input[id*='rqty']").keydown(function(event) {


      if (event.shiftKey == true) {
        event.preventDefault();
      }

      if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190 || event.keyCode == 110) {

      } else {
        event.preventDefault();
      }

      if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
        event.preventDefault();

    });
  });
</script>
