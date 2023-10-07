<?php 
    function disposed_asset($asset_id, $select_type){
        global $con;
        if($select_type != 'Disposed'){
            foreach ($asset_id as $key => $value) {
                
                $stmt = $con->prepare("UPDATE assets SET asset_remarks=? WHERE asset_id=?");
                $stmt->bind_param('si', $select_type, $value);
                $stmt->execute();
                $stmt->close();

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
                
            }
            $_SESSION['toast'] = 'changeRemarks';
            header('Location: index.php?page=inventory');

        }else if($select_type == 'Disposed'){
            foreach($asset_id as $key => $value){
                $asset_query = $con->query("SELECT * FROM assets WHERE asset_id = '$value'");
                $row = $asset_query->fetch_array();
                    $asset_barcode = $row['asset_barcode'];
                    $asset_department = $row['asset_department'];
                    $asset_quantity = $row['asset_quantity'];
                    $asset_description = $row['asset_description'];
                    $asset_acquired_date = $row['asset_acquired_date'];
                    $acquisition_cost = $row['acquisition_cost'];
                    $eul = $row['eul'];
                    $accumulated_deprecitation = $row['accumulated_deprecitation'];
                    $net_book_value = $row['net_book_value'];
                    $asset_count = $row['asset_count'];

                $stmt = $con->prepare("INSERT INTO asset_archive (asset_barcode,asset_department,asset_quantity,asset_description,asset_acquired_date,acquisition_cost,eul,accumulated_deprecitation,net_book_value,asset_remarks,asset_count)
                                             VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $stmt->bind_param('ssissiiiisi',$asset_barcode, $asset_department, $asset_quantity, $asset_description, $asset_acquired_date, $acquisition_cost, $eul, $accumulated_deprecitation, $net_book_value, $select_type, $asset_count);
                $stmt->execute();
                $stmt = $con->prepare("DELETE FROM assets WHERE asset_id = ?");
                $stmt->bind_param('i', $value);
                $stmt->execute();
                $stmt->close();
    
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
                    $asset_barcode = $row['asset_barcode'];
                    $asset_location = $row['asset_location'];
                    $asset_department = $row['asset_department'];
                    $asset_quantity = $row['asset_quantity'];
                    $asset_description = $row['asset_description'];
                    $asset_acquired_date = $row['asset_acquired_date'];
                    $acquisition_cost = $row['acquisition_cost'];
                    $eul = $row['eul'];
                    $accumulated_deprecitation = $row['accumulated_deprecitation'];
                    $net_book_value = $row['net_book_value'];
                    $asset_count = $row['asset_count'];

                    $stmt = $con->prepare("INSERT INTO assets (asset_barcode, asset_location, asset_department,asset_quantity,asset_description,asset_acquired_date,acquisition_cost,eul,accumulated_deprecitation,net_book_value,asset_remarks,asset_count)
                                            VALUES (?,?,?,?,?,?,?,?,?,?,'Not Counted',?)");
                    $stmt->bind_param('sssissiiiii',$asset_barcode, $asset_location, $asset_department, $asset_quantity, $asset_description, $asset_acquired_date,  $acquisition_cost, $eul, $accumulated_deprecitation, $net_book_value, $asset_count);
                    $stmt->execute();
                    $stmt = $con->prepare("DELETE FROM asset_archive WHERE archieve_id = ?");
                    $stmt->bind_param('i', $value);
                    $stmt->execute();
                    $stmt->close();

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

                if(!$stmt){
                    die('QUERY FAILED' . mysqli_error($con));
                }
                $_SESSION['toast'] = 'delete_asset';
                header('Location: index.php?page=inventory');
            }

        }
    }


    function count_asset($asset_barcode){
        global $con;
        
        $asset_query = $con->query("SELECT * FROM assets WHERE asset_barcode = '$asset_barcode'");
        if($asset_query->num_rows > 0 ){
            while($row = $asset_query->fetch_array()){
                $asset_id = $row['asset_id'];
                $asset_quantity = $row['asset_quantity'];
                $asset_count = $row['asset_count'];
                $find_asset = $con->query("SELECT * FROM scanned WHERE asset_id = '$asset_id'");
                $row_count = $find_asset->fetch_array();
                $nums_find_asset = mysqli_num_rows($find_asset);
                if($asset_quantity != $asset_count){
                    if($asset_quantity != $row_count['asset_count']){
                        if($nums_find_asset == 0){
                            $stmt = $con->prepare("INSERT INTO scanned (asset_id,asset_count) VALUES (?,asset_count+1)");
                            $stmt->bind_param('i', $asset_id);
                            $stmt->execute();
                            $stmt->close();
                        
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
                        
                            if(!$stmt){
                                die("QUERY FAILED" . mysqli_error($con));
                            }
                            
                            $_SESSION['toast'] = 'count_asset';
                            header("Location: index.php?page=find_asset");
                        }
                    }else{
                        $_SESSION['toast'] = 'quantityOverCount';
                        header("Location: index.php?page=find_asset");
                    }
                }else{
                    $_SESSION['toast'] = 'quantityOverCount';
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
        }
        if(!$stmt){
            die("QUERY FAILED". mysqli_error($con));
        }

        $_SESSION['toast'] = 'save_asset';
        header("Location: index.php?page=inventory");
    }

?>