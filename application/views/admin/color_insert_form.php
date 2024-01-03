<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }

  label {
    font-size: 12px;
  }

  th {
    font-size: 12px;
  }
</style>
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>
<?php
$uom = '';
$fabricpart = '';
$fabrictypeid = '';

foreach ($ul2 as $row) {
  $uom .= '<option value="' . $row["puomid"] . '">' . $row["puom"] . '</option>';
}
foreach ($ul3 as $row) {
  $fabricpart .= '<option value="' . $row["fabricpartid"] . '">' . $row["fabricpart"] . '</option>';
}
foreach ($ul1 as $row) {
  $fabrictypeid .= '<option value="' . $row["fabrictypeid"] . '">' . $row["fabrictype"] . '</option>';
}
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Color Insert</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                    <span style="text-align:center" id="error"></span>
                    <div style="text-align:center" id="item_table"></div>
                    <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/color_insert" method="post" enctype="multipart/form-data"><?php */ ?>
                    <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-sm-3 md-3">
                          <label>Buyer Name<em>*</em></label>
                          <select class="form-control" name="buyerid" id="buyerid">
                            <option value="">Select....</option>
                            <?php
                            foreach ($ul as $row) {
                            ?>
                              <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                            <?php
                            }
                            ?>
                          </select>
                          <?php echo form_error('buyerid', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-sm-3 md-3">
                          <label>Job No<em>*</em></label>
                          <select class="form-control" name="jobno" id="jobno">
                            <option value="">Select....</option>

                          </select>
                          <?php echo form_error('jobno', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-sm-3 md-3">
                          <label>Style No<em>*</em></label>
                          <select class="form-control" name="style" id="style">
                            <option value="">Select....</option>

                          </select>
                          <?php echo form_error('style', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-sm-3 md-3">
                          <label>Order No<em>*</em></label>
                          <select class="form-control" name="orderno" id="orderno">
                            <option value="">Select....</option>

                          </select>
                          <?php echo form_error('orderno', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <?php /*?><div class="form-group">
                        <label>Fabric Type<em>*</em></label>
                        <select class="form-control" name="fabrictypeid" id="fabrictypeid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul1 as $row1) {
                          ?>
                            <option value="<?php echo $row1['fabrictypeid']; ?>"><?php echo $row1['fabrictype']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('fabrictypeid', '<div class="error">', '</div>');  ?>
                      </div><?php */ ?>
                        <div class="col-sm-3 md-3">
                          <label>Required GSM</label>
                          <input type="text" class="form-control" name="gsm" placeholder="Enter GSM" value="<?php echo set_value('gsm'); ?>">
                          <?php echo form_error('gsm', '<div class="error">', '</div>');  ?>
                        </div>
                        <div class="col-sm-3 md-3">
                          <label>Color Wise Order Qty<em>*</em></label>
                          <input type="text" class="form-control" name="cwoqty" placeholder="Enter Color Wise Order Qty" value="<?php echo set_value('cwoq'); ?>">
                          <?php echo form_error('cwoq', '<div class="error">', '</div>');  ?>
                        </div>
                        <?php /*?><div class="form-group">
					<label>Booking Qty<em>*</em></label>
					<input type="text" class="form-control" name="bqty" placeholder="Enter Booking Qty" value="<?php echo set_value('bqty'); ?>">
                    <?php echo form_error('bqty', '<div class="error">', '</div>');  ?>
				</div><?php */ ?>
                        <div class="col-sm-3 md-3">
                          <label>Color Code<em>*</em></label>
                          <input type="text" class="form-control" name="colorcode" id="colorcode" placeholder="Enter Color Code" value="<?php echo set_value('colorcode'); ?>">
                          <?php echo form_error('colorcode', '<div class="error">', '</div>');  ?>
                          <!--<div id="response" ></div>-->
                        </div>

                        <div class="col-sm-3 md-3">
                          <label>Color Name<em>*</em></label>
                          <input type="text" class="form-control" name="colorname" id="colorname" placeholder="Enter Color Name" value="<?php echo set_value('colorname'); ?>">
                          <?php echo form_error('colorname', '<div class="error">', '</div>');  ?>
                        </div>
                      </div>
                      <br />
                      <div class="row">
                        <div class="col-sm-12 md-12">
                          <label>Last TOD<em>*</em></label>
                          <input type="text" class="form-control pd" readonly name='tod' id="pd" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                      </div>
                      <br />
                      <div id="AuGroup">
                        <div class="row">
                          <table class="table table-bordered" id="item_table1">
                            <thead>
                              <tr>
                                <th style="text-align:center;">Booking Qty(Only Digit)</th>
                                <th style="text-align:center;">Booking Dia</th>
                                <th style="text-align:center;">Fabric Type</th>
                                <th style="text-align:center;">Fabric Part</th>
                                <th style="text-align:center;">Unit Of Measurment</th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                        <div class="box-footer text-center">
                          <?php /*?><input type="submit" class="btn btn-primary" name="submit" value="Submit" /><?php */ ?>
                          <div id="response"></div>
                        </div>
                      </div>
                      <div class="box-footer text-center">
                        <?php /*?><input type="submit" class="btn btn-primary" name="submit" value="Submit" /><?php */ ?>
                        <!--<div id="response" ></div>-->
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>











  <script type="text/javascript">
    $(document).ready(function() {

      $('#buyerid').change(function(event) {
        event.preventDefault();
        var buyerid = $('#buyerid').val();

        $.ajax({
          type: 'get',
          url: "<?php echo base_url(); ?>Dashboard/show_jobno",
          dataType: "json",
          data: {
            buyerid: buyerid
          },
          success: function(res) {
            $('#jobno').find('option').not(':first').remove();
            // Add options
            $.each(res, function(index, data) {
              $('#jobno').append('<option value="' + data['jobnoid'] + '">' + data['jobno'] + '</option>');
            });
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {

      $('#jobno').change(function(event) {
        event.preventDefault();
        var jobno = $('#jobno').val();
        var buyerid = $('#buyerid').val();

        $.ajax({
          type: 'get',
          url: "<?php echo base_url(); ?>Dashboard/show_styleno",
          dataType: "json",
          data: {
            jobno: jobno,
            buyerid
          },
          success: function(res) {
            $('#style').find('option').not(':first').remove();
            // Add options
            $.each(res, function(index, data) {
              $('#style').append('<option value="' + data['styleid'] + '">' + data['stylename'] + '</option>');
            });
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {

      $('#style').change(function(event) {
        event.preventDefault();
        var jobno = $('#jobno').val();
        var style = $('#style').val();
        var buyerid = $('#buyerid').val();

        $.ajax({
          type: 'get',
          url: "<?php echo base_url(); ?>Dashboard/show_orderno",
          dataType: "json",
          data: {
            jobno: jobno,
            style: style,
            buyerid
          },
          success: function(res) {
            $('#orderno').find('option').not(':first').remove();
            // Add options
            $.each(res, function(index, data) {
              $('#orderno').append('<option value="' + data['orderid'] + '">' + data['ordername'] + '</option>');
            });
          }
        });
      });
    });
  </script>



  <script>
    $(document).ready(function() {

      var count = 0;

      $(document).on('click', '.add', function() {
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="bqty[]" class="form-control bqty" id="bqty' + count + '" /></td>';
        html += '<td><input type="text" name="bdia[]" class="form-control bdia" id="bdia' + count + '" /></td>';
        html += '<td><select name="fabrictypeid[]" class="form-control fabrictypeid" id="fabrictypeid' + count + '"><option value="">Fabric Type</option><?php echo $fabrictypeid; ?></select></td>';
        html += '<td><select name="fabricpart[]" class="form-control fabricpart" id="fabricpart' + count + '"><option value="">Fabric Part</option><?php echo $fabricpart; ?></select></td>';
        html += '<td><select name="uom[]" class="form-control uom" id="uom' + count + '"><option value="">UOM</option><?php echo $uom; ?></select></td>';
        html += '<td style="vertical-align:middle; text-align:center;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
        $('#item_table1').append(html);
      });

      $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      });

      $('#insert_form').on('submit', function(event) {
        event.preventDefault();
        var error = '';

        $('.bqty').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Booking Qty at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.fabrictypeid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Fabric Type at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.fabricpart').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Fabric part at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.uom').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter UOM at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });
        var form_data = $(this).serialize();
        //alert(form_data);

        if (error == '') {
          $.ajax({
            url: "<?php echo base_url(); ?>Dashboard/color_insert",
            method: "get",
            data: form_data,
            success: function(data) {
              //alert(url);
              if (data == 'ok') {
                document.forms['insert_form'].reset();
                $('#item_table1').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Color Details Saved</div>');
                window.setTimeout(function() {
                  location.reload()
                }, 3000)
              }
            }
          });
        } else {
          $('#error').html('<div class="alert alert-danger">' + error + '</div>');
        }

      });

    });
  </script>
  <script>
    $(document).ready(function() {

      $("#colorcode").keyup(function(event) {

        var buyerid = $("#buyerid").val().trim();
        var jobno = $("#jobno").val().trim();
        var style = $("#style").val().trim();
        var orderno = $("#orderno").val().trim();
        var colorcode = $("#colorcode").val().trim();
        var colorname = $("#colorname").val().trim();
        //alert(colorcode);
        if (buyerid != '' && jobno != '' && style != '' && orderno != '') {

          $.ajax({
            url: "<?php echo base_url(); ?>Dashboard/color_available",
            type: 'get',
            data: {
              buyerid: buyerid,
              jobno: jobno,
              style: style,
              orderno: orderno,
              colorcode: colorcode
            },
            success: function(response) {

              // Show response
              $("#response").html(response);

            }
          });
        } else {
          $("#response").html("<span style='color: red;'>Enter valid info</span>");
        }

      });

    });
  </script>

</body>

</html>