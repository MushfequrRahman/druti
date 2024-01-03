<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Babylon Group</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Login</p>

    <form action="<?php echo base_url();?>User_Login/login" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="userid" placeholder="User ID">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('userid', '<div class="error">', '</div>');  ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password', '<div class="error">', '</div>');  ?>
      </div>
      <?php /*?><div class="form-group has-feedback">
        <select class="form-control" name="user_type" id="user_type">
                    	<option value="">Select....</option>
                        <option value="Super-Admin">Super Admin</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
       
        <?php echo form_error('user_type', '<div class="error">', '</div>');  ?>
      </div><?php */?>
      <?php /*?><div class="form-group has-feedback">
        <select class="form-control" name="unit" id="unit">
                    	<option value="">Select....</option>
                        <?php
						foreach($allf as $row)
						{
					?>
                    		<option value="<?php echo $row['factoryid'];?>"><?php echo $row['factoryname'];?></option>
                    <?php
						}
					?>
                    </select>
        <?php echo form_error('unit', '<div class="error">', '</div>');  ?>
      </div><?php */?>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <!--<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>-->
          <input type="submit" name="submit" value="Sign In">
        </div>
        <!-- /.col -->
      </div>
    </form>


    <!-- /.social-auth-links -->

    <!--<a href="#">I forgot my password</a><br>-->
    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>