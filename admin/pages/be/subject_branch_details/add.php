<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$subjectMainID = $_POST['subjectMainID'];
			$subjectName = $_POST['subjectName'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_subject_branch_details(`sbranch_main_subject_id`, `sbranch_name`)
            VALUES('$subjectMainID', '$subjectName')";
			$conn->exec($sql);

			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added Subject Branch - $subjectName";
			$timestamp = date('F j, Y, g:i:s A');

			$sqlLog = "INSERT INTO tbl_logs(`log_desc`, `log_ts`)
            VALUES('$logDesc', '$timestamp')";
			$conn->exec($sqlLog);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Subject Branch Details Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../sbranch_details.php");

				});

			});

		</script>
	';
	}
?>
