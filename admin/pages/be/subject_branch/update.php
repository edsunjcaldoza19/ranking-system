<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$subjectName = $_POST['subjectName'];
			$subjectTeacher = $_POST['subjectTeacher'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_subject_branch`
			SET `sbranch_subject_id`='$subjectName',`sbranch_teacher`='$subjectTeacher' WHERE `id` = '$id'";
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
					title: "Subject Branch Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../sbranch_add.php?sy_id='.$_GET['sy_id'].'&&class_id='.$_GET['class_id'].'&&quarter_id='.$_GET['quarter_id'].'");

				});

			});

		</script>
	';
	}
?>