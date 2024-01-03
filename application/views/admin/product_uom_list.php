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
th,td{font-size:14px;text-align:center;}
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
                  						<h3 class="box-title">Product UOM List</h3>
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
                					<div class="box-body table-responsive no-padding">
             							<table id="tableData" class="table table-hover table-bordered">
              								<thead style="background:#91b9e6;">
                								<tr>
                  									<th>SL</th>
                  									<th>UOM</th>
                  									<th>Edit</th>
                								</tr>
                							</thead>
                							<tbody>
                								<?php 
													$i=1;
													foreach($ul as $row)
														{ 
												?>
                											<tr>
                  												<td style="vertical-align:middle;"><?php echo $i++;?></td>
                  												<td style="vertical-align:middle;"><?php echo $row['puom'];?></td>
                  												<td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/product_uom_list_up/<?php echo $bn=$row['puomid'];?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                  											</tr>
                                                 <?php 
												 		} 
												?>
                							</tbody>
               							</table>
            						</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
    </div>
	<script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:50});
            });
    </script>
</body>
</html>
