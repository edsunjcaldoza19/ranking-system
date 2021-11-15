<!-- Update Modal -->
<div class="modal fade text-left" id="view<?php echo $fetchAnnounce['id']?>" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel110" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
        role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                        <h5 class="modal-title white" id="myModalLabel110">Announcement Details
                        </h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $fetchAnnounce['id']?>">
                    <div class="form-group">
                            <label>Announcement Title</label>
                            <input type="text" value="<?php echo $fetchAnnounce['announce_title']; ?>" class="form-control" name="announceTitle" placeholder="Enter Announcement Title" disabled>
                        </div>
                        <div class="form-group">
                            <label>Announcement Details</label>
                            <textarea class="form-control" name="announceDetails" rows="10" placeholder="Enter Announcement Details" disabled><?php echo $fetchAnnounce['announce_details']; ?></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                </div>
        </div>
    </div>
</div>