<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$gradeLevel = $_POST['gradeLevel'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_grade_level(`gl_grade_level`)
            VALUES('$gradeLevel')";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added Grade Level - $gradeLevel";
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
					title: "Grade Level Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../grade_level.php");

				});

			});

		</script>
	';
	}
?>
