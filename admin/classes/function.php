<?php 
    function disposed_asset($asset_id, $select_type){
        global $con;
        if($select_type != 'Disposed'){
            foreach ($asset_id as $key => $value) {
                $stmt = $con->prepare("UPDATE assets SET asset_remarks=? WHERE asset_id=?");
                $stmt->bind_param('si', $select_type, $value);
                $stmt->execute();
                $stmt->close();
                #$update_query = $con->query("UPDATE assets SET asset_remarks='$select_type' WHERE asset_id = '$value'");

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
            }
            header('Location: index.php?page=inventory');

        }else if($select_type == 'Disposed'){
            foreach($asset_id as $key => $value){
                $asset_query = $con->query("SELECT * FROM assets WHERE asset_id = '$value'");
                $row = $asset_query->fetch_array();
                    $main_id = $row['main_id'];
                    $asset_barcode = $row['asset_barcode'];
                    $asset_index = $row['asset_index'];
                    $asset_department = $row['asset_department'];
                    $asset_quantity = $row['asset_quantity'];
                    $asset_description = $row['asset_description'];
                    $asset_acquired_date = $row['asset_acquired_date'];
                    $asset_count = $row['asset_count'];

                $stmt = $con->prepare("INSERT INTO asset_archive (main_id, asset_barcode,asset_index,asset_department,asset_quantity,asset_description,asset_acquired_date,asset_remarks,asset_count)
                                             VALUES (?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param('isisisssi', $main_id, $asset_barcode, $asset_index, $asset_department, $asset_quantity, $asset_description, $asset_acquired_date, $select_type, $asset_count);
                $stmt->execute();
                $stmt = $con->prepare("DELETE FROM assets WHERE asset_id = ?");
                $stmt->bind_param('i', $value);
                $stmt->execute();
                $stmt->close();
    
                #$archive_query = $con->query("INSERT INTO asset_archive (asset_barcode,asset_index,asset_department,asset_quantity,asset_description,asset_acquired_date,asset_remarks,asset_count)
                                             #VALUES ('$asset_barcode', '$asset_index', '$asset_department', '$asset_quantity', '$asset_description', '$asset_acquired_date', '$asset_remarks', '$asset_count')");
                
                #$delete_query = $con->query("DELETE FROM assets WHERE asset_id = '$value'");
    
                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
                $_SESSION['toast'] = 'disposed_asset';
                header('Location: index.php?page=archieve');
            }
        }
        
    }

    function restore_asset($archieve_id, $select_type){
        global $con;
        if($select_type == 'restore'){
            foreach($archieve_id as $id => $value){
                $archive_query = $con->query("SELECT * FROM asset_archive WHERE archieve_id = '$value'");
                $row = $archive_query->fetch_array();
                    $main_id = $row['main_id'];
                    $asset_barcode = $row['asset_barcode'];
                    $asset_index = $row['asset_index'];
                    $asset_department = $row['asset_department'];
                    $asset_quantity = $row['asset_quantity'];
                    $asset_description = $row['asset_description'];
                    $asset_acquired_date = $row['asset_acquired_date'];
                    $asset_remarks = $row['asset_remarks'];
                    $asset_count = $row['asset_count'];

                    $stmt = $con->prepare("INSERT INTO assets (main_id, asset_barcode,asset_index,asset_department,asset_quantity,asset_description,asset_acquired_date,asset_remarks,asset_count)
                                            VALUES (?,?,?,?,?,?,?,'Not Counted',?)");
                    $stmt->bind_param('isisissi', $main_id, $asset_barcode, $asset_index, $asset_department, $asset_quantity, $asset_description, $asset_acquired_date, $asset_count);
                    $stmt->execute();
                    $stmt = $con->prepare("DELETE FROM asset_archive WHERE archieve_id = ?");
                    $stmt->bind_param('i', $value);
                    $stmt->execute();
                    $stmt->close();
                #$asset_query = $con->query("INSERT INTO assets (asset_barcode, asset_index, asset_department, asset_quantity, asset_description, asset_acquired_date, asset_remarks, asset_count)
                #                        VALUES ('$asset_barcode', '$asset_index', '$asset_department', '$asset_quantity', '$asset_description', '$asset_acquired_date', '$asset_remarks', '$asset_count')");
                #$delete_query = $con->query("DELETE FROM asset_archive WHERE archieve_id = '$value'");

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
                $_SESSION['toast'] = 'restore_asset';
                header('Location: index.php?page=inventory');
            }
        }elseif($select_type == 'delete'){
            foreach($archieve_id as $id => $value){
                    $stmt = $con->prepare("DELETE FROM asset_archive WHERE archieve_id = ?");
                    $stmt->bind_param('i', $value);
                    $stmt->execute();
                    $stmt->close();
                #$asset_query = $con->query("INSERT INTO assets (asset_barcode, asset_index, asset_department, asset_quantity, asset_description, asset_acquired_date, asset_remarks, asset_count)
                #                        VALUES ('$asset_barcode', '$asset_index', '$asset_department', '$asset_quantity', '$asset_description', '$asset_acquired_date', '$asset_remarks', '$asset_count')");
                #$delete_query = $con->query("DELETE FROM asset_archive WHERE archieve_id = '$value'");

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
                $_SESSION['toast'] = 'delete_asset';
                header('Location: index.php?page=inventory');
            }

        }
    }

    function scanned_asset($asset_barcode){
        global $con;
            echo"
            <!-- Add Folder Modal -->
            <div class='modal fade show' id='barcodeInput' style='padding-right: 17px; display: block;' aria-modal='true' role='dialog'>
                      <div class='modal-dialog'>
                      <div class='modal-content'>
                              <div class='modal-header bg-primary'>
                                  <h4 class='modal-title'>Count Asset</h4>
                                  <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                  </button>
                              </div>
                              <div class='modal-body'>
                                <p class='h4'>Are you sure to count the Asset ID ({$asset_barcode})</p>
                              </div>
                              <div class='modal-footer justify-content-between'>
                                  <a type='button' href='index.php?page=find_asset' class='btn btn-default' data-dismiss='modal'>Cancel</a>
                                  <form action='' method='post'>
                                      <input type='text' name='asset_id' value='{$asset_barcode}' hidden>
                                      <button type='submit' name='count' value='count'  class='btn btn-primary' title='Add File'>Count</button>
                                  </form>
                              </div>
                      </div>
                      <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->";
    }

    function count_asset($asset_barcode){
        global $con;
        
        $asset_query = $con->query("SELECT * FROM assets WHERE asset_barcode = '$asset_barcode'");
        if($asset_query->num_rows > 0 ){
            while($row = $asset_query->fetch_array()){
                $asset_id = $row['asset_id'];
                $find_asset = $con->query("SELECT * FROM scanned WHERE asset_id = '$asset_id'");
                $nums_find_asset = mysqli_num_rows($find_asset);
                if($nums_find_asset == 0){
                    $stmt = $con->prepare("INSERT INTO scanned (asset_id,asset_count) VALUES (?,asset_count+1)");
                    $stmt->bind_param('i', $asset_id);
                    $stmt->execute();
                    $stmt->close();
                    #$insert_query = $con->query("INSERT INTO scanned (asset_id,asset_count) VALUES ('$asset_id',asset_count+1)");
                
                    if(!$stmt){
                        die("QUERY FAILED" . mysqli_error($con));
                    }
                    $_SESSION['toast'] = 'count_asset';
                    header("Location: index.php?page=find_asset");
                }else if($nums_find_asset >= 1){
                    $stmt = $con->prepare("UPDATE scanned SET asset_count = asset_count+1 WHERE asset_id = ?");
                    $stmt->bind_param('i', $asset_id);
                    $stmt->execute();
                    $stmt->close();
                    #$insert_query = $con->query("UPDATE scanned SET asset_count = asset_count+1 WHERE asset_id = '$asset_id'");
                
                    if(!$stmt){
                        die("QUERY FAILED" . mysqli_error($con));
                    }
                    
                    $_SESSION['toast'] = 'count_asset';
                    header("Location: index.php?page=find_asset");
                }

            }
        } 
    }

    function save_asset($asset_id){
        global $con;
        
        foreach($asset_id as $key => $value){
            $select_query = $con->query("SELECT * FROM scanned WHERE asset_id = '$value'");
            $row = $select_query->fetch_array();
            $asset_count = $row['asset_count'];
            $scan_id = $row['scan_id'];

            $stmt = $con->prepare("UPDATE assets SET asset_count=asset_count+?, asset_remarks='Counted' WHERE asset_id = ?");
            $stmt->bind_param('ii', $asset_count, $value);
            $stmt->execute();
            $stmt = $con->prepare("DELETE FROM scanned where scan_id = ?");
            $stmt->bind_param('i', $scan_id);
            $stmt->execute();
            $stmt->close();

            #$asset_query = $con->query("UPDATE assets SET asset_count=asset_count+'$asset_count', asset_remarks='Counted' WHERE asset_id = '$value'");
            #$delete_query = $con->query("DELETE FROM scanned where scan_id = '$scan_id'");
        }
        if(!$stmt){
            die("QUERY FAILED". mysqli_error($con));
        }

        $_SESSION['toast'] = 'save_asset';
        header("Location: index.php?page=inventory");
    }

?>