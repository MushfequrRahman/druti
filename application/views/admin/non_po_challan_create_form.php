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


		text-align: center;
	}

	th,
	td {
		font-size: 12px;
		text-align: center;
	}

	td {
		font-weight: 600;
		font-variant: small-caps;
	}

	em {
		color: red;
	}

	.error {
		color: red;
	}
</style>
<script type="text/javascript">
	$(function() {
		jQuery(".pd").datepicker({
			dateFormat: 'dd-mm-yy'
		});
	})
</script>

<script>
	// Defining a function to display error message
	function printError(elemId, hintMsg) {
		document.getElementById(elemId).innerHTML = hintMsg;
	}

	// Defining a function to validate form 
	function validateForm() {
		// Retrieving the values of form elements 
		var challanno = document.contactForm.challanno.value;
		var ptid = document.contactForm.ptid.value;
		var ctid = document.contactForm.ctid.value;
		var dfactory = document.contactForm.dfactory.value;
		var deptid = document.contactForm.deptid.value;
		var desigid = document.contactForm.desigid.value;

		// Defining error variables with a default value
		var challannoErr = ptidErr = ctidErr = dfactoryErr = true;

		if (challanno == "") {
			printError("challannoErr", "Need Challan No");
		} else {
			printError("challannoErr", "");
			challannoErr = false;
		}

		if (puom == "") {
			printError("ptidErr", "Need UOM");
		} else {
			printError("ptidErr", "");
			ptidErr = false;
		}

		if (ctid == "") {
			printError("ctidErr", "Need Challan Type");
		} else {
			printError("ctidErr", "");
			ctidErr = false;
		}

		if (dfactory == "") {
			printError("dfactoryErr", "Need Destination");
		} else {
			printError("dfactoryErr", "");
			dfactoryErr = false;
		}

		if (deptid == "") {
			printError("deptidErr", "Need Department");
		} else {
			printError("deptidErr", "");
			deptidErr = false;
		}

		if (desigid == "") {
			printError("desigidErr", "Need Designation");
		} else {
			printError("desigErr", "");
			desigidErr = false;
		}

		// Prevent the form from being submitted if there are any errors
		if ((challannoErr || ptidErr || ctidErr || deptidErr || desigidErr || dfactoryErr) == true) {
			return false;
		} else {
			// Creating a string from input data for preview
			var dataPreview = "You've entered the following details: \n" +
				"Challan No: " + challanno + "\n" +
				"Production Type: " + ptid + "\n" +
				"Challan Type: " + ctid + "\n" +
				"Department: " + deptid + "\n" +
				"Designation: " + desigid + "\n" +
				"destination Factory: " + dfactory + "\n";

			// Display input data in a dialog box before submitting the form
			//alert(dataPreview);
		}
	};
</script>

<?php
$nppcname = '';
foreach ($nl as $row) {
	$nppcname .= '<option value="' . $row["nppcid"] . '">' . $row["nppcname"] . '</option>';
}

$puom = '';
foreach ($pul as $row) {
	$puom .= '<option value="' . $row["puomid"] . '">' . $row["puom"] . '</option>';
}

