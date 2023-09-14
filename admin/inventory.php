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
                    <form action="classes/invent.php" method="post" id="excel-submit" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="excel" id="excel" class="custom-file-input" accept=".xlsx, .csv">
                                    <label class="custom-file-label" for="exampleInputFile">Insert Excel File</label>
                                </div>
                                <div class="input-group-append">
                                    <button type="submit" name="submit_excel" class="input-group-text" >Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
                                        <select name="select_type" id="" class="form-control">
                                            <option value="" selected hidden>Select Option</option>
                                            <option value="Not Counted">Not Counted</option>
                                            <option value="Counted">Counted</option>
                                            <option value="Missing">Missing</option>
                                            <option value="Disposed">Disposed</option>
                                            <option value="Archive">Archive</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                                <button type="submit" name="deleteAsset" id="deleteBTN" value="borrow" class="btn btn-primary" disabled><i class="nav-icon fas fa-apply"></i> Apply</button>
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
                                            <th>Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $query = mysqli_query($con, "SELECT * FROM assets");
                                        while($row = mysqli_fetch_assoc($query)){
                                            echo"
                                            <tr>
                                                <td><input type='checkbox' name='asset_id[]' id='asset_id' value='{$row['asset_id']}'></td>
                                                <td>{$row['asset_barcode']}</td>
                                                <td>{$row['asset_index']}</td>
                                                <td>{$row['asset_department']}</td>
                                                <td>{$row['asset_quantity']}</td>
                                                <td>{$row['asset_description']}</td>
                                                <td>{$row['asset_acquired_date']}</td>
                                                <td class='project-state text-center'>
                                                <span class='badge badge-success'>{$row['asset_remarks']}</span></td>
                                                <td>{$row['asset_count']}</td>
                                                <td>
                                                <button type='submit' name='borrow' id='editBTN' value='borrow' class='btn btn-warning' title='Borrow Book'><i class='nav-icon fas fa-edit'></i></button></td>
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

    if(isset($_POST['deleteAsset'])){
        $select_type = $_POST['select_type'];
        $asset_id = $_POST['asset_id'];
        delete_asset($asset_id, $select_type);
    }


?>