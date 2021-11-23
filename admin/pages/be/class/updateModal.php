<!-- Update Modal -->
<div class="modal fade text-left" id="updateModal<?php echo $fetch['id']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
            <form action="be/class/update.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel110">Update Class
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                    <div class="form-group">
                            <label>School Year</label>
                            <select class="form-select" name="classSchoolYear">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sqlSY = $conn->prepare("SELECT * FROM `tbl_school_year` ORDER BY `sy_school_year` ASC");
                                $sqlSY->execute();
                                while($fetchSY = $sqlSY->fetch()){
                            ?>
                                <option <?php if($fetch['class_sy'] == $fetchSY['id']){echo 'selected';}?>
                                value="<?php echo $fetchSY['id'] ?>"
                                >
                                    <?php echo $fetchSY['sy_school_year'] ?>
                                </option>
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
                                $sqlSection = $conn->prepare("SELECT *, tbl_section.id FROM tbl_section
                                LEFT JOIN tbl_grade_level ON
                                tbl_grade_level.id=tbl_section.s_grade_level
                                ORDER BY `gl_grade_level` ASC");
                                $sqlSection->execute();
                                while($fetchSection = $sqlSection->fetch()){
                            ?>
                                <option
                                <?php if($fetch['class_section'] == $fetchSection['id']){echo 'selected';}?>
                                value="<?php echo $fetchSection['id'] ?>"><?php
                                echo $fetchSection['s_name'];
                                echo " - ";
                                echo $fetchSection['gl_grade_level'];
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
                                $sqlStaff = $conn->prepare("SELECT * FROM `tbl_account_staff`");
                                $sqlStaff->execute();
                                while($fetchStaff = $sqlStaff->fetch()){
                            ?>
                                <option
                                    <?php if($fetch['class_adviser'] == $fetchStaff['id']){echo 'selected';}?>
                                    value="<?php echo $fetchStaff['id'] ?>"><?php echo $fetchStaff['staff_name'] ?>
                                </option>
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

                        <button type="submit" class="btn btn-primary ml-1"
                            name="update">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>