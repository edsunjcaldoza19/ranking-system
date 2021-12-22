<!-- Check Existing Sessions -->
<?php include 'includes/check_session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/head.php'; ?>
         <!-- Additional Stylesheets Here. Custom CSS -->
        <link rel="stylesheet" href="../../assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
        <link rel="stylesheet" href="../../assets/vendors/fontawesome/all.min.css">
    </head>

<body>
    <div id="app">
    <?php include 'includes/left_sidebar.php'; ?>
    <div id="main" class='layout-navbar'>
            <?php include 'includes/navbar.php'; ?>
            <div id="main-content">
                <div class="page-heading">
                    <!-- Page Header + Title -->
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Student Grades</h3>
                                <p class="text-subtitle text-muted">This is a page for viewing student Grades</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Grades</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header + Title -->

                    <!-- Start Content Section -->
                    <!-- Basic Tables start -->
                    <section class="section">
                    <?php
                    $studID = $_GET['stud_id'];

                         $sql = $conn->prepare("SELECT * FROM tbl_student WHERE `id` = $studID");
                         $sql->execute();
                         $fetchStudent = $sql->fetch();
                    ?>
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" value="<?php echo $fetchStudent['stud_name']; ?>" class="form-control" name="staffAddress" placeholder="Enter Address" disabled>
                            <p><small class="text-muted">Last Name, First Name, Middle Name</small></p>
                        </div>
                        <div class="form-group">
                            <label>Student Number</label>
                            <input type="text" value="<?php echo $fetchStudent['stud_id_num']; ?>" class="form-control" name="staffAddress" placeholder="Enter Address" disabled>
                        </div>
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" value="<?php echo $fetchStudent['stud_sex']; ?>" class="form-control" name="staffAddress" placeholder="Enter Address" required>
                        </div>

                        <?php
                             $sqlQuarter = $conn->prepare("SELECT * FROM tbl_quarter");
                             $sqlQuarter->execute();
                             while($fetchQuarter = $sqlQuarter->fetch()){
                        ?>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3><?php echo $fetchQuarter['q_quarter']; ?> - Main Subjects</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table" id="table1">
                                            <thead>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Grade</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Populate table with db data -->
                                                <?php
                                                    //Fetch Staff ID using Session
                                                    $getStudentID = $_GET['stud_id'];
                                                    $getClassID = $_GET['class_id'];
                                                    $getQuarterID = $fetchQuarter['id'];
                                                    require 'be/database/db_pdo.php';
                                                    $sql = $conn->prepare("SELECT *, tbl_grade.id FROM tbl_grade
                                                    LEFT JOIN tbl_subject ON
                                                    tbl_subject.id=tbl_grade.grade_subject_id
                                                    LEFT JOIN tbl_subject_details ON
                                                    tbl_subject_details.id=tbl_subject.subject_id

                                                    LEFT JOIN tbl_student ON
                                                    tbl_student.id=tbl_grade.grade_stud_id

                                                    WHERE `subject_quarter_id` = $getQuarterID
                                                    AND `subject_class_id` = $getClassID
                                                    AND `grade_stud_id` = $getStudentID");
                                                    $sql->execute();
                                                    while($fetch = $sql->fetch()){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $fetch['subject_name']?></td>
                                                        <td><?php echo $fetch['grade']?></td>
                                                        <td>
                                                            <?php
                                                            if($fetch['grade'] >= '75'){
                                                                echo('<span class="badge bg-success">Passed</span>');
                                                            }
                                                            else{
                                                                echo('<span class="badge bg-danger">Failed</span>');
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                    <h3><?php echo $fetchQuarter['q_quarter']; ?> - Branch Subjects</h3>
                                    </div>
                                    <div class="card-body">
                                        <table class="table" id="table2">
                                            <thead>
                                                <tr>
                                                    <th>Subject Name</th>
                                                    <th>Grade</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Populate table with db data -->
                                                <?php
                                                    //Fetch Staff ID using Session
                                                    $getStudentID = $_GET['stud_id'];
                                                    $getClassID = $_GET['class_id'];
                                                    $getQuarterID = $fetchQuarter['id'];
                                                    require 'be/database/db_pdo.php';
                                                    $sql = $conn->prepare("SELECT *, tbl_grade_branch.id FROM tbl_grade_branch
                                                    LEFT JOIN tbl_subject_branch ON
                                                    tbl_subject_branch.id=tbl_grade_branch.gbranch_subject_id
                                                    LEFT JOIN tbl_subject_branch_details ON
                                                    tbl_subject_branch_details.id=tbl_subject_branch.sbranch_subject_id

                                                    LEFT JOIN tbl_student ON
                                                    tbl_student.id=tbl_grade_branch.gbranch_stud_id

                                                    WHERE `sbranch_quarter_id` = $getQuarterID
                                                    AND `sbranch_class_id` = $getClassID
                                                    AND `gbranch_stud_id` = $getStudentID");
                                                    $sql->execute();
                                                    while($fetch = $sql->fetch()){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $fetch['sbranch_name']?></td>
                                                        <td><?php echo $fetch['gbranch_grade']?></td>
                                                        <td>
                                                            <?php
                                                            if($fetch['gbranch_grade'] >= '75'){
                                                                echo('<span class="badge bg-success">Passed</span>');
                                                            }
                                                            else{
                                                                echo('<span class="badge bg-danger">Failed</span>');
                                                            }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    };
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <?php
                             }
                             ?>


                    </section>
                    <!-- Basic Tables end -->
                    <!-- End Content Section -->
                </div>
                <?php
                    include 'includes/footer.php';
                ?>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <!-- Additional Javascript Files Here. Custom JS Files and Libraries used only for this page.-->
    <script src="../../assets/vendors/jquery/jquery.min.js"></script>
    <script src="../../assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
    <script src="../../assets/vendors/fontawesome/all.min.js"></script>
    <script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()
        let jquery_datatable1 = $("#table2").DataTable()
    </script>
    <script src="../../js/mazer.js"></script>
</body>

</html>
