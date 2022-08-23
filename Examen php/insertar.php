<?php 
$_nom=$_POST['nom'];
$_con=$_POST['con'];
$_pat=$_POST['pat'];
$_year=$_POST['year'];
$_marc=$_POST['marc'];
$server="localhost";
$user="root";
$pass="";
$db="db";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
$sql="SELECT id, nom, con, pat, year, marc FROM camiones";
$result = $conn -> query($sql);
$sql="INSERT INTO camiones(nom, con, pat, year, marc) VALUES ('" . $_nom . "','" .  $_con . "','" .  $_pat . "','" .  $_year . "','" .  $_marc . "')";
if($conn -> query($sql) === TRUE){
	echo "NUEVO REGISTRO";
}else{
	echo "ERROR" . $sql . "<br>" . $conn -> error;
}
$conn -> close();
?> 