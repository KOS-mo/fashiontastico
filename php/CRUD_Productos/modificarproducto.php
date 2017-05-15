<?php
	include ("../conexion.php");
	$producto = $_POST["producto"];
	$id = $_POST["id"];
	$precio = $_POST["precio"];
	$descripcion = $_POST["descripcion"];
	$talla = $_POST["talla"];

	$link = Conectarse();
	$query = "UPDATE productos SET producto= '$producto', precio ='$precio', descripcion='$descripcion', talla= '$talla' WHERE productos.id_producto='$id'";

	$result=mysqli_query($link,$query);

	if($result){
			echo '<script type="text/javascript">
			alert("Valores Modificados Correctamente");
			window.location.assign("../../Productos.php");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al modificar en la Base de Datos");
			window.location.assign("../../Productos.php");
			</script>';

	}
?>