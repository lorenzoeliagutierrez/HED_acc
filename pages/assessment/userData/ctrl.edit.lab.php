<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];
$lab_id = $_GET['lab_id'];

if (isset($_POST['submit'])) {

    $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_accounting.account_lastname, ', ', tbl_accounting.account_firstname) AS fullname FROM tbl_accounting WHERE account_id = '$acc_id'");
    while ($row = mysqli_fetch_array($getUserName)) {
        $fullname = $row['fullname'];
    }
    
    
    $lab_desc = mysqli_real_escape_string($db, $_POST['lab_desc']);
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
        if (isset($_POST['lab'.$i]) && isset($_POST['temp_id'.$i])) {

            $temp_id = mysqli_real_escape_string($db, $_POST['temp_id'.$i]);
            $lab = mysqli_real_escape_string($db, $_POST['lab'.$i]);
            $lab_check = mysqli_query($acc, "SELECT * FROM tbl_lab_fees WHERE lab_desc = '$lab_desc' AND lab = '$lab' AND ay_id = '$ay_id' AND year_id = '$year_value' AND lab_id NOT IN ($temp_id)") or die(mysqli_error($acc));
            $result = mysqli_num_rows($lab_check);

            if ($result == 0) {
                
            } else {
                $_SESSION['fee_exist'.$i] = true;
                header('location: ../list.lab.php');
                $proceed = false;
            }
        } else {

        }

        $i++;
    }

    if ($proceed == true) {

    $j = 1;

    foreach ($year_array as $year_value) {
        if (isset($_POST['lab'.$j]) && isset($_POST['temp_id'.$j])) {
            
            $temp_id = mysqli_real_escape_string($db, $_POST['temp_id'.$j]);
            $lab = mysqli_real_escape_string($db, $_POST['lab'.$j]);
            $lab_update = mysqli_query($acc, "UPDATE tbl_lab_fees SET lab = '$lab', ay_id = '$ay_id', year_id = '$year_value', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE lab_id = '$temp_id'") or die(mysqli_error($acc));

        } elseif (isset($_POST['lab'.$j]) && !isset($_POST['temp_id'.$j])) {
            $lab = mysqli_real_escape_string($db, $_POST['lab'.$j]);
            $lab_check = mysqli_query($acc, "INSERT INTO tbl_lab_fees (lab, ay_id, lab_desc, year_id, updated_by, created_at, last_updated) VALUES ('$lab',  '$ay_id', '$lab_desc', '$year_value', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)") or die(mysqli_error($acc));

        }

        $j++;
    }

    $_SESSION['lab_success'] = true;
    header('location: ../list.lab.php');
    } else {

    }


}