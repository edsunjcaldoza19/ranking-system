<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
            $name = $_POST['name'];
            $sex = $_POST['sex'];
            $date_birth = $_POST['date_birth'];
            $address = $_POST['address'];

            $username = $_POST['username'];
            $password = $_POST['password'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_student` SET `stud_name`='$name',`stud_sex`='$sex',
            `stud_date_birth`='$date_birth',`stud_address`='$address',`stud_username`='$username',
            `stud_password`='$password' WHERE `id` = $id";
			$conn->exec($sql);

			 //Path Info for Profile Picture
			 $image=$_FILES['studImage']['name'];
			 $extension = pathinfo($image, PATHINFO_EXTENSION);
			 $random=rand(0,100000);
			 $rename = 'IMG_STUDENT'.date('Ymd').$random;
			 $newname = $rename.'.'.$extension;
			 $target="../../../../images/student/".$newname;
			 //Old Image
			 $oldImage = $_POST['oldImage'];

			 if($image != ""){
				 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $sql = "UPDATE `tbl_student` SET `stud_img`='$newname' WHERE `id` = '$id'";
				 $conn->exec($sql);
				 if($oldImage != ""){
					if (unlink("../../../../images/student/".$oldImage)) {
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
				 if(move_uploaded_file($_FILES['studImage']['tmp_name'], $target)){
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
					title: "Admin Account Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../account_settings.php");

				});

			});

		</script>
	';
	}
?>