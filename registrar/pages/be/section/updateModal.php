<!-- Update Modal -->
<div class="modal fade text-left" id="updateModal<?php echo $fetch['id']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
            <form action="be/section/update.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel110">Update Section
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                        <div class="form-group">
                            <label>Section Name</label>
                            <input type="text" value="<?php echo $fetch['s_name']; ?>" class="form-control" name="sectionName" placeholder="Enter Section Name">
                        </div>
                        <div class="form-group">
                            <label>Grade Level</label>
                            <select class="form-select" name="sectionGradeLevel">
                            <?php
                                require 'be/database/db_pdo.php';
                                $sqlGradeLevel = $conn->prepare("SELECT * FROM `tbl_grade_level` ORDER BY `gl_grade_level` ASC");
                                $sqlGradeLevel->execute();
                                while($fetchGradeLevel = $sqlGradeLevel->fetch()){
                            ?>
                                <option name="sectionGradeLevel" value="<?php echo $fetchGradeLevel['id']; ?>"
                                    <?php
                                        if($fetch['gl_grade_level'] == $fetchGradeLevel['gl_grade_level']){
                                            echo 'selected';
                                        }
                                    ?>
                                ><?php echo $fetchGradeLevel['gl_grade_level'] ?></option>
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