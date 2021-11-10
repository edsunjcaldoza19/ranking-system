<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['delete'])){
		try{
			$id = $_POST['id'];
			$staffImage = $_POST['staffImage'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "DELETE FROM `tbl_account_staff` WHERE `id` = '$id'";
			$conn->exec($sql);

			if($staffImage != ""){
				if (unlink("../../../../images/staff/".$staffImage)) {
					$msg= "Deleted";
				}
				else {
					$msg ="Not Deleted";
				}
			}
			else{
				$msg ="File not Found";
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Account Successfully Deleted",
					timer: 3000
				}).then(function(){

					window.location.replace("../../account_staff.php");

				});

			});

		</script>
	';
	}
?>