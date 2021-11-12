<!-- Update Modal -->
<div class="modal fade text-left" id="updateModal<?php echo $fetch['id']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
            <form action="be/subject/update.php?sy_id=<?php echo $_GET['sy_id'];?>&&class_id=<?php echo $_GET['class_id'];?>&&quarter_id=<?php echo $_GET['quarter_id'];?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel110">Update School Year
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                    <div class="form-group">
                    <label>Subject Name</label>
                            <select class="form-select" name="subjectName">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sqlSubject = $conn->prepare("SELECT * FROM `tbl_subject_details`");
                                $sqlSubject->execute();
                                while($fetchSubject = $sqlSubject->fetch()){
                            ?>
                                <option value="<?php echo $fetchSubject['id'] ?>"><?php echo $fetchSubject['subject_name'] ?></option>
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
                                $sqlTeacher = $conn->prepare("SELECT * FROM `tbl_account_staff`");
                                $sqlTeacher->execute();
                                while($fetchTeacher = $sqlTeacher->fetch()){
                            ?>
                                <option value="<?php echo $fetchTeacher['id'] ?>"><?php echo $fetchTeacher['staff_name'] ?></option>
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