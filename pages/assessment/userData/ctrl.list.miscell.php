<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

    $res = mysqli_query($acc, "SELECT * FROM tbl_miscellanous_fees") or die("Error: ".mysqli_error($acc));
    $dataArray = array();
    while( $row = mysqli_fetch_array($res) ) {

        $ayselect = mysqli_query($db, "SELECT academic_year FROM tbl_acadyears WHERE ay_id = '$row[ay_id]'");
            while ($row1 = mysqli_fetch_array($ayselect)) {
                $ay_id = $row1['academic_year'];
            }

        $yearSelect = mysqli_query($db, "SELECT year_level FROM tbl_year_levels WHERE year_id = '$row[year_id]'");
            while ($row2 = mysqli_fetch_array($yearSelect)) {
                $year_id = $row2['year_level'];
            }
    
    
        $miscell_desc = $row["miscell_desc"];
        $miscellanous = number_format($row["miscellanous"], 2);
        $created_at = $row["created_at"];
        $last_updated = $row["last_updated"];
        $updated_by = $row["updated_by"];
        $miscell_id = $row["miscell_id"];


        $dataArray[] = array(
            "miscell_desc" => $miscell_desc,
            "year_id" => $year_id,
                  "miscellanous" => $miscellanous,
                  "ay_id" => $ay_id,
                  "created_at" => $created_at,
                  "last_updated" => $last_updated,
                  "updated_by" => $updated_by,
                  "miscell_id" => $miscell_id
        );
    
    }
    
    echo json_encode($dataArray);
?>

