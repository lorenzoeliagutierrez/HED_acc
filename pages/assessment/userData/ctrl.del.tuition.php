<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$get_id = $_GET['tf_id'];

$selectTuition = mysqli_query($acc, "SELECT course_id FROM tbl_tuition_fees WHERE tf_id = '$get_id'");
while ($row = mysqli_fetch_array($selectTuition)) {
    mysqli_query($acc, "DELETE FROM tbl_tuition_fees WHERE course_id = '$row[course_id]' AND year_id IN (1, 2, 3, 4) ") or die(mysqli_error($acc));
}



$_SESSION['successDel'] = true;
header("location: ../list.tuition.php");