<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$subjectClass = $_POST['subjectClass'];
			$subjectQuarter = $_POST['subjectQuarter'];
			$subjectName = $_POST['subjectName'];
			$subjectTeacher = $_POST['subjectTeacher'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_subject_branch`
			(`sbranch_class_id`, `sbranch_quarter_id`,
			`sbranch_subject_id`, `sbranch_teacher`)
			VALUES ('$subjectClass','$subjectQuarter','$subjectName','$subjectTeacher')";
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
					title: "Subject Branch Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../sbranch_add.php?sy_id='.$_GET['sy_id'].'&&class_id='.$_GET['class_id'].'&&quarter_id='.$_GET['quarter_id'].'");

				});

			});

		</script>
	';
	}
?>
