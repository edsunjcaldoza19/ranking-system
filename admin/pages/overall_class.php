<!-- Check Existing Sessions -->
<?php include 'includes/check_session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include 'includes/head.php'; ?>
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
                                <h3>Select Class</h3>
                                <p class="text-subtitle text-muted">Please select a class to view the ranking of students</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Layout Vertical Navbar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header + Title -->

                    <!-- Start Content Section -->
                    <section class="section">
                        <div class="row">
                             <!-- populate table with db data -->
                             <?php
                                /** Fetch School Year */
                                $schoolYearID = $_GET['sy_id'];

                                require 'be/database/db_pdo.php';
                                $sqlClass = $conn->prepare("SELECT *, tbl_class.id FROM tbl_class
                                LEFT JOIN tbl_section ON
                                tbl_section.id=tbl_class.class_section
                                LEFT JOIN tbl_grade_level ON
                                tbl_grade_level.id=tbl_section.s_grade_level
                                LEFT JOIN tbl_account_staff ON
                                tbl_account_staff.id=tbl_class.class_adviser
                                WHERE class_sy = '$schoolYearID'");
                                $sqlClass->execute();
                                while($fetchClass = $sqlClass->fetch()){
                            ?>

                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4><?php
                                            echo $fetchClass['gl_grade_level'];
                                            echo " - ";
                                            echo $fetchClass['s_name'];
                                            ?></h4>
                                            <hr>
                                            <?php
                                                $image = (!empty($fetchClass['staff_image'])) ? '../../images/staff/'.$fetchClass['staff_image'] : '../../images/staff/default.png';
                                            ?>
                                        <img class="img-fluid w-100" src="<?php echo $image; ?>" style="height: 350px;" alt="Card image cap">
                                        </div>

                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Select this class</span>
                                        <a href="overall_class_student.php?sy_id=<?php echo $_GET['sy_id']; ?>&&class_id=<?php echo $fetchClass['id']; ?>" class="btn btn-primary">Select</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>

                        </div>
                    </section>
                    <!-- End Content Section -->
                </div>

               <?php include 'includes/footer.php'; ?>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>
