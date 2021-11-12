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
                <!-- Menu Sidebar -->
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item <?= ($activePage == 'home') ? 'active': ''; ?>">
                    <a href="home.php" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Browse</li>

                <li class="sidebar-item has-sub <?= ($activePage == 'class_quarter' || $activePage == 'populate_class_student') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>My Classes</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            /**Fetch Student ID Session */
                            $sessionStudentID = $_SESSION['student_id'];
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT *, tbl_populate_class.id
                            FROM `tbl_populate_class`
                            LEFT JOIN tbl_class ON
                            tbl_class.id = tbl_populate_class.pop_class_id
                            LEFT JOIN tbl_section ON
                            tbl_section.id = tbl_class.class_section
                            LEFT JOIN tbl_grade_level ON
                            tbl_grade_level.id = tbl_section.s_grade_level
                            LEFT JOIN tbl_school_year ON
                            tbl_school_year.id = tbl_class.class_sy
                            WHERE tbl_populate_class.pop_stud_id = $sessionStudentID");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'class_quarter' || $activePage == 'populate_class_student') ? 'active': ''; ?> ">
                            <a href="class_quarter.php?class_id=<?php echo $fetch['pop_class_id']; ?>">
                                <?php echo $fetch['gl_grade_level'];?>-<?php echo $fetch['s_name']; ?> <br> (<?php echo $fetch['sy_school_year']; ?>)
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-title">Account</li>

                <li class="sidebar-item <?= ($activePage == 'account_settings') ? 'active': ''; ?>">
                    <a href="account_settings.php" class='sidebar-link'>
                        <i class="bi bi-gear-fill"></i>
                        <span>Account Settings</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>