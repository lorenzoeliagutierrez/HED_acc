<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$disc_id = $_GET['disc_id'];

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

    if ($resultCheck == 0) {

        $insert_discount = mysqli_query($acc, "UPDATE tbl_discounts SET ay_id = '$ay_id', discount = '$discount', discount_desc = '$discount_desc', percent = '$percent', discount_status = '$discount_status', updated_by = '$updated_by' WHERE disc_id = '$disc_id'") or die(mysqli_error($acc));
        
        $_SESSION['discAdded'] = true;
        header('location: ../edit.discount.php?disc_id='.$disc_id);
     
    } else {
        $_SESSION['discExisting'] = true;
        header('location: ../edit.discount.php?disc_id='.$disc_id);
    }
}