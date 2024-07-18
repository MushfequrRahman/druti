<script type="text/javascript">
  $(function() {
    jQuery(".pd").datepicker({
      dateFormat: 'dd-mm-yy'
    });
  })
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
                    <h3 class="box-title">Color Part Update</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="box-body">
                  	<?php foreach($ul as $row)
				{ ?>
                    <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/color_part_add" method="post" enctype="multipart/form-data">
                    <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                    	<input type="hidden" class="form-control" name="colorid" value="<?php echo $row['colorid']; ?>">
                      <?php /*?><div class="form-group">
                        <label>Buyer Name</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row['buyername']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Job No</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row['jobno']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Style No</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row['stylename']; ?>">
                      </div>
                      <div class="form-group">
                        <label>Order No</label>
                        <input type="text" class="form-control" readonly value="<?php echo $row['ordername']; ?>">
                      </div><?php */?>
                      <div class="form-group">
                        <label>Fabric Type</label>
                        <select class="form-control" name="fabrictypeid" id="fabrictypeid">
                        	<?php /*?><option value="<?php echo $row['fabrictypeid']; ?>"><?php echo $row['fabrictype']; ?></option><?php */?>
                          <?php
                          foreach ($ul1 as $row1) {
                          ?>
                            <option value="<?php echo $row1['fabrictypeid']; ?>"><?php echo $row1['fabrictype']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Fabric Part</label>
                        <select class="form-control" name="fabricpart" id="fabricpart">
                        	<?php /*?><option value="<?php echo $row['fabricpartid']; ?>"><?php echo $row['fabricpart']; ?></option><?php */?>
                          <?php
                          foreach ($ul3 as $row1) {
                          ?>
                            <option value="<?php echo $row1['fabricpartid']; ?>"><?php echo $row1['fabricpart']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <?php /*?><div class="form-group">
                        <label>Required GSM</label>
                        <input type="text" class="form-control" name="gsm" placeholder="Enter GSM" value="<?php echo $row['gsm']; ?>">
                        <?php echo form_error('gsm', '<div class="error">', '</div>');  ?>
                      </div><?php */?>
                      <?php /*?><div class="form-group">
                        <label>Color Wise Order Qty</label>
                        <input type="text" class="form-control" name="cwoqty" value="<?php echo $row['cwoqty']; ?>">
                        <?php echo form_error('cwoq', '<div class="error">', '</div>');  ?>
                      </div><?php */?>
                <div class="form-group">
					<label>Booking Qty</label>
					<input type="text" class="form-control" name="bqty" placeholder="Enter Booking Qty">
                    <?php echo form_error('bqty', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Booking Dia</label>
					<input type="text" class="form-control" name="bdia" placeholder="Enter Booking Dia">
                    <?php echo form_error('bdia', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
                        <label>UOM</label>
                        <select class="form-control" name="uom" id="uom">
                        	<?php /*?><option value="<?php echo $row['puomid']; ?>"><?php echo $row['puom']; ?></option><?php */?>
                          <?php
                          foreach ($ul2 as $row1) {
                          ?>
                            <option value="<?php echo $row1['puomid']; ?>"><?php echo $row1['puom']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <?php /*?><div class="form-group">
                        <label>Color Code</label>
                        <input type="text" class="form-control" name="colorcode" value="<?php echo $row['colorcode']; ?>">
                        <?php echo form_error('colorcode', '<div class="error">', '</div>');  ?>
                      </div><?php */?>
                      <?php /*?><div class="form-group">
                        <label>Color Name</label>
                        <input type="text" class="form-control" name="colorname" value="<?php echo $row['colorname']; ?>">
                        <?php echo form_error('colorname', '<div class="error">', '</div>');  ?>
                      </div><?php */?>
                     <?php /*?><div class="form-group">
                        <label>Last TOD</label>
                        <input type="text" class="form-control pd" readonly name='tod' id="pd" value="<?php echo date("d-m-Y", strtotime($row['ltod'])); ?>">
                      </div><?php */?>
                      
                      
                      <div class="box-footer text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                      </div>
                    </form>
                    <?php } ?>	
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