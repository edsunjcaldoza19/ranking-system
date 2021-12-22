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
                                    //Get Class And School Year ID
                                    $getClassID =$_GET['class_id'];
                                    $getSchoolYear =$_GET['sy_id'];

                                    require 'be/database/db_pdo.php';
                                    $sql = $conn->prepare("SELECT *, tbl_class.id FROM tbl_class
                                    LEFT JOIN tbl_school_year ON
                                    tbl_school_year.id=tbl_class.class_sy
                                    LEFT JOIN tbl_section ON
                                    tbl_section.id=tbl_class.class_section
                                    LEFT JOIN tbl_grade_level ON
                                    tbl_grade_level.id=tbl_section.s_grade_level
                                    LEFT JOIN tbl_account_staff ON
                                    tbl_account_staff.id=tbl_class.class_adviser
                                    WHERE tbl_class.id = $getClassID");
                                    $sql->execute();
                                    $fetch = $sql->fetch()
                                ?>
                                <h3><?php
                                echo "Student Grades Of ";
                                echo $fetch['gl_grade_level'];
                                echo " - ";
                                echo $fetch['s_name'];
                                echo ": S.Y. ";
                                echo $fetch['sy_school_year'];
                                ?></h3>
                                <p class="text-subtitle text-muted">Configure Student Information</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Section</li>
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
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>ID Number</th>
                                            <th>Name</th>
                                            <th>Sex</th>
                                            <th>Date of Birth</th>
                                            <th>Address</th>
                                            <th>View Grades</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_populate_class.id FROM tbl_populate_class
                                            LEFT JOIN tbl_student ON
                                            tbl_student.id=tbl_populate_class.pop_stud_id
                                            WHERE pop_class_id=$getClassID");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['stud_id_num']?></td>
                                                <td><?php echo $fetch['stud_name']?></td>
                                                <td><?php echo $fetch['stud_sex']?></td>
                                                <td><?php echo $fetch['stud_date_birth']?></td>
                                                <td><?php echo $fetch['stud_address']?></td>

                                                <td>
                                                    <a href="student_grade.php?sy_id=<?php echo $_GET['sy_id']; ?>&&class_id=<?php echo $_GET['class_id']; ?>&&stud_id=<?php echo $fetch['pop_stud_id']; ?>" class="btn btn-success btn rounded-pill">View Grades</a>
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
