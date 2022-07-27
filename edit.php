<?php 
    include("connection.php");
    $con= new connection();
    $conexion=$con->connect();

$id=$_GET['id'];

$sql="SELECT * FROM products WHERE id='$id'";
$query=mysqli_query($conexion,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                

                                <input type="text" class="form-control mb-3" name="name" placeholder="Name" value="<?php echo $row['name']?>">
                                <input type="text" class="form-control mb-3" name="reference" placeholder="Reference" value="<?php echo $row['reference']?>">
                                <input type="text" class="form-control mb-3" name="price" placeholder="Price" value="<?php echo $row['price']?>">
                                <input type="text" class="form-control mb-3" name="weight" placeholder="Weight" value="<?php echo $row['weight']?>">
                                <input type="text" class="form-control mb-3" name="category" placeholder="Category" value="<?php echo $row['category']?>">
                                <input type="text" class="form-control mb-3" name="stock" placeholder="Stock" value="<?php echo $row['stock']?>">
                                <input id="date_creation" name="date_creation" class="form-control" type="date" value="<?php echo $row['date_creation']?>" />

                                <!-- <input type="text" class="form-control mb-3" name="dni" placeholder="Dni" value="<?php echo $row['dni']  ?>">
                                <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?php echo $row['nombres']  ?>">
                                <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos" value="<?php echo $row['apellidos']  ?>"> -->
                                
                            <input type="submit" class="btn btn-primary btn-block" value="Update">
                    </form>
                    
                </div>
    </body>
</html>