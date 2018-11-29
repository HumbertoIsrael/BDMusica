<?php
	session_start();
	if(isset($_SESSION['modo'])){
		if($_SESSION['modo'] == 'administracion'){
			session_unset();
			session_destroy();
		}
	} 
	header("Location:index.php");
?>