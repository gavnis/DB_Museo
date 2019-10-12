<?php 
if (isset($_GET['id_visitantes'])){
	include('database.php');
	$visitantes = new Database();
	$id_visitantes=intval($_GET['id_visitantes']);
	$res = $visitantes->delete($id_visitantes);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>