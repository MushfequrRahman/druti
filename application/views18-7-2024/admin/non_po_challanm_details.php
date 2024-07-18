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

  em {
    color: red;
  }

  .error {
    color: red;
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
                    <h3 class="box-title">Order Wise Challan details</h3>
                  </div>


                  <div class="box-header with-border">
                    <?php
                    $i = 1;
                    foreach ($cl1 as $row) { ?>
                      <div class="row">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                          <label>Challan Date</label>
                          <input type="text" class="form-control" readonly value="<?php echo date("d-m-y", strtotime($row['crcdate'])); ?>">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                          <label>From Factory</label>
                          <input type="text" class="form-control" name="sfactory" readonly value="<?php echo $row['sfactoryid']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1">
                          <label>Challan</label>
                          <input type="text" class="form-control" name="challanno" readonly id="challanno" value="<?php echo $row['challanno']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                          <label>Department</label>
                          <input type="text" class="form-control" name="deptid" readonly id="deptid" value="<?php echo $row['departmentname']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                          <label>Designation</label>
                          <input type="text" class="form-control" name="desigid" readonly id="desigid" value="<?php echo $row['designation']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1">
                          <label>User</label>
                          <input type="text" class="form-control" name="username" readonly id="username" value="<?php echo $row['user']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                          <label>To Factory</label>
                          <input type="text" class="form-control" name="dfactoryid" readonly id="dfactoryid" value="<?php echo $row['dfactoryid']; ?>">
                        </div>
                      </div>
                    <?php
                    }
                    ?>
                  </div>
                  <div class="box-header with-border">
                    <div class="box-body table-responsive no-padding">
                      <table id="tableData" class="table table-hover table-bordered">
                        <thead style="background:#91b9e6;">
                          <tr>
                            <th>SL</th>
                            <th>Product Category</th>
                            <th>Name</th>
                            <th>Sent Qty</th>
                            <th>Received Qty</th>
                            <th>UOM</th>
                            <th>Challan Type</th>
                            <th>Sent Remarks</th>
                            <th>Received Remarks</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $i = 1;
                          foreach ($ul as $row) { ?>
                            <tr>
                              <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['nppcname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['pname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['spqty']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['rpqty']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['challantype']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['sremarks']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['rremarks']; ?></td>
                            </tr>
                          <?php } ?>
                        </tbody>

                      </table>

                    </div>
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