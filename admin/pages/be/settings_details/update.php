<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
            $schoolName = $_POST['schoolName'];
            $schoolID = $_POST['schoolID'];
            $schoolAddress = $_POST['schoolAddress'];
            $schoolEmail = $_POST['schoolEmail'];
            $schoolContact = $_POST['schoolContact'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_school_details` SET `school_name`='$schoolName',
            `school_id`='$schoolID',`school_address`='$schoolAddress',
            `school_email`='$schoolEmail',`school_contact`='$schoolContact'
             WHERE `id` = '$id'";
			$conn->exec($sql);

			 //Path Info for Profile Picture
			 $image=$_FILES['schoolLogo']['name'];
			 $extension = pathinfo($image, PATHINFO_EXTENSION);
			 $random=rand(0,100000);
			 $rename = 'IMG_ADMIN'.date('Ymd').$random;
			 $newname = $rename.'.'.$extension;
			 $target="../../../../images/school/".$newname;
			 //Old Image
			 $oldImage = $_POST['oldImage'];

			 if($image != ""){
				 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $sql = "UPDATE `tbl_school_details` SET `school_logo`='$newname' WHERE `id` = '$id'";
				 $conn->exec($sql);
				 if($oldImage != ""){
					if (unlink("../../../../images/school/".$oldImage)) {
						$msg= "Deleted";
					}
					else {
						$msg ="Not Deleted";
					}
				 }
				 else{
					 $msg = "Proceed to Next Query";
				 }
				 //Move to path
				 if(move_uploaded_file($_FILES['schoolLogo']['tmp_name'], $target)){
					 $msg="Image uploaded successfully";
				 }
			 }
			 else{
				 $msg="No Changes";
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
					title: "School Details Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../settings_details.php");

				});

			});

		</script>
	';
	}
?>