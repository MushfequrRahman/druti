<style>
  em{color: red;}
</style>
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
                    <h3 class="box-title">Size Info Update</h3>
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
                    <?php foreach ($ul as $row) { ?>
                      <form role="form" autocomplete="off" action="<?php echo base_url(); ?>Dashboard/size_lup" method="post" enctype="multipart/form-data">
                        <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                          <input type="hidden" class="form-control" name="sizeid" value="<?php echo $row['sizeid']; ?>">

                          <div class="form-group">
                            <label>Size Name<em>*</em></label>
                            <input type="text" class="form-control" name="sizename" value="<?php echo $row['sizename']; ?>">
                            <?php echo form_error('sizename', '<div class="error">', '</div>');  ?>
                          </div>
                          <div class="form-group">
                            <label>Qty<em>*</em></label>
                            <input type="text" class="form-control" name="swoqty" value="<?php echo $row['swoqty']; ?>">
                            <?php echo form_error('swoqty', '<div class="error">', '</div>');  ?>
                          </div>
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