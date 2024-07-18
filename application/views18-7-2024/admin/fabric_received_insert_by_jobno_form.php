<style>
  .error {
    color: red;
  }

  em {
    color: red;
  }
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
                    <h3 class="box-title">Job No Wise Fabric Received</h3>
                    <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12">
                        <?php if ($responce = $this->session->flashdata('Successfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-success text-center"><?php echo $responce; ?></div>
                          </div>
                        
                        <?php elseif ($responce = $this->session->flashdata('UnSuccessfully')) : ?>
                          <div class="text-center">
                            <div class="alert alert-danger text-center"><?php echo $responce; ?></div>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  
                  <div class="box-body ">
                    <div class="col-sm-12 col-md-5 col-lg-5">
                      <label>Job No<em>*</em></label>
                      <input type="text" class="form-control" name="jobno" id="jobno" placeholder="Enter Job No">
                      <?php echo form_error('jobno', '<div class="error">', '</div>');  ?>
                    </div>
                   
                    <div class="col-sm-12 col-md-2 col-lg-2">
                      <label>&nbsp;</label>
                      <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="ajax-content-container"></div>
      </section>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#btn").click(function(event) {
        event.preventDefault();
        var jobno = $("#jobno").val();
		
		
        $.ajax({
          type: 'post',
          url: '<?php echo base_url(); ?>Dashboard/jobno_wise_fabric_receive_form',
          dataType: "text",
          data: {
            jobno: jobno
          },
          success: function(data) {
            $('#ajax-content-container').html(data);

          },
          error: function() {
            alert('error!');
          }

        });
      });
    });
  </script>


</body>

</html>