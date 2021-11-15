<!-- Check Existing Sessions -->
<?php include 'includes/check_session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/head.php'; ?>
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="../../assets/vendors/iconly/bold.css">
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
                                <h3>Dashboard</h3>

                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header + Title -->

                    <!-- Start Content Section -->
                    <section class="section">
                        <div class="row">
                            <div class="col-12 col-md-6 col-sm-12">
                                <div class="alert alert-primary">
                                    <h4 class="alert-heading">Welcome Back, <?php echo $fetchStudent['stud_name']; ?></h4>
                                    <hr>
                                    <p>Hello :) This is an overview of some data from the ranking system.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12">
                                <div class="alert alert-warning">
                                    <h4 class="alert-heading">Hello :)</h4>
                                    <hr>
                                    <p>Please view the announcements to view the latest updates.</p>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card bg bg-primary">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon purple">
                                                <i class="iconly-boldCalendar"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                                include 'be/database/db_pdo.php';
                                                $query = "SELECT * FROM tbl_school_year";
                                                $result=$conn->query($query);
                                                $count = $result->rowCount();
                                            ?>
                                            <h6 class="text-white">School Year</h6>
                                            <h3 class="text-white"><?php echo $count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card bg bg-success">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon green">
                                                <i class="iconly-boldPaper-Plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                                include 'be/database/db_pdo.php';
                                                $query = "SELECT * FROM tbl_grade_level";
                                                $result=$conn->query($query);
                                                $count = $result->rowCount();
                                            ?>
                                            <h6 class="text-white ">Grade Levels</h6>
                                            <h3 class="text-white "><?php echo $count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card bg bg-danger">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon red">
                                                <i class="iconly-boldInfo-Square"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                                include 'be/database/db_pdo.php';
                                                $query = "SELECT * FROM tbl_section";
                                                $result=$conn->query($query);
                                                $count = $result->rowCount();
                                            ?>
                                            <h6 class="text-white">Sections</h6>
                                            <h3 class="text-white"><?php echo $count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card bg bg-primary">
                                <div class="card-body px-3 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldAdd-User"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <?php
                                                include 'be/database/db_pdo.php';
                                                $query = "SELECT * FROM tbl_student";
                                                $result=$conn->query($query);
                                                $count = $result->rowCount();
                                            ?>
                                            <h6 class="text-white ">Students</h6>
                                            <h3 class="text-white "><?php echo $count; ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="basic-table">
                    <div class="col-12 col-md-6 mt-3">
                            <div class="card bg bg-success">
                                <div class="card-header bg bg-success">
                                    <h3 class="text-white">Announcements</h3>
                                    <p class="text-white">Announcements are displayed here to keep you updated.</p>
                                </div>
                                <div class="card-body">
                                    <?php
                                        require 'be/database/db_pdo.php';
                                        $sql = $conn->prepare("SELECT * FROM tbl_announcement
                                        ORDER BY id DESC");
                                        $sql->execute();
                                        while($fetchAnnounce = $sql->fetch()){
                                    ?>
                                    <div class="alert alert-success">
                                        <h4 class="alert-heading"><?php echo $fetchAnnounce['announce_title']; ?></h4>
                                        <p>Created At: <?php echo $fetchAnnounce['announce_created_at']; ?></p>
                                        <hr>
                                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view<?php echo $fetchAnnounce['id']?>">View Details</button>
                                    </div>
                                    <?php
                                        include 'be/announcement/view.php';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Class List</h4>
                                    <p>Here is the list of the classes where you belong. Please be guided.</p>
                                    <hr>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-lg">
                                            <thead>
                                                <tr>
                                                    <th>SCHOOL YEAR</th>
                                                    <th>GRADE LEVEL</th>
                                                    <th>SECTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                /**Fetch Student ID Session */
                                                $sessionStudentID = $_SESSION['student_id'];
                                                require 'be/database/db_pdo.php';
                                                $sql = $conn->prepare("SELECT *, tbl_populate_class.id
                                                FROM `tbl_populate_class`
                                                LEFT JOIN tbl_class ON
                                                tbl_class.id = tbl_populate_class.pop_class_id
                                                LEFT JOIN tbl_section ON
                                                tbl_section.id = tbl_class.class_section
                                                LEFT JOIN tbl_grade_level ON
                                                tbl_grade_level.id = tbl_section.s_grade_level
                                                LEFT JOIN tbl_school_year ON
                                                tbl_school_year.id = tbl_class.class_sy
                                                WHERE tbl_populate_class.pop_stud_id = $sessionStudentID");
                                                $sql->execute();
                                                while($fetch = $sql->fetch()){
                                            ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $fetch['sy_school_year']; ?></td>
                                                    <td class="text-bold-500"><?php echo $fetch['gl_grade_level']; ?></td>
                                                    <td class="text-bold-500"><?php echo $fetch['s_name']; ?></td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    <!-- End Content Section -->
                </div>

               <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
    <script src="../../assets/js/pages/dashboard.js"></script>
    <script>
        $(document).ready(function () {
            showDateTime();
        });

        function showDateTime(){

            var t = new Date();
            var d = new Date();
            document.getElementById("time").innerHTML = (t.toLocaleTimeString([], {hour: '2-digit', minute: '2-digit'}));
            document.getElementById("date").innerHTML = (d.toLocaleDateString([], {weekday: 'long', month: 'long', day: 'numeric', year: 'numeric'}));
            setTimeout("showTime()", 1000);
        }
    </script>

</body>

</html>
