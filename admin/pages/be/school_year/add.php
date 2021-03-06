<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$schoolYear = $_POST['schoolYear'];
			$syStatus = $_POST['syStatus'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_school_year(`sy_school_year`, `sy_status`)
            VALUES('$schoolYear', '$syStatus')";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added School Year - $schoolYear";
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
					title: "School Year Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../school_year.php");

				});

			});

		</script>
	';
	}
?>
