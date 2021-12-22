<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html">Registrar</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?= ($activePage == 'home') ? 'active': ''; ?>">
                    <a href="home.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'grade_level') ? 'active': ''; ?>">
                    <a href="grade_level.php" class='sidebar-link'>
                        <i class="bi bi-pie-chart-fill"></i>
                        <span>Grade Level</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'section') ? 'active': ''; ?>">
                    <a href="section.php" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Sections</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'student_info') ? 'active': ''; ?>">
                    <a href="student_info.php" class='sidebar-link'>
                        <i class="bi bi-person-plus-fill"></i>
                        <span>Students</span>
                    </a>
                </li>

                <li class="sidebar-title">Statistics</li>

                <li class="sidebar-item has-sub <?= (
                    $activePage == 'grade' ||
                    $activePage == 'grade_class' ||
                    $activePage == 'grade_student' ||
                    $activePage == 'grade_student_branch' ||
                    $activePage == 'grade_subject') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Grade</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'grade') ? 'active': ''; ?> ">
                            <a href="grade.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-item has-sub <?= (
                    $activePage == 'ranking_class' ||
                    $activePage == 'ranking_class_sel_class' ||
                    $activePage == 'ranking_class_student') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Ranking by Class</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'grade') ? 'active': ''; ?> ">
                            <a href="ranking_class.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-item has-sub <?= (
                    $activePage == 'ranking_subject' ||
                    $activePage == 'ranking_subject_class' ||
                    $activePage == 'ranking_subject_subject' ||
                    $activePage == 'ranking_subject_student' ||
                    $activePage == 'ranking_subject_student_branch') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-graph-up"></i>
                        <span>Ranking by Subject</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'ranking_subject') ? 'active': ''; ?> ">
                            <a href="ranking_subject.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-item has-sub <?= (
                    $activePage == 'overall_class' ||
                    $activePage == 'overall_class_student'
                    ) ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-text-fill"></i>
                        <span>Overall Rank Class</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'grade') ? 'active': ''; ?> ">
                            <a href="overall_class.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-item has-sub <?= (
                    $activePage == 'overall_subject' ||
                    $activePage == 'overall_subject_subject' ||
                    $activePage == 'overall_subject_student' ||
                    $activePage == 'overall_subject_student_branch') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Overall Rank Subject</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'overall_subject') ? 'active': ''; ?> ">
                            <a href="overall_subject.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>
                <li class="sidebar-title">Student Grade</li>
                <li class="sidebar-item has-sub <?= (
                    $activePage == 'student_grade_selClass' ||
                    $activePage == 'student_grade_selStudent' ||
                    $activePage == 'student_grade') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Student Grades</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'student_grade_selClass') ? 'active': ''; ?> ">
                            <a href="student_grade_selClass.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-title">Settings</li>

                <li class="sidebar-item <?= ($activePage == 'settings_account') ? 'active': ''; ?>">
                    <a href="settings_account.php" class='sidebar-link'>
                    <i class="bi bi-file-earmark-person-fill"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>