<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
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
              <li class="active"><a href="#activity" data-toggle="tab">User Details</a></li>
            
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
               
               <?php foreach($ulup as $row)
				{ ?>
              <form role="form" action="<?php echo base_url();?>Dashboard/ulup" method="post" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="urid" value="<?php echo $row['urid']; ?>">
              <div class="form-group">
					<label>Factory</label>
					<select class="form-control" name="factoryid" id="factoryid">
                    	<option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
                        <?php
						foreach($ul as $row1)
						{
					?>
                    		<option value="<?php echo $row1['factoryid'];?>"><?php echo $row1['factoryname'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['factoryname']; ?><?php */?>
                    <?php echo form_error('factoryid', '<div class="error">', '</div>');  ?>
				</div>
              	<div class="form-group">
					<label>Department<em>*</em></label>
						<select class="form-control" name="departmentid" id="departmentid">
                    		<option value="<?php echo $row['departmentid'];?>"><?php echo $row['departmentname'];?></option>
                             <?php
								foreach($ul1 as $row2)
									{
							?>
                    					<option value="<?php echo $row2['deptid'];?>"><?php echo $row2['departmentname'];?></option>
                    		<?php
									}
							?>
                        </select>
				</div>
                <?php /*?><?php echo $row['departmentname'];?><?php */?>
                
                <div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>">
                    <?php echo form_error('name', '<div class="error">', '</div>');  ?>
				</div>
                
                <div class="form-group">
					<label>Designation<em>*</em></label>
					<select class="form-control" name="designationid" id="designationid">
                    	<option value="<?php echo $row['desigid'];?>"><?php echo $row['designation'];?></option>
                        <?php
							foreach($ul2 as $row3)
								{
						?>
                    					<option value="<?php echo $row3['desigid'];?>"><?php echo $row3['designation'];?></option>
                    	<?php
								}
						?>
                    </select>
                    <?php echo form_error('designationid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>Email<em>*</em></label>
					<input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                    <?php echo form_error('email', '<div class="error">', '</div>');  ?>
				</div>
                
                <div class="form-group">
					<label>Mobile<em>*</em></label>
					<input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']; ?>">
                    <?php echo form_error('mobile', '<div class="error">', '</div>');  ?>
				</div>
                
                <div class="form-group">
					<label>User Type<em>*</em></label>
					<select class="form-control" name="usertypeid" id="usertypeid">
                    	<option value="<?php echo $row['usertypeid'];?>"><?php echo $row['usertype'];?></option>
                        <?php
						foreach($ul3 as $row4)
						{
					?>
                    		<option value="<?php echo $row4['usertypeid'];?>"><?php echo $row4['usertype'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['usertype'];?><?php */?>
                    <?php echo form_error('usertypeid', '<div class="error">', '</div>');  ?>
				</div>
                
                <div class="form-group">
					<label>User Status<em>*</em></label>
					<select class="form-control" name="userstatusid" id="userstatusid">
                    	<option value="<?php echo $row['userstatusid'];?>"><?php echo $row['userstatus'];?></option>
                        <?php
						foreach($ul4 as $row5)
						{
					?>
                    		<option value="<?php echo $row5['userstatusid'];?>"><?php echo $row5['userstatus'];?></option>
                    <?php
						}
					?>
                    </select>
                    <?php /*?><?php echo $row['userstatus'];?><?php */?>
                    <?php echo form_error('userstatusid', '<div class="error">', '</div>');  ?>
				</div>
                <div class="form-group">
					<label>User ID</label>
					<input type="text" class="form-control" name="userid" value="<?php echo $row['userid']; ?>">
                    <?php echo form_error('password', '<div class="error">', '</div>');  ?>
				</div>
                
                <div class="form-group">
					<label>Password</label>
					<input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
                    <?php echo form_error('password', '<div class="error">', '</div>');  ?>
				</div>
                
                
                <?php
					if($row['indate']=="0000-00-00")
					{
						$indate="0000-00-00";
						//$indate= date("d-m-Y", strtotime($indate));
					}
					else
					{
						$indate=$row['indate'];
						$indate= date("d-m-Y", strtotime($indate));
					}
				?>
				<div class="form-group">
					<label>Date Of Inactive<em>*</em></label>
					<input type="text" class="form-control pd" name="indate" value="<?php echo $indate; ?>">
                   <?php /*?> <?php echo form_error('dojdate', '<div class="error">', '</div>');  ?><?php */?>
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


