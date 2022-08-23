<?php 
if (isset($_GET['id'])){
	include('databased.php');
	$debt = new Database();
	$id=intval($_GET['id']);
	$res = $debt->delete($id);
	if($res){
		header('location: ../deudas.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>