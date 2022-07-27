<?php 
    include("connection.php");
    $con= new connection();
    $conexion=$con->connect();

    $sql="SELECT * FROM products";
    $query=mysqli_query($conexion,$sql);

    $mysqli_result;
    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Product</title>
</head>
<body>

<div class="container mt-5">
                    <div class="row"> 
                    <a href="addSale.php" class="btn btn-primary mb-4">Sales</a>
                        <div class="col-md-3">
                            <h1>Insert Product</h1>
                                <form action="insert.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="name" placeholder="Name">
                                    <input type="text" class="form-control mb-3" name="reference" placeholder="Reference">
                                    <input type="text" class="form-control mb-3" name="price" placeholder="Price">
                                    <input type="text" class="form-control mb-3" name="weight" placeholder="Weight">
                                    <input type="text" class="form-control mb-3" name="category" placeholder="Category">
                                    <input type="text" class="form-control mb-3" name="stock" placeholder="Stock">
                                    <input id="date_creation" name="date_creation" class="form-control" type="date" />
                                    <input type="submit" class="btn btn-primary mt-3">
                                </form>
                        </div>

                        <div class="col-md-8 mx-auto">
                            <table class="table table-dark" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Reference</th>
                                        <th>Price</th>
                                        <th>Weight</th>
                                        <th>Category</th>
                                        <th>Stock</th>
                                        <th>Date Creation</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                        <?php
                                            while($row=mysqli_fetch_array($query)){
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['id']?></th>
                                                <th><?php  echo $row['name']?></th>
                                                <th><?php  echo $row['reference']?></th>
                                                <th><?php  echo $row['price']?></th>    
                                                <th><?php  echo $row['weight']?></th>    
                                                <th><?php  echo $row['category']?></th>    
                                                <th><?php  echo $row['stock']?></th>    
                                                <th><?php  echo $row['date_creation']?></th>    
                                                <th><a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Edit</a></th>
                                                <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">X</a></th>                                        
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
</body>
</html>