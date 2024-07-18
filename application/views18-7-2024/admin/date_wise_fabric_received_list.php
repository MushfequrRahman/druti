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
td{font-weight: 600; font-variant:small-caps;}
</style>
            
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?php /*?><form action="<?php echo base_url() ?>Dashboard/date_wise_mpr_list_xls" class="excel-upl" id="excel-upl" enctype="multipart/form-data" method="post" accept-charset="utf-8">
    <div class="row padall">
      <div class="col-lg-12">
        <div class="float-right">
          <?php
          foreach ($ul as $row1) { ?>
            <input type="hidden" name="pd" value="<?php echo $pd; ?>" />
            <input type="hidden" name="wd" value="<?php echo $wd; ?>" />
          <?php
          }
          ?>
          <input type="radio" checked="checked" name="export_type" value="xlsx"> .xlsx
          <input type="radio" name="export_type" value="xls"> .xls
          <input type="radio" name="export_type" value="csv"> .csv
          <button type="submit" name="import" class="btn btn-primary btn-xs">Export</button>
        </div>
      </div>
    </div>
  </form><?php */?>
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
                 <th>Date</th>
                 <th>Challan</th>
                 <th>Supplier</th>
                 <th>Buyer</th>
                 <th>Job No</th>
                 <th>Style</th>
                 <th>Order</th>
                 <th>Color Code</th>
                 <th>Color</th>
                 <th>Fabric Type</th>
                 
                 <th>GSM</th>
                 <th>Batch</th>
                 <th>Dia</th>
                 <th>Fabric Part</th>
                 <th>Book Qty</th>
                 <th>Recv Qty</th>
                 <th>Location Rack</th>
                 <th>Edit</th>
                </tr>
                </thead>
                <tbody>
                <?php 
				$i=1;
				foreach($ul as $row)
				{ ?>
                <tr>
                  <td style="vertical-align:middle;"><?php echo $i++;?></td>
                  <td style="vertical-align:middle;"><?php echo date("d-m-Y", strtotime($row['frcdate']));?></td>
                  <td style="vertical-align:middle;"><?php echo $row['challanno'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['supplier'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['buyername'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['jobno'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['stylename'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['ordername'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['colorcode'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['colorname'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['fabrictype'];?></td>
                  
                  <td style="vertical-align:middle;"><?php echo $row['gsm'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['lotno'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['dia'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['fabricpart'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['bqty'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['frqty'];?></td>
                  <td style="vertical-align:middle;"><?php echo $row['rackno'];?></td>
                  <?php
				  // if($row['dfabricreceivedid']==NULL && $row['rtfabricreceivedid']==NULL)
          if($row['frqty']==$row['tfqty'])
				  {
					  ?>
                      
                  <td style="vertical-align:middle;"><a target="_blank" href="<?php echo base_url();?>Dashboard/fabric_receive_list_up/<?php echo $bn=$row['fabricreceivedid'];?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                  <?php
				  }
				  else
				  {
				  ?>
                  <td style="vertical-align:middle;">Issued/Transfered</td>
                  <?php
				   }
				  ?>
                 </tr>
                
               <?php } ?>
               </tbody>
              </table>
            </div>
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
         
