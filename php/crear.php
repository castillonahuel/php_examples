<?php
$server="localhost";
$user="root";
$pass="";
$db="sistema";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
echo "Conexion";
echo "<br>";
$sql="CREATE TABLE usuarios (id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, usr VARCHAR(30) NOT NULL, pass VARCHAR(30) NOT NULL)";
if ($conn-> query($sql) === TRUE){
	echo "Exito al crear la tabla";
}else{
	echo "Error" . $conn -> error;
}
$conn -> close();
?>