<style>
.error{color:red;}
em{color:red;}
label{font-size:13px;}
th{font-size:13px;}
</style>
<script type="text/javascript">
$(function () {
    jQuery(".pd").datepicker({dateFormat: 'dd-mm-yy'});
	})
</script>

<?php
$racknoid = '';
$fabricpart = '';

foreach ($ul1 as $row) {
  $racknoid .= '<option value="' . $row["racknoid"] . '">' . $row["rackno"] . '</option>';
}
foreach ($ul3 as $row) {
  $fabricpart .= '<option value="' . $row["fabricpartid"] . '">' . $row["fabricpart"] . '</option>';
}
?> 
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
                  <h3 class="box-title">Fabric Received Insert</h3>
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
                	<span style="text-align:center" id="error"></span>
                    <div style="text-align:center" id="item_table"></div>
				 <?php /*?><form role="form" autocomplete="off" action="<?php echo base_url();?>Dashboard/fabric_received_insert" method="post" enctype="multipart/form-data"><?php */?>
                 <form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">
                 <div class="row">
                 	<div class="col-md-12">
						<label>Date<em>*</em></label>
						<input type="text" class="form-control pd" name="frcdate" readonly  id="pd" value="<?php echo date('d-m-Y');?>">
                 	</div>
                 </div>
                 <br/>
                 <br/>
                 <div class="row">
                 	<div class="col-md-3">
						<label>Challan No<em>*</em></label>
						<input type="text" class="form-control" name="challanno" placeholder="Enter Challan No" value="<?php echo set_value('challanno'); ?>">
                    	<?php echo form_error('challanno', '<div class="error">', '</div>');  ?>
					</div>
                	<div class="col-md-3">
						<label>Supplier<em>*</em></label>
						<input type="text" class="form-control" placeholder="Enter Supplier">
                    	<?php /*?><?php echo form_error('challanno', '<div class="error">', '</div>');  ?><?php */?>
					</div>
                 	<div class="col-md-3">
                        <label>Buyer Name<em>*</em></label>
                        <select class="form-control" name="buyerid" id="buyerid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul as $row) {
                          ?>
                            <option value="<?php echo $row['buyerid']; ?>"><?php echo $row['buyername']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('buyerid', '<div class="error">', '</div>');  ?>
                 	</div>
                   
                 	<div class="col-md-3">
						<label>Job No<em>*</em></label>
						<select class="form-control" name="jobno" id="jobno">
                    		<option value="">Select....</option>
                        
                    	</select>
                    	<?php echo form_error('jobno', '<div class="error">', '</div>');  ?>
					</div>
                    </div>
                    <br/>
                    <br/>
                   <div class="row">
                	<div class="col-md-3">
						<label>Style No<em>*</em></label>
						<select class="form-control" name="style" id="style">
                    		<option value="">Select....</option>
                        </select>
                    	<?php echo form_error('style', '<div class="error">', '</div>');  ?>
					</div>
                	<div class="col-md-3">
						<label>Order No<em>*</em></label>
						<select class="form-control" name="orderno" id="orderno">
                    		<option value="">Select....</option>
                        </select>
                    	<?php echo form_error('orderno', '<div class="error">', '</div>');  ?>
					</div>
                	<div class="col-md-3">
						<label>Color<em>*</em></label>
						<select class="form-control" name="colorno" id="colorno">
                    		<option value="">Select....</option>
                        </select>
                    	<?php echo form_error('colorno', '<div class="error">', '</div>');  ?>
					</div>
                	<div class="col-md-3">
						<label>Batch/Lot No<em>*</em></label>
						<input type="text" class="form-control" name="lotno" placeholder="Enter Batch/Lot No" value="<?php echo set_value('lotno'); ?>">
                    	<?php echo form_error('lotno', '<div class="error">', '</div>');  ?>
					</div>
                <?php /*?><div class="form-group">
					<label>Dia(Inch)<em>*</em></label>
					<input type="text" class="form-control" name="dia" placeholder="Enter Dia(Only Digit)" value="<?php echo set_value('dia'); ?>">
                    <?php echo form_error('dia', '<div class="error">', '</div>');  ?>
				</div><?php */?>
                
                <?php /*?><div class="form-group">
					<label>Received Qty<em>*</em></label>
					<input type="text" class="form-control" name="rqty" placeholder="Enter Received Qty" value="<?php echo set_value('rqty'); ?>">
                    <?php echo form_error('rqty', '<div class="error">', '</div>');  ?>
				</div><?php */?>
                 <?php /*?><div class="form-group">
					<label>Rack No<em>*</em></label>
					<select class="form-control" name="racknoid" id="racknoid">
                          <option value="">Select....</option>
                          <?php
                          foreach ($ul1 as $row1) {
                          ?>
                            <option value="<?php echo $row1['racknoid']; ?>"><?php echo $row1['rackno']; ?></option>
                          <?php
                          }
                          ?>
                        </select>
                        <?php echo form_error('racknoid', '<div class="error">', '</div>');  ?>
				</div><?php */?>
                </div>
                <br/>
                <br/>
                <div id="AuGroup">
                        <div class="row">
                          <table class="table table-bordered" id="item_table1">
                            <thead>
                              <tr>
                                <th style="text-align:center;">Received Qty(Only Digit)</th>
                                <th style="text-align:center;">Fabric Part</th>
                                <th style="text-align:center;">Dia(Inch)</th>
                                <th style="text-align:center;">Rack No</th>
                                <th style="vertical-align:middle; text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
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

    $('#buyerid').change(function(event){
        event.preventDefault();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_jobno",
			dataType:"json",
                    data:{ buyerid:buyerid},
            success:function(res)
            	{
         		 	$('#jobno').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#jobno').append('<option value="'+data['jobnoid']+'">'+data['jobno']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#jobno').change(function(event){
        event.preventDefault();
		var jobno = $('#jobno').val();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_styleno",
			dataType:"json",
                    data:{ jobno:jobno,buyerid},
            success:function(res)
            	{
         		 	$('#style').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#style').append('<option value="'+data['styleid']+'">'+data['stylename']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#style').change(function(event){
        event.preventDefault();
		var jobno = $('#jobno').val();
		var style = $('#style').val();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_orderno",
			dataType:"json",
                    data:{ jobno:jobno,style:style,buyerid},
            success:function(res)
            	{
         		 	$('#orderno').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#orderno').append('<option value="'+data['orderid']+'">'+data['ordername']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#orderno').change(function(event){
        event.preventDefault();
		var orderno = $('#orderno').val();
		var style = $('#style').val();
		var jobno = $('#jobno').val();
		var buyerid = $('#buyerid').val();

        $.ajax({
            type:'get',
            url:"<?php echo base_url(); ?>Dashboard/show_colorno",
			dataType:"json",
                    data:{ orderno:orderno,style:style,jobno:jobno,buyerid},
            success:function(res)
            	{
         		 	$('#colorno').find('option').not(':first').remove();
				 	// Add options
          			$.each(res,function(index,data){
				  	$('#colorno').append('<option value="'+data['colorid']+'">'+data['colorname']+'</option>');
          			});
				}
        	});
    	});
	});
</script>

<script>
    $(document).ready(function() {

      var count = 0;

      $(document).on('click', '.add', function() {
        count++;
        var html = '';
        html += '<tr>';
        html += '<td><input type="text" name="rqty[]" class="form-control rqty" id="rqty' + count + '" /></td>';
        html += '<td><select name="fabricpart[]" class="form-control fabricpart" id="fabricpart' + count + '"><option value="">Fabric Part</option><?php echo $fabricpart; ?></select></td>';
		html += '<td><input type="text" name="dia[]" class="form-control dia" id="dia' + count + '" /></td>';
        html += '<td><select name="racknoid[]" class="form-control racknoid" id="racknoid' + count + '"><option value="">Rack No</option><?php echo $racknoid; ?></select></td>';
        html += '<td style="vertical-align:middle; text-align:center;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
        $('#item_table1').append(html);
      });

      $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
      });

      $('#insert_form').on('submit', function(event) {
        event.preventDefault();
        var error = '';

         $('#buyerid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Buyer</p>';
            return false;
          }
          count = count + 1;
        });
		
		$('#jobno').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Job No</p>';
            return false;
          }
          count = count + 1;
        });
		
		$('#style').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Style</p>';
            return false;
          }
          count = count + 1;
        });
		
		$('#orderno').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Order No</p>';
            return false;
          }
          count = count + 1;
        });
		
		$('#colorno').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Color No</p>';
            return false;
          }
          count = count + 1;
        });
		
		$('#lotno').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Lot No</p>';
            return false;
          }
          count = count + 1;
        });
		
		
		$('.rqty').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Received Qty at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.fabricpart').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Fabric part at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });

        $('.racknoid').each(function() {
          var count = 1;
          if ($(this).val() == '') {
            error += '<p>Enter Rack No at ' + count + ' Row</p>';
            return false;
          }
          count = count + 1;
        });
        var form_data = $(this).serialize();
        //alert(form_data);

        if (error == '') {
          $.ajax({
            url: "<?php echo base_url(); ?>Dashboard/fabric_received_insert",
            method: "get",
            data: form_data,
            success: function(data) {
              //alert(url);
              if (data == 'ok') {
                document.forms['insert_form'].reset();
                $('#item_table1').find('tr:gt(0)').remove();
                $('#error').html('<div class="alert alert-success">Fabric Received Details Saved</div>');
                window.setTimeout(function() {
                  location.reload()
                }, 3000)
              }
            }
          });
        } else {
          $('#error').html('<div class="alert alert-danger">' + error + '</div>');
        }

      });

    });
  </script>


</body>
</html>


