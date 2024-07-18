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
<div class="box-body no-padding">
  <div class="row">
    <div class='filters'>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='To' placeholder='To' data-col='To' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Challan' placeholder='Challan' data-col='Challan' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Category' placeholder='Category' data-col='Category' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Name' placeholder='Name' data-col='Name' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Type' placeholder='Type' data-col='Type' />
        </div>
      </div>
      <div class="col-md-2">
        <div class='filter-container'>
          <input autocomplete='off' class='filter form-control' name='Status' placeholder='Status' data-col='Status' />
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
          <th>Challan</th>
          <th>Category</th>
          <th>Name</th>
          <th>Type</th>
          <th>Sent Qty</th>
          <th>Receive Qty</th>
          <th>Received Date</th>
          <th>Received Time</th>
          <th>Status</th>
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
            <td style="vertical-align:middle;"><?php echo $row['challanno']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['nppcname']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['pname']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['challantype']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['spqty'] . "" . $row['puom']; ?></td>
            <td style="vertical-align:middle;"><?php echo $row['rpqty'] . "" . $row['puom']; ?></td>
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
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>