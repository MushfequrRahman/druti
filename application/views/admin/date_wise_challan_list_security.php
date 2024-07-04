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

<script>
  $(function() {
    $("table").tablesorter({
      theme: 'blue',
      widgets: ['math', 'zebra', 'filter'],
      widgetOptions: {
        math_data: 'math', // data-math attribute
        math_ignore: [0, 1],
        math_none: 'N/A', // no matching math elements found (text added to cell)
        math_complete: function($cell, wo, result, value, arry) {
          var txt = '<span class="align-decimal">' +
            (value === wo.math_none ? '' : ' ') +
            result + '</span>';
          if ($cell.attr('data-math') === 'all-sum') {
            // when the "all-sum" is processed, add a count to the end
            return txt + ' (Sum of ' + arry.length + ' cells)';
          }
          return txt;
        },
        math_completed: function(c) {
          // c = table.config
          // called after all math calculations have completed
          console.log('math calculations complete', c.$table.find('[data-math="all-sum"]:first').text());
        },
        // see "Mask Examples" section
        math_mask: '#,##0.00',
        math_prefix: '', // custom string added before the math_mask value (usually HTML)
        math_suffix: '', // custom string added after the math_mask value
        // event triggered on the table which makes the math widget update all data-math cells (default shown)
        math_event: 'recalculate',
        // math calculation priorities (default shown)... rows are first, then column above/below,
        // then entire column, and lastly "all" which is not included because it should always be last
        math_priority: ['row', 'above', 'below', 'col'],
        // set row filter to limit which table rows are included in the calculation (v2.25.0)
        // e.g. math_rowFilter : ':visible:not(.filtered)' (default behavior when math_rowFilter isn't set)
        // or math_rowFilter : ':visible'; default is an empty string
        math_rowFilter: ''
      }
    });
  });
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
          <input autocomplete='off' class='filter form-control' name='Challan' placeholder='Challan' data-col='Challan' />
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
          <input autocomplete='off' class='filter form-control' name='Purpose' placeholder='Purpose' data-col='Purpose' />
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
          <th>System Challan</th>
          <th>Challan</th>
          <th>Date</th>
          <th>From</th>
          <th>To</th>
          <th>Buyer</th>
          <th>Job No/ATL NO</th>
          <th>Style</th>
          <th>Order/PO</th>
          <!-- <th>Color</th> -->
          <th>Purpose</th>
          <th>Bag</th>
          <th>Sent Date</th>
          <th>Sent Time</th>
          <th>Received Date</th>
          <th>Received Time</th>
          <th>Status</th>
          <th>Print</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <!-- <th data-math="col-sum">col-sum</th>
          <th data-math="col-sum">col-sum</th> -->
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
        </tr>
      </tfoot>
      <tbody>
        <?php
        $i = 1;
        foreach ($ul as $row) { ?>
          <tr>
            <td style="vertical-align:middle;"><?php echo $i++; ?></td>
            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/challanm_details/<?php echo $bn = $row['chmid']; ?>"><?php echo $row['chmid']; ?></a></td>
            <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/challanm_details/<?php echo $bn = $row['chmid']; ?>"><?php echo $row['challanno']; ?></a></td>
            <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['crcdate'])); ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sfactoryid']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['dfactoryid']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
            <!-- <td style="vertical-align:middle;"><?php echo $row['colorname']; ?></td> -->
            <td style="vertical-align:middle;"><?php echo $row['productiontype']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['sbag']; ?></td>
            <?php
            if ($row['sdate'] == '0000-00-00') {
            ?>
              <td style="vertical-align:middle;">00-00-0000</td>
            <?php
            } else {
            ?>
              <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['sdate'])); ?></td>
            <?php
            }
            ?>
            <td style="vertical-align:middle;"><?php echo $row['stime']; ?></td>

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
            <td style="vertical-align:middle;"><a target="_blank" href="<?php echo base_url(); ?>Dashboard/challanm_print/<?php echo $bn = $row['chmid']; ?>"><i class="fa fa-print" aria-hidden="true"></i>
              </a></td>
          </tr>
        <?php } ?>
      </tbody>

    </table>
  </div>
</div>