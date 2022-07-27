<?php
include("connection.php");
$con= new connection();
$conexion=$con->connect();

$name=$_POST['name'];
$reference=$_POST['reference'];
$price=$_POST['price'];
$weight=$_POST['weight'];
$category=$_POST['category'];
$stock=$_POST['stock'];
$date_creation=$_POST['date_creation'];


$sql="INSERT INTO products (name, reference, price, weight, category, stock, date_creation) VALUES('$name','$reference','$price','$weight','$category','$stock','$date_creation')";
$query= mysqli_query($conexion,$sql);

if($query){
    Header("Location: product.php");
    
}else {
    echo "No se pudo insertar";
    echo $query->error;
}
?>