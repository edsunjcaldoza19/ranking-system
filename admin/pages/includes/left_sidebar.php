<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="../../assets/images/logo/logo.png" alt="Logo" srcset=""></a>
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

                <li class="sidebar-item <?= ($activePage == 'school_year') ? 'active': ''; ?>">
                    <a href="school_year.php" class='sidebar-link'>
                        <i class="bi bi-calendar-date-fill"></i>
                        <span>School Year</span>
                    </a>
                </li>
                <li class="sidebar-item <?= ($activePage == 'quarter') ? 'active': ''; ?>">
                    <a href="quarter.php" class='sidebar-link'>
                        <i class="bi bi-calendar-event-fill"></i>
                        <span>Quarters</span>
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

                <li class="sidebar-title">Accounts</li>
                <li class="sidebar-item <?= ($activePage == 'account_staff_add') ? 'active': ''; ?>">
                    <a href="account_staff_add.php" class='sidebar-link'>
                        <i class="bi bi-person-plus-fill"></i>
                        <span>Add Staff Account</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'account_staff') ? 'active': ''; ?>">
                    <a href="account_staff.php" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Staff Accounts</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'account_browse') ? 'active': ''; ?>">
                    <a href="account_browse.php" class='sidebar-link'>
                        <i class="bi bi-person-fill"></i>
                        <span>Browse Accounts</span>
                    </a>
                </li>

                <li class="sidebar-title">Classes</li>
                <li class="sidebar-item <?= ($activePage == 'class') ? 'active': ''; ?>">
                    <a href="class.php" class='sidebar-link'>
                        <i class="bi bi-bookmark-fill"></i>
                        <span>Create Class</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub <?= ($activePage == 'populate_class' || $activePage == 'populate_class_student') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Populate Class</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'populate_class' || $activePage == 'populate_class_student') ? 'active': ''; ?> ">
                            <a href="populate_class.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-item has-sub <?= ($activePage == 'subject') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book-fill"></i>
                        <span>Subjects</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'subject') ? 'active': ''; ?> ">
                            <a href="subject.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-title">Statistics</li>

                <li class="sidebar-item has-sub <?= ($activePage == 'grade') ? 'active': ''; ?>">
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

                <li class="sidebar-item <?= ($activePage == 'ranking') ? 'active': ''; ?>">
                    <a href="ranking.php" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Ranking by Class</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'ranking_subject') ? 'active': ''; ?>">
                    <a href="ranking_subject.php" class='sidebar-link'>
                        <i class="bi bi-book-half"></i>
                        <span>Ranking by Subject</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>