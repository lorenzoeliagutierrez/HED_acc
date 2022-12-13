<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];

if (isset($_POST['submit'])) {

    $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_accounting.account_lastname, ', ', tbl_accounting.account_firstname) AS fullname FROM tbl_accounting WHERE account_id = '$acc_id'");
    while ($row = mysqli_fetch_array($getUserName)) {
        $fullname = $row['fullname'];
    }
    
    
    $miscell_desc = mysqli_real_escape_string($db, $_POST['miscell_desc']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);

    $year_level1 = mysqli_real_escape_string($db, $_POST['year_level1']);
    $year_level2 = mysqli_real_escape_string($db, $_POST['year_level2']);
    $year_level3 = mysqli_real_escape_string($db, $_POST['year_level3']);
    $year_level4 = mysqli_real_escape_string($db, $_POST['year_level4']);

    $updated_by = $fullname.' - '. $_SESSION['role'];

    if (isset($_POST['year_level'])) {
        $year_array = $_POST['year_level'];
    }

    $year_array = array ($year_level1, $year_level2, $year_level3, $year_level4);

    $i = 1;
    $proceed = true;

    foreach ($year_array as $year_value) {

        if (isset($_POST['miscellanous'.$i])) {

        $miscellanous = mysqli_real_escape_string($db, $_POST['miscellanous'.$i]);
        $miscell_check = mysqli_query($acc, "SELECT * FROM tbl_miscellanous_fees WHERE miscellanous = '$miscellanous' AND ay_id = '$ay_id' AND year_id = '$year_value'") or die(mysqli_error($acc));
        $result = mysqli_num_rows($miscell_check);

        if ($result == 0) {
            
        } else {
            $_SESSION['fee_exist'.$i] = true;
            header('location: ../add.miscell.php');
            $proceed = false;
        }
        } else {
            
        }

        $i++;
    }

    if ($proceed == true) {

    $j = 1;

    foreach ($year_array as $year_value) {

        if (isset($_POST['miscellanous'.$j])) {
        
        $miscellanous = mysqli_real_escape_string($db, $_POST['miscellanous'.$j]);
        $miscell_check = mysqli_query($acc, "INSERT INTO tbl_miscellanous_fees (miscellanous, ay_id, miscell_desc, year_id, updated_by, created_at, last_updated) VALUES ('$miscellanous',  '$ay_id', '$miscell_desc', '$year_value', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)") or die(mysqli_error($acc));

        } else {
            
        }

        $j++;
    }

    $_SESSION['miscell_success'] = true;
    header('location: ../add.miscell.php');
    } else {

    }


}