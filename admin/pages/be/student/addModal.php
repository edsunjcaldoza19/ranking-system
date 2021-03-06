    <!-- Add Modal -->
    <form action="be/student/add.php" method="POST" enctype="multipart/form-data">
    <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                        <h5 class="modal-title white" id="myModalLabel110">Add Student Information
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label>Student ID Number LRN</label>
                            <input type="number" class="form-control" name="studIDNum" placeholder="Enter Student Number" max="12">
                        </div>
                        <div class="form-group">
                            <label>Student Name</label>
                            <input type="text" class="form-control" name="studName" placeholder="Enter Student Name">
                            <small>Last Name, First Name, Middle Initial</small>
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-select" name="studSex">
                                <option name="studSex" value="Male">Male</option>
                                <option name="studSex" value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" class="form-control" name="studDateBirth" placeholder="Date of Birth">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="studAddress" placeholder="Enter Address">
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