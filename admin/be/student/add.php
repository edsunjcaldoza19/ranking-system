<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$studIDNum = $_POST['studIDNum'];
			$studName = $_POST['studName'];
			$studSex = $_POST['studSex'];
			$studDateBirth = $_POST['studDateBirth'];
			$studAddress = $_POST['studAddress'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_student`(`stud_id_num`,
			`stud_name`, `stud_sex`, `stud_date_birth`, `stud_address`)
			VALUES ('$studIDNum','$studName','$studSex','$studDateBirth',
			'$studAddress')";
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
					title: "Student Information Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../student.php");

				});

			});

		</script>
	';
	}
?>
