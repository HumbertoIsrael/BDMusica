<?php
	session_start();
	include("./configBD.php");
	if (isset($_SESSION['modo'])) {
	
			$rfc = $_POST['rfc'];


			$sql = "select * from cajero where rfc = '$rfc';";
			$res = mysqli_query($conexion, $sql);
			$hay = mysqli_num_rows($res);

			echo $hay;

			if($hay == 1){
				$_SESSION['cajero'] = $rfc;
			} else {
				echo 'no hay :v';
			}
		
	}

?>
