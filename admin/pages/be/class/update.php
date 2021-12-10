<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$classSchoolYear = $_POST['classSchoolYear'];
			$classSection = $_POST['classSection'];
			$classAdviser = $_POST['classAdviser'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_class` SET `class_sy`='$classSchoolYear',
			`class_section`='$classSection',`class_adviser`='$classAdviser' WHERE `id` = '$id'";
			$conn->exec($sql);

			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Updated a Class";
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
					title: "Class Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../class.php");

				});

			});

		</script>
	';
	}
?>