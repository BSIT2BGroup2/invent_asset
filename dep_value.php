<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Depreciation Value</h1>
                </div>
                <div class="col-sm-4">
                    <div id="search-results"></div>
                </div>
                <div class="col-sm-4">
                </div>
            </div>
        </div>
    </div> <!-- /. content header -->

    <!-- Main Content -->
    <section class="context">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <table id="example3" class="table table-bordered table-hover ">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                                    <thead>
                                        <tr>
                                            <th>Asset ID</th>
                                            <th>Acquisition Cost</th>
                                            <th>EUL</th>
                                            <th>Monthly Depreciation</th>
                                            <th>Accumulated Depreciation</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>*OE000018*</td>
                                            <td>37,500.00</td>
                                            <td>5</td>
                                            <td>624.98</td>
                                            <td>37,499.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div> <!-- /. content wrapper -->
<script>
    $('input[type="checkbox"]').on('change', function() {
        $('#deleteBTN').prop('disabled', !$('input[type="checkbox"]:checked').length);
        
  });
</script>
<?php 

    if(isset($_POST['restoreAsset'])){
        $select_type = $_POST['select_type'];
        $archieve_id = $_POST['archieve_id'];

        restore_asset($archieve_id, $select_type);
    }


?>