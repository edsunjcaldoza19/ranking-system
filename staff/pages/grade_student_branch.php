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
                            <?php
                                    //GET Subject ID using GET METHOD
                                    $quarterID = $_GET['quarter_id'];
                                    //FETCH tbl_grade
                                    $sqlQuarter = $conn->prepare("SELECT * FROM tbl_quarter
                                    WHERE `id` = $quarterID");
                                    $sqlQuarter->execute();
                                    $fetchQuarter = $sqlQuarter->fetch();
                                ?>
                                <h3>Student Ranking - <?php echo $fetchQuarter['q_quarter']; ?></h3>
                                <p class="text-subtitle text-muted">Displays the rank of the student for a specific subject</p>
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
                        <div class="card">
                            <div class="card-header">
                                <?php
                                    //GET Subject ID using GET METHOD
                                    $subjectID = $_GET['subject_id'];
                                    //FETCH tbl_grade
                                    $sql = $conn->prepare("SELECT *, tbl_subject_branch.id FROM tbl_subject_branch
                                    LEFT JOIN tbl_subject_branch_details ON
                                    tbl_subject_branch_details.id = tbl_subject_branch.sbranch_subject_id
                                    LEFT JOIN tbl_subject_details ON
                                    tbl_subject_details.id=tbl_subject_branch_details.sbranch_main_subject_id
                                    WHERE tbl_subject_branch.id = $subjectID");
                                    $sql->execute();
                                    $fetch = $sql->fetch();
                                ?>
                                <h3><?php echo $fetch['sbranch_name']; ?> - Student Ranking</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Grade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Populate table with db data -->
                                        <?php
                                            //GET Subject ID using GET METHOD
                                            $subjectID = $_GET['subject_id'];
                                            //FETCH tbl_grade
                                            $sql = $conn->prepare("SELECT *, tbl_grade_branch.id FROM tbl_grade_branch
                                            LEFT JOIN tbl_subject_branch ON
                                            tbl_subject_branch.id=tbl_grade_branch.gbranch_subject_id
                                            LEFT JOIN tbl_student ON
                                            tbl_student.id=tbl_grade_branch.gbranch_stud_id
                                            WHERE `gbranch_subject_id` = $subjectID ORDER BY gbranch_grade DESC");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['stud_name']?></td>
                                                <td><?php echo $fetch['gbranch_grade']?></td>
                                            </tr>
                                        <?php
                                            };
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

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
    <script src="../../js/mazer.js"></script>
</body>

</html>
