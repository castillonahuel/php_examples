<?php 
if (isset($_GET['id'])){
	include('databasec.php');
	$compras = new Database();
	$id=intval($_GET['id']);
	$res = $compras->delete($id);
	if($res){
		header('location: ../compras.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>