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
    
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);

    $date_1 = mysqli_real_escape_string($db, $_POST['date_1']);
    $date_2 = mysqli_real_escape_string($db, $_POST['date_2']);
    $date_3 = mysqli_real_escape_string($db, $_POST['date_3']);
    $date_4 = mysqli_real_escape_string($db, $_POST['date_4']);

    $updated_by = $fullname.' - '. $_SESSION['role'];

    $addPaymentDate = mysqli_query($acc, "INSERT INTO tbl_installment_dates (date_1, date_2, date_3, date_4, ay_id) VALUES ('$date_1', '$date_2', '$date_3', '$date_4', '$ay_id')");


    header('location: ../add.installment.date.php');


}