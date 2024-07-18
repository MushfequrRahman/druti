<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'yy-mm-dd'});
	})
</script> 
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 

    <!-- Main content -->
   <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
         
         
          
          <!-- /.box -->

          <!-- About Me Box -->
        
          <!-- /.box -->
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Factory Details</a></li>
            
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               
               <?php foreach($flup as $row)
				{ ?>
              <form role="form" action="<?php echo base_url();?>Dashboard/flup" method="post" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="fid" value="<?php echo $row['factoryid']; ?>">
              <div class="form-group">
                  <label>ID</label>
                  <input type="text" class="form-control" readonly name="facid" value="<?php echo $row['factoryid']; ?>">
                  <?php echo form_error('facid', '<div class="error">', '</div>');  ?>
                </div>
				
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="factoryname" value="<?php echo $row['factoryname']; ?>">
                    <?php echo form_error('factoryname', '<div class="error">', '</div>');  ?>
				</div>
				<div class="form-group">
					<label>Address</label>
					<input type="text" class="form-control" name="factory_address" value="<?php echo $row['factory_address']; ?>">
                    <?php echo form_error('factory_address', '<div class="error">', '</div>');  ?>
				</div>
				
				
				
                
                
                
                 
				
                
				
				
				
				
               
    
                

             
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <input type="submit" class="btn btn-primary" name="submit" value="Submit" />
                </div>
				 </form>
					
				<?php } ?>	
              </div>
             

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->


