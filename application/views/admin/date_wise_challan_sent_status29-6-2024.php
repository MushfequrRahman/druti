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
<script type='text/javascript'>
  //<![CDATA[
  $(document).ready(function() {
    $('.filter').multifilter()
  })
  //]]>
</script>
<!-- /.box-header -->
<div class="box-body no-padding">
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

  <div class="row">
    <!-- <div class="col-md-3"> -->
    <!-- <input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'> -->
    <div class='filters'>
      <!-- <div class="col-md-1">
          <div class='filter-container'>
            <input autocomplete='off' class='filter form-control' name='From' placeholder='From' data-col='From' />
          </div>
        </div> -->
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Token' placeholder='Token' data-col='Token' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Buyer' placeholder='Buyer' data-col='Buyer' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Job No/ATL No' placeholder='Job No/ATL No' data-col='Job No/ATL No' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Style' placeholder='Style' data-col='Style' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Order/PO' placeholder='Order/PO' data-col='Order/PO' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Color' placeholder='Color' data-col='Color' />
        </div>
      </div>
    </div>
  </div>
  <br />
  <div class="table-responsive">
    <table id="tableData" class="table table-hover table-bordered">
      <thead style="background:#91b9e6;">
        <tr>
          <th>SL</th>
          <th>Date</th>
          <th>To</th>
          <th>System Challan</th>
          <th>Challan</th>
          <th>Buyer</th>
          <th>Job No/ATL NO</th>
          <th>Style</th>
          <th>Order/PO</th>
          <th>Color</th>
          <th>Size</th>
          <th>Garments Part</th>
          <th>Production Type</th>
          <th>Sent Qty</th>
          <th>Receive Qty</th>
          <th>Bag</th>
          <th>Received Date</th>
          <th>Received Time</th>
          <th>Status</th>
          <!--<th>Edit</th>-->
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($ul as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['crcdate'])); ?></td>
            <td style="vertical-align:middle;"><?php echo $row['dfactoryid']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['chmid']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['challanno']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['colorname']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sizename']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['garmentspart']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['productiontype']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sqty'] . "" . $row['puom']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['rqty'] . "" . $row['puom']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sbag']; ?></td>
            <?php
            if ($row['rdate'] == '0000-00-00') {
            ?>
              <td style="vertical-align:middle;">00-00-0000</td>
            <?php
            } else {
            ?>
              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['rdate'])); ?></td>
            <?php
            }
            ?>
            <td style="vertical-align:middle;"><?php echo $row['rtime']; ?></td>
            <?php
            if ($row['status'] == '1') {
            ?>
              <td style="vertical-align:middle;">Waiting For Gate Out</td>
            <?php
            } elseif ($row['status'] == '2') {
            ?>
              <td style="vertical-align:middle;">Waiting For Gate In</td>
            <?php
            } elseif ($row['status'] == '3') {
            ?>
              <td style="vertical-align:middle;">Received</td>
            <?php
            }
            ?>
            <?php /*?><td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/department_list_up/<?php echo $bn=$row['deptid'];?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td><?php */ ?>
          </tr>
      </tbody>
    <?php } ?>
    </table>
  </div>
</div>