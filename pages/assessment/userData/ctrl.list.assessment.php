<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$data = mysqli_query($acc, "SELECT max(stud_no) as stud_no, tuition_fee, tbl_assessed_tf.created_at, tbl_assessed_tf.last_updated, tbl_assessed_tf.updated_by, tbl_assessed_tf.ay_id FROM tbl_assessed_tf LEFT JOIN tbl_tuition_fees ON tbl_tuition_fees.tf_id = tbl_assessed_tf.tf_id GROUP BY stud_no") or die("Error: ".mysqli_error($acc));
$dataArray = array();
while( $row = mysqli_fetch_array($data) ) {
    $stud_no = $row['stud_no'];
    $tuition_fee = $row['tuition_fee'];

    $studInfo = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
    LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
    LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id 
    WHERE tbl_students.stud_no = '$stud_no' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]' AND remark = 'Approved'") or die (mysqli_error($db));
    while ($row1 = mysqli_fetch_array($studInfo)) {
        $fullname = $row1['fullname'];
        $course = $row1['course_abv'];
    }

    $ayselect = mysqli_query($db, "SELECT academic_year FROM tbl_acadyears WHERE ay_id = '$row[ay_id]'");
    while ($row2 = mysqli_fetch_array($ayselect)) {
        $ay_id = $row2['academic_year'];
    }
        
        $created_at = $row["created_at"];
        $last_updated = $row["last_updated"];
        $updated_by = $row["updated_by"];


        $dataArray[] = array(
                "fullname" => $fullname,
                "stud_no" => $stud_no,
                "course" => $course,
                "ay_id" => $ay_id,
                "tuition_fee" => $tuition_fee,
                "created_at" => $created_at,
                "last_updated" => $last_updated,
                "updated_by" => $updated_by,
                "stud_no" => $stud_no
        );
    
    }
    
    echo json_encode($dataArray);
?>

