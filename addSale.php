<?php 
    include("connection.php");
    $con= new connection();
    $conexion=$con->connect();
	$stockProduct =0;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="js/functions.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Add Producto to Sales</title>
</head>
<body>

<a href="product.php" class="btn btn-primary m-4">Back</a>
<div class="container mt-5 d-flex">
    <form action="" method="GET" id="frmVentasProductos" class="form-control d-flex flex-column w-25 m-auto">
    <label>Product</label>
			<select class="form-control input-sm" id="productoVenta" name="productoVenta">
				<option value="A">Selecciona</option>
				<?php
				$sql="SELECT id,
				name
				from products";
				$result=mysqli_query($conexion,$sql);

				while ($producto=mysqli_fetch_row($result)):
					?>
					<option value="<?php echo $producto[0] ?>"><?php echo $producto[1] ?></option>
				<?php endwhile; ?>
			</select>
            <label>Reference</label>
			<textarea readonly="" id="descripcionV" name="descripcionV" class="form-control input-sm"></textarea>
			<label>Stock</label>
			<input readonly="" type="text" class="form-control input-sm" id="cantidadV" name="cantidadV">
			<label>Price</label>
			<input readonly="" type="text" class="form-control input-sm" id="precioV" name="precioV">
			<p></p>
			<span class="btn btn-primary" id="btnAgregaVenta">Agregar</span>
    </form>
	<div class="col-sm-4">
		<div id="tablaVentasTempLoad"></div>
	</div>
</div>

<div class="container ml-4">
	
	<table class="table table-dark w-25 m-auto mt-5 mb-4" >
		<thead class="table-success table-striped" >
			<tr>
				<th>ID</th>
				<th>Product</th>
				<th>Price</th>
				<th>Date Sale</th>
			</tr>
		</thead>

		<tbody>
				<?php
				$sql="SELECT * FROM sales";
				$query=mysqli_query($conexion,$sql);
			
				$mysqli_result;
				$row=mysqli_fetch_array($query);
					while($row=mysqli_fetch_array($query)){
				?>
					<tr>
						<th><?php  echo $row['id']?></th>
						<th><?php  echo $row['id_product']?></th>
						<th><?php  echo $row['price']?></th>
						<th><?php  echo $row['date_sale']?></th>    
					</tr>
				<?php 
					}
				?>
		</tbody>
	</table>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		
		$('#tablaVentasTempLoad').load("tablaVentasTemp.php");
        
		$('#productoVenta').change(function(){
			$.ajax({
				type:"POST",
				data:"id=" + $('#productoVenta').val(),
				url:"llenarFormProducto.php",
				success:function(r){
					dato=jQuery.parseJSON(r);
					$('#descripcionV').val(dato['reference']);
					$('#cantidadV').val(dato['stock']);
					$('#precioV').val(dato['price']);
				}
			});
		});

		$('#btnAgregaVenta').click(function(){
			vacios=validarFormVacio('frmVentasProductos');
			stock = validateStockAvailable(dato['stock'])

			if(stock){
				if(vacios > 0){
					
					alert("Debes llenar todos los campos!!");
					return false;
				}

				datos=$('#frmVentasProductos').serialize();
				$.ajax({
					type:"POST",
					data:datos,
					url:"agregaProductoTemp.php",
					success:function(r){
						$('#tablaVentasTempLoad').load("tablaVentasTemp.php");
					}
				});
			}else{
				alert("No stock available");
			}
		});
});
</script>

<script type="text/javascript">
	function quitarP(index){
		$.ajax({
			type:"POST",
			data:"ind=" + index,
			url:"quitarproducto.php",
			success:function(r){
				$('#tablaVentasTempLoad').load("tablaVentasTemp.php");
				alert("Se quito el producto :D");
			}
		});
	}

	function crearVenta(){
		$.ajax({
			url:"crearVenta.php",
			success:function(r){
				if(r > 0){
					$('#frmVentasProductos')[0].reset();
					alert("Venta creada con exito!");
					location.reload();
				}else if(r==0){
					alert("No hay lista de venta!!");
				}else{
					error("No se pudo crear la venta");
				}
			}
		});
		alert("Venta creada con exito!");
		location.reload();
	}
</script>
    
</body>
</html>