<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$schoolYear = $_POST['schoolYear'];
			$syStatus = $_POST['syStatus'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_school_year` SET `sy_school_year` = '$schoolYear',
			`sy_status` = '$syStatus' WHERE `id` = '$id'";
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
					title: "School Year Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../school_year.php");

				});

			});

		</script>
	';
	}
?>