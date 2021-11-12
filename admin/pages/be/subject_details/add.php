<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$subjectName = $_POST['subjectName'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO tbl_subject_details(`subject_name`)
            VALUES('$subjectName')";
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
					title: "Subject Details Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../subject_details.php");

				});

			});

		</script>
	';
	}
?>
