<?php 
    include "../database/db.php";
    use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
    require_once ('../vendor/autoload.php');

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
            $excelFile = $_FILES['excel'];

            $allowedFileType = [
                'application/vnd.ms-excel',
                'text/xls',
                'text/xlsx',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
            ];

            if(in_array($excelFile['type'], $allowedFileType)){
                $targetPath = '../excelUpload/' . $excelFile['name'];
                move_uploaded_file($excelFile['tmp_name'], $targetPath);

                $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

                $spreadSheet = $Reader->load($targetPath);
                $excelSheet = $spreadSheet->getActiveSheet();
                $spreadSheetAry = $excelSheet->toArray();
                $sheetCount = count($spreadSheetAry);

                for($i = 1; $i < $sheetCount; $i++){

                    $asset_barcode = $spreadSheetAry[$i][0]; 
                    $asset_location = $spreadSheetAry[$i][1];
                    $asset_department = $spreadSheetAry[$i][2];
                    $asset_quantity = $spreadSheetAry[$i][3];
                    $asset_description = $spreadSheetAry[$i][4];
                    $asset_acquired_date = $spreadSheetAry[$i][5];
                    $asset_acquired_date = date("Y/m/d", strtotime($asset_acquired_date));
                    $acquisition_cost = $spreadSheetAry[$i][6];
                    $eul = $spreadSheetAry[$i][7];
                    $accumulated_deprecitation = $spreadSheetAry[$i][8];
                    $net_book_value = $spreadSheetAry[$i][9];

                    $stmt = $con->prepare("INSERT INTO assets (asset_barcode, asset_location, asset_department, asset_quantity, asset_description, asset_acquired_date, acquisition_cost, eul, accumulated_deprecitation, net_book_value, asset_remarks) 
                                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Not Counted')");
                    $stmt->bind_param('sssissiiii', $asset_barcode,$asset_location,$asset_department,$asset_quantity,$asset_description,$asset_acquired_date,$acquisition_cost,$eul,$accumulated_deprecitation,$net_book_value);
                    $stmt->execute();
                    $stmt->close();
                    $_SESSION['toast'] = 'fileInserted';
                    header("Location: ../index.php?page=inventory");

                }
            }else{
                $_SESSION['toast'] = 'wrongFileType';
                header("Location: ../index.php?page=inventory");
            }

            
            
    }

?>