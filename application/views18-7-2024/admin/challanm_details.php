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
                    foreach ($cl1 as $row) {
                      $chmid = $row['chmid'];
                      $sfactoryid = $row['sfactoryid'];
                    ?>
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
                          <label>Production Type</label>
                          <input type="text" class="form-control" name="productiontype" readonly id="productiontype" value="<?php echo $row['productiontype']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-2 col-lg-2">
                          <label>Challan Type</label>
                          <input type="text" class="form-control" name="challantype" readonly id="challantype" value="<?php echo $row['challantype']; ?>">
                        </div>
                        <div class="col-sm-12 col-md-1 col-lg-1">
                          <label>Bag</label>
                          <input type="text" class="form-control" name="sbag" readonly id="sbag" value="<?php echo $row['sbag']; ?>">
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
                            <th>Buyer</th>
                            <th>Job No/ATL NO</th>
                            <th>Style</th>
                            <th>Order/PO</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Product/Part</th>
                            <th>Sent Qty</th>
                            <th>Received Qty</th>
                            <th>UOM</th>
                            <!-- <th>Bag</th> -->
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
                              <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['colorname']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['sizename']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['garmentspart']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['sqty']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['rqty']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $row['puom']; ?></td>
                              <!-- <td style="vertical-align:middle;"><?php echo $row['bag']; ?></td> -->
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
        <div class="row">
          <div class="col-md-12">
            <?php
            if ($this->session->userdata('factoryid') == $sfactoryid) {
            ?>
              <h1 class="text-center"><a class="btn btn-primary" href="<?php echo base_url(); ?>Dashboard/factory_challanm_sapproved/<?php echo $bn = $row['chmid']; ?>">APPROVE</a></h1>
            <?php
            }
            ?>
          </div>
        </div>
      </section>
    </div>
  </div>