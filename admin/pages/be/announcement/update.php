<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$announceTitle = $_POST['announceTitle'];
			$announceDetails = $_POST['announceDetails'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_announcement` SET `announce_title` = '$announceTitle',
			`announce_details` = '$announceDetails' WHERE `id` = '$id'";
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
					title: "Announcement Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../announcement.php");

				});

			});

		</script>
	';
	}
?>