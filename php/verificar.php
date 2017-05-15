<?php
session_start();
include "../php/conexion.php";
$email = $_POST["email"];
$password = $_POST["password"];


	//Coneccion y consulta a la BD
$link = Conectarse();
$email = mysqli_real_escape_string($link,$email);
$pass = mysqli_real_escape_string($link,$password);
$query = "SELECT * FROM usuarios WHERE email= '$email' AND contrasena= '$password'";
$run_user = mysqli_query($link, $query);
$check_user = mysqli_num_rows($run_user);


	if($check_user>0){
		while ($row=mysqli_fetch_row($run_user)) {
			$tipo = $row[5];
		}	
		// Tipo 0 son Administradores
		//Tipo 1 son Usuarios
		if ($tipo == 1) {
			$_SESSION[‘email’]=$email;
			echo header("Location:../Principal_Administrador.php");
		}else{
			$_SESSION[‘email’]=$email;
			echo header("Location:../Principal_Usuarios.html");
		}
	}else{
			echo '<script type="text/javascript">
			alert("Contraseña o correo incorrecto");
			window.location.assign("../index.php");
			</script>';
	}
?>
