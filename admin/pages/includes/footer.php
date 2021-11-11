    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
            <?php
                $sqlDetails = $conn->prepare("SELECT * FROM tbl_school_details");
                $sqlDetails->execute();
                $fetchDetails = $sqlDetails->fetch();
            ?>
                <p>2021 &copy; <?php echo $fetchDetails['school_name']; ?> - <?php echo $fetchDetails['school_address']; ?></p>
            </div>
            <div class="float-end">
                <p>Ranking System</p>
            </div>
        </div>
    </footer>