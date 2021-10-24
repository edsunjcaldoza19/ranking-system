<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$gradeLevel = $_POST['gradeLevel'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_grade_level`
            SET `gl_grade_level` = '$gradeLevel' WHERE `id` = '$id'";
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
					title: "Grade Level Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../grade_level.php");

				});

			});

		</script>
	';
	}
?>