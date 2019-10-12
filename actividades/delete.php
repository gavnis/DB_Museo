<?php 
if (isset($_GET['id_actividad'])){
	include('database.php');
	$actividades = new Database();
	$id_actividad=intval($_GET['id_actividad']);
	$res = $actividades->delete($id_actividad);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>