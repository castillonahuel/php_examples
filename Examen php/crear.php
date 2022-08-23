<?php
$server="localhost";
$user="root";
$pass="";
$db="db";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
echo "Conexion";
echo "<br>";
$sql="CREATE TABLE Camiones (id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, nom VARCHAR(50) NOT NULL, con VARCHAR(60) NOT NULL, pat VARCHAR(10) NOT NULL, year DATE NOT NULL, marc VARCHAR(20) NOT NULL)";
if ($conn-> query($sql) === TRUE){
	echo "Exito al crear la tabla";
}else{
	echo "Error" . $conn -> error;
}
$conn -> close();
?>