<?php

class ventas{
	public function obtenDatosProducto($idProduct){
		$c=new connection();
		$conexion=$c->connect();

		$sql = "SELECT
				    name,
				    reference,
				    price,
				    stock
				FROM
				products
				WHERE
				    id = '$idProduct'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$data=array(
			'name' => $ver[0],
			'reference' => $ver[1],
			'price' => $ver[2],
			'stock' => $ver[3]
		);
		return $data;
	}

	public function crearVenta($stock){
		$c=new connection();
		$conexion=$c->connect();

		$fecha=date('Y-m-d');
		$datos=$_SESSION['tablaComprasTemp'];
		
		$r=0;

		for ($i=0; $i < count($datos) ; $i++) {
			$d=explode("||", $datos[$i]);

			$sql = "SELECT stock FROM products WHERE id = '$d[0]'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		$stock= $ver[0]-1;

			$sql="INSERT into sales (id_product,
										price,
										date_sale)
							values ('$d[0]',
									'$d[3]',
									'$fecha')";
			$r=$r + $result=mysqli_query($conexion,$sql);

			$sql="UPDATE products SET stock = '$stock'
							WHERE id = '$d[0]'";
			$result=mysqli_query($conexion,$sql);
		}

		return $r;
	}



	public function nombreCliente($idCliente){
		$c= new conectar();
		$conexion=$c->conexion();

		 $sql="SELECT apellido,nombre
			from clientes
			where id_cliente='$idCliente'";
		$result=mysqli_query($conexion,$sql);

		$ver=mysqli_fetch_row($result);

		return $ver[0]." ".$ver[1];
	}

	public function obtenerTotal($idventa){
		$c= new conectar();
		$conexion=$c->conexion();

		$sql="SELECT precio
				from ventas
				where id_venta='$idventa'";
		$result=mysqli_query($conexion,$sql);

		$total=0;

		while($ver=mysqli_fetch_row($result)){
			$total=$total + $ver[0];
		}

		return $total;
	}
}

?>