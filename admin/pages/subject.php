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
                                $getSchoolYear = $_GET['sy_id'];
                                require 'be/database/db_pdo.php';
                                $sqlSY = $conn->prepare("SELECT * FROM tbl_school_year
                                WHERE `id` = $getSchoolYear");
                                $sqlSY->execute();
                                $fetchSY = $sqlSY->fetch();
                            ?>
                                <h3>Add Subjects (S.Y. <?php echo $fetchSY['sy_school_year']; ?>)</h3>
                                <p class="text-subtitle text-muted">Add Subjects per Class and Quarter</p>
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
                                <h3>Class List</h3>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>School Year</th>
                                            <th>Section</th>
                                            <th>Grade Level</th>
                                            <th>Adviser</th>
                                            <th style="width: 20%;">Add Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            $getSchoolYear = $_GET['sy_id'];
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
                                            WHERE `class_sy` = $getSchoolYear");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['sy_school_year']?></td>
                                                <td><?php echo $fetch['s_name']?></td>
                                                <td><?php echo $fetch['gl_grade_level']?></td>
                                                <td><span class="badge bg-primary"><?php echo $fetch['staff_name']?></span></td>
                                                <td>
                                                    <?php
                                                    $sqlQuarter = $conn->prepare("SELECT * FROM tbl_quarter ORDER BY q_quarter");
                                                    $sqlQuarter->execute();
                                                    while($fetchQuarter = $sqlQuarter->fetch()){
                                                    ?>
                                                        <a href="subject_add.php?sy_id=<?php echo $getSchoolYear; ?>&&class_id=<?php echo $fetch['id']; ?>&&quarter_id=<?php echo $fetchQuarter['id']; ?>"
                                                        class="btn btn-primary btn rounded-pill mt-2"><?php echo $fetchQuarter['q_quarter']; ?></a>
                                                    <?php
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

                    </section>
                    <!-- Basic Tables end -->
                    <!-- End Content Section -->
                </div>
                <?php
                    include 'be/class/addModal.php';
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
