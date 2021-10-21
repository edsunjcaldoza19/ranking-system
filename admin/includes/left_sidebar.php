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

                <li class="sidebar-item <?= ($activePage == 'student') ? 'active': ''; ?>">
                    <a href="student.php" class='sidebar-link'>
                        <i class="bi bi-person-check-fill"></i>
                        <span>Students</span>
                    </a>
                </li>

                <li class="sidebar-item <?= ($activePage == 'subject') ? 'active': ''; ?>">
                    <a href="subject.php" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Subjects</span>
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

                <li class="sidebar-title">Statistics</li>

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