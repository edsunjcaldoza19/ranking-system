    <!-- Add Modal -->
    <form action="be/subject_branch_details/add.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Add Subject Details
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Main Subject</label>
                                <select class="form-select" name="subjectMainID">
                                <?php
                                    require 'be/database/db_pdo.php';
                                    $sql = $conn->prepare("SELECT * FROM `tbl_subject_details`");
                                    $sql->execute();
                                    while($fetch = $sql->fetch()){
                                ?>
                                    <option name="subjectMainID" value="<?php echo $fetch['id'] ?>"><?php echo $fetch['subject_name'] ?></option>
                                <?php
                                    }
                                ?>
                                </select>
                            </div>
                            <label>Branch Name</label>
                            <input type="text" class="form-control" name="subjectName" placeholder="Enter Subject Name">
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