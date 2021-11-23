<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$subjectMainID = $_POST['subjectMainID'];
			$subjectName = $_POST['subjectName'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_subject_branch_details`
            SET `sbranch_main_subject_id` = '$subjectMainID', `sbranch_name` = '$subjectName' WHERE `id` = '$id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Subject Branch Details Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../sbranch_details.php");

				});

			});

		</script>
	';
	}
?>