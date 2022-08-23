<?php 
if (isset($_GET['id'])){
	include('databaseg.php');
	$debt = new Database();
	$id=intval($_GET['id']);
	$res = $debt->delete($id);
	if($res){
		header('location: ../gastos.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>