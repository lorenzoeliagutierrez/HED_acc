<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$get_id = $_GET['miscell_id'];

$selectMiscell = mysqli_query($acc, "SELECT miscell_desc FROM tbl_miscellanous_fees WHERE miscell_id = '$get_id'");
while ($row = mysqli_fetch_array($selectMiscell)) {
    mysqli_query($acc, "DELETE FROM tbl_miscellanous_fees WHERE miscell_desc = '$row[miscell_desc]' AND year_id IN (1, 2, 3, 4) ") or die(mysqli_error($acc));
}



$_SESSION['successDel'] = true;
header("location: ../list.miscell.php");