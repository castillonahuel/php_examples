<?php
$server="localhost";
$user="root";
$pass="";
$db="sistema";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida".$conn -> connect_error);
}
$sql="select id, nombre, apellido  usuarios";
$result=$conn -> query($sql);
$sql="INSERT INTO usuarios(nombre,apellido) VALUES ('Juan','Pedrozo')";
if($conn -> query($sql) === TRUE){
	echo "NUEVO REGISTRO";
}else{
	echo "ERROR" . $sql . "<br>" . $conn -> error;
}
$conn -> close();