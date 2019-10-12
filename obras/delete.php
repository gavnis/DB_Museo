<?php 
if (isset($_GET['id_obras'])){
	include('database.php');
	$obras = new Database();
	$id_obras=intval($_GET['id_obras']);
	$res = $obras->delete($id_obras);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>