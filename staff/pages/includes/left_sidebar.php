<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">

                    <a href="index.html">Staff</a>
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

                <li class="sidebar-title">Subject Teacher</li>

                <li class="sidebar-item has-sub <?= ($activePage == 'class_quarter' || $activePage == 'class_subject') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Browse Classes</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`
                            WHERE `sy_status` = 'Active'");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'class_quarter' || $activePage == 'class_subject') ? 'active': ''; ?> ">
                            <a href="class_quarter.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-title">Advisory Class</li>

                <li class="sidebar-item has-sub <?= (
                    $activePage == 'grade' ||
                    $activePage == 'grade_class' ||
                    $activePage == 'grade_student' ||
                    $activePage == 'grade_subject') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Student Grade</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`
                            WHERE `sy_status` = 'Active'");
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
                    $activePage == 'ranking_class_student' ||
                    $activePage == 'ranking_class_sel_class') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Class Ranking</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`
                            WHERE `sy_status` = 'Active'");
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
                    $activePage == 'overall_class' ||
                    $activePage == 'overall_class_student') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pie-chart-fill"></i>
                        <span>Overall Ranking</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`
                            WHERE `sy_status` = 'Active'");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'overall_class') ? 'active': ''; ?> ">
                            <a href="overall_class.php?sy_id=<?php echo $fetch['id']; ?>">
                                <?php echo $fetch['sy_school_year']; ?>
                            </a>
                        </li>
                        <?php
                            }
                        ?>
                    </ul>
                </li>

                <li class="sidebar-title">Settings</li>

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