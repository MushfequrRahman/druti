<style>
.error{color:red;}
em{color:red;}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      

      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">
      
          <div class="row">
           
            <!-- /.col -->

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Order Wise Fabric Report</h3>
					
              
                </div>
                <!-- /.box-header -->
                <div class="box-body ">
                	<div class="col-sm-12 col-md-5 col-lg-5">
					<div class="form-group">
                        <label>Order Name<em>*</em></label>
                        <select class="form-control" name="ordername" id="ordername">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['ordername']; ?>"><?php echo $row['ordername']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('ordername', '<div class="error">', '</div>');  ?>
                 </div>
                    
				</div>
                
                <div class="col-sm-12 col-md-2 col-lg-2">
                <label>&nbsp;</label>
                  <input type="submit" class="btn btn-primary form-control" name="submit" id="btn" value="Submit" />
                </div>
               </div>
                <!-- /.box-body -->
                
				 <!--</form>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

        
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div id="ajax-content-container">
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->
<script>
    $(document).ready(function(){
        $( "#btn" ).click(function(event)
        {
            event.preventDefault();
            var ordername= $("#ordername").val();
            $.ajax(
                {
                    type:'post',
                    url: '<?php echo base_url(); ?>Dashboard/order_wise_fabric_report',
					dataType:"text",
                    data:{ ordername:ordername},
					      success: function(data) 
						  	{
       					  		$('#ajax-content-container').html(data);
								
      						},
	  					error: function(){
    					alert('error!');
  				}
                    
                });
        });
    });
</script>


</body>
</html>


