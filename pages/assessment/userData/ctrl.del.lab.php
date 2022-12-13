<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$get_id = $_GET['lab_id'];

$selectMiscell = mysqli_query($acc, "SELECT lab_desc FROM tbl_lab_fees WHERE lab_id = '$get_id'");
while ($row = mysqli_fetch_array($selectMiscell)) {
    mysqli_query($acc, "DELETE FROM tbl_lab_fees WHERE lab_desc = '$row[lab_desc]' AND year_id IN (1, 2, 3, 4) ") or die(mysqli_error($acc));
}



$_SESSION['successDel'] = true;
header("location: ../list.lab.php");