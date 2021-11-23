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
                                    //Get Class ID School Year ID Quarter ID
                                    $getQuarterID =$_GET['quarter_id'];
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
                                echo "Add Subjects For ";
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
                                <button class="btn btn-success btn rounded-pill"
                                    data-bs-toggle="modal" data-bs-target="#addModal">
                                    Add Subject
                                </button>
                                <a href="subject.php?sy_id=<?php echo $getSchoolYear;?>" class="btn btn-primary btn rounded-pill">
                                    Back to Class List
                                </a>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Subject Name</th>
                                            <th>Subject Teacher</th>
                                            <th style="width: 10%;">Update</th>
                                            <th style="width: 10%;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT *, tbl_subject_branch.id FROM tbl_subject_branch
                                            LEFT JOIN tbl_class ON
                                            tbl_class.id=tbl_subject_branch.sbranch_class_id

                                            LEFT JOIN tbl_subject_branch_details ON
                                            tbl_subject_branch_details.id=tbl_subject_branch.sbranch_subject_id
                                            LEFT JOIN tbl_subject_details ON
                                            tbl_subject_details.id=tbl_subject_branch_details.sbranch_main_subject_id

                                            LEFT JOIN tbl_quarter ON
                                            tbl_quarter.id=tbl_subject_branch.sbranch_quarter_id
                                            LEFT JOIN tbl_account_staff ON
                                            tbl_account_staff.id=tbl_subject_branch.sbranch_teacher
                                            WHERE sbranch_class_id = $getClassID AND sbranch_quarter_id = $getQuarterID");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['sbranch_name']?></td>
                                                <td><?php echo $fetch['staff_name']?></td>
                                                <td>
                                                    <button class="btn btn-primary btn rounded-pill" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $fetch['id']?>">Update</button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-danger btn rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                            include 'be/subject_branch/updateModal.php';
                                            include 'be/subject_branch/deleteModal.php';
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
                    include 'be/subject_branch/addModal.php';
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
