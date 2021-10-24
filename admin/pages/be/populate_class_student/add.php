<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$popClass = $_POST['popClass'];
			$popStudent = $_POST['popStudent'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_populate_class`(`pop_class_id`, `pop_stud_id`)
			VALUES ('$popClass','$popStudent')";
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
					title: "Student Successfully Added to Class",
					timer: 3000
				}).then(function(){

					window.location.replace("../../populate_class_student.php?sy_id='.$_GET['sy_id'].'&&class_id='.$_GET['class_id'].'");

				});

			});

		</script>
	';

	};

?>
