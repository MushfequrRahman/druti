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
  <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/fabric_delivery_insert_all" method="post" enctype="multipart/form-data">
    <?php /*?>  <div class="text-right-input">
                                	<div class="row">
                                		<div class="col-md-3 col-md-offset-9">
                                			<input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'> 
                                		</div>
                                	</div> 
                                </div>
                                <br/><?php */ ?>
    <div class="row">
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>To<em>*</em></label>
        <select class="form-control" name="fabricideliverytypeid" id="fabricdeliverytypeid">
          <option value="">Select....</option>
          <?php
          foreach ($ul1 as $row) {
          ?>
            <option value="<?php echo $row['fabricideliverytypeid']; ?>"><?php echo $row['fabricdeliverytype']; ?></option>
          <?php
          }
          ?>
        </select>
        <?php echo form_error('fabricdeliverytypeid', '<div class="error">', '</div>');  ?>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Challan Number<em>*</em></label>
        <input type="text" class="form-control" name="challan" placeholder="Enter Challan">
        <?php echo form_error('challan', '<div class="error">', '</div>');  ?>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Remarks</label>
        <input type="text" class="form-control" name="dremarks" placeholder="Enter Remarks">
        <?php echo form_error('dremarks', '<div class="error">', '</div>');  ?>
      </div>
      <div class="col-sm-12 col-md-2 col-lg-2">
        <label>Delivery Date<em>*</em></label>
        <input type="text" class="form-control pd" name="ddate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
      </div>
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
          <!--<th>Date</th>
                 <th>Challan No</th>-->
          <th style=" display:none;">ID</th>
          <th>Rack No</th>
          <th>Buyer</th>
          <th>Job No</th>
          <th>Style</th>
          <th>Order</th>
          <!--<th>Color Code</th>-->
          <th>Color</th>
          <!--<th>Fabric Type</th>-->
          <th>Fabric Part</th>
          <th>Total Booking Qty</th>
          <th>Booking Dia</th>
          <!--<th>GSM</th>-->
          <th>Batch/Lot No</th>
          <!--<th>Dia</th>-->
          <th>Received Qty</th>
          <th>In Hand Rack Qty</th>
          <th>Issued Qty</th>
          <!--<th>Remaining Qty</th>-->

          <!--<th>Delivery</th>-->
          <th>To Be Issued Qty</th>
          <!-- <th>Rack Transfer</th>
                 <th>Order Transfer</th>-->
        </tr>
      </thead>
      <tbody>
        <?php /*?><?php echo form_error('dqty[]'); ?><?php */ ?>
        <?php
        $i = 1;
        foreach ($ul as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <?php /*?><td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['frcdate']));?></td>
                  <td style="vertical-align:middle;"><?php echo $row['challanno'];?></td><?php */ ?>
            <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="fabricreceivedid[]" readonly="readonly" id="fabricreceivedid" value="<?php echo $row['fabricreceivedid']; ?>"></td>
            <td style="vertical-align:middle;"><?php echo $row['rackno']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
            <?php /*?><td style="vertical-align:middle;"><?php echo $row['colorcode'];?></td><?php */ ?>
            <td style="vertical-align:middle;"><?php echo $row['colorname']; ?></td>
            <?php /*?><td style="vertical-align:middle;"><?php echo $row['fabrictype'];?></td><?php */ ?>
            <td style="vertical-align:middle;"><?php echo $row['fabricpart']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['bqty']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['bdia']; ?></td>
            <?php /*?><td style="vertical-align:middle;"><?php echo $row['gsm'];?></td><?php */ ?>
            <td style="vertical-align:middle;"><?php echo $row['lotno']; ?></td>
            <?php /*?><td style="vertical-align:middle;"><?php echo $row['dia'];?></td><?php */ ?>
            <?php /*?><?php
			if($row['frqty']==0)
			{
				?>
            <td style="vertical-align:middle; background: #FF9;"><strong>Received From Another Rack</strong></td>
            <?php
			}
			else
			{
			?>    
            <td style="vertical-align:middle;"><?php echo $row['frqty']; ?></td>
            <?php
			}
			?><?php */?>
            <td style="vertical-align:middle;"><?php echo $row['frqty']; ?></td>
            <td style="vertical-align:middle;"><input type="text" id="tfqty_<?php echo $i; ?>" class="form-control" name="tfqty[]" readonly="readonly" value="<?php echo number_format((float)$row['tfqty'], 2, '.', ''); ?>"></td>
            <?php $rem = $row['tfqty']; ?>
            <td style="vertical-align:middle;"><?php echo number_format((float)$row['deliveryamount'], 2, '.', ''); ?></td>

            <?php /*?><td style="vertical-align:middle;"><?php echo $rem=$row['tfqty'];?></td><?php */ ?>


            <?php /*?><?php 
				  if($rem > 0)
				  {
				  ?>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/fabric_delivery_form/<?php echo $bn=$row['fabricreceivedid'];?>"><strong>Delivery</strong></a></td>
                  <?php
				  }
				  else
				  {
				  ?>
                  <td style="vertical-align:middle;">&nbsp;</td>
                  <?php
				  }
				  ?><?php */ ?>
            <?php /*?><?php 
				  if($rem > 0)
				  {
				  ?>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/fabric_transfer_form/<?php echo $bn=$row['fabricreceivedid'];?>"><strong>Transfer</strong></a></td>
                  <?php
				  }
				  else
				  {
				  ?>
                  <td style="vertical-align:middle;">&nbsp;</td>
                  <?php
				  }
				  ?><?php */ ?>

            <!--ordrer transfer-->


            <?php /*?><?php 
				  if($rem > 0)
				  {
				  ?>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/fabric_order_transfer_form/<?php echo $bn=$row['fabricreceivedid'];?>/<?php echo $rem;?>"><strong>Transfer</strong></a></td>
                  <?php
				  }
				  else
				  {
				  ?>
                  <td style="vertical-align:middle;">&nbsp;</td>
                  <?php
				  }
				  ?><?php */ ?>
            <?php
            if ($rem > 0) {
            ?>
              <td style="vertical-align:middle;"><input type="text" id="dqty_<?php echo $i; ?>" class="form-control" name="dqty[]" value="0"></td>
              <?php echo form_error('dqty', '<div class="error">', '</div>');  ?>
            <?php
            } else {
            ?>
              <td style="vertical-align:middle;"><input type="text" id="dqty_<?php echo $i; ?>" class="form-control" readonly="readonly" name="dqty[]" value="0"></td>
              <?php echo form_error('dqty', '<div class="error">', '</div>');  ?>
            <?php
            }
            ?>
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
    $("input[id*='dqty']").keydown(function(event) {


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
<script>
  $(function() {
    $("#tfqty_1, #dqty_1").on("keyup", function() {
      var fst = $("#tfqty_1").val();
      var sec = $("#dqty_1").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_1").show();
        
        
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_2, #dqty_2").on("keyup", function() {
      var fst = $("#tfqty_2").val();
      var sec = $("#dqty_2").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_2").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_3, #dqty_3").on("keyup", function() {
      var fst = $("#tfqty_3").val();
      var sec = $("#dqty_3").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_3").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_4, #dqty_4").on("keyup", function() {
      var fst = $("#tfqty_4").val();
      var sec = $("#dqty_4").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_4").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_5, #dqty_5").on("keyup", function() {
      var fst = $("#tfqty_5").val();
      var sec = $("#dqty_5").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_5").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_6, #dqty_6").on("keyup", function() {
      var fst = $("#tfqty_6").val();
      var sec = $("#dqty_6").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_6").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_7, #dqty_7").on("keyup", function() {
      var fst = $("#tfqty_7").val();
      var sec = $("#dqty_7").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_7").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_8, #dqty_8").on("keyup", function() {
      var fst = $("#tfqty_8").val();
      var sec = $("#dqty_8").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_8").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_9, #dqty_9").on("keyup", function() {
      var fst = $("#tfqty_9").val();
      var sec = $("#dqty_9").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_9").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_10, #dqty_10").on("keyup", function() {
      var fst = $("#tfqty_10").val();
      var sec = $("#dqty_10").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_10").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_11, #dqty_11").on("keyup", function() {
      var fst = $("#tfqty_11").val();
      var sec = $("#dqty_11").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_11").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_12, #dqty_12").on("keyup", function() {
      var fst = $("#tfqty_12").val();
      var sec = $("#dqty_12").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_12").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_13, #dqty_13").on("keyup", function() {
      var fst = $("#tfqty_13").val();
      var sec = $("#dqty_13").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_13").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_14, #dqty_14").on("keyup", function() {
      var fst = $("#tfqty_14").val();
      var sec = $("#dqty_14").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_14").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_15, #dqty_15").on("keyup", function() {
      var fst = $("#tfqty_15").val();
      var sec = $("#dqty_15").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_15").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_16, #dqty_16").on("keyup", function() {
      var fst = $("#tfqty_16").val();
      var sec = $("#dqty_16").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_16").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_17, #dqty_17").on("keyup", function() {
      var fst = $("#tfqty_17").val();
      var sec = $("#dqty_17").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_17").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_18, #dqty_18").on("keyup", function() {
      var fst = $("#tfqty_18").val();
      var sec = $("#dqty_18").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_18").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_19, #dqty_19").on("keyup", function() {
      var fst = $("#tfqty_19").val();
      var sec = $("#dqty_19").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_19").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_20, #dqty_20").on("keyup", function() {
      var fst = $("#tfqty_20").val();
      var sec = $("#dqty_20").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_20").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_21, #dqty_21").on("keyup", function() {
      var fst = $("#tfqty_21").val();
      var sec = $("#dqty_21").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_21").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_22, #dqty_22").on("keyup", function() {
      var fst = $("#tfqty_22").val();
      var sec = $("#dqty_22").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_22").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_23, #dqty_23").on("keyup", function() {
      var fst = $("#tfqty_23").val();
      var sec = $("#dqty_23").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_23").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_24, #dqty_24").on("keyup", function() {
      var fst = $("#tfqty_24").val();
      var sec = $("#dqty_24").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_24").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_25, #dqty_25").on("keyup", function() {
      var fst = $("#tfqty_25").val();
      var sec = $("#dqty_25").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_25").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_26, #dqty_26").on("keyup", function() {
      var fst = $("#tfqty_26").val();
      var sec = $("#dqty_26").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_26").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_27, #dqty_27").on("keyup", function() {
      var fst = $("#tfqty_27").val();
      var sec = $("#dqty_27").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_27").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_28, #dqty_28").on("keyup", function() {
      var fst = $("#tfqty_28").val();
      var sec = $("#dqty_28").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_28").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_29, #dqty_29").on("keyup", function() {
      var fst = $("#tfqty_29").val();
      var sec = $("#dqty_29").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_29").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>
<script>
  $(function() {
    $("#tfqty_30, #dqty_30").on("keyup", function() {
      var fst = $("#tfqty_30").val();
      var sec = $("#dqty_30").val();
      if (Number(sec) > Number(fst)) {
        $("input").hide();
        $("#dqty_30").show();
        return true;
      }
      else{
        $(".btn,input").show();
        return false;
      }
    })
  })
</script>











