<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['delete'])){
		try{
			$id = $_POST['id'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM `tbl_grade` WHERE `id` = '$id'";
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
					title: "Record Successfully Deleted",
					timer: 3000
				}).then(function(){

					window.location.replace("../../class_grade.php?sy_id='.$_GET['sy_id'].'&&quarter_id='.$_GET['quarter_id'].'&&class_id='.$_GET['class_id'].'&&subject_id='.$_GET['subject_id'].'");

				});

			});

		</script>
	';
	}
?>