<?php
	session_start();
    if(!ISSET($_SESSION['staff_id'])){
		header('location:../index.php');
	}
?>