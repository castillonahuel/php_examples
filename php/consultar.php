<?php
$server="localhost";
$user="root";
$pass="";
$db="sistema";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
$sql="SELECT usr, pass FROM usuarios";
$result = $conn -> query($sql);
if($result -> num_rows>0){
	while($row = $result -> fetch_assoc()){
		echo "Usuario: " . $row["usr"] . "<br>" . "Contraseña: " . $row["pass"] . "<br>";
	}
}else{
	echo "0 resultados";
}
$conn -> close();
?>