<meta http-equiv="refresh" content="1800" />
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
      <section class="content-header">
        <h1>
          Dashboard
          <small>User</small>
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-aqua">
                          <div class="inner">
                            <?php
                            foreach ($ul1 as $row) { ?>
                              <?php $op = $row['opending']; ?>
                            <?php
                            }
                            ?>
                            <?php
                            foreach ($ul2 as $row) { ?>
                              <?php $ip = $row['ipending']; ?>
                            <?php
                            }
                            ?>
                            <h3><?php echo $op; ?>/<?php echo $ip; ?></h3>
                            <h6>Waiting For PO Wise Gate Out/Gate In</h6>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                          <a href="<?php echo base_url(); ?>Dashboard/po_wise_gateout_gatein" class="small-box-footer float-left">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-green">
                          <div class="inner">
                            <?php
                            foreach ($ul3 as $row) { ?>
                              <?php $nonpoop = $row['nonpoopending']; ?>
                            <?php
                            }
                            ?>
                            <?php
                            foreach ($ul4 as $row) { ?>
                              <?php $nonpoip = $row['nonpoipending']; ?>
                            <?php
                            }
                            ?>
                            <h3><?php echo $nonpoop; ?>/<?php echo $nonpoip; ?></h3>
                            <h6>Waiting For Non PO Wise Gate Out/Gate In</h6>
                          </div>
                          <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                          </div>
                          <a href="<?php echo base_url(); ?>Dashboard/non_po_wise_gateout_gatein" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                      </div>
                      <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-red">
                          <div class="inner">
                            <h3><?php echo $nonpoop + $op; ?>/<?php echo $nonpoip + $ip; ?></h3>
                            <h6>Waiting For Total Gate Out/Gate In</h6>
                          </div>
                          <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                          </div>
                          <a href="#" class="small-box-footer">&nbsp;</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                    &nbsp;
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>

</body>

</html>