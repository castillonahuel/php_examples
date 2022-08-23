<?php 
if (isset($_GET['id'])){
	include('databasev.php');
	$ventas = new Database();
	$id=intval($_GET['id']);
	$res = $ventas->delete($id);
	if($res){
		header('location: ../ventas.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>