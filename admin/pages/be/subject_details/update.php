<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$subjectName = $_POST['subjectName'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_subject_details`
            SET `subject_name` = '$subjectName' WHERE `id` = '$id'";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Updated Subject - $subjectName";
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
					title: "Subject Details Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../subject_details.php");

				});

			});

		</script>
	';
	}
?>