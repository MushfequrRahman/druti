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
        font-size: 14px;
        text-align: center;
    }
</style>
<script type='text/javascript'>
    //<![CDATA[
    $(document).ready(function() {
        $('.filter').multifilter()
    })
    //]]>
</script>

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
                                        <h3 class="box-title">Order Info</h3>
                                    </div>
                                    <div class="row">
                                        <!-- <div class="col-md-3"> -->
                                        <!-- <input type='text' class="form-control" id='txt_searchall' placeholder='Enter Search Text'> -->
                                        <div class='filters'>
                                            <!-- <div class="col-md-1">
          <div class='filter-container'>
            <input autocomplete='off' class='filter form-control' name='From' placeholder='From' data-col='From' />
          </div>
        </div> -->


                                            <div class="col-md-2">
                                                <div class='filter-container'>
                                                    <input autocomplete='off' class='filter form-control' name='Buyer' placeholder='Buyer' data-col='Buyer' />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class='filter-container'>
                                                    <input autocomplete='off' class='filter form-control' name='Job No/ATL No' placeholder='Job No/ATL No' data-col='Job No/ATL No' />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class='filter-container'>
                                                    <input autocomplete='off' class='filter form-control' name='Style Name' placeholder='Style Name' data-col='Style Name' />
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class='filter-container'>
                                                    <input autocomplete='off' class='filter form-control' name='Order Name/PO' placeholder='Order Name/PO' data-col='Order Name/PO' />
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class='filter-container'>
                                                    <input autocomplete='off' class='filter form-control' name='Color Name' placeholder='Color Name' data-col='Color Name' />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <div class="box-body table-responsive no-padding">
                                        <table id="tableData" class="table table-hover table-bordered">
                                            <thead style="background:#91b9e6;">
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Buyer Name</th>
                                                    <th>Job No/ATL NO</th>
                                                    <th>Style Name</th>
                                                    <th>Order Name/PO</th>
                                                    <th>Color Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                foreach ($ul as $row) { ?>
                                                    <tr>
                                                        <td style="vertical-align:middle;"><?php echo $i++; ?></td>
                                                        <td style="vertical-align:middle;"><?php echo $row['buyername']; ?></td>
                                                        <td style="vertical-align:middle;"><?php echo $row['jobno']; ?></td>
                                                        <td style="vertical-align:middle;"><?php echo $row['stylename']; ?></td>
                                                        <td style="vertical-align:middle;"><?php echo $row['ordername']; ?></td>
                                                        <td style="vertical-align:middle;"><a href="<?php echo base_url(); ?>Dashboard/order_wise_challan_create_form/<?php echo $bn = $row['colorid']; ?>"><?php echo $row['colorname']; ?></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- <script type="text/javascript">
                                    $(document).ready(function() {
                                        $('#tableData').paging({
                                            limit: 10
                                        });
                                    });
                                </script> -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {

            $('#txt_searchall').keyup(function() {

                var search = $(this).val();


                $('table tbody tr').hide();


                var len = $('table tbody tr:not(.notfound) td:contains("' + search + '")').length;


                if (len > 0) {

                    $('table tbody tr:not(.notfound) td:contains("' + search + '")').each(function() {

                        $(this).closest('tr').show();

                    });

                } else {

                    $('.notfound').show();

                }



            });

        });

        // Case-insensitive searching (Note - remove the below script for Case sensitive search )

        $.expr[":"].contains = $.expr.createPseudo(function(arg) {

            return function(elem) {

                return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;

            };

        });
    </script>
</body>

</html>