<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
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

                <li class="sidebar-title">Classes</li>

                <li class="sidebar-item has-sub <?= ($activePage == 'class_quarter' || $activePage == 'populate_class_student') ? 'active': ''; ?>">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Browse Classes</span>
                    </a>
                    <ul class="submenu ">
                    <li>
                        <?php
                            require 'be/database/db_pdo.php';
                            $sql = $conn->prepare("SELECT * FROM `tbl_school_year`");
                            $sql->execute();
                            while($fetch = $sql->fetch()){
                        ?>
                        <li class="submenu-item <?= ($activePage == 'class_quarter' || $activePage == 'populate_class_student') ? 'active': ''; ?> ">
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

                <li class="sidebar-item <?= ($activePage == 'deployment') ? 'active': ''; ?>">
                    <a href="deployment.php" class='sidebar-link'>
                        <i class="bi bi-file-diff-fill"></i>
                        <span>Deployment</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'grade') ? 'active': ''; ?>">
                    <a href="grade.php" class='sidebar-link'>
                        <i class="bi bi-graph-up"></i>
                        <span>Grades</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'ranking') ? 'active': ''; ?>">
                    <a href="ranking.php" class='sidebar-link'>
                        <i class="bi bi-bar-chart-fill"></i>
                        <span>Ranking</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>