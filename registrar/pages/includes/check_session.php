<?php
	session_start();
    if(!ISSET($_SESSION['reg_id'])){
		header('location:../index.php');
	}
?>