<!-- Delete Modal -->
<div class="modal fade text-left" id="deleteModal<?php echo $fetch['id']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
            <form action="be/account/delete.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header bg-danger">
                        <h5 class="modal-title white" id="myModalLabel110">Delete Staff Account
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $fetch['id']?>">
                    <input type="hidden" name="staffImage" id="image" value="<?php echo $fetch['staff_image'] ?>">
                    <h5>Are you sure you want to delete this entry?</h5>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">No</span>
                        </button>

                        <button type="submit" class="btn btn-danger ml-1"
                            name="delete">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Yes</span>
                        </button>
                </div>
            </form>
        </div>
    </div>
</div>