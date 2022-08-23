<?php
$server="localhost";
$user="root";
$pass="";
$db="db";
$conn=new mysqli($server,$user,$pass,$db);
if($conn -> connect_error){
	die("conexion establecida" . $conn -> connect_error);
}
$sql="SELECT nom, con, pat, year, marc FROM camiones";
$result = $conn -> query($sql);
if($result -> num_rows>0){
	echo "<table>
	<tr>
	<td><strong>Nombre modelo</strong></td>
	<td><strong>Conductor</strong></td>
	<td><strong>Patente</strong></td>
	<td><strong>Año de fabricacion</strong></td>
	<td><strong>Marca</strong></td>
	</tr>
	<br>";
	while($row = $result -> fetch_assoc()){
		echo "<tr> <td>" . $row["nom"] . "</td>" . "<td>" . $row["con"] . "</td>" . "<td>" . "<td>" . $row["pat"] . "</td>" . "<td>" . $row["year"] . "</td>" . "<td>" . $row["marc"] . "</td> </tr>";
	}
}else{
	echo "0 resultados";
}
$conn -> close();
?>