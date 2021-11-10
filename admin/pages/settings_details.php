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
                                <h3>School Details</h3>
                                <p class="text-subtitle text-muted">Confgure School Information</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">School Details Settings</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header + Title -->

                    <!-- Start Content Section -->
                    <!-- Basic Tables start -->
                    <section class="section">
                    <form action="be/settings_details/update.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <!-- Admin Profile Picture -->
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                        <?php
                                        //Fetch Admin Account from Database
                                            $adminID = $_SESSION['admin_id'];
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM tbl_school_details");
                                            $sql->execute();
                                            $fetchDetails = $sql->fetch();
                                        ?>
                                        <input type="hidden" name="id" value="<?php echo $fetchDetails['id']; ?>">
                                        <div class="form-group">
                                            <h4>School Logo</h4>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Please upload a picture here
                                            </label>
                                            <!-- Basic file uploader -->
                                            <input type="file" name="schoolLogo" class="form-control"
                                            onchange="previewImage(event)">
                                        </div>
                                        <div class="form-group">
                                            <div class="alert alert-light-primary color-primary">
                                                <i class="bi bi-exclamation-circle"></i>
                                                Image uploaded will be previewed here.
                                                Please select an image with same width and
                                                height ratio.
                                        </div>
                                        </div>
                                        <div class="form-group">
                                             <!-- Load IMAGE filename -->
                                             <input type="hidden" name="oldImage" value="<?php echo $fetchDetails['school_logo']; ?>">
                                                    <?php
                                                        $image = (!empty($fetchDetails['school_logo'])) ? '../../images/school/'.$fetchDetails['school_logo'] : '../../images/school/default.png';
                                                    ?>
                                            <div class="col-md-12 text-center">
                                                <img src="<?php echo $image; ?>" id="preview"  width="350px" height="350px" style="border: 2px solid; border-radius: 100%;"/>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Admin Profile Picture -->

                            <!-- Admin Account Information -->
                            <div class="col-md-6 col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                                <div class="form-body form form-vertical">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <h4>School Information</h4>
                                                            </div>
                                                            <input type="hidden" value="<?php echo $fetchDetails['id']; ?>" name="id">
                                                            <div class="form-group">
                                                                <label for="first-name-vertical">School Name</label>
                                                                <input type="text" value="<?php echo $fetchDetails['school_name']; ?>" id="first-name-vertical" class="form-control"
                                                                name="schoolName" placeholder="School Name">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">School ID</label>
                                                            <input type="text" value="<?php echo $fetchDetails['school_id']; ?>" id="contact-info-vertical" class="form-control"
                                                            name="schoolID" placeholder="School ID">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">School Address</label>
                                                            <input type="text" value="<?php echo $fetchDetails['school_address']; ?>" id="contact-info-vertical" class="form-control"
                                                            name="schoolAddress" placeholder="Address">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Official Email</label>
                                                            <input type="email" value="<?php echo $fetchDetails['school_email']; ?>" id="contact-info-vertical" class="form-control"
                                                            name="schoolEmail" placeholder="Email">
                                                            <small>Please enter a valid email address</small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="contact-info-vertical">Contact number</label>
                                                            <input type="number" value="<?php echo $fetchDetails['school_contact']; ?>" id="contact-info-vertical" class="form-control"
                                                            name="schoolContact" placeholder="Contact">
                                                        </div>

                                                        <div class="col-12 d-flex justify-content-end">
                                                            <button type="submit" name="update" class="btn btn-primary me-1 mb-1">Update</button>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END Admin Account Information -->
                        </div>
                    </form>
                    </section>
                    <!-- Basic Tables end -->
                    <!-- End Content Section -->
                </div>
                <?php
                    include 'be/quarter/addModal.php';
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
    <script>
        var previewImage = function(event){
            var output = document.getElementById("preview");
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function(){
                URL.revokeObjectURL(output.src)
            }
        }
    </script>
    <script src="../../js/mazer.js"></script>
</body>

</html>
