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
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Deleted A Staff Account";
			$timestamp = date('F j, Y, g:i:s A');

			$sqlLog = "INSERT INTO tbl_logs(`log_desc`, `log_ts`)
            VALUES('$logDesc', '$timestamp')";
			$conn->exec($sqlLog);

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