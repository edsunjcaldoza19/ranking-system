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
                                <h3>Student Ranking - Overall Ranking</h3>
                                <p class="text-subtitle text-muted">Displays the rank of the student for a specific subject</p>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Grades</li>
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
                                <?php
                                    //GET Subject ID using GET METHOD
                                    $subjectID = $_GET['subject_id'];
                                    //FETCH tbl_grade
                                    $sql = $conn->prepare("SELECT *, tbl_subject.id FROM tbl_subject
                                    LEFT JOIN tbl_subject_details ON
                                    tbl_subject_details.id = tbl_subject.subject_id
                                    WHERE tbl_subject_details.id = $subjectID");
                                    $sql->execute();
                                    $fetch = $sql->fetch();
                                ?>
                                <h3><?php echo $fetch['subject_name']; ?> - Student Overall Ranking</h3>
                            </div>
                            <div class="card-body">
                            <?php
                                                $getClassID = $_GET['class_id'];
                                                $getSubjectID = $_GET['subject_id'];
                                                $sqlPopClass = $conn->prepare("SELECT *, tbl_populate_class.id
                                                FROM tbl_populate_class
                                                LEFT JOIN tbl_student ON
                                                tbl_student.id = tbl_populate_class.pop_stud_id

                                                WHERE pop_class_id = $getClassID");
                                                $sqlPopClass->execute();
                                                //Fetch Current Student ID
                                                while($fetchPopClass = $sqlPopClass->fetch()){
                                                    $fetchStudentID = $fetchPopClass['pop_stud_id'];
                                                    $sqlClass = $conn->prepare("SELECT CAST(AVG(grade) AS DECIMAL (10,2)) FROM tbl_grade
                                                    LEFT JOIN tbl_subject ON
                                                    tbl_subject.id = tbl_grade.grade_subject_id
                                                    WHERE grade_stud_id = $fetchStudentID
                                                    AND subject_class_id = $getClassID
                                                    AND subject_id = $getSubjectID");
                                                    $sqlClass->execute();
                                                    while($fetchClass = $sqlClass->fetch()){
                                                        $studentArray[] = array(
                                                            'studentName' => $fetchPopClass['stud_name'],
                                                            'studentGrade' => $fetchClass['CAST(AVG(grade) AS DECIMAL (10,2))']
                                                        );
                                                    }
                                                }
                                                if(!empty($studentArray)){
                                                    $col = array_column($studentArray, 'studentGrade');
                                                    array_multisort($col, SORT_DESC, $studentArray);
                                            ?>
                                        <!-- table strip dark -->
                                        <div class="table-responsive">
                                            <table class="table table-striped mb-0" id="myTable">
                                                <thead>
                                                    <tr>
                                                        <th>NAME</th>
                                                        <th>AVERAGE</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        for($i = 0; $i < count($studentArray); $i++){
                                                    ?>
                                                    <tr>
                                                        <td class="text-bold-500"><?php echo $studentArray[$i]['studentName']; ?></td>
                                                        <td class="text-bold-500"><?php echo $studentArray[$i]['studentGrade']; ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <?php
                                                }
                                                else{
                                                    ?>
                                                    <div class="row">
                                                    <?php
                                                    echo '<h2 class="text-center">No Record Found</h2>';
                                                    echo '<img src="../../images/empty.png">';
                                                    ?>
                                                    </div>
                                                    <?php
                                                }

                                            ?>
                            </div>
                        </div>

                    </section>
                    <!-- Basic Tables end -->
                    <!-- End Content Section -->
                </div>
                <?php
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
    <script src="../../js/mazer.js"></script>
</body>

</html>
