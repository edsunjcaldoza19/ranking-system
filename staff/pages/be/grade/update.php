<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$sectionName = $_POST['sectionName'];
			$sectionGradeLevel = $_POST['sectionGradeLevel'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_section`
            SET `s_name` = '$sectionName', `s_grade_level` = '$sectionGradeLevel' WHERE `id` = '$id'";
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
					title: "Section Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../section.php");

				});

			});

		</script>
	';
	}
?>