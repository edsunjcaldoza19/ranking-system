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

<body onload="sortTable();">
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
                                <h3>Student Grade</h3>
                                <p class="text-subtitle text-muted">Displays Student Record</p>
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

                    <!-- Striped rows with inverse dark table start -->
                    <section class="section">
                        <div class="row" id="table-striped-dark">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <!-- Populate table with db data -->
                                            <?php
                                                //Get Class ID
                                                $classID = $_GET['class_id'];

                                                //FETCH Class from database
                                                $sqlClass = $conn->prepare("SELECT *, tbl_class.id FROM tbl_class
                                                LEFT JOIN tbl_section ON
                                                tbl_section.id=tbl_class.class_section
                                                LEFT JOIN tbl_grade_level ON
                                                tbl_grade_level.id=tbl_section.s_grade_level
                                                WHERE tbl_class.id='$classID'");
                                                $sqlClass->execute();
                                                $fetchClass = $sqlClass->fetch();
                                            ?>
                                                This is the overall ranking for the students of
                                                <code><?php echo $fetchClass['gl_grade_level']; ?> - <?php echo $fetchClass['s_name']; ?></code>.
                                            </p>
                                        </div>

                                            <?php
                                                    $getClassID = $_GET['class_id'];
                                                    $getQuarterID = $_GET['quarter_id'];
                                                    $sqlPopClass = $conn->prepare("SELECT *, tbl_populate_class.id
                                                    FROM tbl_populate_class
                                                    LEFT JOIN tbl_student ON
                                                    tbl_student.id = tbl_populate_class.pop_stud_id

                                                    WHERE pop_class_id = $getClassID");
                                                    $sqlPopClass->execute();
                                                    $rankCounter = 0;
                                                    //Fetch Current Student ID
                                                    while($fetchPopClass = $sqlPopClass->fetch()){
                                                        $fetchStudentID = $fetchPopClass['pop_stud_id'];
                                                            $sqlClass = $conn->prepare("SELECT tbl_student.stud_name, CAST(AVG(grade) AS DECIMAL (10,2)) FROM tbl_grade
                                                            LEFT JOIN tbl_subject ON
                                                            tbl_subject.id = tbl_grade.grade_subject_id
                                                            LEFT JOIN tbl_student ON
                                                            tbl_student.id = tbl_grade.grade_stud_id
                                                            WHERE grade_stud_id = $fetchStudentID
                                                            AND subject_class_id = $getClassID
                                                            AND subject_quarter_id = $getQuarterID
                                                            ORDER BY AVG(grade) ASC");
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
                                                    <div class="table-responsive">
                                                        <table class="table mb-0" id="myTable">
                                                            <thead>
                                                                <tr>
                                                                    <th>NAME</th>
                                                                    <th>AVERAGE</th>
                                                                    <th>HONORS</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    for($i = 0; $i < count($studentArray); $i++){
                                                                        //Honors Received
                                                                    $checkGrade = $studentArray[$i]['studentGrade'];
                                                                    if($checkGrade >= 98.00 && $checkGrade <= 100.00){
                                                                        $studenthonors = "With Highest Honors";
                                                                    }
                                                                    else if($checkGrade >= 95.00 && $checkGrade <= 97.00){
                                                                        $studenthonors = "With High Honors";
                                                                    }
                                                                    else if($checkGrade >= 90.00 && $checkGrade <= 94.00){
                                                                        $studenthonors = "With Honors";
                                                                    }
                                                                    else if($checkGrade >= 75.00 && $checkGrade <= 89.00){
                                                                        $studenthonors = "Promoted";
                                                                    }
                                                                    else if($checkGrade >= 0.00 && $checkGrade <= 74.00){
                                                                        $studenthonors = "Failed";
                                                                    }
                                                                    else{
                                                                        $studenthonors = "Not Yet Graded";
                                                                    }
                                                                ?>
                                                                <tr>
                                                                    <td class="text-bold-500"><?php echo $studentArray[$i]['studentName']; ?></td>
                                                                    <td class="text-bold-500"><?php echo $studentArray[$i]['studentGrade']; ?></td>
                                                                    <td class="text-bold-500"><?php echo $studenthonors; ?></td>
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
                            </div>
                        </div>
                    </section>
                    <!-- Striped rows with inverse dark table end -->
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
    <script>
        // Jquery Datatable
        let jquery_datatable = $("#table1").DataTable()
    </script>
    <script src="../../js/mazer.js"></script>

    <script>
    function sortTable() {
    var table, rows, switching, i, x, y, shouldSwitch;
    table = document.getElementById("myTable");
    switching = true;
    /*Make a loop that will continue until
    no switching has been done:*/
    while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
        //start by saying there should be no switching:
        shouldSwitch = false;
        /*Get the two elements you want to compare,
        one from current row and one from the next:*/
        x = rows[i].getElementsByTagName("TD")[0];
        y = rows[i + 1].getElementsByTagName("TD")[0];
        //check if the two rows should switch place:
        if (Number(x.innerHTML) > Number(y.innerHTML)) {
            //if so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
        }
        }
        if (shouldSwitch) {
        /*If a switch has been marked, make the switch
        and mark that a switch has been done:*/
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        }
    }
    }
</script>
</body>

</html>
