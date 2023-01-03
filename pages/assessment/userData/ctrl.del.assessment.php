<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$get_id = $_GET['stud_no'];

mysqli_query($acc, "DELETE FROM tbl_assessed_tf WHERE stud_no = '$get_id' ") or die(mysqli_error($acc));
$_SESSION['successDel'] = true;
header("location: ../list.assessment.php");