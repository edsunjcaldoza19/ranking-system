<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $username = $_POST['username'];
            $password = $_POST['password'];
			$cPassword = $_POST['cPassword'];

			if($password == $cPassword){
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_account_admin` SET `admin_username`='$username',
            `admin_password`='$password',`admin_name`='$name',
            `admin_email`='$email',`admin_contact`='$contact',
            `admin_address`='$address' WHERE `id` = '$id'";
			$conn->exec($sql);

			echo '
			<script>

				$(document).ready(function(){

					Swal.fire({
						icon: "success",
						title: "Admin Account Successfully Updated",
						timer: 3000
					}).then(function(){

						window.location.replace("../../settings_account.php");

					});

				});

			</script>
		';

			 //Path Info for Profile Picture
			 $image=$_FILES['adminImage']['name'];
			 $extension = pathinfo($image, PATHINFO_EXTENSION);
			 $random=rand(0,100000);
			 $rename = 'IMG_ADMIN'.date('Ymd').$random;
			 $newname = $rename.'.'.$extension;
			 $target="../../../../images/admin/".$newname;
			 //Old Image
			 $oldImage = $_POST['oldImage'];

			 if($image != ""){
				 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				 $sql = "UPDATE `tbl_account_admin` SET `admin_image`='$newname' WHERE `id` = '$id'";
				 $conn->exec($sql);
				 if($oldImage != ""){
					if (unlink("../../../../images/admin/".$oldImage)) {
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
				 if(move_uploaded_file($_FILES['adminImage']['tmp_name'], $target)){
					 $msg="Image uploaded successfully";
				 }
			 }
			 else{
				 $msg="No Changes";
			 }
			}
			else{
				echo '
				<script>

					$(document).ready(function(){

						Swal.fire({
							icon: "error",
							title: "Password Mismatch",
							timer: 3000
						}).then(function(){

							window.location.replace("../../settings_account.php");

						});

					});

				</script>
			';
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;

	}
?>