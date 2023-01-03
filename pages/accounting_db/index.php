<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!-- Head -->
<?php
session_start();
include '../../includes/session.php';
// End Session 
include '../../includes/head.php';

include '../assessment/accountConn/conn.php';
?>
<title>
    Dashboard | SFAC-BACOOR
</title>
</head>
<!-- End Head -->


<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <!-- Start Container -->
        <!-- REGISTRAR, ADMISSION -->
        <?php if ($_SESSION['role'] == "Accounting") { ?>
        <div class="container-fluid py-4 mb-4">
            <!-- first row -->
            <div class="row">
                <!-- Enrolled students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-users text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Assessed Accounts
                                    </h6>

                                    <?php
                                        $ESCount = mysqli_query($acc, "SELECT COUNT(SY.assessed_id) FROM tbl_assessed_tf SY WHERE ay_id = '$_SESSION[AYear]'") or die($acc->error);
                                        $actualCount = mysqli_fetch_array($ESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state1"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Students</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="../assessment/list.assessment.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Enrolled Students -->

                <!-- New Student -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-friends text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Active Discounts
                                    </h6>

                                    <?php
                                        $NESCount = mysqli_query($acc, "SELECT COUNT(SY.disc_id) FROM tbl_discounts SY WHERE ay_id = '$_SESSION[AYear]'") or die($acc->error);
                                        $actualCount = mysqli_fetch_array($NESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state2"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Discounts</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="../assessment/list.discount.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End New Students -->

                <!-- Old students -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-user-friends text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Miscellaneous Fees
                                    </h6>

                                    <?php
                                        $OESCount = mysqli_query($acc, "SELECT COUNT(SY.miscell_id) FROM tbl_miscellanous_fees SY WHERE ay_id = '$_SESSION[AYear]'") or die($acc->error);
                                        $actualCount = mysqli_fetch_array($OESCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state3"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Fees</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="../assessment/list.miscell.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Old Students -->

                <!-- transferee -->
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card bg-white shadow move-on-hover">
                        <div class="overflow-hidden position-relative border-radius-lg bg-cover p-3">
                            <span class="mask bg-gradient-light opacity-3"><i
                                    class="fas fa-exchange-alt text-7xl p-1"></i></span>
                            <div class="card-body position-relative z-index-2 p-1">
                                <div class="text-center">
                                    <h6 class="mb-0 text-dark font-weight-bold mb-2">
                                        Laboratory Fees
                                    </h6>

                                    <?php
                                        $ETSCount = mysqli_query($acc, "SELECT COUNT(SY.lab_id) FROM tbl_lab_fees SY WHERE ay_id = '$_SESSION[AYear]'") or die($acc->error);
                                        $actualCount = mysqli_fetch_array($ETSCount);
                                        ?>
                                    <h3 class="text-dark text-center mb-0 mt-n2" id="state4"
                                        countTo="<?php echo $actualCount[0]; ?>">
                                    </h3>
                                    <p class="text-sm mb-0 text-dark">Fees</p>


                                </div>
                            </div>
                            <hr class="horizontal dark m-0">
                            <div class="text-center">
                                <a href="../assessment/list.lab.php" class="position-relative w-100 text-center py-1"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Show More">
                                    <i class="fas fa-chevron-down text-dark"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="card z-index-2">
                        <div class="card-header pb-0">
                            <h6>No of Enrollees</h6>
                        </div>
                        <div class="card-body p-3">
                            <div class="chart">
                                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                            </div>
                        </div>
                        <div class="card-body p-3">
                        <div class="d-flex justify-content-end mt-4">
                                <a class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send" href="linear.regression.php"
                                    name="submit">Predictive Analytics</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $array_data = [];
            $array_label = [];
                $ay = mysqli_query($db,"SELECT academic_year FROM tbl_acadyears WHERE academic_year <>'' ORDER BY academic_year asc LIMIT 6") or die (mysqli_error($db));
                while ($row1 = mysqli_fetch_array($ay)) {
                    $aycount = mysqli_query($db, "SELECT COUNT(stud_id) FROM tbl_schoolyears LEFT JOIN tbl_acadyears ON tbl_acadyears.ay_id = tbl_schoolyears.ay_id WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND remark = 'Approved'") or die(mysqli_error($db));
                    $fetchcount = mysqli_fetch_array($aycount);
            
                        array_push($array_label, $row1['academic_year']);    
                        array_push($array_data, $fetchcount[0]);

                }
?>
        </div>
        <!-- End Container -->
        <!-- STUDENT -->
        <?php } else {}
        ?>
        <!-- End Container -->
        <!-- footer -->
        <?php include '../../includes/footer.php'; ?>
        <!-- End footer -->
        </div>
    </main>
    <!--   Core JS Files   -->
    <?php include '../../includes/scripts.php'; ?>
</body>

<script>
    var ctx2 = document.getElementById("chart-line").getContext("2d");

// var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

// gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
// gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
// gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

// var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

// gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
// gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
// gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

new Chart(ctx2, {
  type: "line",
  data: {
    labels: [<?php foreach ($array_label as $data) { echo '"A.Y. '.$data. '", ';}?>],
    datasets: [{
        label: "Number of Sudents ",
        tension: 0.4,
        borderWidth: 0,
        pointRadius: 0,
        borderColor: "#cb0c9f",
        borderWidth: 3,
        // backgroundColor: gradientStroke1,
        fill: true,
        data: [<?php foreach ($array_data as $data) { echo $data. ', ';}?>],
        maxBarThickness: 6,
        lineTension: 0,

      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#b2b9bf',
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#b2b9bf',
          padding: 20,
          font: {
            size: 11,
            family: "Open Sans",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
    elements: {
        line: {
            tension: 0,
        },
    },
  },
});
</script>

</html>