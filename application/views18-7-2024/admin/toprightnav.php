<?php error_reporting(0);?>
 <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo base_url();?>Dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!--<span class="logo-mini"><b>HARMO</b>NIZER</span>-->
      <span class="logo-mini"><img style="width:35px; height:35px;" src="<?php echo base_url().'assets/images/babylon.png';?>" alt="logo"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img style="width:115px; height:35px;margin: 7px 0 0 0;" src="<?php echo base_url().'assets/images/babylon.png';?>" alt="logo"></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <?php /*?><?php if($this->session->userdata('user_type')=='2')
	  {
		  ?><?php */?>
      <!--<div class="m" style="width:600px; margin:auto;"><ul class="nav navbar-nav" style="text-align:center"><li class="user user-menu"><a>Support:&nbsp;Arif&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;<span>01842493349</span>&nbsp;&nbsp;||&nbsp;&nbsp;Parvez&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;<span>01675184716</span></a></li></ul></div>-->
      <?php /*?><?php
	  }
	  ?><?php */?>
      <!-- Navbar Right Menu -->
      
      <div class="navbar-custom-menu">
       
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
              <?php /*?><li class="dropdown messages-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-envelope-o"></i>
                  <span class="label label-success">4</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 4 messages</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- start message -->
                        <a href="#">
                          <div class="pull-left">
                            <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                          </div>
                          <h4>
                            Sender Name
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                          </h4>
                          <p>Message Excerpt</p>
                        </a>
                      </li><!-- end message -->
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">See All Messages</a></li>
                </ul>
              </li><?php */?>
              <!-- Notifications: style can be found in dropdown.less -->
              <?php /*?><li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">10</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 10 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li>
                        <a href="#">
                          <i class="ion ion-ios-people info"></i> Notification title
                        </a>
                      </li>
                      ...
                    </ul>
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li><?php */?>
              <!-- Tasks: style can be found in dropdown.less -->
              <li class="dropdown tasks-menu">
                <?php /*?><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-flag-o"></i>
                  <?php
				  foreach($ts as $row)
				  {
					  
				  ?>
                  <span class="label label-danger"><?php echo $row['tasksstatus'];?></span>
                  <?php
				  }
				  ?>
                </a><?php */?>
                <ul class="dropdown-menu">
                  <?php /*?><li class="header">You have <?php echo $row['tasksstatus'];?> tasks</li><?php */?>
                  <?php /*?><li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                      <li><!-- Task item -->
                        <a href="#">
                          <h3>
                            Check your tasks
                            <small class="pull-right">Tasks</small>
                          </h3>
                          <!--<div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">Complete All</span>
                            </div>
                          </div>-->
                        </a>
                      </li><!-- end task item -->
                      ...
                    </ul>
                  </li><?php */?>
                  <?php /*?><li class="footer">
                    <a href="<?php echo base_url();?>Dashboard/self_task_list/<?php echo $userid=$this->session->userdata('userid');?>">View all tasks</a>
                  </li><?php */?>
                </ul>
              </li>
      
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php /*?><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url().'assets/uploads/employee/'.$this->session->userdata('pic');?>" alt="User profile picture"><?php */?>
              <span class="hidden-xs"><?php echo $this->session->userdata('name');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php /*?><img class="profile-user-img img-responsive img-thumbnail" src="<?php echo base_url().'assets/uploads/users/'.$this->session->userdata('pic');?>" alt="User profile picture"><?php */?>

                <p>
                  <?php echo $this->session->userdata('name');?>
                  <small><?php echo $this->session->userdata('factoryid');?></small>
                </p>
              </li>
         
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>User_Login/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
   
        </ul>
      </div>
	  <!--<div class="center-navbar">Support:&nbsp;Arif&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;<span>01842493349</span>&nbsp;&nbsp;||&nbsp;&nbsp;Parvez&nbsp;&nbsp;&nbsp;<i class="fa fa-phone"></i>&nbsp;<span>01675184716</span></div>-->
    </nav>
  </header>