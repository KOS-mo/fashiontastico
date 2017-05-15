
<?php

	include ("../conexion.php");
	$producto = $_POST["producto"];
	$id = $_POST["id"];
	$link = Conectarse();

	$query ="DELETE FROM productos WHERE productos.id_producto = '$id'";
	$result=mysqli_query($link,$query);
	
	if($result){
			echo '<script type="text/javascript">
			alert("Producto Eliminado Correctamente");
			window.location.assign("../../Productos.php");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al eliminar de la  Base de Datos");
			window.location.assign("../../Productos.php");
			</script>';
	}
?>