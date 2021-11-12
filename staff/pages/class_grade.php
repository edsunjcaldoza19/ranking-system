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
                                <h3>Add Student Grade</h3>
                                <p class="text-subtitle text-muted">Add Student Record</p>
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
                                            $sql = $conn->prepare("SELECT *, tbl_subject.id FROM tbl_subject
                                            LEFT JOIN tbl_subject_details
                                            ON tbl_subject_details.id = tbl_subject.subject_id
                                            WHERE tbl_subject.id = $subjectID");
                                            $sql->execute();
                                            $fetch = $sql->fetch();
                                        ?>
                                <h3><?php echo $fetch['subject_name']; ?></h3>
                                <button class="btn btn-success btn rounded-pill"
                                    data-bs-toggle="modal" data-bs-target="#addModal">
                                    Add Student Grade
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Student Name</th>
                                            <th>Grade</th>
                                            <th style="width: 20%;">Update</th>
                                            <th style="width: 20%;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Populate table with db data -->
                                        <?php
                                            //GET Subject ID using GET METHOD
                                            $subjectID = $_GET['subject_id'];
                                            //FETCH tbl_grade
                                            $sql = $conn->prepare("SELECT *, tbl_grade.id FROM tbl_grade
                                            LEFT JOIN tbl_subject ON
                                            tbl_subject.id=tbl_grade.grade_subject_id
                                            LEFT JOIN tbl_student ON
                                            tbl_student.id=tbl_grade.grade_stud_id
                                            WHERE `grade_subject_id` = $subjectID");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['stud_name']?></td>
                                                <td><?php echo $fetch['grade']?></td>
                                                <td>
                                                    <button class="btn btn-primary btn rounded-pill" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $fetch['id']?>">Update</button>
                                                </td>

                                                <td>
                                                    <button class="btn btn-danger btn rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                            include 'be/grade/updateModal.php';
                                            include 'be/grade/deleteModal.php';
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
                    include 'be/grade/addModal.php';
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
