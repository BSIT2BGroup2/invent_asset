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
                        $column1 = $rowData[0]; 
                        $column2 = $rowData[1];
                        $column3 = $rowData[2];
                        $column4 = $rowData[3];
                        $column5 = $rowData[4];
                        $column6 = $rowData[5];
                        $column7 = $rowData[6];
                        $column8 = $rowData[7];
                        $column9 = $rowData[8];
                        $column10 = $rowData[9];
            
                        // SQL query to insert data into the database
                        $sql = $con->query("INSERT INTO assets (main_id, asset_barcode, asset_index, asset_location, asset_department, asset_quantity, asset_description, asset_acquired_date, asset_remarks, asset_new_location) 
                                            VALUES ('$column1','$column2', '$column3', '$column4', '$column5', '$column6', '$column7', '$column8', 'Not Counted', '$column10')");
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