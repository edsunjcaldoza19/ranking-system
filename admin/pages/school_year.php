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
                                <h3>School Year Details</h3>
                                <p class="text-subtitle text-muted">Configure School Year.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">School Year</li>
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
                                    Add School Year
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table" id="table1">
                                    <thead>
                                        <tr>
                                            <th>School year</th>
                                            <th style="width: 20%;">Update</th>
                                            <th style="width: 20%;">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM tbl_school_year");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['sy_school_year']?></td>
                                                <td>
                                                    <button class="btn btn-primary btn rounded-pill" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $fetch['id']?>">Update</button>
                                                </td>

                                                <td>
                                                    <button class="btn btn-danger btn rounded-pill" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $fetch['id']?>">Delete</button>
                                                </td>
                                            </tr>
                                        <?php
                                            include 'be/school_year/updateModal.php';
                                            include 'be/school_year/deleteModal.php';
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
                    include 'be/school_year/addModal.php';
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
