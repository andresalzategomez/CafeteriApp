<?php 
	
	require_once "connection.php";
	require_once "clases/Ventas.php";

	$obj= new ventas();
	
	echo json_encode($obj->obtenDatosProducto($_POST['id']))

 ?>