<?php 
    include "../database/db.php";

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $excelFile = $_FILES['excel'];
            if (isset($excelFile['name'])) {
                $excelFilePath = $excelFile['tmp_name'];
            
                // Load the Excel file using basic PHP functions
                if ($excelData = file_get_contents($excelFilePath)) {
                    $lines = explode("\n", $excelData);
            
                    foreach ($lines as $line) {
                        $rowData = str_getcsv($line);
            
                        // Assuming columns are structured as: column1, column2, column3, ...
                        $asset_barcode = $rowData[0]; 
                        $asset_location = $rowData[1];
                        $asset_department = $rowData[2];
                        $asset_quantity = $rowData[3];
                        $asset_description = $rowData[4];
                        $asset_acquired_date = $rowData[5];
                        $asset_acquired_date = strtotime($asset_acquired_date);
                        $asset_acquired_date = date("Y/m/d", $asset_acquired_date);
                        $acquisition_cost = $rowData[6];
                        $eul = $rowData[7];
                        $accumulated_deprecitation = $rowData[8];
                        $net_book_value = $rowData[9];
            
                        // SQL query to insert data into the database
                        $sql = $con->query("INSERT INTO assets (asset_barcode, asset_location, asset_department, asset_quantity, asset_description, asset_acquired_date, acquisition_cost, eul, accumulated_deprecitation, net_book_value, asset_remarks) 
                                            VALUES ('$asset_barcode', '$asset_location', '$asset_department', '$asset_quantity', '$asset_description', '$asset_acquired_date', '$acquisition_cost', '$eul', '$accumulated_deprecitation', '$net_book_value', 'Not Counted')");
                    }
            
                    if(!$sql){
                        die("QUERY FAILED" . mysqli_error($con));
                    }
                    header("Location: ../index.php?page=inventory");
                } else {
                    echo "Failed to read Excel file.";
                    header("Location: ../index.php?page=inventory");
                }
            } else {
                echo "No file uploaded.";
                header("Location: ../index.php?page=inventory");
            }
            
    }

?>