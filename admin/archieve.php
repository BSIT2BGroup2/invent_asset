<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">List of Assets</h1>
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
                                                <button type="submit" name="restoreAsset" id="deleteBTN" value="borrow" class="btn btn-primary" disabled><i class="nav-icon fas fa-restore"></i> Restore</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <div id="search-results"></div>
                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Asset ID</th>
                                            <th>Index</th>
                                            <th>Department</th>
                                            <th>Quatity</th>
                                            <th>Description</th>
                                            <th>Acquired Date</th>
                                            <th>Remarks/Status</th>
                                            <th>New Location</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $query = mysqli_query($con, "SELECT * FROM asset_archive");
                                        while($row = mysqli_fetch_assoc($query)){
                                            echo"
                                            <tr>
                                                <td><input type='checkbox' name='archieve_id[]' id='archieve_id' value='{$row['archieve_id']}'></td>
                                                <td>{$row['asset_barcode']}</td>
                                                <td>{$row['asset_index']}</td>
                                                <td>{$row['asset_department']}</td>
                                                <td>{$row['asset_quantity']}</td>
                                                <td>{$row['asset_description']}</td>
                                                <td>{$row['asset_acquired_date']}</td>
                                                <td>{$row['asset_remarks']}</td>
                                                <td>{$row['asset_new_location']}</td>
                                            </tr>";
                                        }
                                            ?>
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
        $archieve_id = $_POST['archieve_id'];

        restore_asset($archieve_id);
    }


?>