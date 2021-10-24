<?php
	include '../includes/head.php';
	session_start();
	session_destroy();
	echo '
					<script>
						$(document).ready(function(){
							Swal.fire({
								icon: "success",
								title: "Logged Out Successfully. We would be glad to have you back",
								timer: 3000
							}).then(function(){

								window.location.replace("../../../index.php");

							});

						});
					</script>
				';

?>