<?php
session_start();
include '../../includes/head.php';
include 'accountConn/conn.php';
include '../../includes/session.php';


?>
<title>
    Add New Tuition Fee | SFAC - Bacoor
</title>
</head>
<script>
    function disable1_button() {
        var x = document.getElementById("tuition_1").disabled;
        if (x == false) {
            document.getElementById("tuition_1").disabled = true;
        } else {
            document.getElementById("tuition_1").disabled = false;
        }
    }

    function disable2_button() {
        var x = document.getElementById("tuition_2").disabled;
        if (x == false) {
            document.getElementById("tuition_2").disabled = true;
        } else {
            document.getElementById("tuition_2").disabled = false;
        }
    }

    function disable3_button() {
        var x = document.getElementById("tuition_3").disabled;
        if (x == false) {
            document.getElementById("tuition_3").disabled = true;
        } else {
            document.getElementById("tuition_3").disabled = false;
        }
    }

    function disable4_button() {
        var x = document.getElementById("tuition_4").disabled;
        if (x == false) {
            document.getElementById("tuition_4").disabled = true;
        } else {
            document.getElementById("tuition_4").disabled = false;
        }
    }
</script>
<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Add New Tuition Fee</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Add Tuition Fee</h5>
                        <p class="text-sm mb-0">Tuition Fee Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="userData/ctrl.add.tuition.php" autocomplete="off">
                            <div class="row">
                                <div class="col-sm-8">
                                    <label>Course</label>
                                    <select class="form-control" name="course_id" id="academic_year">
                                        <option value="" disabled selected>Select Course
                                        </option>
                                        <?php $getCourse = mysqli_query($db, "SELECT * FROM tbl_courses");
                                        while ($row = mysqli_fetch_array($getCourse)) {
                                        ?>
                                        <option value="<?php echo $row['course_id']; ?>">
                                            <?php echo $row['course'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label>Academic Year</label>
                                    <select class="form-control" name="ay_id" id="academic_year">
                                        <option value="" disabled selected>Select Academic Year
                                        </option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['ay_id']; ?>">
                                            <?php echo $row['academic_year'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="disable1" id="disable_1" onchange="disable1_button()">
                                        <label>disable</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_level1" id="year_level">
                                        <?php $getyearlevel = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE year_id = 1");
                                        while ($row = mysqli_fetch_array($getyearlevel)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="mt-3">Tuition Fee</label>
                                    <input class="form-control" type="text" placeholder="Enter tuition value" id="tuition_1"
                                        name="tuition1" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="disable1" id="disable_2" onchange="disable2_button()">
                                        <label>disable</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_level2" id="year_level">
                                        <?php $getyearlevel = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE year_id = 2");
                                        while ($row = mysqli_fetch_array($getyearlevel)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="mt-3">Tuition Fee</label>
                                    <input class="form-control" type="text" placeholder="Enter tuition value"  id="tuition_2"
                                        name="tuition2" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="disable1" id="disable_3" onchange="disable3_button()">
                                        <label>disable</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_level3" id="year_level">
                                        <?php $getyearlevel = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE year_id = 3");
                                        while ($row = mysqli_fetch_array($getyearlevel)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="mt-3">Tuition Fee</label>
                                    <input class="form-control" type="text" placeholder="Enter tuition value"  id="tuition_3"
                                        name="tuition3" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-1">
                                    <div class="form-check mt-5">
                                        <input class="form-check-input" type="checkbox" value="1" name="disable1" id="disable_4" onchange="disable4_button()">
                                        <label>disable</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_level4" id="year_level">
                                        <?php $getyearlevel = mysqli_query($db, "SELECT * FROM tbl_year_levels WHERE year_id = 4");
                                        while ($row = mysqli_fetch_array($getyearlevel)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="mt-3">Tuition Fee</label>
                                    <input class="form-control" type="text" placeholder="Enter tuition value" id="tuition_4"
                                        name="tuition4" />
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Add
                                    Tution Fee</button>
                            </div>
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