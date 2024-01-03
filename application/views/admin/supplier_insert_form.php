<style>
.error{color:red;}
em{color:red;}
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
                  <h3 class="box-title">Supplier Insert</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php if($responce = $this->session->flashdata('Successfully')): ?>
								<div class="text-center">
									<div class="alert alert-success text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?>
						</div>
					</div>
              </div>
                <div class="box-body">
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/supplier_insert" method="post" enctype="multipart/form-data">
                 <div class="form-group">
                        <label>Supplier Type<em>*</em></label>
                        <select class="form-control" name="stiid" id="stiid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['stiid']; ?>"><?php echo $row['suppliertype']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('stiid', '<div class="error">', '</div>');  ?>
                 </div>
                 <div class="form-group">
					<label>Supplier<em>*</em></label>
					<input type="text" class="form-control" name="supplier" placeholder="Enter Supplier" value="<?php echo set_value('supplier'); ?>">
                    <?php echo form_error('supplier', '<div class="error">', '</div>');  ?>
				</div>
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
                </form>
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


