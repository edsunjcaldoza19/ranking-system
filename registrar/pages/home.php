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
                                <div class="alert alert-primary animate__animated animate__fadeInUp">
                                    <h4 class="alert-heading">Welcome Back, <?php echo $fetchAdmin['reg_username']; ?></h4>
                                    <hr>
                                    <p>Hello :) This is an overview of some data from the ranking system.</p>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-sm-12">
                                <div class="alert alert-warning animate__animated animate__fadeInUp">
                                    <h4 class="alert-heading" id="time">Hello :)</h4>
                                    <hr>
                                    <p id="date">Sunday, February 5, 2021</p>
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6 animate__animated animate__fadeInUp">
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
                        <div class="col-6 col-lg-3 col-md-6 animate__animated animate__fadeInUp">
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
                        <div class="col-6 col-lg-3 col-md-6 animate__animated animate__fadeInUp">
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
                        <div class="col-6 col-lg-3 col-md-6 animate__animated animate__fadeInUp">
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
                    <div class="row animate__animated animate__fadeInUp" id="basic-table">
                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Admin Accounts</h4>
                                    <p class="card-text">
                                            Here are the list of the administrator accounts registered to the system.
                                        </p>
                                </div>
                                <div class="card-content">
                                    <!-- Start of Table -->
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-lg">
                                            <thead>
                                                <tr>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                require 'be/database/db_pdo.php';
                                                $sql = $conn->prepare("SELECT * FROM tbl_account_admin");
                                                $sql->execute();
                                                while($fetch = $sql->fetch()){
                                            ?>
                                                <tr>
                                                    <td class="text-bold-500"><?php echo $fetch['admin_username']; ?></td>
                                                    <td class="text-bold-500"><?php echo $fetch['admin_email']; ?></td>

                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Staff Accounts (Advisers/Teachers)</h4>
                                    <p>Here are the images of the staff that are registered to the system</p>
                                </div>
                                <div class="card-body">
                                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                        <img src="../../images/staff/default.png" style="height: 500px; width: 100%;" class="d-block w-100" alt="...">
                                        </div>
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM `tbl_account_staff`
                                            WHERE staff_image != ''");
                                            $sql->execute();
                                            while($fetchStaff = $sql->fetch()){
                                        ?>
                                        <div class="carousel-item">
                                            <?php
                                                $image = (!empty($fetchStaff['staff_image'])) ? '../../images/staff/'.$fetchStaff['staff_image'] : '../../images/staff/default.png';
                                            ?>
                                            <img src="<?php echo $image ?>" style="height: 500px; width: 100%;"  alt="...">
                                        </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </a>
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
