<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }

  #tableData {


    text-align: center;
  }

  th,
  td {
    font-size: 12px;
    text-align: center;
  }

  .hide {
    display: none;
    color: red;
  }

  .field-wrapper.has-error .hide {
    display: block !important;
  }
</style>
<!-- <script>
  $(function() {
  $(".rqty").on("change",function(e){
    $(this).val().length == 0 ?  $(this).parent().addClass("has-error") : $(this).parent().removeClass("has-error");
    console.log( $(this).parent());
  });
  
  $("#btn").on("click",function(a) {
    $(".rqty").change();
  })
  
});
  </script> -->
<script type="text/javascript">
  function validate() {

    var rpqty = document.getElementsByName('rpqty[]');
    for (i = 0; i < rpqty.length; i++) {
      if (rpqty[i].value == "") {
        alert('Complete all the receive qty fields');
        return false;
      }
    }
  }
</script>

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
                    <h3 class="box-title">Challan Receive</h3>
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
                  <div class="box-body no-padding">
                    <form role="form" autocomplete="off" onSubmit="return validate(this);" action="<?php echo base_url(); ?>Dashboard/non_po_challanm_receive" method="post" enctype="multipart/form-data">
                      <input type="hidden" class="form-control" name="nonpochmid" value="<?php echo $nonpochmid; ?>">
                      <table id="tableData" class="table table-hover table-bordered">
                        <thead style="background:#91b9e6;">
                          <tr>
                            <th>SL</th>
                            <th style="display:none;">Token</th>
                            <th>Date</th>
                            <th>To</th>
                            <th>Challan</th>
                            <th>Product Category</th>
                            <th>Name</th>
                            <th>Challan Type</th>
                            <th>Sent Qty</th>
                            <th>Receive Qty</th>
                            <th>Remarks</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($ul as $row) { ?>
                            <tr>
                              <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                              <td style="display:none;"><input type="hidden" class="form-control" name="nonpochmid2[]" value="<?php echo $row['nonpochmid2']; ?>"></td>
                              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['crcdate'])); ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['dfactoryid']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['challanno']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['nppcname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['pname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['challantype']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['spqty'] . "" . $row['puom']; ?></td>
                              <td style="vertical-align:middle;"><input type="text" class="form-control rpqty" id="rpqty" name="rpqty[]" placeholder="Enter Receive Qty">
                                <div class="validation-msg rqty-error hide">
                                  <p><i class="fa fa-exclamation-circle"></i> Please insert receive qty</p>
                                </div>
                              </td>
                              <td style="vertical-align:middle;"><input type="text" class="form-control" name="rremarks[]" placeholder="Enter Remarks"></td>
                            </tr>
                        </tbody>
                      <?php } ?>
                      </table>
                  </div>
                  <div class="box-footer text-center">
                    <input type="submit" class="btn btn-primary" id="btn" name="submit" value="Submit" />
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>
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

</html>