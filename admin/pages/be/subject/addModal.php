    <!-- Add Modal -->
    <form action="be/subject/add.php?sy_id=<?php echo $_GET['sy_id'];?>&&class_id=<?php echo $_GET['class_id'];?>&&quarter_id=<?php echo $_GET['quarter_id'];?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Add Subject
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <?php
                                $getClassID = $_GET['class_id'];
                                $getQuarterID = $_GET['quarter_id'];
                            ?>
                            <input type="hidden" value="<?php echo $getClassID ?>" name="subjectClass">
                            <input type="hidden" value="<?php echo $getQuarterID ?>" name="subjectQuarter">
                            <label>Subject</label>
                            <select class="form-select" name="subjectName">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sql = $conn->prepare("SELECT * FROM `tbl_subject_details`");
                                $sql->execute();
                                while($fetch = $sql->fetch()){
                            ?>
                                <option value="<?php echo $fetch['id'] ?>"><?php echo $fetch['subject_name'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Subject Teacher</label>
                            <select class="form-select" name="subjectTeacher">
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