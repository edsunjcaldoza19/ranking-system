<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['update'])){
		try{
			$id = $_POST['staffID'];
			$staffUsername = $_POST['staffUsername'];
            $staffPassword = password_hash($_POST['staffPassword'], PASSWORD_BCRYPT);
            $staffName = $_POST['staffName'];
            $staffSex = $_POST['staffSex'];
            $staffAddress = $_POST['staffAddress'];
            $staffDateBirth = $_POST['staffDateBirth'];
            $staffEmail = $_POST['staffEmail'];
            $staffContact = $_POST['staffContact'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `tbl_account_registrar` SET `reg_username`='$staffUsername',
            `reg_password`='$staffPassword',
            `reg_name`='$staffName',`reg_sex`='$staffSex',
            `reg_address`='$staffAddress',`reg_birth_date`='$staffDateBirth',
            `reg_email`='$staffEmail',`reg_contact`='$staffContact' WHERE `id` = '$id'";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Updated Registrar Account - $staffName";
			$timestamp = date('F j, Y, g:i:s A');

			$sqlLog = "INSERT INTO tbl_logs(`log_desc`, `log_ts`)
            VALUES('$logDesc', '$timestamp')";
			$conn->exec($sqlLog);

            //pathinfo
			$image=$_FILES['staffImage']['name'];
			$extension = pathinfo($image, PATHINFO_EXTENSION);
			$random=rand(0,100000);
			$rename = 'IMG_REG'.date('Ymd').$random;
			$newname = $rename.'.'.$extension;
			$target="../../../../images/registrar/".$newname;
			//old Image
			$oldImage = $_POST['oldImage'];

			if($image != ""){
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "UPDATE `tbl_account_registrar` SET `reg_image`='$newname' WHERE `id` = '$id'";
				$conn->exec($sql);

				if (unlink("../../../../images/registrar/".$oldImage)) {
					$msg= "Deleted";
				}
				else {
					$msg ="Not Deleted";
				}
				//Move to path
				if(move_uploaded_file($_FILES['staffImage']['tmp_name'], $target)){
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
					title: "Registrar Account Successfully Updated",
					timer: 3000
				}).then(function(){

					window.location.replace("../../settings_account.php");

				});

			});

		</script>
	';
	}
?>