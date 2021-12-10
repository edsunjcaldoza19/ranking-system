<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['delete'])){
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM `tbl_logs` WHERE id != ''";
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
					title: "Logs Successfully Deleted",
					timer: 3000
				}).then(function(){

					window.location.replace("../../logs.php");

				});

			});

		</script>
	';
	}
?>