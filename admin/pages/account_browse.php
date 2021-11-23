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
                                <h3>Staff Accounts</h3>
                                <p class="text-subtitle text-muted">View Staff Accounts registered to the system</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Staff Accounts</li>
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
                                $sql = $conn->prepare("SELECT * FROM `tbl_account_staff`");
                                $sql->execute();
                                while($fetch = $sql->fetch()){
                            ?>

                            <div class="col-xl-4 col-md-6 col-sm-12">
                                <div class="card animate__animated animate__fadeInUp">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <h4 class="card-title">Info</h4>
                                            <hr>
                                            <h4><?php echo $fetch['staff_name']; ?></h4>
                                            <p class="card-text">
                                                <i class="bi bi-envelope-fill"></i>
                                                <?php echo $fetch['staff_email']?>
                                            </p>
                                            <p class="card-text">
                                                <i class="bi bi-telephone-inbound-fill"></i>
                                                <?php echo $fetch['staff_contact']?>
                                            </p>
                                            <p class="card-text">
                                                <i class="bi bi-house-fill"></i>
                                                <?php echo $fetch['staff_address']?>
                                            </p>
                                        </div>
                                            <?php
                                                $image = (!empty($fetch['staff_image'])) ? '../../images/staff/'.$fetch['staff_image'] : '../../images/staff/default.png';
                                            ?>
                                        <img class="img-fluid w-100" src="<?php echo $image; ?>" style="height: 350px;" alt="Card image cap">
                                    </div>
                                    <div class="card-footer d-flex justify-content-between">
                                        <span>Update Information</span>
                                        <a href="account_staff_update.php?id=<?php echo $fetch['id']; ?>" class="btn btn-primary">Update</a>
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
                <!-- Additional Javascript Files Here. Custom JS Files and Libraries used only for this page.-->
                <script src="../assets/vendors/jquery/jquery.min.js"></script>
                <script src="../assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
                <script src="../assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
                <script src="../assets/vendors/fontawesome/all.min.js"></script>
                <script>
                    // Jquery Datatable
                    let jquery_datatable = $("#table1").DataTable()
                </script>
                <script src="../js/mazer.js"></script>
            </div>
        </div>
    </div>
    <?php include 'includes/scripts.php'; ?>
</body>

</html>
