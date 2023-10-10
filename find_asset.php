<!-- Content Wrapper. Contains page content  -->
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0">Find Assets</h1>
                </div>
                <div class="col-sm-5"></div>
                <div class="col-sm-3">
                    <form action="" method="post" id="scannedForm">
                        <label for="barcodeInput">Scan Barcode:</label>
                        <input type="text" name="barcodeInput" id="barcodeInput" class="form-control" autofocus>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- /. content header -->
    
            <!-- Add Folder Modal -->
            <div class='modal fade' id='barcodeScanned'>
                      <div class='modal-dialog'>
                      <div class='modal-content'>
                              <div class='modal-header bg-primary'>
                                  <h4 class='modal-title'>Count Asset</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                  </button>
                              </div>
                              <div class='modal-body'>
                                <p class='h4'>Are you sure to count the Asset ID (<span id="myText"></span>)</p>
                              </div>
                              <div class='modal-footer justify-content-between'>
                                  <a type='button' href='index.php?page=find_asset' class='btn btn-default' data-dismiss='modal'>Cancel</a>
                                  <form action='' method='post'>
                                      <input type='text' name='asset_id' id="asset_id" value='' hidden>
                                      <button type='submit' name='count' value='count'  class='btn btn-primary' title='Add File'>Count</button>
                                  </form>
                              </div>
                      </div>
                      <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

    <?php 
    //If the asset_id is been count
        if(isset($_POST['count'])){
            $asset_barcode = $_POST['asset_id'];
            count_asset($asset_barcode);
        }
        

    ?>

    <!-- Main Content -->
    <section class="context">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <table id='example3' class='table table-bordered table-hover'>
                                    <div class="row mb-2">
                                        <div class="col-sm-4">
                                                    <button type="submit" name="saveAsset" id="saveBTN" class="btn btn-primary" disabled><i class="nav-icon fas fa-save"></i> Save</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="search-results"></div>
                                        </div>
                                        <div class="col-sm-4">
                                        </div>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="selectAllBoxes"></th>
                                            <th>Asset ID</th>
                                            <th>Department</th>
                                            <th>Location</th>
                                            <th>Quantity</th>
                                            <th>Description</th>
                                            <th>Acquired Date</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php  
                                            $scan_query = $con->query("SELECT *  FROM scanned");
                                            while($row = $scan_query->fetch_array()){
                                                $asset_id = $row['asset_id'];
                                                $asset_query = $con->query("SELECT * FROM assets WHERE asset_barcode = '$asset_id'");
                                                $fetch_asset = $asset_query->fetch_array();
                                        echo "<tr>
                                            <td><input type='checkbox'  class='checkBoxes' name='asset_id[]' id='asset_id' value='{$asset_id}'></td>
                                            <td>{$fetch_asset['asset_barcode']}</td>
                                            <td>{$fetch_asset['asset_department']}</td>
                                            <td>{$fetch_asset['asset_location']}</td>
                                            <td>{$fetch_asset['asset_quantity']}</td>
                                            <td>{$fetch_asset['asset_description']}</td>
                                            <td>{$fetch_asset['asset_acquired_date']}</td>
                                            <td>{$row['asset_count']}</td>
                                        </tr> ";
                                        }?>
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
        $('#saveBTN').prop('disabled', !$('input[type="checkbox"]:checked').length);
        
  });

        
  $('#scannedForm').on('submit', function (e) {
   e.preventDefault();
   $('#barcodeScanned').modal('show');

   let barcode = document.getElementById("barcodeInput");
   
   document.getElementById("myText").innerHTML = barcode.value;
    document.getElementById("asset_id").value = barcode.value;
})
</script>
<?php 
//Asset count will be save to the inventory
    if(isset($_POST['saveAsset'])){
        $asset_id = $_POST['asset_id'];
       save_asset($asset_id);
    }


?>