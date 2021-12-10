<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';


	if(ISSET($_POST['add'])){
		try{
			$classSchoolYear = $_POST['classSchoolYear'];
			$classSection = $_POST['classSection'];
			$classAdviser = $_POST['classAdviser'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_class(`class_sy`, `class_section`, `class_adviser`)
            VALUES('$classSchoolYear', '$classSection', '$classAdviser')";
			$conn->exec($sql);

			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added new Class";
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
					title: "Class Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../class.php");

				});

			});

		</script>
	';
	}
?>
