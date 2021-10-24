<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['delete'])){
		try{
			$id = $_POST['id'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM `tbl_populate_class` WHERE `id` = '$id'";
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
					title: "Student Successfully Deleted",
					timer: 3000
				}).then(function(){

					window.location.replace("../../populate_class_student.php?sy_id='.$_GET['sy_id'].'&&class_id='.$_GET['class_id'].'");

				});

			});

		</script>
	';
	}
?>