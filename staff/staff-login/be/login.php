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

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(ISSET($_POST['login'])){
		$sql = $conn->prepare("SELECT * from `tbl_account_staff` where `staff_username` = '$username'");
		$sql->execute();

		if($fetch = $sql->fetch()){
			if(password_verify($password, $fetch['staff_password'])){
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
			}
			else{
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

		}
		else{
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
	}
?>