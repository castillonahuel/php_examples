<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>
<?php
$u= $_GET['u'];
$server="localhost";
$user="root";
$pass="";
$db="sistema";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
$sql="SELECT * FROM usuarios WHERE usr='". $u ."'";
$result = $conn -> query($sql);
if($result->num_rows > 0){
	echo "Logueado";
}else{
	echo "No existe el usuario";
}
$conn -> close();
?>