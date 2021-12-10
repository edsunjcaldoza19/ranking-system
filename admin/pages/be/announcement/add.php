<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';
	date_default_timezone_set('Asia/Taipei');

	if(ISSET($_POST['add'])){
		try{
			$announceTitle = $_POST['announceTitle'];
			$announceDetails = $_POST['announceDetails'];
			$timestamp = date('F j, Y, g:i:s A');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_announcement(`announce_title`, `announce_details`, `announce_created_at`)
            VALUES('$announceTitle', '$announceDetails', '$timestamp')";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added Annouuncement";
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
					title: "Announcement Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../announcement.php");

				});

			});

		</script>
	';
	}
?>
