<?php
session_start();
include '../../includes/head.php';
include 'accountConn/conn.php';
include '../../includes/session.php';

date_default_timezone_set('Asia/Manila');

?>
<title>
    Assessments List | SFAC - Bacoor
</title>
</head>

<script>
$('document').ready(function() {

    var table = $('#test_table').DataTable({
        ajax: {
            url: 'userData/ctrl.list.assessment.php',
            type: 'POST',
            dataSrc: ''
        },
        columns: [
                { data: 'fullname' },
                  { data: 'stud_no' },
                  { data: 'course' },
                  { data: 'ay_id' },
                  { data: 'tuition_fee' },
                  { data: 'created_at' },
                  { data: 'last_updated' },
                  { data: 'updated_by' },
                  { data: 'stud_no',
                    render: function (data, type, row) {
                        return '<a class="btn bg-gradient-primary text-xs" href="assessment.fee.php?stud_no='+data+'"><i class="text-xs fas fa-edit"></i> Info</a> <a class="btn btn-block bg-gradient-danger mb-3 text-xs" data-bs-toggle="modal" data-bs-target="#modal-notification'+data+'"><iclass="text-xs fas fa-trash-alt"></i> Delete</a>';
                    }
                }
        ],
        createdRow: function( row, data, dataIndex ) {
            
            $(row).addClass( 'important' );
            
        },
    });

    $('#academic_year').on( 'change', function () {
    table
        .columns(2)
        .search( this.value )
        .draw();
    });
})


;
</script>
<body class="g-sidenav-show  bg-gray-100">
    <?php include '../../includes/sidebar.php'; ?>
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        <?php include '../../includes/navbar-title.php'; ?>
        <h6 class="font-weight-bolder mb-0">View Assessed Accounts</h6>
        <?php include '../../includes/navbar.php'; ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mb-5">
                <div class="col-12">
                    <div class="card shadow shadow-xl">
                        <!-- Card header -->
                        <div class="card-header">
                            <h5 class="mb-0">Assessment List</h5>
                            <!-- <p class="text-sm mb-0">
                                        A lightweight, extendable, dependency-free javascript HTML table plugin.
                                    </p> -->
                        </div>
                        <hr class="horizontal dark mt-0">
                        
                        <div class="row d-flex justify-content-center mx-4">
                            <div class="col-md-12 m-1 justify-content-center">
                                <div class="row justify-content-center">
                                <div class="col-sm-4 justify-content-center">
                                    <label>Academic Year</label>
                                    <select class="form-control" name="ay_id" id="academic_year" onchange="aySelect(this.value)">
                                        <option value="" disabled selected>Select Academic Year
                                        </option>
                                        <?php $getEAY = mysqli_query($db, "SELECT * FROM tbl_acadyears");
                                        while ($row = mysqli_fetch_array($getEAY)) {
                                        ?>
                                        <option value="<?php echo $row['academic_year']; ?>">
                                            <?php echo $row['academic_year'];
                                        } ?></option>
                                    </select>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="table-responsive px-4 my-4">
                            <table class="table table-flush table-hover nowrap responsive" id="test_table">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Fullname</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Student Number</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Course</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            A.Y. Year</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Tuition Fee per Unit</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Created at</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Last Updated</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Updated By</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">
                                            Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $data = mysqli_query($acc, "SELECT * FROM tbl_assessed_tf LEFT JOIN tbl_tuition_fees ON tbl_tuition_fees.tf_id = tbl_assessed_tf.tf_id") or die("Error: ".mysqli_error($acc));
                                    while( $row = mysqli_fetch_array($data) ) {
                                        $id = $row['stud_no'];

                                            $studInfo = mysqli_query($db, "SELECT CONCAT(tbl_students.lastname, ', ', tbl_students.firstname, ' ', tbl_students.middlename)  as fullname FROM tbl_schoolyears 
                                            LEFT JOIN tbl_students ON tbl_students.stud_id = tbl_schoolyears.stud_id
                                            WHERE tbl_students.stud_no = '$row[stud_no]' AND ay_id = '$_SESSION[AC]' AND sem_id = '$_SESSION[S]' AND remark = 'Approved'") or die (mysqli_error($db));
                                            while ($row1 = mysqli_fetch_array($studInfo)) {
                                                $fullname = $row1['fullname'];
                                            }
                                ?>
                                <div class="modal fade" id="modal-notification<?php echo $id; ?>" tabindex="-1"
                                        role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                        <div class="modal-dialog modal-danger modal-dialog-centered modal-"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h6 class="modal-title text-danger" id="modal-title-notification"><i
                                                            class="fas fa-exclamation-triangle"> </i>
                                                        Warning
                                                    </h6>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="py-3 text-center">
                                                        <i class="fas fa-trash-alt text-9xl"></i>
                                                        <h4 class="text-gradient text-danger mt-4">
                                                            Delete Account!</h4>
                                                        <p>Are you sure you want to delete
                                                            <br>
                                                            <i><b><?php echo $fullname; ?></b></i> assessed account?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="userData/ctrl.del.assessment.php?stud_no=<?php echo $id; ?>"
                                                        class="btn btn-white text-white bg-danger">Delete</a>
                                                    <button type="button"
                                                        class="btn btn-link text-secondary btn-outline-dark ml-auto"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }?>
                                </tbody>
                            </table>
                        </div>
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