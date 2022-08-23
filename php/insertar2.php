<?php 
$_usr=$_POST['usr'];
$_pswrd=$_POST['pswrd'];
$server="localhost";
$user="root";
$pass="";
$db="sistema";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
$sql="SELECT id, usr, pass FROM usuarios";
$result = $conn -> query($sql);
$sql="INSERT INTO usuarios(usr,pass) VALUES ('" . $_usr . "','" .  $_pswrd . "')";
if($conn -> query($sql) === TRUE){
	echo "NUEVO REGISTRO";
}else{
	echo "ERROR" . $sql . "<br>" . $conn -> error;
}
$conn -> close();
?> 