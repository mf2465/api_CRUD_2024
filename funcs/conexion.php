<?php
	
	$mysqli=new mysqli("localhost","id22362038_rest_api_demo","","id22362038_rest_api_demo"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	

?>
