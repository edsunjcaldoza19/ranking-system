<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$sectionName = $_POST['sectionName'];
			$sectionGradeLevel = $_POST['sectionGradeLevel'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_section(`s_name`, `s_grade_level`)
            VALUES('$sectionName', '$sectionGradeLevel')";
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
					title: "Section Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../section.php");

				});

			});

		</script>
	';
	}
?>
