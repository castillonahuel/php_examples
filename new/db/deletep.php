<?php 
if (isset($_GET['id'])){
	include('databasep.php');
	$prove = new Database();
	$id=intval($_GET['id']);
	$res = $prove->delete($id);
	if($res){
		header('location: ../proveedores.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>