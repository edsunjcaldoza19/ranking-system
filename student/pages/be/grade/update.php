<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$gradeSubject = $_POST['gradeSubject'];
			$gradeStudent = $_POST['gradeStudent'];
			$grade = $_POST['grade'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_grade` SET `grade_subject_id`='$gradeSubject',
			`grade_stud_id`='$gradeStudent',`grade`='$grade'
			WHERE `id` = '$id'";
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
					title: "Record Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../class_grade.php?sy_id='.$_GET['sy_id'].'&&quarter_id='.$_GET['quarter_id'].'&&class_id='.$_GET['class_id'].'&&subject_id='.$_GET['subject_id'].'");

				});

			});

		</script>
	';
	}
?>