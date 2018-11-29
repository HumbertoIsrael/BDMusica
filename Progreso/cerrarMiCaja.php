<?php
	session_start();
	if(isset($_SESSION['cajero'])){
		unset($_SESSION['cajero']);
		header("Location:index.php");
	} 
?>	