$challantype = '';
foreach ($ctl as $row) {
	$challantype .= '<option value="' . $row["ctid"] . '">' . $row["challantype"] . '</option>';
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
										<h3 class="box-title">Non-PO Challan Create</h3>
									</div>

									<!-- <form role="form" name="contactForm" autocomplete="off" onSubmit="return validateForm()" action="<?php echo base_url(); ?>Dashboard/order_wise_challan_create" method="post" enctype="multipart/form-data"> -->
									<span style="text-align:center" id="error"></span>
									<div style="text-align:center" id="item_table"></div>
									<form role="form" name="insert_form" id="insert_form" autocomplete="off" method="post" enctype="multipart/form-data">

										<div class="box-header with-border">
											<div class="row">
												<div class="col-sm-12 col-md-2 col-lg-2">
													<label>Challan Date<em>*</em></label>
													<input type="text" class="form-control pd" name="crcdate" readonly id="pd" value="<?php echo date('d-m-Y'); ?>">
												</div>
												<div class="col-sm-12 col-md-2 col-lg-2">
													<label>From Factory<em>*</em></label>
													<input type="text" class="form-control" name="sfactory" id="sfactory" readonly value="<?php echo $this->session->userdata('factoryid'); ?>">
													<?php echo form_error('sfactory', '<div class="error">', '</div>');  ?>
												</div>
												<div class="col-sm-12 col-md-1 col-lg-1">
													<label>Challan<em>*</em></label>
													<input type="text" class="form-control" name="challanno" id="challanno" placeholder="Enter Challan Number">
													<?php echo form_error('challan', '<div class="error">', '</div>');  ?>
													<div class="error" id="challannoErr"></div>
												</div>
												<div class="col-sm-12 col-md-2 col-lg-2">
													<label>Department<em>*</em></label>
													<select class="form-control deptid" name="deptid" id="deptid">
														<option value="">Select....</option>
														<?php
														foreach ($dl as $row) {
														?>
															<option value="<?php echo $row['deptid']; ?>"><?php echo $row['departmentname']; ?></option>
														<?php
														}
														?>
													</select>
													<?php echo form_error('deptid', '<div class="error">', '</div>');  ?>
													<div class="error" id="deptidErr"></div>
												</div>
												<div class="col-sm-12 col-md-2 col-lg-2">
													<label>Designation<em>*</em></label>
													<select class="form-control desigid" name="desigid" id="desigid">
														<option value="">Select....</option>
														<?php
														foreach ($del as $row) {
														?>
															<option value="<?php echo $row['desigid']; ?>"><?php echo $row['designation']; ?></option>
														<?php
														}
														?>
													</select>
													<?php echo form_error('desigid', '<div class="error">', '</div>');  ?>
													<div class="error" id="desigidErr"></div>
												</div>
												<div class="col-sm-12 col-md-1 col-lg-1">
													<label>User<em>*</em></label>
													<input type="text" class="form-control username" name="username" id="username" placeholder="Enter User">
													<?php echo form_error('user', '<div class="error">', '</div>');  ?>
													<div class="error" id="userErr"></div>
												</div>
												<div class="col-sm-12 col-md-2 col-lg-2">
													<label>To Factory<em>*</em></label>
													<select class="form-control dfactory" name="dfactory" id="dfactory">
														<option value="">Select....</option>
														<?php
														foreach ($fl as $row) {
														?>
															<option value="<?php echo $row['factoryid']; ?>"><?php echo $row['factoryname']; ?></option>
														<?php
														}
														?>
													</select>
													<?php echo form_error('dfactoryid', '<div class="error">', '</div>');  ?>
													<div class="error" id="dfactoryErr"></div>
												</div>
											</div>
										</div>
										<div class="box-header with-border">
											<div class="box-body no-padding">
												<div id="AuGroup">
													<div class="row">
														<table class="table table-bordered" id="item_table1">
															<thead>
																<tr>
																	<th style="text-align:center;">Product Type<em>*</em></th>
																	<th style="text-align:center;">Product Name<em>*</em></th>
																	<th style="text-align:center;">Qty<em>*</em></th>
																	<th style="text-align:center;">UOM<em>*</em></th>
																	<th style="text-align:center;">Challan Type<em>*</em></th>
																	<th style="text-align:center;">Remarks</th>
																	<th style="vertical-align:middle;text-align:center;"><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
																</tr>
															</thead>
															<tbody></tbody>
														</table>
													</div>
												</div>

												<br />
												<div class="col-sm-12 col-md-2 col-lg-2 col-md-offset-5 col-lg-offset-5">
													<label>&nbsp;</label>
													<!-- <input type="submit" class="btn btn-primary " name="submit" id="btn" value="CREATE" /> -->
													<div id="response"></div>
												</div>
											</div>
										</div>
									</form>

								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>

	<script>
		$(document).ready(function() {

			$("#challanno").keyup(function(event) {

				var sfactory = $("#sfactory").val().trim();
				var challanno = $("#challanno").val().trim();

				if (challanno != '') {

					$.ajax({
						url: "<?php echo base_url(); ?>Dashboard/non_po_wise_challan_available",
						type: 'get',
						data: {
							sfactory: sfactory,
							challanno: challanno
						},
						success: function(response) {

							// Show response
							$("#response").html(response);

						}
					});
				} else {
					$("#response").html("<span style='color: red;'>Enter valid info</span>");
				}

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

				html += '<td><select name="nppcname[]" class="form-control nppcname"><option value="">Select</option><?php echo $nppcname; ?></select></td>';
				html += '<td><input type="text" name="pname[]" class="form-control pname" /></td>';
				html += '<td><input type="text" name="pqty[]" class="form-control pqty" /></td>';
				html += '<td><select name="puom[]" class="form-control puom"><option value="">Select</option><?php echo $puom; ?></select></td>';
				html += '<td><select name="challantype[]" class="form-control challantype"><option value="">Select</option><?php echo $challantype; ?></select></td>';
				html += '<td><textarea class="form-control remarks" rows="1" name="remarks[]" id="remarks"></textarea></td>';
				html += '<td style="vertical-align:middle;"><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span></button></td>';
				$('tbody').append(html);
			});

			$(document).on('click', '.remove', function() {
				$(this).closest('tr').remove();
			});

			$('#insert_form').on('submit', function(event) {
				event.preventDefault();
				var error = '';

				$('.deptid').each(function() {
					var count = 1;
					if ($(this).val() == '') {
						error += '<p>Enter Department ' + count + ' Row</p>';
						return false;
					}
					count = count + 1;
				});

				$('.desigid').each(function() {
					var count = 1;
					if ($(this).val() == '') {
						error += '<p>Enter Designation ' + count + ' Row</p>';
						return false;
					}
					count = count + 1;
				});

				$('.username').each(function() {
					var count = 1;
					if ($(this).val() == '') {
						error += '<p>Enter User ' + count + ' Row</p>';
						return false;
					}
					count = count + 1;
				});
				
				$('.dfactory').each(function() {
					var count = 1;
					if ($(this).val() == '') {
						error += '<p>Enter Destination ' + count + ' Row</p>';
						return false;
					}
					count = count + 1;
				});


				$('.nppcname').each(function() {
					var count = 1;
					if ($(this).val() == '') {
						error += '<p>Enter Product Category at ' + count + ' Row</p>';
						return false;
					}
					count = count + 1;
				});

				$('.pname').each(function() {
					var count = 1;

					if ($(this).val() == '') {
						error += '<p>Enter Product Name at ' + count + ' row</p>';
						return false;
					}

					count = count + 1;

				});

				$('.pqty').each(function() {

					var count = 1;

					if ($(this).val() == '') {
						error += '<p>Enter To Qty at ' + count + ' Row</p> ';
						return false;
					}

					count = count + 1;

				});

				$('.puom').each(function() {

					var count = 1;

					if ($(this).val() == '') {
						error += '<p>Enter To UOM at ' + count + ' Row</p> ';
						return false;
					}

					count = count + 1;

				});

				$('.challantype').each(function() {

					var count = 1;

					if ($(this).val() == '') {
						error += '<p>Enter Challan Type at ' + count + ' Row</p> ';
						return false;
					}

					count = count + 1;

				});

				var form_data = $(this).serialize();
				if (error == '') {
					$('input[type="submit"]').attr('disabled', true);
					$.ajax({
						url: "<?php echo base_url(); ?>Dashboard/non_po_wise_challan_create",
						//dataType:"json",
						method: "get",
						data: form_data,
						success: function(data) {
							if (data == 'ok') {
								document.forms['insert_form'].reset();
								$('#item_table1').find('tr:gt(0)').remove();
								$('#error').html('<div class="alert alert-success">Challan Details Saved</div>');
								// $('input[type="submit"]').attr('disabled', true);

								window.setTimeout(function() {
									location.reload()
								}, 3000)
								window.location.href = "<?php echo base_url(); ?>Dashboard/non_po_challan_create_form";
							}
						}
					});
				} else {
					$('#error').html('<div class="alert alert-danger">' + error + '</div>');
				}

			});

		});
	</script>

	<script>
		$(function() {
			$("input[class*='pqty']").keydown(function(event) {
				if (event.shiftKey == true) {
					event.preventDefault();
				}

				if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

				} else {
					event.preventDefault();
				}

				if ($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
					event.preventDefault();
			});
		});
	</script>