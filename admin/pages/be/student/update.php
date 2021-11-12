<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
			$studIDNum = $_POST['studIDNum'];
			$studName = $_POST['studName'];
			$studSex = $_POST['studSex'];
			$studDateBirth = $_POST['studDateBirth'];
			$studAddress = $_POST['studAddress'];

			$studPassword = $_POST['studIDNum'];
			$studUsername = $_POST['studIDNum'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_student` SET `stud_id_num`='$studIDNum',
			`stud_name`='$studName',`stud_sex`='$studSex',
			`stud_date_birth`='$studDateBirth',`stud_address`='$studAddress',
			`stud_password` = '$studPassword', `stud_username` = '$studUsername'
			WHERE `id` = '$id'";
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
					title: "Student Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../student_info.php");

				});

			});

		</script>
	';
	}
?>