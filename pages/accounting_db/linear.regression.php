<?php
session_start();
include '../../includes/head.php';
include '../assessment/accountConn/conn.php';
include '../../includes/session.php';


?>
<title>
    Data Analytics | SFAC - Bacoor
</title>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">Data Analytics</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-10">
                <div class="col-lg-9 col-12 mx-auto">
                    <div class="card card-body mt-4 shadow-sm">
                        <h5 class="font-weight-bolder mb-0">Linear Regression</h5>
                        <p class="text-sm mb-0">Discount Details</p>
                        <hr class="horizontal dark my-3">
                        <form method="POST" enctype="multipart/form-data" action="">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                            <div class="chart">
                                                <canvas id="awityan" class="chart-canvas" height="300"></canvas>
                                            </div>
                                        
                                </div>  
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="mt-3">Tuition Fee</label>
                                    <input class="form-control" type="text" placeholder="Enter estimated tuition"
                                        name="estimated_fee" id="estimated_fee" onkeyup="display()"/>
                                    
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Course</label>
                                    <select class="form-control" name="courses" id="courses" onchange="display()">
                                        <option value="" disabled selected>Select Course
                                        </option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_courses");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['course_id']; ?>">
                                            <?php echo $row['course_abv'];
                                        } ?></option>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="mt-3">Year Level</label>
                                    <select class="form-control" name="year_lvl" id="year_lvl" onchange="display()">
                                        <option value="" disabled selected>Select Year Level
                                        </option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_year_levels");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['year_id']; ?>">
                                            <?php echo $row['year_level'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                  <p><span id="demo"></span></p>
                                </div>
                                <div class="col-sm-4">
                                  <p><span id="estimation_total"></span></p>
                                </div>     
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                  <p><span id="mean_x"></span></p>
                                </div>
                                <div class="col-sm-4">
                                  <p><span id="mean_y"></span></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                  <p><span id="pearson"></span></p>
                                </div>
                                <div class="col-sm-4">
                                  <p><span id="rsquared"></span></p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn bg-gradient-dark text-white m-0 ms-2" type="submit" title="Send"
                                    name="submit">Add
                                    Discount</button>
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
    <?php
            $array_data = [];
            $array_label = [];
                $ay = mysqli_query($db,"SELECT ay_id, academic_year FROM tbl_acadyears ORDER BY academic_year ASC") or die (mysqli_error($db));
                while ($row1 = mysqli_fetch_array($ay)) {

                  $course = mysqli_query($db, "SELECT course_id FROM tbl_courses ORDER BY course_id ASC");
                  while ($row2 = mysqli_fetch_array($course)) {

                    $year = mysqli_query($db, "SELECT year_id FROM tbl_year_levels ORDER BY year_id ASC");
                    while ($row3 = mysqli_fetch_array($year)) {

                      $aycount = mysqli_query($db, "SELECT COUNT(stud_id) FROM tbl_schoolyears
                      LEFT JOIN tbl_courses ON tbl_courses.course_id = tbl_schoolyears.course_id
                      LEFT JOIN tbl_departments ON tbl_departments.department_id = tbl_courses.department_id
                      WHERE tbl_schoolyears.ay_id = '$row1[academic_year]' AND tbl_schoolyears.course_id = '$row2[course_id]' AND tbl_schoolyears.year_id = '$row3[year_id]' AND remark = 'Approved'") or die(mysqli_error($db));
                      $fetchcount = mysqli_fetch_array($aycount);
    
                          if ($fetchcount[0] != 0 ) {
  
                              array_push($array_data, $fetchcount[0]);
                              $array_data[] = "{ay:". $row1['ay_id']." ,tuition: ". rand(468.51 *10, 571.00 * 10)/10 .",course: ". $row2['course_id'].",year: ". $row3['year_id'].",student: ". $fetchcount[0]."}";
  
                          }
                      }
                    }
                  }
    ?>
    <script>

        const data_array = [
            <?php
              foreach ($array_data as $value) {
                echo $value. ", ";
              }  
            ?>
        ];
        
        const sorted_array = [];

        data_array.forEach(functionSort);

        function functionSort (array_value) {
         
            const temp_object = {};

            temp_object['x'] = array_value.tuition;
            temp_object['y'] = array_value.student;

            sorted_array.push(temp_object);

            console.log(array_value);
  

        }
    
        const config = {
          type: 'scatter',
          data: {
            datasets: [{
                label: "Number of Sudents ",
                borderColor: "#cb0c9f",
                borderColor: "black",
                borderWidth: 3,
                data: sorted_array,
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
        }

      
        let myChart = new Chart(document.getElementById('awityan'), config);


        function display() {

          myChart.destroy();

          var course = parseFloat(document.getElementById('courses').value * 1);
          var year_lvl = parseFloat(document.getElementById('year_lvl').value * 1);
          var estimated_fee = parseFloat(document.getElementById('estimated_fee').value * 1);

          if (course != 0 && year_lvl != 0 && estimated_fee != 0) {

            const sorted_array = [];
            const x_array = [];

            let sum_of_x = 0;
            let sum_of_y = 0;
            let i = 0;
            let sumofproducts = 0;
            let sumofproducts_y = 0;
            let sumofsquares = 0;

            data_array.forEach(functionSort);
            sorted_array.forEach(functionSum);

            function functionSort (array_value) {
              if (array_value.year == year_lvl && array_value.course == course)  {
                const temp_object = {};

                temp_object['x'] = array_value.tuition;
                temp_object['y'] = array_value.student;

                sorted_array.push(temp_object);

              }

            }

            function functionSum (array_value) { //sum of all x and y
              x_array.push(array_value.x);

              sum_of_x += array_value.x;
              sum_of_y += array_value.y;

              i += 1;

            }

            let highest_x = Math.max(...x_array);
            let lowest_x = Math.min(...x_array);

            let mean_x = sum_of_x/i;
            let mean_y = sum_of_y/i;

            sorted_array.forEach(products);

            function products(data_value) { //sum of x squared
                sumofproducts += Math.pow((data_value.x - mean_x), 2);
                sumofproducts_y += Math.pow((data_value.x - mean_x), 2);

            }

            sorted_array.forEach(squares);

            function squares(data_value) {
                sumofsquares += (data_value.x - mean_x) * (data_value.y - mean_y);
            }

            console.log(sumofproducts);
            console.log(sumofsquares);

            let b = sumofsquares/sumofproducts;
            let a = mean_y - (b * mean_x);


            let lowest_y = ((b * lowest_x) + a).toFixed(2);
            let highest_y = ((b * highest_x) + a).toFixed(2);
            let estimated_student = ((b * estimated_fee) + a).toFixed(0);

            let pearson_r = (sumofsquares / Math.sqrt((sumofproducts*sumofproducts_y)));

            let rsquared = Math.pow(pearson_r, 2);
            
            var xhttp;
            document.getElementById("demo").innerHTML = "Line of Regression y = (aX + b):<b> "+(b).toFixed(4) +"X + " + (a).toFixed(2)+ "</b>";
            document.getElementById("estimation_total").innerHTML = "Estimated Number of Students as per "+ estimated_fee +" fee:<br> "+(b).toFixed(4) +"("+ estimated_fee +")"+"+ " + (a).toFixed(2)+ " = <b>"+ estimated_student +" number of students</b>";
            document.getElementById("pearson").innerHTML = "Pearson's r: <b>"+ (pearson_r).toFixed(4)+"</b>";
            document.getElementById("rsquared").innerHTML = "Coefficient of Determination: <b>"+ (rsquared).toFixed(4)+"</b>";

            document.getElementById("mean_x").innerHTML = "Mean X: <b>"+ (mean_x).toFixed(2)+"</b>";
            document.getElementById("mean_y").innerHTML = "Mean Y: <b>"+ (mean_y).toFixed(2)+"</b>";
            

            xhttp = new XMLHttpRequest();

            config.data.datasets[0].data = sorted_array;

          if (config.data.datasets[1] == null) {

            config.data.datasets.push( {
                label: "Number of Sudents ",
                backgroundColor: "green",
                  borderColor: "green",
                  type: 'line',
                  borderWidth: 3,
                  data: [
                    {x:lowest_x , y:lowest_y}
                          , {x:highest_x , y:highest_y}
                  ],
                  lineTension: 0,
            },{
                label: "Number of Sudents ",
                backgroundColor: "red",
                  borderColor: "red",
                  type: 'line',
                  borderWidth: 3,
                  data: [
                    {x:estimated_fee , y:estimated_student}
                  ],
                  lineTension: 0,
            });
          } else {
            config.data.datasets[1] = {
                label: "Number of Sudents ",
                  backgroundColor: "green",
                  borderColor: "green",
                  type: 'line',
                  borderWidth: 3,
                  data: [
                    {x:lowest_x , y:lowest_y}
                          , {x:highest_x , y:highest_y}
                  ],
                  lineTension: 0,
            };
            config.data.datasets[2] = {
                label: "Number of Sudents ",
                  backgroundColor: "red",
                  borderColor: "red",
                  type: 'line',
                  borderWidth: 3,
                  data: [
                    {x:estimated_fee , y:estimated_student}
                  ],
                  lineTension: 0,
            };
          }
          myChart = new Chart(document.getElementById('awityan'), config);

        }

        }

          
       

// var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

// gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
// gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
// gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

// var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

// gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
// gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
// gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

        
    </script>
</body>

</html>