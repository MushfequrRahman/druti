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
table{border-color:#999999 !important; background:#ffffff;}
.table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
    padding: 7px;
    line-height: 1;
   
}
th,td{font-size:10px;text-align:center; vertical-align: middle !important; border:1px solid #999999 !important; padding:2px;}
td{font-weight:bold;}
.tableFixHead { overflow-y: auto; height: 500px; }
   
   table #customers {
      display: table;
      /*font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;*/
      /*border-collapse: collapse;*/
      width: 100%;
    }

    #customers td, #customers th {
      /*border: 1px solid #ddd;*/
      /*padding: 8px;*/
    }

    #customers tr:nth-child(even){/*background-color: #f2f2f2;*/}

    #customers tr:hover {/*background-color: #ddd;*/}

    #customers th {
      padding-top: 12px;
      padding-bottom: 12px;
      /*text-align: left;
      background-color: #2C3B49;
      color: white;*/
    }
	table.scroll {
   /* table-layout: fixed;*/
    /*border-spacing: 0px;*/
    /*border: 1px solid #333;*/
    border-collapse: separate;
	
}
	
</style>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

 
  <!-- Left side column. contains the logo and sidebar -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Time & Action Plan
       
      </h1>
  
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      

     
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-tshirt-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Order</span>
              <span class="info-box-number">
			  <?php foreach($all_order_count as $row)
				{  echo $row['ordercount'];}?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
		<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-certificate"></i></span> 

            <div class="info-box-content">
              <span class="info-box-text">Colour</span>
              <span class="info-box-number">
			  <?php foreach($all_colour_count as $row)
				{  echo $row['colourcount'];}?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion-tshirt-outline"></i></span> 

            <div class="info-box-content">
              <span class="info-box-text">PP Sample</span>
              <span class="info-box-number">
			  <?php foreach($all_pp_count as $row)
				{  echo $row['ppcount'];}?>
                </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        
        

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
      </div>
      <!-- /.row -->

      

      <!-- Main row -->


        <div class="row">
           
            <!-- /.col -->

            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">All Info</h3>
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<?php /*?><?php if($responce = $this->session->flashdata('Successfully')): ?>
								<div class="text-center">
									<div class="alert alert-success text-center"><?php echo $responce;?></div>
								</div>
							<?php endif;?><?php */?>
						</div>
					</div>
              
                </div>
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding tableFixHead">
              <table id="tableData customers" class="table table-hover table-bordered scroll">
               <thead>
        <tr>
            <th rowspan="2" style="background:#91b9e6;">Buyer</th>
            <th rowspan="2" style="background:#91b9e6;">Job No</th>
            <th rowspan="2" style="background:#91b9e6;">Style</th>
            <th rowspan="2" style="background:#91b9e6;">PO</th>
            <th rowspan="2" style="background:#91b9e6;">PO Recv</th>
            <th rowspan="2" style="background:#91b9e6;">Lead Time</th>
            <th rowspan="2" style="background:#91b9e6;">Shipment Date</th>
            <th rowspan="2" style="background:#91b9e6;">Colour</th>
            <th rowspan="2" style="background:#91b9e6;">First Ship Quantity</th>
            <th rowspan="2" style="background:#91b9e6;">Emblishment</th>
            <th rowspan="2" style="background:#91b9e6;">Type</th>
            <th colspan="2" style="background:#00c0ef;">PP Sample</th>
            <th colspan="2" style="background:#00c0ef;">Fabric</th>
            <th colspan="2" style="background:#00c0ef;">Accessories</th>
            <th colspan="2" style="background:#00c0ef;">Trail Cutting</th>
            <th colspan="2" style="background:#00c0ef;">Trail Printing</th>
            <th colspan="2" style="background:#00c0ef;">Trail Input</th>
            <th colspan="2" style="background:#00c0ef;">Trail Output</th>
            <th colspan="2" rowspan="2" style="background:#00c0ef;">Report Submit Date</th>
            <th colspan="2" style="background:#00c0ef;">Bulk Cutting</th>
            
            
        </tr>
        <tr>
        	
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Send Date</th>
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            <!--<th rowspan="2"></th>-->
            <th style="background:#f39c12;">Reqrd Date</th>
            <th style="background:#f39c12;">Recv Date</th>
            
        </tr>
    </thead>
                 <tbody>
                  <?php foreach($all_buyer as $ap)
				{ ?>
        <tr>
            
            <td rowspan="2"><?php echo $ap['buyername'];?></td>
            <td rowspan="2"><?php echo $ap['jobno'];?></td>
            <td rowspan="2"><?php echo $ap['stylename'];?></td>
            <td rowspan="2"><?php echo $ap['ordername'];?></td>
           	<td rowspan="2"><?php  $odate= strtotime($ap['odate']);echo date('d M, y (l)', $odate);?></td>
            <td rowspan="2"><?php echo $ap['ldtime'];?></td>
            <td rowspan="2"><?php  $fsdate= strtotime($ap['fsdate']);echo date('d M, y (l)', $fsdate);?></td>
            <td rowspan="2"><?php echo $ap['colourname'];?></td>
            <td rowspan="2"><?php echo $ap['fsqty'];?></td>
            <td rowspan="2"><?php echo $ap['emblishment'];?></td>
            <td rowspan="2"><?php echo $ap['type'];?></td>
            <?php
				if($ap['ppcdate']=='URGENT')
					{
			?>
               			<td><?php  echo $ap['ppcdate'];?></td>
            <?php
					}
				else
					{
			?>
           				 <td><?php  $ppcdate= strtotime($ap['ppcdate']);echo date('d M, y (l)', $ppcdate);?></td>
            <?php
					}
            	
            if($ap['pprdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['pprdate'];?></td>
            	<?php
				}
				else
				{	
					$pprdate= strtotime($ap['pprdate']);$pprdate= date('d M, y (l)', $pprdate);
					?>
            <td><?php echo $pprdate.' '.$ap['pprtime']; ?></td>
            <?php
				}
			?>
            <?php
					if($ap['fabcdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['fabcdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $fabcdate= strtotime($ap['fabcdate']);echo date('d M, y (l)', $fabcdate);?></td>
            <?php
					}
            
            
				if($ap['fabrdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $fabrdate= strtotime($ap['fabrdate']);echo date('d M, y (l)', $fabrdate);?></td>
           	 <?php
					}
			?>
            
            <?php
					if($ap['accdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['accdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $accdate= strtotime($ap['accdate']);echo date('d M, y (l)', $accdate);?></td>
            <?php
					}
            
            
				if($ap['accrdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $accrdate= strtotime($ap['accrdate']);echo date('d M, y (l)', $accrdate);?></td>
           	 <?php
					}
			?>
            
            <?php
					if($ap['tccdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['tccdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $tccdate= strtotime($ap['tccdate']);echo date('d M, y (l)', $tccdate);?></td>
            <?php
					}
            
            
				if($ap['tcrdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $tcrdate= strtotime($ap['tcrdate']);echo date('d M, y (l)', $tcrdate);?></td>
           	 <?php
					}
			?>
            
            <?php
					if($ap['tpcdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['tpcdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $tpcdate= strtotime($ap['tpcdate']);echo date('d M, y (l)', $tpcdate);?></td>
            <?php
					}
            
            
				if($ap['tprdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $tprdate= strtotime($ap['tprdate']);echo date('d M, y (l)', $tprdate);?></td>
           	 <?php
					}
			?>
            
            
            <?php
					if($ap['ticdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['ticdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $ticdate= strtotime($ap['ticdate']);echo date('d M, y (l)', $ticdate);?></td>
            <?php
					}
            
            
				if($ap['tirdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $tirdate= strtotime($ap['tirdate']);echo date('d M, y (l)', $tirdate);?></td>
           	 <?php
					}
			?>
            
            <?php
					if($ap['tocdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['tocdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $tocdate= strtotime($ap['tocdate']);echo date('d M, y (l)', $tocdate);?></td>
            <?php
					}
            
            
				if($ap['tordate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $tordate= strtotime($ap['tordate']);echo date('d M, y (l)', $tordate);?></td>
           	 <?php
					}
			?>
            
            <?php
				if($ap['trrdate']=='')
					{
			?>
            <td colspan="2"><?php  echo $ap['trrdate'];?></td>
            	<?php
				}
				else
				{	
					$trrdate= strtotime($ap['trrdate']);$pprdate= date('d M, y (l)', $trrdate);
					?>
            <td colspan="2"><?php echo $trrdate.' '.$ap['trrtime']; ?></td>
            <?php
				}
			?>
            
            <?php
					if($ap['bccdate']=='URGENT')
					{
			?>
            			<td><?php echo $ap['bccdate']; ?></td>
            <?php
					}
			
					
					
				else
					{
			?>
           				 <td><?php  $bccdate= strtotime($ap['bccdate']);echo date('d M, y (l)', $bccdate);?></td>
            <?php
					}
            
            
				if($ap['bcrdate']=='0000-00-00')
					{
			?>
            <td><?php  //echo $ap['fabrdate'];?></td>
            	<?php
					}
				else
					{	
				?>
            			<td><?php  $bcrdate= strtotime($ap['bcrdate']);echo date('d M, y (l)', $bcrdate);?></td>
           	 <?php
					}
			?>
                  
                  
           
     	</tr>
        <tr>
        <?php
		if($ap['ppdif']>1)
		{
			?>
            <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"> <?php echo $ap['ppdif'];?></td>
            <?php
		}
		else
		{
		?>
        <td rowspan="1" colspan="2"> <?php echo $ap['ppdif'];?></td>
        <?php
		}
			
			
        if($ap['fabdif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['fabdif'];?></td>
        <?php
		}
		else
		{
		?>
        <td rowspan="1" colspan="2"><?php echo $ap['fabdif'];?></td>
        <?php
		}
		if($ap['accdif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['accdif'];?></td>
        <?php
		}
		else
		{
			?>
            <td rowspan="1" colspan="2"><?php echo $ap['accdif'];?></td>
            <?php
		}
		if($ap['tcdif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['tcdif'];?></td>
        <?php
		}
		else
		{
			?>
        <td rowspan="1" colspan="2"><?php echo $ap['tcdif'];?></td>
        <?php
		}
		if($ap['tpdif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['tpdif'];?></td>
        <?php
		}
		else
		{
			?>
        <td rowspan="1" colspan="2"><?php echo $ap['tpdif'];?></td>
        <?php
		}
		if($ap['tidif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['tidif'];?></td>
        <?php
		}
		else
		{
			?>
            <td rowspan="1" colspan="2"><?php echo $ap['tidif'];?></td>
        <?php
		}
		
        if($ap['todif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['todif'];?></td>
        <?php
		}
		else
		{
		?>
        <td rowspan="1" colspan="2"><?php echo $ap['todif'];?></td>
        <?php
		}
		
        if($ap['tsdif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['tsdif'];?></td>
        <?php
		}
		else
		{
			?>
        <td rowspan="1" colspan="2"><?php echo $ap['tsdif'];?></td>
        <?php
		}
		if($ap['bcdif']>1)
		{
			?>
        <td rowspan="1" colspan="2" style="background:#dd4b39; border-color: #d73925;"><?php echo $ap['bcdif'];?></td>
        <?php
		}
		else
		{
			?>
        <td rowspan="1" colspan="2"><?php echo $ap['bcdif'];?></td>
        <?php
		}
		?>
        
        </tr>
    </tbody>
    <?php } ?>
              </table>
            </div>
            
            <!-- /.box-body -->
          </div>
          <script type="text/javascript">
            $(document).ready(function() {
                $('#tableData').paging({limit:50});
            });
        </script>
        <script type="text/javascript">
		var $th = $('.tableFixHead').find('thead th')
$('.tableFixHead').on('scroll', function() {
  $th.css('transform', 'translateY('+ this.scrollTop +'px)');
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

</body>
</html>
