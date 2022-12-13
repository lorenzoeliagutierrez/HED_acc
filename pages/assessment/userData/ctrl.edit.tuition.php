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
    
    
    $course_id = mysqli_real_escape_string($db, $_POST['course_id']);
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

        if (isset($_POST['tuition'.$i])&& isset($_POST['temp_id'.$i])) {

        $temp_id = mysqli_real_escape_string($db, $_POST['temp_id'.$i]);
        $tuition = mysqli_real_escape_string($db, $_POST['tuition'.$i]);
        $tuition_check = mysqli_query($acc, "SELECT * FROM tbl_tuition_fees WHERE course_id = '$course_id' AND ay_id = '$ay_id' AND year_id = '$year_value' AND tf_id NOT IN ($temp_id)") or die(mysqli_error($acc));
        $result = mysqli_num_rows($tuition_check);

        if ($result == 0) {
            
        } else {
            $_SESSION['fee_exist'.$i] = true;
            header('location: ../add.tuition.php');
            $proceed = false;
        }
        } else {
            
        }

        $i++;
    }

    if ($proceed == true) {

    $j = 1;

    foreach ($year_array as $year_value) {
        if (isset($_POST['tuition'.$j]) && !isset($_POST['temp_id'.$j])) {
        
        $tuition = mysqli_real_escape_string($db, $_POST['tuition'.$j]);
        $tuitionAdd = mysqli_query($acc, "INSERT INTO tbl_tuition_fees (tuition_fee, ay_id, course_id, year_id, updated_by, created_at, last_updated) VALUES ('$tuition',  '$ay_id', '$course_id', '$year_value', '$updated_by', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)") or die(mysqli_error($acc));

        } else {
            
        $temp_id = mysqli_real_escape_string($db, $_POST['temp_id'.$j]);
        $tuition = mysqli_real_escape_string($db, $_POST['tuition'.$j]);
        $tuitionAdd = mysqli_query($acc, "UPDATE tbl_tuition_fees SET tuition_fee = '$tuition', ay_id = '$ay_id', course_id = '$course_id', year_id = '$year_value', updated_by = '$updated_by', last_updated = CURRENT_TIMESTAMP WHERE tf_id = '$temp_id'") or die(mysqli_error($acc));

        }
        $j++;
    }

    $_SESSION['tuition_success'] = true;
    header('location: ../add.tuition.php');
    } else {

    }


}