<meta http-equiv="refresh" content="1800" />
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
</style>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
      
        
		

      

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
                  <h3 class="box-title">Challan List Info</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
                        <?php /*?><?php echo $this->session->userdata('factoryid');?><?php */?>
							<?php /*?><?php if($responce = $this->session->flashdata('Successfully')): ?>
								<div class="text-center">
									<div class="alert alert-success text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?><?php */?>
						</div>
					</div>
              
                </div>
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <div class="text-right-input">
                                	<div class="row">
                                		<div class="col-md-3 col-md-offset-9">
                                			<input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'> 
                                		</div>
                                	</div> 
                                </div>
                                <br/>
             	<table id="tableData" class="table table-hover table-bordered">
              <thead style="background:#91b9e6;">
                <tr>
                 <th>SL</th>
                 <th>Challan</th>
                 <th>Date</th>
                 <th>From</th>
                 <th>Buyer</th>
                 <th>Job No</th>
                 <th>Style</th>
                 <th>Order</th>
                 <th>Color</th>
                 <!--<th>Garments Part</th>
                 <th>Production Type</th>-->
                 <!--<th>Sent Qty</th>
                 <th>Receive Qty</th>
                 <th>Bag</th>-->
                 <th>Status</th>
                 <th>Details</th>
                  <!--<th>Edit</th>-->
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				foreach($ul as $row)
				{ ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $i++;?></td>
                  <?php if($this->session->userdata('factoryid')==$row['dfactoryid'] && $row['status']==2)
				  {
					  //if($row['status']==1 || $row['status']==2)
//					  {
				  ?>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/factory_challanm_receive_form/<?php echo $bn=$row['chmid'];?>"><?php echo $row['challanno'];?></a></td>
                  <?php
				  	}
					elseif($this->session->userdata('factoryid')==$row['sfactoryid'])
				  	{
				   ?>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/factory_challanm_sapproved/<?php echo $bn=$row['chmid'];?>"><?php echo $row['challanno'];?></a></td>
                  <?php
				  	}
				  
				  else
				  	{
				   ?>
                  <td style="vertical-align:middle;"><?php echo $row['challanno'];?></td>
                  <?php
				  }
				  ?>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['crcdate']));?></td>
                  <td style="vertical-align:middle;"><?php echo $row['sfactoryid'];?></td>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['challanno'];?></td><?php */?>
                  <td style="vertical-align:middle;"><?php echo $row['buyername'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['jobno'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['stylename'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['ordername'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['colorname'];?></td>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['garmentspart'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['productiontype'];?></td><?php */?>
                  <?php /*?><td style="vertical-align:middle;"><?php echo $row['sqty']."".$row['puom'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['rqty']."".$row['puom'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['bag'];?></td><?php */?>
                  <?php
				  if($row['status']=='1')
				  {
				  ?>
                  <td style="vertical-align:middle;">Waiting For Gate Out</td>
                  <?php
				  }
				  elseif($row['status']=='2')
				  {
				  ?>
                  <td style="vertical-align:middle;">Waiting For Gate In</td>
                  <?php
				  }
				  elseif($row['status']=='3')
				  {
				  ?>
                  <td style="vertical-align:middle;">Received</td>
                  <?php
				  }
				  ?>
                  <td style="vertical-align:middle;"><a href="<?php echo base_url();?>Dashboard/challanm_details/<?php echo $bn=$row['chmid'];?>">Details</a></td>
                 </tr>
                 <?php } ?>
                </tbody>
               
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:50});
            });
        </script>
                
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
</div>
<!-- ./wrapper -->
<script type='text/javascript'>

    $(document).ready(function(){


        // Search all columns

        $('#txt_searchall').keyup(function(){

            var search = $(this).val();


            $('table tbody tr').hide();


            var len = $('table tbody tr:not(.notfound) td:contains("'+search+'")').length;


            if(len > 0){

              $('table tbody tr:not(.notfound) td:contains("'+search+'")').each(function(){

                  $(this).closest('tr').show();

              });

            }else{

              $('.notfound').show();

            }

            

        });

    });

    // Case-insensitive searching (Note - remove the below script for Case sensitive search )

    $.expr[":"].contains = $.expr.createPseudo(function(arg) {

        return function( elem ) {

            return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;

        };

    });

</script>            

</body>
</html>
