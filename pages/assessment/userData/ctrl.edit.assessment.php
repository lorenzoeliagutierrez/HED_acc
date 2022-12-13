<?php
require '../../../includes/conn.php';
require '../accountConn/conn.php';
session_start();
date_default_timezone_set('Asia/Manila');

$acc_id = $_SESSION['userid'];
$stud_no = $_GET['stud_no'];

if (isset($_POST['submit'])) {

    $getUserName = mysqli_query($db, "SELECT *, CONCAT(tbl_accounting.account_lastname, ', ', tbl_accounting.account_firstname) AS fullname FROM tbl_accounting WHERE account_id = '$acc_id'");
    while ($row = mysqli_fetch_array($getUserName)) {
        $fullname = $row['fullname'];
    }

    $course_id = mysqli_escape_string($db, $_POST['course_id']);
    $ay_id = mysqli_real_escape_string($db, $_POST['ay_id']);
    $tf_id = mysqli_real_escape_string($db, $_POST['tf_id']);
    $created_at = mysqli_real_escape_string($db, $_POST['created_at']);

    $updated_by = $fullname .' - '. $_SESSION['role'];

    if(isset($_POST['payments'])) {
        $payments_array = $_POST['payments'];
        $payments_count = count($payments_array);
    }

    if (isset($_POST['discounts'])) {
        $discounts_array = $_POST['discounts'];
    }

    if (isset($_POST['lab'])) {
        $lab_array = $_POST['lab'];
    }

    $index_array = array();

    if (isset($_POST['index'])) {
        $temp_array = $_POST['index'];

        foreach ($temp_array as $index) {
            if ($index != null) {
                array_push($index_array, $index);
            }
        }
    }

    $lab_value = implode(",",$lab_array);
    $discount_value = implode(",",$discounts_array);
    $index_value = implode(",",$index_array);

    if ($payments_count <= 1) {

        $payment = $payments_array[0];

        if (!empty($discounts_array) && !empty($payments_array)) {

                $add_assessment = mysqli_query($acc, "UPDATE tbl_assessed_tf SET ay_id = '$ay_id', disc_id = '$discount_value', lab_id = '$lab_value', lab_units = '$index_value', stud_no = '$stud_no', payment = '$payment', course_id = '$course_id', tf_id = '$tf_id', last_updated = CURRENT_TIMESTAMP, updated_by = '$updated_by' WHERE stud_no = '$stud_no'") or die(mysqli_error($acc));

            
            $_SESSION['assessmentSuccess'] = true;
            header('location:../assessment.fee.php?stud_no='.$stud_no);

        } elseif (empty($discounts_array) && !empty($payments_array)) {

            $add_assessment = mysqli_query($acc, "UPDATE tbl_assessed_tf SET ay_id = '$ay_id', lab_id = '$lab_value', lab_units = '$index_value', stud_no = '$stud_no', payment = '$payment', course_id = '$course_id', tf_id = '$tf_id', last_updated = CURRENT_TIMESTAMP, updated_by = '$updated_by' WHERE stud_no = '$stud_no'") or die(mysqli_error($acc));

            $_SESSION['assessmentSuccess'] = true;
            header('location:../assessment.fee.php?stud_no='.$stud_no);

        } elseif (empty($payments_array)) {

            $_SESSION['paymentEmpty'] = true;
            header('location:../edit.assessment.php?stud_no='.$stud_no);

        }
    } else {
        $_SESSION['multiplePayment'] = true;
        header('location:../edit.assessment.php?stud_no='.$stud_no);

    }
}