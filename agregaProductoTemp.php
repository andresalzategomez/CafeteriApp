<?php 
	session_start();
	require_once "connection.php";

	$con= new connection();
    $conexion=$con->connect();

	$idproducto=$_POST['productoVenta'];
	$descripcion=$_POST['descripcionV'];
	$cantidad=$_POST['cantidadV'];
	$precio=$_POST['precioV'];

	$sql="SELECT name 
			from products 
			where id='$idproducto'";
	$result=mysqli_query($conexion,$sql);

	$nombreproducto=mysqli_fetch_row($result)[0];

	$articulo=$idproducto."||".
				$nombreproducto."||".
				$descripcion."||".
				$precio."||".
				$cantidad."||";

	$_SESSION['tablaComprasTemp'][]=$articulo;

 ?>