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
    
    
    $discount = mysqli_real_escape_string($db, $_POST['discount']);
    $discount_desc = mysqli_real_escape_string($db, $_POST['discount_desc']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $percent = mysqli_real_escape_string($db, $_POST['percent']);
    $discount_status = mysqli_real_escape_string($db, $_POST['discount_status']);
    $updated_by = $fullname .' - '. $_SESSION['role'];

    $check_discount = mysqli_query($acc, "SELECT * FROM tbl_discounts WHERE ay_id = '$ay_id' AND discount = '$discount' AND discount_desc = '$discount_desc' AND percent = '$percent' AND discount_status = '$discount_status'") or die(mysqli_error($acc));
    $result = mysqli_num_rows($check_discount);

    if ($result == 0) {

        $insert_discount = mysqli_query($acc, "INSERT INTO tbl_discounts (ay_id ,discount, discount_desc, percent, discount_status, created_at, last_updated, updated_by) VALUES ('$ay_id', '$discount', '$discount_desc', '$percent', '$discount_status', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, '$updated_by')") or die(mysqli_error($acc));
        
        $_SESSION['discAdded'] = true;
        header('location: ../add.discount.php');
     
    } else {
        $_SESSION['discExisting'] = true;
        header('location: ../add.discount.php');
    }
}