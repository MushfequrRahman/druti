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
</style>

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
                    <h3 class="box-title">Color Info</h3>
                  </div>
                  <br />
                  <div class="text-right-input">
                    <div class="row">
                      <div class="col-md-3 col-md-offset-9">
                        <input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'>
                      </div>
                    </div>
                  </div>
                  <br />
                  <div class="box-body table-responsive no-padding">
                    <table id="tableData" class="table table-hover table-bordered">
                      <thead style="background:#91b9e6;">
                        <tr>
                          <th>SL</th>
                          <th>Color ID</th>
                          <th>Buyer Name</th>
                          <th>Job No/ATL NO</th>
                          <th>Style Name</th>
                          <th>Order Name/PO</th>
                          <th>Color Code</th>
                          <th>Color Name</th>
                          <th>Order Qty</th>
                          <th>Gsm</th>
                          <th>Edit</th>
                          <th>Add Part</th>
                          <th>Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($ul as $row) { ?>
                          <tr>
                            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['colorid']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['colorcode']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['colorname']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['cwoqty']; ?></td>
                            <td style="vertical-align:middle;"><?php echo $row['gsm']; ?></td>
                            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/color_up/<?php echo $bn = $row['colorid']; ?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/color_part/<?php echo $bn = $row['colorid']; ?>"><i class="fa fa-plus" style="font-size:20px"></i></a></td>
                            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/color_details/<?php echo $bn = $row['colorid']; ?>"><i class="fa fa-info-circle" style="font-size:20px"></i></a></td>
                          </tr>

                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $('#tableData').paging({
                      limit: 10
                    });
                  });
                </script>
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
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</body>

</html>