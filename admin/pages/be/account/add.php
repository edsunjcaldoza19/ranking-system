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
				$rename = 'IMG_STAFF'.date('Ymd').$random;
				$newname = $rename.'.'.$extension;
				$target="../../../../images/staff/".$newname;

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
			$sql = "INSERT INTO `tbl_account_staff`(`staff_image`, `staff_username`, `staff_password`,
            `staff_name`,`staff_sex`, `staff_address`, `staff_date_birth`,
            `staff_email`, `staff_contact`)
            VALUES ('$newname','$staffUsername','$staffPassword','$staffName',
            '$staffSex','$staffAddress','$staffDateBirth',
            '$staffEmail','$staffContact')";
			$conn->exec($sql);
			date_default_timezone_set('Asia/Taipei');
			$logDesc = "Added Staff Account - $staffName";
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
					title: "Staff Account Successfully Added",
					timer: 3000
				}).then(function(){

					window.location.replace("../../account_staff_add.php");

				});

			});

		</script>
	';
	}
?>
