<?php 
    if(isset($_GET['bar'])){
        $bar = $_GET['bar'];
        if($bar == 'All'){
            $bar = null;
        }
    }else{
        $bar = null;
    }

?>

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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <table id="example1" class="table table-bordered table-hover ">
                                <div class="row mb-2">
                                    <div class="col-sm-4">
                                        <select name="select_type" id="" class="form-control" required>
                                            <option value="" selected hidden>Select Option</option>
                                            <option value="Not Counted">Not Counted</option>
                                            <option value="Counted">Counted</option>
                                            <option value="Missing">Missing</option>
                                            <option value="Disposed">Disposed</option>
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
                                            <th><input type="checkbox" id="selectAllBoxes"></th>
                                            <th>Asset ID</th>
                                            <th>Location</th>
                                            <th>Department</th>
                                            <th>Quatity</th>
                                            <th>Description</th>
                                            <th>Acquisition Date</th>
                                            <th>Remarks/Status</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 

                                        $query = mysqli_query($con, "SELECT * FROM assets WHERE asset_barcode LIKE '*$bar%'");
                                        while($row = mysqli_fetch_assoc($query)){
                                            $date = $row['asset_acquired_date'];
                                            $date = date('m/d/Y', strtotime($date));
                                            $remarks = $row['asset_remarks'];
                                            switch($remarks){
                                                case 'Not Counted':
                                                    $badge = 'badge-warning';
                                                    break;
                                                case 'Counted':
                                                    $badge = 'badge-success';
                                                    break;
                                                case 'Missing':
                                                    $badge = 'badge-danger';
                                                    break;
                                                default:
                                                    $badge = '';
                                                    break;
                                            }
                                            echo"
                                            <tr>
                                                <td><input type='checkbox' class='checkBoxes' name='asset_id[]' value='{$row['asset_id']}'></td>
                                                <td>{$row['asset_barcode']}</td>
                                                <td>{$row['asset_location']}</td>
                                                <td>{$row['asset_department']}</td>
                                                <td>{$row['asset_quantity']}</td>
                                                <td>{$row['asset_description']}</td>
                                                <td>{$date}</td>
                                                <td class='project-state text-center'>
                                                <span class='badge {$badge}'>{$row['asset_remarks']}</span></td>
                                                <td>{$row['asset_count']}</td>
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
  
    
  // Get the master checkbox and all the individual checkboxes
  const masterCheckbox = document.getElementById('selectAllBoxes');
  const checkboxes = document.querySelectorAll('.checkBoxes');

 
$(document).ready(function() {

$(masterCheckbox).click(function(){
  if(this.checked){
    $(checkboxes).each(function(){
      this.checked = true;
    });
  }else{
    $(checkboxes).each(function(){
      this.checked = false;
    });
  }
});

});
</script>
<?php 

    if(isset($_POST['deleteAsset'])){
        $select_type = $_POST['select_type'];
        $asset_id = $_POST['asset_id'];
        disposed_asset($asset_id, $select_type);
    }


?>