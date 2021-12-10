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
		$sql = $conn->prepare("SELECT * from `tbl_student` where `stud_username` = '$username'");
		$sql->execute();

		if($fetch = $sql->fetch()){

			if(password_verify($password, $fetch['stud_password'])){

				$_SESSION['student_id'] = $fetch['id'];
                $_SESSION['student_username'] = $fetch['stud_username'];
                $_SESSION['student_password'] = $fetch['stud_password'];
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

			}else{

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