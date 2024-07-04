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
          <small>Security</small>
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
                      <!-- <div class="col-lg-3 col-xs-6">
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
                      </div> -->
                      <!-- <div class="col-lg-3 col-xs-6">
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
                      </div> -->
                    </div>
                  </div>
                  <div class="box-body no-padding">
                  <span class="logo-mini"><img style="margin:auto; width:auto; height:400px;" class="img-responsive" src="<?php echo base_url() . 'assets/admin/images/ocs_dashboard.jpg'; ?>" alt="logo"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-md-12">
            <div class="chart-container" style="position: relative;">
              <canvas id="my_Chart"></canvas>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="chart-container" style="position: relative;">
              <canvas id="my_Chart1"></canvas>
            </div>
          </div>
        </div> -->
      </section>
    </div>
  </div>

  <script>
    // Data define for bar chart
    var cData = JSON.parse(`<?php echo $chart_data; ?>`);
    var myData = {
      //labels: ["Std OP", "Ex OP", "Pr OP", "Run Mach", "Std Hel", "Ex Hel", "Pr Hel","Std WS","Pr Manpower","Ex WS","Lv OP","Lv Hel","Ab OP","Ab Hel","Op > Helper","Op Ab%","Hel Ab%","OP Rec","Op Sep"],
      labels: cData.label,
      datasets: [{
        label: "Waiting For Gate Out",
        fill: false,
        backgroundColor: ['#008000', '#AFE1AF', '#023020', '#50C878', '#4F7942', '#228B22', '#7CFC00', '#008000', '#355E3B', '#00A36C', '#2AAA8A', '#4CBB17', '#90EE90', '#32CD32'],
        borderColor: 'black',
        //data: [85, 60,70, 50, 18, 20, 45, 30, 20],
        data: cData.data,
      }]
    };
    // Options to display value on top of bars
    var myoption = {
      tooltips: {
        enabled: true
      },
      hover: {
        animationDuration: 1
      },
      animation: {
        duration: 1,
        onComplete: function() {
          var chartInstance = this.chart,
            ctx = chartInstance.ctx;
          ctx.textAlign = 'center';
          ctx.fillStyle = "rgba(0, 0, 0, 1)";
          ctx.textBaseline = 'bottom';
          this.data.datasets.forEach(function(dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            meta.data.forEach(function(bar, index) {
              var data = dataset.data[index];
              ctx.fillText(data, bar._model.x, bar._model.y - 5);
            });
          });
        }
      }
    };
    //Code to drow Chart
    var ctx = document.getElementById('my_Chart').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar', // Define chart type
      data: myData, // Chart data
      options: myoption // Chart Options [This is optional paramenter use to add some extra things in the chart].
    });
  </script>


  <script>
    // Data define for bar chart
    var cData = JSON.parse(`<?php echo $chart_data1; ?>`);
    var myData = {
      //labels: ["Std OP", "Ex OP", "Pr OP", "Run Mach", "Std Hel", "Ex Hel", "Pr Hel","Std WS","Pr Manpower","Ex WS","Lv OP","Lv Hel","Ab OP","Ab Hel","Op > Helper","Op Ab%","Hel Ab%","OP Rec","Op Sep"],
      labels: cData.label1,
      datasets: [{
        label: "Waiting For Gate IN",
        fill: false,
        backgroundColor: ['#008000', '#AFE1AF', '#023020', '#50C878', '#4F7942', '#228B22', '#7CFC00', '#008000', '#355E3B', '#00A36C', '#2AAA8A', '#4CBB17', '#90EE90', '#32CD32'],
        borderColor: 'black',
        //data: [85, 60,70, 50, 18, 20, 45, 30, 20],
        data: cData.data1,
      }]
    };
    // Options to display value on top of bars
    var myoption = {
      tooltips: {
        enabled: true
      },
      hover: {
        animationDuration: 1
      },
      animation: {
        duration: 1,
        onComplete: function() {
          var chartInstance = this.chart,
            ctx = chartInstance.ctx;
          ctx.textAlign = 'center';
          ctx.fillStyle = "rgba(0, 0, 0, 1)";
          ctx.textBaseline = 'bottom';
          this.data.datasets.forEach(function(dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            meta.data.forEach(function(bar, index) {
              var data = dataset.data[index];
              ctx.fillText(data, bar._model.x, bar._model.y - 5);
            });
          });
        }
      }
    };
    //Code to drow Chart
    var ctx = document.getElementById('my_Chart1').getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar', // Define chart type
      data: myData, // Chart data
      options: myoption // Chart Options [This is optional paramenter use to add some extra things in the chart].
    });
  </script>


</body>

</html>