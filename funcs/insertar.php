<?php
	
	//servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	$host="localhost";
	$user="id22362038_rest_api_demo";
	$pass="Costamar393$";
	$DB="id22362038_rest_api_demo";
	$tabla1 = "items";
	
	$conexion = mysqli_connect($host,$user,$pass,$DB);

	if(mysqli_connect_errno()){
		echo "Error de conexión a Base de Datos : " . mysqli_connect_error();
		exit();
	} else { 
	    //echo "se conectó exitosamente";
	    
	};
	
	echo "<br>";

	$query = "INSERT INTO $tabla1 (`id`, `name`, `description`, `price`, `category_id`, `created` ) VALUES  (NULL,'$name','$description','$price','$category_id','$created')";
	$insertar = mysqli_query($conexion,$query);    
	
	?>
