<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$gradeSubject = $_POST['gradeSubject'];
			$gradeStudent = $_POST['gradeStudent'];
			$grade = $_POST['grade'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_grade`
			(`grade_subject_id`, `grade_stud_id`, `grade`)
			VALUES ('$gradeSubject','$gradeStudent','$grade')";
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
					title: "Student Grade Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../class_grade.php?sy_id='.$_GET['sy_id'].'&&quarter_id='.$_GET['quarter_id'].'&&class_id='.$_GET['class_id'].'&&subject_id='.$_GET['subject_id'].'");

				});

			});

		</script>
	';
	}
?>
