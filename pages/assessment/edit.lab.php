<?php
session_start();
include '../../includes/head.php';
include 'accountConn/conn.php';
include '../../includes/session.php';

$lab_id = $_GET['lab_id'];

?>
<title>
    Add New Laboratory Fees | SFAC - Bacoor
</title>
</head>
<script>
    function disable1_button() {
        var x = document.getElementById("lab_1").disabled;
        if (x == false) {
            document.getElementById("lab_1").disabled = true;
        } else {
            document.getElementById("lab_1").disabled = false;
        }
    }

    function disable2_button() {
        var x = document.getElementById("lab_2").disabled;
        if (x == false) {
            document.getElementById("lab_2").disabled = true;
        } else {
            document.getElementById("lab_2").disabled = false;
        }
    }

    function disable3_button() {
        var x = document.getElementById("lab_3").disabled;
        if (x == false) {
            document.getElementById("lab_3").disabled = true;
        } else {
            document.getElementById("lab_3").disabled = false;
        }
    }

    function disable4_button() {
        var x = document.getElementById("lab_4").disabled;
        if (x == false) {
            document.getElementById("lab_4").disabled = true;
        } else {
            document.getElementById("lab_4").disabled = false;
        }
    }
</script>
<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add New Laboratory Fees</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Edit Laboratory Fee</h5>
                        <p class="text-sm mb-0">Laboratory Fee Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.edit.lab.php?lab_id=<?php echo $lab_id;?>" autocomplete="off" required>
                            <?php
                                $lab_info = mysqli_query($acc,"SELECT lab_desc, ay_id, lab_id FROM tbl_lab_fees WHERE lab_id = '$lab_id'");
                                while ($row1 = mysqli_fetch_array($lab_info)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-8">
                                    <label>Laboratory Fees Description</label>
                                    <input class="form-control" type="text" placeholder="Laboratory Fees Description" value="<?php echo $row1['lab_desc']?>"
                                        name="lab_desc" required/>
                                </div>
                                <div class="col-sm-4">
                                    <label>Academic Year</label>
                                    <select class="form-control" name="ay_id" id="academic_year">
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE ay_id = '$row1[ay_id]'");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];
                                        } ?></option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears WHERE NOT ay_id = '$row1[ay_id]'");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>
                            <?php

                            for ($i = 1; $i <= 4; $i++) {
                              
                                $lab_display = mysqli_query($acc, "SELECT year_id, lab, lab_id FROM tbl_lab_fees WHERE lab_desc = '$row1[lab_desc]' AND year_id = '$i'");

                                if (mysqli_num_rows($lab_display) != 0) {
                          
                                while ($row2 = mysqli_fetch_array($lab_display)) {
                                
                            ?>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="disable<?php echo $i;?>" id="disable_<?php echo $i;?>" onchange="disable<?php echo $i;?>_button()">
                                        <label>disable</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_level<?php echo $i;?>" id="year_level">
                                        <?php $getyearlevel = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE year_id = '$row2[year_id]'");
                                        while ($row = mysqli_fetch_array($getyearlevel)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="mt-3">Laboratory Fees</label>
                                    <input class="form-control" type="text" placeholder="Enter discount value" id="lab_<?php echo $i;?>" value="<?php echo $row2['lab'];?>"
                                        name="lab<?php echo $i;?>" required/>
                                </div>
                            </div>

                            <input type="text" name="temp_id<?php echo $i;?>" value="<?php echo $row2['lab_id'];?>" hidden>

                            <?php
                                
                                } } else {
                            ?>
                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="disable<?php echo $i;?>" id="disable_<?php echo $i;?>" onchange="disable<?php echo $i;?>_button()" checked>
                                        <label>disable</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_level<?php echo $i;?>" id="year_level">
                                        <?php $getyearlevel = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE year_id = '$i'");
                                        while ($row = mysqli_fetch_array($getyearlevel)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="mt-3">Laboratory Fees</label>
                                    <input class="form-control" type="text" placeholder="Enter discount value" id="lab_<?php echo $i;?>" disabled
                                        name="lab<?php echo $i;?>" required/>
                                </div>
                            </div>
                            <?php
                                } }
                            ?>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Add
                                    Discount</button>
                            </div>
                        <?php
                                }
                        ?>
                        </form>
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