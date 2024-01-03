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
  
 
  text-align:center;
}
th,td{font-size:12px;text-align:center;}
div.scrollable-table-wrapper {
  height: 1000px;
  overflow: auto;
}
.header {
            position: sticky;
            top:0;
        }
</style>

                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            
            
             	<div class="scrollable-table-wrapper">
                <table id="tableData" class="table table-hover table-bordered">
              	<thead style="background:#91b9e6;position: sticky;top: 0;">
                <tr>
                  <th>SL</th>
                  <!--<th>Image</th>-->
                  
                  <th>ID</th>
                  <th>Name</th>
                  <th>Factory</th>
                  <th>Designation</th>
                  <th>Department</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>User Status</th>
                  <th>Edit</th>
                  <th>Transfer</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				foreach($ul as $row)
				{ ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $i++;?></td>
                  <?php /*?><td><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url().'assets/uploads/employee/'.$row['image'];?>" alt="User profile picture"></td><?php */?>
                  <?php /*?><td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/user_imglist_up/<?php echo $bn=$row['userid'];?>"><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url().'assets/uploads/users/'.$row['image'];?>" alt="User profile picture"></a></td><?php */?>
                 
                 <?php /*?><td style="vertical-align:middle;"><a target="_blank" href="<?php echo base_url();?>Dashboard/user_profile/<?php echo $bn=$row['userid'];?>"><?php echo $row['userid'];?></a></td><?php */?>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['userid'];?></td><?php */?>
                  <td style="vertical-align:middle;"><?php echo $row['userid'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['name'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['factoryname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['departmentname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['designation'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['email'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['mobile'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['userstatus'];?></td>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/user_list_up/<?php echo $bn=$row['userid'];?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/user_transfer_form/<?php echo $bn=$row['userid'];?>"><i class="fa fa-exchange" aria-hidden="true"></i>
</a></td>
                </tr>
                </tbody>
               <?php } ?>
              </table>
              </div>
            </div>
            
            <!-- /.box-body -->
         
