    <!-- Add Modal -->
    <form action="be/class/add.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Create Class
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>School Year</label>
                            <select class="form-select" name="classSchoolYear">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sql = $conn->prepare("SELECT * FROM `tbl_school_year` ORDER BY `sy_school_year` ASC");
                                $sql->execute();
                                while($fetch = $sql->fetch()){
                            ?>
                                <option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['sy_school_year'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <select class="form-select" name="classSection">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sql = $conn->prepare("SELECT *, tbl_section.id FROM tbl_section
                                LEFT JOIN tbl_grade_level ON
                                tbl_grade_level.id=tbl_section.s_grade_level
                                ORDER BY `gl_grade_level` ASC");
                                $sql->execute();
                                while($fetch = $sql->fetch()){
                            ?>
                                <option value="<?php echo $fetch['id'] ?>"><?php
                                echo $fetch['s_name'];
                                echo " - ";
                                echo $fetch['gl_grade_level'];
                                ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Adviser</label>
                            <select class="form-select" name="classAdviser">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sql = $conn->prepare("SELECT * FROM `tbl_account_staff`");
                                $sql->execute();
                                while($fetch = $sql->fetch()){
                            ?>
                                <option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['staff_name'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>

                        <button type="submit" class="btn btn-success ml-1"
                            name="add">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                </div>
        </div>

    </div>
</div>
</form>