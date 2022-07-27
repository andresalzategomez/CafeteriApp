<?php

include("connection.php");
$con= new connection();
$conexion=$con->connect();

$id=$_POST['id'];
$name=$_POST['name'];
$reference=$_POST['reference'];
$price=$_POST['price'];
$weight=$_POST['weight'];
$category=$_POST['category'];
$stock=$_POST['stock'];
$date_creation=$_POST['date_creation'];

$sql="UPDATE products SET  name='$name',reference='$reference',price='$price',weight='$weight',category='$category',stock='$stock',date_creation='$date_creation' WHERE id='$id'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: product.php");
    }
?>