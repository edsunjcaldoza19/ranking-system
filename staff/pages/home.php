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
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
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
                                    <h6 class="text-muted font-semibold">School Year</h6>
                                    <h3 class="font-extrabold mb-0"><?php echo $count; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
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
                                    <h6 class="text-muted font-semibold">Grade Levels</h6>
                                    <h3 class="font-extrabold mb-0"><?php echo $count; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
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
                                    <h6 class="text-muted font-semibold">Sections</h6>
                                    <h3 class="font-extrabold mb-0"><?php echo $count; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
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
                                    <h6 class="text-muted font-semibold">Students</h6>
                                    <h3 class="font-extrabold mb-0"><?php echo $count; ?></h3>
                                </div>
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


</body>

</html>
