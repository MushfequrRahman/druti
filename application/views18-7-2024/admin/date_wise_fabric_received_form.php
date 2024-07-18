<style>
.error{color:red;}
em{color:red;}
</style>
<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	jQuery(".wd").datepicker({dateFormat: 'dd-mm-yy'});
	})
</script> 
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
                  <h3 class="box-title">Date Wise Fabric Received List</h3>
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
                <!-- /.box-header -->
                <div class="box-body ">
                	<div class="col-sm-12 col-md-5 col-lg-5">
					<label>Start Date<em>*</em></label>
					<input type="text" class="form-control pd" readonly  id="pd" value="<?php echo date('d-m-Y');?>">
                    
				</div>
                <div class="col-sm-12 col-md-5 col-lg-5">
					<label>End Date<em>*</em></label>
					
                    <input type="text" class="form-control wd" readonly  id="wd" value="<?php echo date('d-m-Y');?>">
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
            var pd= $("#pd").val();
			var wd= $("#wd").val();
			//var factoryid= $("#factoryid").val();
            $.ajax(
                {
                    type:'post',
                    url: '<?php echo base_url(); ?>Dashboard/date_wise_fabric_received_list',
					dataType:"text",
                    data:{ pd:pd,wd:wd},
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


