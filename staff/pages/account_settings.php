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
                                <h3>Accounts</h3>
                                <p class="text-subtitle text-muted">Update Staff Accounts and roles.</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Update Account</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- End Page Header + Title -->

                    <!-- Start Content Section -->
                    <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <form action="be/account_settings/update.php" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                        <?php
                                            $account_id = $_SESSION['staff_id'];
                                            require 'be/database/db_pdo.php';
                                            $sql = $conn->prepare("SELECT * FROM tbl_account_staff WHERE `id` = '$account_id'");
                                            $sql->execute();
                                            while($fetch = $sql->fetch()){
                                        ?>
                                        <div class="col-lg-6 col-md-6 xs-12">
                                            <h4 class="card-title">Account Credentials</h4>
                                            <input type="hidden" name="staffID" value="<?php echo $account_id; ?>">
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" value="<?php echo $fetch['staff_username']; ?>" class="form-control" name="staffUsername" placeholder="Enter Username">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" value="<?php echo $fetch['staff_password']; ?>" class="form-control" name="staffPassword" placeholder="Enter Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="password" value="<?php echo $fetch['staff_password']; ?>" class="form-control" name="staffConfirmPassword" placeholder="Enter Password" required>
                                                </div>
                                            <h4 class="card-title">Profile Picture</h4>
                                            <div class="form-group">
                                                <label>
                                                    Please upload the picture of the employee.
                                                </label>
                                                <!-- Basic file uploader -->
                                                <input type="file" accept="image/*" name="staffImage" class="form-control"
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
                                                <input type="hidden" name="oldImage" value="<?php echo $fetch['staff_image']; ?>">
                                                    <?php
                                                        $image = (!empty($fetch['staff_image'])) ? '../../images/staff/'.$fetch['staff_image'] : '../images/staff/default.png';
                                                    ?>
                                                <div class="col-md-12">
                                                    <img src="<?php echo $image; ?>" id="preview" width="300px" height="300px" style="border: 2px solid;"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-xs-12">
                                            <h4 class="card-title">Personal Information</h4>
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" value="<?php echo $fetch['staff_name']; ?>" class="form-control" name="staffName" placeholder="Enter Name" required>
                                                <p><small class="text-muted">Last Name, First Name, Middle Name</small></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Sex</label>
                                                <select class="form-select" name="staffSex">
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" value="<?php echo $fetch['staff_address']; ?>" class="form-control" name="staffAddress" placeholder="Enter Address" required>
                                                <p><small class="text-muted">House Number, Street Name, Brgy, Municipality/City, Province</small></p>
                                            </div>
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="date" value="<?php echo $fetch['staff_date_birth']; ?>" class="form-control" name="staffDateBirth" required>
                                            </div>
                                            <h4 class="card-title">Contact Information</h4>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" value="<?php echo $fetch['staff_email']; ?>" class="form-control" name="staffEmail" placeholder="Enter Email">
                                                    <p><small class="text-muted">e.g. example@gmail.com</small></p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="number" value="<?php echo $fetch['staff_contact']; ?>" class="form-control" name="staffContact" placeholder="Enter Contact Number" required>
                                                </div>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    <div class="form-actions d-flex justify-content-end">
                                        <button type="submit" name="update" class="btn btn-primary me-1">Submit</button>
                                    </div>
                                    </div>
                                </form>
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
    <script>
        var previewImage = function(event){
            var output = document.getElementById("preview");
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function(){
                URL.revokeObjectURL(output.src)
            }
        }
    </script>
</body>

</html>
