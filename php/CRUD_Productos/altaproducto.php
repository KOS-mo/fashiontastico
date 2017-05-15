<?php
include ("../conexion.php");
	$producto = $_POST["producto"];
	$descripcion = $_POST["descripcion"];
	$precio = $_POST["precio"];
	$talla = $_POST["talla"];
	$foto=$_FILES["file-input"]["name"];
	$ruta=$_FILES["file-input"]["tmp_name"];
	$destino="../../fotos/".$foto;

	copy($ruta,$destino);

	$link = Conectarse();

	$query = "INSERT INTO productos (producto,descripcion,imagen,precio,talla) VALUES ('$producto','$descripcion','$foto','$precio','$talla')";

	$result=mysqli_query($link,$query);
 
	if($result){
			echo '<script type="text/javascript">
			alert("Agregado Correctamente");
			window.location.assign("../../Agregar_Producto.php");
			</script>';
	}else{
		echo '<script type="text/javascript">
			alert("Error al agregar a la Base de Datos");
			window.location.assign("../../Agregar_Producto.php");
			</script>';
	}
?>