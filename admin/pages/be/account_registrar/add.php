<?php
	include '../includes/head.php';
	require_once '../database/db_pdo.php';

	if(ISSET($_POST['add'])){
		try{
			$image=$_FILES['staffImage']['name'];

			if($image != ""){
				//Pathinfo ** Uploaded an image
				$extension = pathinfo($image, PATHINFO_EXTENSION);
				$random=rand(0,100000);
				$rename = 'IMG_REG'.date('Ymd').$random;
				$newname = $rename.'.'.$extension;
				$target="../../../../images/registrar/".$newname;

				 //Move to path
				 if(move_uploaded_file($_FILES['staffImage']['tmp_name'], $target)){
					$msg="Image uploaded successfully";
				}
			}else{
				$newname = "";
			}

			//Get Input Values
			$staffUsername = $_POST['staffUsername'];
            $staffPassword = password_hash($_POST['staffPassword'], PASSWORD_BCRYPT);
            $staffName = $_POST['staffName'];
            $staffSex = $_POST['staffSex'];
            $staffAddress = $_POST['staffAddress'];
            $staffDateBirth = $_POST['staffDateBirth'];
            $staffEmail = $_POST['staffEmail'];
            $staffContact = $_POST['staffContact'];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO `tbl_account_registrar`(`reg_image`, `reg_username`,
			`reg_password`, `reg_name`, `reg_sex`, `reg_address`, `reg_birth_date`,
			`reg_email`, `reg_contact`)
            VALUES ('$newname','$staffUsername','$staffPassword','$staffName',
            '$staffSex','$staffAddress','$staffDateBirth',
            '$staffEmail','$staffContact')";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added Registrar Account - $staffName";
			$timestamp = date('F j, Y, g:i:s A');

			$sqlLog = "INSERT INTO tbl_logs(`log_desc`, `log_ts`)
            VALUES('$logDesc', '$timestamp')";
			$conn->exec($sqlLog);

		}catch(PDOException $e){
			echo $e->getMessage();
		}
		$conn = null;
		echo '
		<script>

			$(document).ready(function(){

				Swal.fire({
					icon: "success",
					title: "Registrar Account Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../account_registrar_add.php");

				});

			});

		</script>
	';
	}
?>
