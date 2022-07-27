<?php

include("connection.php");
$con= new connection();
$conexion=$con->connect();

$id=$_GET['id'];

$sql="DELETE FROM products WHERE id='$id'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: product.php");
    }
?>