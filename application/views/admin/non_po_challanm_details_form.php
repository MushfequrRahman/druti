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
<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
</script>

<script>
  // Defining a function to display error message
  function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
  }

  // Defining a function to validate form 
  function validateForm() {
    // Retrieving the values of form elements 
    var challanno = document.contactForm.challanno.value;
    var dfactory = document.contactForm.dfactory.value;
    var pname = document.contactForm.pname.value;
    var spqty = document.contactForm.spqty.value;
    

    // Defining error variables with a default value
    var challannoErr = dfactoryErr = true;

    if (challanno == "") {
      printError("challannoErr", "Need Challan No");
    } else {
      printError("challannoErr", "");
      challannoErr = false;
    }

    if (dfactory == "") {
      printError("dfactoryErr", "Need Destination");
    } else {
      printError("dfactoryErr", "");
      dfactoryErr = false;
    }

    // Prevent the form from being submitted if there are any errors
    if ((challannoErr || dfactoryErr) == true) {
      return false;
    } else {
      // Creating a string from input data for preview
      var dataPreview = "You've entered the following details: \n" +
        "Challan No: " + challanno + "\n" +
        "destination Factory: " + dfactory + "\n";

      // Display input data in a dialog box before submitting the form
      //alert(dataPreview);
    }
  };
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
                    <h3 class="box-title">Order Wise Challan Create</h3>
                  </div>

                  <!-- <form role="form" name="contactForm" autocomplete="off" onSubmit="return validateForm()" action="<?php echo base_url(); ?>Dashboard/non_po_challanm_details_edit" method="post" enctype="multipart/form-data"> -->
                  <form role="form" name="contactForm" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/non_po_challanm_details_edit" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="nonpochmid" id="nonpochmid" value="<?php echo $nonpochmid; ?>">
                    <div class="box-header with-border">
                      <?php
                      $i = 1;
                      foreach ($cl1 as $row) { ?>
                        <div class="row">
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Challan Date<em>*</em></label>
                            <input type="text" class="form-control pd" name="crcdate" readonly id="pd" value="<?php echo date("d-m-y", strtotime($row['crcdate'])); ?>">
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>From Factory<em>*</em></label>
                            <input type="text" class="form-control" name="sfactory" readonly value="<?php echo $this->session->userdata('factoryid'); ?>">
                            <?php echo form_error('sfactory', '<div class="error">', '</div>');  ?>
                          </div>
                          <div class="col-sm-12 col-md-1 col-lg-1">
                            <label>Challan<em>*</em></label>
                            <input type="text" class="form-control" readonly name="challanno" required id="challanno" value="<?php echo $row['challanno']; ?>">
                            <?php echo form_error('challan', '<div class="error">', '</div>');  ?>
                            <div class="error" id="challannoErr"></div>
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Department<em>*</em></label>
                            <select class="form-control" name="deptid" id="deptid">
                              <option value="<?php echo $row['deptid']; ?>"><?php echo $row['departmentname']; ?></option>
                              <?php
                              foreach ($dl as $rowd) {
                              ?>
                                <option value="<?php echo $rowd['deptid']; ?>"><?php echo $rowd['departmentname']; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <?php echo form_error('deptid', '<div class="error">', '</div>');  ?>
                            <div class="error" id="deptidErr"></div>
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>Designation<em>*</em></label>
                            <select class="form-control" name="desigid" id="desigid">
                              <option value="<?php echo $row['desigid']; ?>"><?php echo $row['designation']; ?></option>
                              <?php
                              foreach ($del as $rowde) {
                              ?>
                                <option value="<?php echo $rowde['desigid']; ?>"><?php echo $rowde['designation']; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <?php echo form_error('desigid', '<div class="error">', '</div>');  ?>
                            <div class="error" id="desigidErr"></div>
                          </div>
                          <div class="col-sm-12 col-md-1 col-lg-1">
                            <label>User<em>*</em></label>
                            <input type="text" class="form-control username" name="username" required id="username" value="<?php echo $row['user']; ?>">
                            <?php echo form_error('username', '<div class="error">', '</div>');  ?>
                            <div class="error" id="usernameErr"></div>
                          </div>
                          <div class="col-sm-12 col-md-2 col-lg-2">
                            <label>To Factory<em>*</em></label>
                            <select class="form-control" name="dfactory" id="dfactory">
                              <option value="<?php echo $row['dfactoryid']; ?>"><?php echo $row['dfactoryid']; ?></option>
                              <?php
                              foreach ($fl as $row3) {
                              ?>
                                <option value="<?php echo $row3['factoryid']; ?>"><?php echo $row3['factoryname']; ?></option>
                              <?php
                              }
                              ?>
                            </select>
                            <?php echo form_error('dfactory', '<div class="error">', '</div>');  ?>
                            <div class="error" id="dfactoryErr"></div>
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
                              <th style="display:none;">NONPOCHMID2</th>
                              <th>Product Category</th>
                              <th>Name</th>
                              <th>Qty</th>
                              <th>UOM</th>
                              <th>Challan Type</th>
                              <th>Remarks</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $i = 1;
                            foreach ($ul as $row) { ?>
                              <tr>
                                <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                                <td style="vertical-align:middle; display:none;"><input type="text" class="form-control" name="nonpochmid2[]" value="<?php echo $row['nonpochmid2']; ?>"></td>
                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="nppcid[]" id="nppcid">
                                    <option value="<?php echo $row['nppcid']; ?>"><?php echo $row['nppcname']; ?></option>
                                    <?php
                                    foreach ($npl as $row4) {
                                    ?>
                                      <option value="<?php echo $row4['nppcid']; ?>"><?php echo $row4['nppcname']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('nppcid', '<div class="error">', '</div>');  ?>
                                </td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" required id="pname" name="pname[]" value="<?php echo $row['pname']; ?>"></td>
                                <td style="vertical-align:middle;"><input type="text" class="form-control" required id="spqty" name="spqty[]" value="<?php echo $row['spqty']; ?>"></td>
                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="puomid[]" id="puomid">
                                    <option value="<?php echo $row['puomid']; ?>"><?php echo $row['puom']; ?></option>
                                    <?php
                                    foreach ($pul as $row5) {
                                    ?>
                                      <option value="<?php echo $row5['puomid']; ?>"><?php echo $row5['puom']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('puomid', '<div class="error">', '</div>');  ?>
                                </td>
                                <td style="vertical-align:middle;">
                                  <select class="form-control" name="ctid[]" id="ctid">
                                    <option value="<?php echo $row['ctid']; ?>"><?php echo $row['challantype']; ?></option>
                                    <?php
                                    foreach ($ctl as $row5) {
                                    ?>
                                      <option value="<?php echo $row5['ctid']; ?>"><?php echo $row5['challantype']; ?></option>
                                    <?php
                                    }
                                    ?>
                                  </select>
                                  <?php echo form_error('ctid', '<div class="error">', '</div>');  ?>
                                </td>
                                <td><textarea class="form-control remarks" rows="1" name="sremarks[]" id="sremarks"><?php echo $row['sremarks']; ?></textarea></td>
                              </tr>
                          </tbody>
                        <?php } ?>
                        </table>
                        <br />
                        <div class="col-sm-12 col-md-2 col-lg-2 col-md-offset-5 col-lg-offset-5">
                          <label>&nbsp;</label>
                          <input type="submit" class="btn btn-primary " name="submit" id="btn" value="EDIT" />
                        </div>
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





  <script>
    $(function() {
      $("input[id*='spqty']").keydown(function(event) {


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