<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }
  label{font-size:12px;}
  th{font-size:12px;}
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

foreach ($ul2 as $row) {
  $uom .= '<option value="' . $row["puomid"] . '">' . $row["puom"] . '</option>';
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
                    <h3 class="box-title">Size Insert</h3>
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
                      	<div class="col-sm-2 md-2">
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
                      <div class="col-sm-2 md-2">
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
                      <div class="col-sm-2 md-2">
                        <label>Color<em>*</em></label>
                        <select class="form-control" name="colorid" id="colorid">
                          <option value="">Select....</option>
                        </select>
                        <?php echo form_error('colorid', '<div class="error">', '</div>');  ?>
                      </div>
                      </div>
                      <br/>
                      
                      <br/>
                      
                      
                      <div id="AuGroup">
                        <div class="row">
                          <table class="table table-bordered" id="item_table1">
                            <thead>
                              <tr>
                                <th style="text-align:center;">Size Name</th>
                                <th style="text-align:center;">Qty</th>
                                <th style="text-align:center;">UOM</th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                        <div class="box-footer text-center">
                        <div id="response"></div>
                      </div>
                      </div>
                      <div class="box-footer text-center">
                      <!-- <input type="submit" class="btn btn-primary" name="submit" value="SUBMIT" /> -->
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
            buyerid: buyerid
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
            buyerid: buyerid
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

<script type="text/javascript">
    $(document).ready(function() {

      $('#orderno').change(function(event) {
        event.preventDefault();
        
        var orderno = $('#orderno').val();
        var style = $('#style').val();
        var jobno = $('#jobno').val();
        var buyerid = $('#buyerid').val();

        $.ajax({
          type: 'get',
          url: "<?php echo base_url(); ?>Dashboard/show_color",
          dataType: "json",
          data: {
            orderno: orderno,
            style: style,
            jobno: jobno,
            buyerid: buyerid
          },
          success: function(res) {
            $('#colorid').find('option').not(':first').remove();
            // Add options
            $.each(res, function(index, data) {
              $('#colorid').append('<option value="' + data['colorid'] + '">' + data['colorname'] + '</option>');
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
        html += '<td><input type="text" name="size[]" class="form-control size" id="size' + count + '" /></td>';
		    html += '<td><input type="text" name="sbqty[]" class="form-control sbqty" id="sbqty' + count + '" /></td>';
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

        $('.size').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Size Name at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });
		
		$('.sbqty').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Qty at ' + count + ' Row</p>';
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
            url: "<?php echo base_url(); ?>Dashboard/size_insert",
            method: "get",
            data: form_data,
            success: function(data) {
              //alert(url);
              if (data == 'ok') {
                document.forms['insert_form'].reset();
                $('#item_table1').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Size Details Saved</div>');
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

$(document).ready(function(){

   $("#colorid").change(function(event){

     var buyerid = $("#buyerid").val().trim();
	 var jobno = $("#jobno").val().trim();
	 var style = $("#style").val().trim();
	 var orderno = $("#orderno").val().trim();
	 var colorid = $("#colorid").val().trim();
	 //var colorname = $("#colorname").val().trim();
//alert(colorcode);
     if(buyerid!= '' && jobno!='' && style!='' && orderno!='' && colorid!=''){

        $.ajax({
           url: "<?php echo base_url(); ?>Dashboard/size_available",
           type: 'get',
           data: {buyerid:buyerid,jobno:jobno,style:style,orderno:orderno,colorid:colorid},
           success: function(response){

              // Show response
              $("#response").html(response);

           }
        });
     }else{
        $("#response").html("<span style='color: red;'>Enter valid info</span>");
     }

  });

});
</script>


</body>

</html>