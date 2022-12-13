<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

    $res = mysqli_query($acc, "SELECT * FROM tbl_discounts") or die("Error: ".mysqli_error($acc));
    $dataArray = array();
    while( $row = mysqli_fetch_array($res) ) {

        $ayselect = mysqli_query($db, "SELECT academic_year FROM tbl_acadyears WHERE ay_id = '$row[ay_id]'");
            while ($row1 = mysqli_fetch_array($ayselect)) {
                $ay_id = $row1['academic_year'];
            }
    
    
        $discount_desc = $row["discount_desc"];

        if ($row['percent'] == 1) {
            $discount = $row["discount"]."%";
        } else {
            $discount = number_format($row["discount"], 2);
        }
        
        $created_at = $row["created_at"];
        $last_updated = $row["last_updated"];
        $updated_by = $row["updated_by"];
        $disc_id = $row["disc_id"];


        $dataArray[] = array(
            "discount_desc" => $discount_desc,
                  "discount" => $discount,
                  "ay_id" => $ay_id,
                  "created_at" => $created_at,
                  "last_updated" => $last_updated,
                  "updated_by" => $updated_by,
                  "disc_id" => $disc_id
        );
    
    }
    
    echo json_encode($dataArray);
?>

