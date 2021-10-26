<!-- Update Modal -->
<div class="modal fade text-left" id="updateModal<?php echo $fetch['id']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
            <form action="be/grade/update.php?sy_id=<?php echo $_GET['sy_id'];?>&&quarter_id=<?php echo $_GET['quarter_id']; ?>&&class_id=<?php echo $_GET['class_id'];?>&&subject_id=<?php echo $_GET['subject_id'];?>" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel110">Update Student Record
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                    <div class="form-group">
                            <?php
                                //GET class ID using Get Method
                                $getClassID = $_GET['class_id'];
                                $getSubjectID = $_GET['subject_id'];
                            ?>
                            <input type="hidden" name="gradeSubject" value="<?php echo $getSubjectID ?>">
                            <label>Student Name</label>
                            <select class="form-select" name="gradeStudent">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sqlClass = $conn->prepare("SELECT *, tbl_populate_class.id FROM tbl_populate_class
                                LEFT JOIN tbl_student ON
                                tbl_student.id=tbl_populate_class.pop_stud_id
                                WHERE `pop_class_id` = $getClassID");
                                $sqlClass->execute();
                                while($fetchClass = $sqlClass->fetch()){
                            ?>
                                <option <?php if($fetch['grade_stud_id'] == $fetchClass['pop_stud_id'])
                                        {echo 'selected';}?> name="gradeStudent" value="<?php echo $fetchClass['pop_stud_id'] ?>"><?php echo $fetchClass['stud_name'] ?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Grade</label>
                            <input type="text" value="<?php echo $fetch['grade']; ?>" class="form-control" name="grade" placeholder="Enter Grade">
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