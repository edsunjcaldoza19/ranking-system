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
                                <h3>Student Grades</h3>
                                <p class="text-subtitle text-muted">View Student Grades</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Grades</li>
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
                                require 'be/database/db_pdo.php';
                                $sql = $conn->prepare("SELECT * FROM `tbl_quarter`");
                                $sql->execute();
                                while($fetch = $sql->fetch()){
                            ?>

                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card animate__animated animate__fadeInUp">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4><?php echo $fetch['q_quarter']; ?></h4>
                                            <hr>
                                        </div>
                                        <img class="img-fluid w-100" src="../../images/grade-img.png" style="height: 300px;" alt="Card image cap">
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Select this quarter</span>
                                        <a href="grade_class.php?sy_id=<?php echo $_GET['sy_id']; ?>&&quarter_id=<?php echo $fetch['id']; ?>" class="btn btn-primary">Select</a>
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
