<?php
	$server="localhost";
	$username="root";
	$password="";
	$db='fashiontastico';
	$con=mysqli_connect($server,$username,$password,$db)or die("no se ha podido establecer la conexion");
	$sdb=mysqli_select_db($con,$db)or die("la base de datos no existe");
	//$sdb=mysqli_select_db($db)or die("la base de datos no existe");
?>