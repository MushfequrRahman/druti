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
                  <h3 class="box-title">Buyer Insert</h3>
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
				 <form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/buyer_insert" method="post" enctype="multipart/form-data">
                 <div class="form-group">
					<label>Name<em>*</em></label>
					<input type="text" class="form-control" name="buyername" placeholder="Enter Buyer Name" value="<?php echo set_value('buyername'); ?>">
                    <?php echo form_error('buyername', '<div class="error">', '</div>');  ?>
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

<script type="text/javascript">
$(document).ready(function(){

    $('#floorname').change(function(event){
        event.preventDefault();
		var floorname = $('#floorname').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_linename",
			dataType:"json",
                    data:{ floorname:floorname},
            success:function(res)
            	{
         		 	$('#linename').find('option').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#linename').append('<option value="'+data['linename']+'">'+data['linename']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

</body>
</html>


