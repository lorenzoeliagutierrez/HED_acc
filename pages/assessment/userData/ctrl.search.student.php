<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

if (isset($_POST['submit'])) {
    $stud_no = mysqli_real_escape_string($db, $_POST['stud_no']);


    $studExist = mysqli_query($db,"SELECT stud_no FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_schoolyears.stud_id = tbl_students.stud_id WHERE stud_no = '$stud_no'") or die (mysqli_error($db));

    $studCheck = mysqli_query($db,"SELECT stud_no, tbl_schoolyears.stud_id FROM tbl_schoolyears
    LEFT JOIN tbl_students ON tbl_schoolyears.stud_id = tbl_students.stud_id WHERE stud_no = '$stud_no' AND sem_id = '$_SESSION[S]' AND ay_id = '$_SESSION[AC]' AND remark = 'Approved' ") or die (mysqli_error($db));

    $assessmentCheck = mysqli_query($acc,"SELECT * FROM tbl_assessed_tf WHERE stud_no = '$stud_no' AND ay_id = '$_SESSION[AYear]' AND sem_id = '$_SESSION[ASem]'") or die (mysqli_error($acc));

    if (mysqli_num_rows($studCheck) != 0 && mysqli_num_rows($studExist) != 0 && mysqli_num_rows($assessmentCheck) == 0) {
        while ($id = mysqli_fetch_array($studCheck)) {
            header('location:../add.assessment.php?stud_no='. $stud_no);
        }
    } elseif (mysqli_num_rows($studExist) == 0) {
        $_SESSION['studnoEmpty'] = true;
        header('location:../search.student.php');

    } elseif (mysqli_num_rows($studCheck)  == 0) {
        $_SESSION['studnoUnenrolled'] = true;
        header('location:../search.student.php');
        
    } elseif (mysqli_num_rows($assessmentCheck)  != 0) {
        $_SESSION['assessExist'] = true;
        header('location:../search.student.php');

    } 
}


?>