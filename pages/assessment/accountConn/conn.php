<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "accounting";

// $servername = "localhost";
// $username = "u733437513_lorenzo";
// $password = "Hw#7vmG4[H";
// $dbname = "u733437513_enrollmentbac";

$acc = new mysqli($servername, $username, $password, $dbname) or die($db->error);

date_default_timezone_set('Asia/Manila');

?>