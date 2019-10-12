<?php 
if (isset($_GET['id_muestra'])){
	include('database.php');
	$muestras = new Database();
	$id_muestra=intval($_GET['id_muestra']);
	$res = $muestras->delete($id_muestra);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>