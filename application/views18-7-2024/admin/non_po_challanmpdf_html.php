<style>
  .wrapper {
    margin: 0 auto;
    width: 700px;

  }

  #tableData {
    width: 700px;
  }

  #tableData,
  th,
  td {
    text-align: center;
    border-collapse: collapse;
    border: 1px solid black;
    margin: auto;
  }

  th,
  td {
    font-size: 10px;
    text-align: center;
  }

  td {
    word-wrap: break-word;
    overflow-wrap: break-word;
  }

  .top {
    width: 700px;
    height: 220px;
    font-size: 22px;

  }

  .top1 {
    margin: auto;
    font-size: 12px;
    width: 700px;
    text-align: center;

  }

  /* .top2 {
    
    width: 600px;
    font-size: 18px;
    
  } */

  .text-left {
    float: left;
    width: 233px;
    font-size: 12px;
    text-align: left;


  }

  .text-middle {
    float: left;
    width: 233px;
    font-size: 12px;
    text-align: center;

  }

  .text-right {
    float: right;
    width: 115px;
    font-size: 12px;
    text-align: center;

  }

  .text-bottom {
    font-size: 10px;
    margin: 0 0 30px 0;
  }

  .middle {
    margin: 20px 0 0 0;
    width: 700px;
  }

  .bottom {
    margin: 20px 0 0 0;
    width: 700px;
    font-size: 12px;
  }

  .bottom1 {
    float: left;
    width: 175px;
    text-align: left;
    /*text-decoration: overline;*/

  }

  .bottom2 {
    float: left;
    width: 175px;
    text-align: center;
    /*text-decoration: overline;*/

  }

  .bottom3 {
    float: left;
    width: 175px;
    text-align: right;
    /*text-decoration: overline;*/

  }

  .bottom4 {
    float: left;
    width: 175px;
    text-align: right;
    /*text-decoration: overline;*/

  }

  /*.text-bottom span strong {
    border-bottom: 2px dotted black;
  }*/
  #background {
    position: absolute;
    z-index: 0;
    background: white;
    display: block;
    min-height: 50%;
    min-width: 50%;
    top: 80%;
    left: -170%;
  }



  #bg-text {
    color: lightgrey;
    font-size: 70px;
    transform: rotate(300deg);
    -webkit-transform: rotate(300deg);
  }
</style>

<body>
  <?php date_default_timezone_set('Asia/Dhaka'); ?>
  <div class="wrapper">
    <div class="top">
      <div class="top1">
        <h3><img style="width:80px; height:35px; margin:0 15px 0 0;" src="http://192.168.170.25/druti/assets/admin/images/babylon.png" alt="logo"></h3>
        <span><strong>BABYLON GROUP</strong></span>
        <br />
        <span>2-B/1,Darus Salam Road</span>
        <br />
        <span>Mirpur,Dhaka-1216</span>
        <br />
        <p style="text-decoration:underline;">NON PO WISE GATE PASS</p>
        <br />
        <div class="text-left">
          <?php
          $i = 1;
          foreach ($cl1 as $row) { ?>
            <span><strong>Challan No:</strong></span><span><?php echo $row['challanno']; ?></span>
            <br />
            <span><strong>Challan Date:</strong></span><span><?php echo date("d-m-y", strtotime($row['crcdate'])); ?></span>
            <br />
            <br />
          <?php
          }
          ?>
        </div>
        <div class="text-middle">
          <span><strong>From Location:</strong></span>
          <br />
          <?php
          foreach ($sf as $row) {
          ?>
            <span><?php echo $row['factoryname']; ?></span>
            <br />
            <span><?php echo $row['factory_address']; ?></span>
          <?php
          }
          ?>
        </div>
        <div class="text-right">
          <span><strong>To Location:</strong></span>
          <br />
          <?php
          foreach ($df as $row) {
          ?>
            <span><?php echo $row['factoryname']; ?></span>
            <br />
            <span><?php echo $row['factory_address']; ?></span>
          <?php
          }
          ?>
          <br />
        </div>
      </div>
    </div>
    <div class="middle">
      <p style="text-align:center;"><strong>Product Details</strong></p>
      <table id="tableData">
        <thead>
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
    <div class="bottom">
      <div class="bottom1">
        <p>Issued By</p>
      </div>
      <div class="bottom2">
        <p>Checked By</p>
      </div>
      <div class="bottom3">
        <p>Authorized By</p>
      </div>
      <div class="bottom4">
        <p>Received By</p>
      </div>
    </div>
    <p style="text-align:center; font-size:10px;">This Is System Generated Document</p>
    <p style="text-align:center; font-size:10px;"><?php echo "Date:" . date('d-m-Y') . " & " . "Time:" . date("h:i:sa"); ?></p>
  </div>

  <hr>
  </hr>

  <div class="wrapper">
    <div class="top">
      <div class="top1">
        <h3><img style="width:80px; height:35px; margin:0 15px 0 0;" src="http://192.168.170.25/druti/assets/admin/images/babylon.png" alt="logo"></h3>
        <span><strong>BABYLON GROUP</strong></span>
        <br />
        <span>2-B/1,Darus Salam Road</span>
        <br />
        <span>Mirpur,Dhaka-1216</span>
        <br />
        <p style="text-decoration:underline;">ORDER WISE GATE PASS</p>
        <br />
        <div class="text-left">
          <?php
          $i = 1;
          foreach ($cl1 as $row) { ?>
            <span><strong>Challan No:</strong></span><span><?php echo $row['challanno']; ?></span>
            <br />
            <span><strong>Challan Date:</strong></span><span><?php echo date("d-m-y", strtotime($row['crcdate'])); ?></span>
            <br />
            <br />
          <?php
          }
          ?>
        </div>
        <div class="text-middle">
          <span><strong>From Location:</strong></span>
          <br />
          <?php
          foreach ($sf as $row) {
          ?>
            <span><?php echo $row['factoryname']; ?></span>
            <br />
            <span><?php echo $row['factory_address']; ?></span>
          <?php
          }
          ?>
        </div>
        <div class="text-right">
          <span><strong>To Location:</strong></span>
          <br />
          <?php
          foreach ($df as $row) {
          ?>
            <span><?php echo $row['factoryname']; ?></span>
            <br />
            <span><?php echo $row['factory_address']; ?></span>
          <?php
          }
          ?>
          <br />
        </div>
      </div>
    </div>
    <div class="middle">
      <p style="text-align:center;"><strong>Product Details</strong></p>
      <table id="tableData">
        <thead>
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
    <div class="bottom">
      <div class="bottom1">
        <p>Issued By</p>
      </div>
      <div class="bottom2">
        <p>Checked By</p>
      </div>
      <div class="bottom3">
        <p>Authorized By</p>
      </div>
      <div class="bottom4">
        <p>Received By</p>
      </div>
    </div>
    <p style="text-align:center; font-size:10px;">This Is System Generated Document</p>
    <p style="text-align:center; font-size:10px;"><?php echo "Date:" . date('d-m-Y') . " & " . "Time:" . date("h:i:sa"); ?></p>
  </div>
</body>

</html>