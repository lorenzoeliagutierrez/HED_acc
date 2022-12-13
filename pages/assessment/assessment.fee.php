<?php
session_start();
include '../../includes/head.php';
include 'accountConn/conn.php';
include '../../includes/session.php';

$stud_no = $_GET['stud_no'];
date_default_timezone_set('Asia/Manila');
?>
<title>
    Assessment Info | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Assessment Info</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-7 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <?php
                            $studInfo = mysqli_query($db, "SELECT *,CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
                            LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                            LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id 
                            WHERE tbl_students.stud_no = '$stud_no' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]' AND remark = 'Approved'") or die (mysqli_error($db));
                            while ($row1 = mysqli_fetch_array($studInfo)) {

                                $stud_id = $row1['stud_id'];

                                $unittotal = mysqli_query($db, "SELECT SUM(unit_total) AS total_unit FROM tbl_enrolled_subjects
                                LEFT JOIN tbl_subjects_new ON tbl_subjects_new.subj_id = tbl_enrolled_subjects.subj_id
                                WHERE tbl_enrolled_subjects.stud_id = '$row1[stud_id]' AND tbl_enrolled_subjects.acad_year = '$_SESSION[AC]' AND tbl_enrolled_subjects.semester = '$_SESSION[S]'") or die (mysqli_error($db));

                                while ($row2 = mysqli_fetch_array($unittotal)) {
                                    $total_unit = $row2['total_unit'];
                                }
                        ?>
                        <h5 class="font-weight-bolder mb-0">Assesment Info</h5>
                        <p class="text-sm mb-0">Assessment Fee Break Down for <b><?php echo $row1['fullname'];?></b></p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="">
                            <?php
                                $assessmentInfo = mysqli_query($acc, "SELECT * FROM tbl_assessed_tf LEFT JOIN tbl_tuition_fees ON tbl_tuition_fees.tf_id = tbl_assessed_tf.tf_id WHERE stud_no = '$stud_no'  AND tbl_assessed_tf.ay_id = '$_SESSION[AYear]' AND year_id = '$row1[year_id]'") or die (mysqli_error($acc));
                                while ($row = mysqli_fetch_array($assessmentInfo)) {

                                    $tuition_per_unit = $row['tuition_fee'];

                                    $created_at = new DateTime($row['created_at']);
                                    $last_updated = new DateTime($row['last_updated']);

                                    $total_fee = $total_unit * $tuition_per_unit;

                                    $discount_array = explode(",",$row['disc_id']);
                                    $lab_array = explode(",",$row['lab_id']);
                                    $units_array = explode(",",$row['lab_units']);
                            ?>
                            <div class="table-responsive px-4 my-4">
                                <table class="table table-flush nowrap responsive">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9"></th>
                                            <th style="text-align: right;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tuition Fee</td>
                                            <td style="text-align: right;"><?php echo $total_unit.' units x '. $tuition_per_unit. ' = '. number_format($total_fee, 2);?></td>
                                        </tr>
                                        <?php
                                            if ($row['disc_id'] != 0) {
                                        ?>
                                        <tr>
                                            <td>Discounts:</td>
                                            <td></td>
                                        </tr>
                                        <?php
                                            foreach ($discount_array as $discount_value) {

                                            $discounts = mysqli_query($acc, "SELECT discount_desc, percent, discount, discount_status FROM tbl_discounts WHERE disc_id = '$discount_value'") or die (mysqli_error($acc));
                                            while ($row3 = mysqli_fetch_array($discounts)) {

                                                if ($row3['discount_status'] == 1) {
                                                                    
                                                } else {    

                                                if ($row3['percent'] == 1) {
                                                    $percent_value = number_format(floor((($row3['discount'] / 100) * $total_fee) * 100)/ 100, 2, '.', ''); //this took forever king ina
                                                    $total_fee = $total_fee - $percent_value;

                                                } else {
                                                    
                                                    $total_fee = $total_fee - $row3['discount'];

                                                }
                                                }
                                        ?>
                                        <tr>
                                            <td>&emsp;&emsp;<?php echo $row3['discount_desc'];?> <?php echo ($row3['discount_status']== 1 ? '<em><small>will reflect only.</small></em>' : '');?></td>
                                            <?php
                                                if ($row3['percent'] == '1') {
                                            ?>
                                            <td style="text-align: right;"><?php echo $row3['discount'];?>% <?php echo ($row3['discount_status']== 1 ? '' : '('.number_format($percent_value, 2).')');?> </td>
                                            <?php
                                                } else {
                                            ?>
                                            <td style="text-align: right;"><?php echo number_format($row3['discount'], 2);?></td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                            } }
                                            
                                        ?>
                                        <tr>
                                            <td><b>Total Tuition Fee Amount</b></td>
                                            <td style="text-align: right;"><b><?php echo 'Php '. number_format($total_fee, 2);?></b></td>
                                        </tr>
                                        
                                        <?php
                                        } else { }
                                        ?>
                                        <tr>
                                            <td>Laboratory Fees</td>
                                            <td></td>
                                        </tr>
                                        <?php
                                            $i = 0;
                                            $total_lab = 0;
                                            foreach ($lab_array as $lab_values) {
                                            $lab = mysqli_query($acc, "SELECT * FROM tbl_lab_fees WHERE lab_id = '$lab_values'") or die (mysqli_error($acc));
                                            while ($row5 = mysqli_fetch_array($lab)) {
                                                $lab_value = $units_array[$i] * $row5['lab'];

                                                $total_lab = $total_lab + $lab_value;
                                        ?>
                                        <tr>
                                            <td>&emsp;&emsp;<?php echo $row5['lab_desc'];?></td>
                                            <td style="text-align: right;"><?php echo $units_array[$i] .' x '.number_format($row5['lab'],2) .' = '. number_format($lab_value, 2);?></td>
                                        </tr>
                                        <?php
                                            }
                                        $i++;
                                        }
                                        ?>
                                        <tr>
                                            <td><b>Total Laboratory Fee</b></td>
                                            <td style="text-align: right;"><b><?php echo 'Php '.number_format($total_lab, 2);?></b></td>
                                        </tr>
                                        <tr>
                                            <td>Miscellanous</td>
                                            <td></td>
                                        </tr>
                                        <?php
                                            $total_miscell = 0;

                                            $miscell = mysqli_query($acc, "SELECT * FROM tbl_miscellanous_fees WHERE ay_id = '$_SESSION[AYear]' AND year_id = '$row1[year_id]'") or die (mysqli_error($acc));
                                            while ($row4 = mysqli_fetch_array($miscell)) {

                                                $total_miscell = $total_miscell + $row4['miscellanous'];
                                        ?>
                                        <tr>
                                            <td>&emsp;&emsp;<?php echo $row4['miscell_desc'];?></td>
                                            <td style="text-align: right;"><?php echo number_format($row4['miscellanous'], 2)?></td>
                                        </tr>
                                        <?php
                                            }
                                        ?>
                                        <tr>
                                            <td><b>Total Miscellanous Fee</b></td>
                                            <td style="text-align: right;"><b><?php echo 'Php '.number_format($total_miscell, 2);?></b></td>
                                        </tr>
                                        <tr>
                                            <td><b>TOTAL FEE</b></td>
                                            <td style="text-align: right;"><b><?php echo 'Php '.number_format(($total_fee + $total_miscell + $total_lab), 2);?></b></td>
                                        </tr>
                                        <tr>
                                        <?php
                                            if ($_SESSION['role'] == "Accounting") {
                                        ?>
                                            <td>
                                            <p><small>
                                                Created at: <?php echo $created_at->format('h:i a \o\n F d, Y');?>.<br>
                                                Last Updated by: <?php echo $row['updated_by'];?>.<br>
                                                Last updated at: <?php echo $last_updated->format('h:i a \o\n F d, Y');?>.
                                            </small></p>
                                            </td>
                                        <?php
                                            } elseif ($row['payment'] == 'trimestral' || $row['payment'] == 'quarterly') {
                                                $selectInstallmentDate = mysqli_query($acc, "SELECT * FROM tbl_installment_dates WHERE ay_id = '$_SESSION[AYear]' AND sem_id = '$_SESSION[ASem]'");

                                                $date_array = [];
                                                while ($row = mysqli_fetch_array($selectInstallmentDate)) {

                                                    $date_array[] = new DateTime($row['date_1']);
                                                    $date_array[] = new DateTime($row['date_2']);
                                                    $date_array[] = new DateTime($row['date_3']);

                                                }
                                                $current_date = new DateTime(date('d-m-Y'));

                                                foreach ($date_array as $date) {
                                                    $current_day = date_format($current_date,'z');
                                                    $due_day = date_format($date,'z');
                                                
                                                    $index = $due_day - $current_day;
                                                    if ($current_day <= $due_day) {
                                        ?> 
                                            <td>
                                                <p>Please settle your accounts on <?php echo $current_date->format('F d, Y')?></p>
                                            </td>
                                        <?php
                                        break;
                                                }
                                            }
                                        }
                                        ?>   
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <?php
                                }
                            ?>
                            

                            <div class="d-flex justify-content-end mt-4">
                                <a class="btn bg-gradient-dark text-white m-0 ms-2" href="accountForm/dars.php?stud_id=<?php echo $stud_id;?>"
                                    name="submit">Form</a>
                                <a class="btn bg-gradient-dark text-white m-0 ms-2" href="edit.assessment.php?stud_no=<?php echo $stud_no;?>" type="submit" title="Send"
                                    name="submit">Edit
                                </a>
                                <a class="btn bg-gradient-dark text-white m-0 ms-2" href="add.payment.php?stud_no=<?php echo $stud_no;?>" type="submit" title="Send"
                                    name="submit">Add Payment Status
                                </a>
                                <a class="btn bg-gradient-dark text-white m-0 ms-2" href="list.assessment.php" type="submit" title="Send"
                                    name="submit">Finish
                                </a>
                            </div>
                        </form>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
            <?php include '../../includes/footer.php'; ?>
            <!-- End footer -->
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

</html>