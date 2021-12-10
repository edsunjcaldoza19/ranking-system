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
                                <h3>Logs</h3>
                                <p class="text-subtitle text-muted">Log Tracing and Monitoring</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Logs</li>
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
                                <button class="btn btn-danger btn rounded-pill"
                                    data-bs-toggle="modal" data-bs-target="#deleteModal">
                                    Clear Logs
                                </button>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Action</th>
                                            <th>Time Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Populate table with db data -->
                                        <?php
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM tbl_logs ORDER BY id DESC");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                            <tr>
                                                <td><?php echo $fetch['log_desc']?></td>
                                                <td><?php echo $fetch['log_ts']?></td>
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
                    include 'be/logs/deleteModal.php';
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
