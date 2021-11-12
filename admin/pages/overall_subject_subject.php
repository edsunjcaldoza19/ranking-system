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
                                <h3>Select Subject</h3>
                                <p class="text-subtitle text-muted">Select Subject to continue browsing the grades of students</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Subjects</li>
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
                                <h3>Subject List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th style="width: 20%;">Select</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Populate table with db data -->
                                        <?php

                                            $getSchoolYear = $_GET['sy_id'];
                                            $getClassID = $_GET['class_id'];
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_subject.id FROM tbl_subject
                                            LEFT JOIN tbl_quarter ON
                                            tbl_quarter.id=tbl_subject.subject_quarter_id

                                            LEFT OUTER JOIN tbl_subject_details ON
                                            tbl_subject_details.id=tbl_subject.subject_id

                                            LEFT JOIN tbl_class ON
                                            tbl_class.id=tbl_subject.subject_class_id
                                            LEFT JOIN tbl_section ON
                                            tbl_section.id=tbl_class.class_section
                                            LEFT JOIN tbl_grade_level ON
                                            tbl_grade_level.id=tbl_section.s_grade_level

                                            WHERE `class_sy` = $getSchoolYear
                                            AND `subject_class_id` = $getClassID");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['subject_name']?></td>
                                                <td>
                                                    <a href="overall_subject_student.php?sy_id=<?php echo $_GET['sy_id'];?>&&class_id=<?php echo $_GET['class_id'];?>&&subject_id=<?php echo $fetch['subject_id'];?>"
                                                    class="btn btn-primary btn rounded-pill mt-2">Select</a>
                                                </td>
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
    <script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()
    </script>
    <script src="../../js/mazer.js"></script>
</body>

</html>
