<?php
	include '../includes/head.php';
	session_start();


	/* PDO DB connection configuration */

	$db_username = 'root';
	$db_password = '';

	$conn = new PDO( 'mysql:host=localhost;dbname=htc-rank', $db_username, $db_password );

	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}

	if(ISSET($_POST['login'])){
		if($_POST['email'] != "" || $_POST['password'] != ""){
			$email = $_POST['email'];
			// md5 encrypted
			// $password = md5($_POST['password']);
			$password = $_POST['password'];
			$sql = "SELECT * FROM `tbl_account_staff` WHERE `staff_username`=? AND `staff_password`=? ";
			$query = $conn->prepare($sql);
			$query->execute(array($email,$password));
			$row = $query->rowCount();
			$fetch = $query->fetch();
			if($row > 0) {
				$_SESSION['staff_id'] = $fetch['id'];
                $_SESSION['staff_username'] = $fetch['staff_username'];
                $_SESSION['staff_password'] = $fetch['staff_password'];
				echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "success",
								title: "Login Successful. Please Wait...",
								text: "Holy Trinity College - Ranking System",
								timer: 3000,
								showConfirmButton: false
							}).then(function(){

								window.location.replace("../../pages/home.php");

							});

						});
					</script>
				';
			} else{
				echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "error",
								title: "Invalid User Credentials Please Login Again",
								timer: 2000
							}).then(function(){

								window.location.replace("../index.php");

							});

						});
					</script>
				';
			}
		}else{
			echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "error",
								title: "Please input username and Password First",
								timer: 2000
							}).then(function(){

								window.location.replace("../index.php");

							});

						});
					</script>
				';
		}
	}
?>