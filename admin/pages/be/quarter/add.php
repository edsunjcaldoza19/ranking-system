<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$quarter = $_POST['quarter'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_quarter(`q_quarter`)
            VALUES('$quarter')";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added new Quarter - $quarter";
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
					title: "Quarter Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../quarter.php");

				});

			});

		</script>
	';
	}
?>
