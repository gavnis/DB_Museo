<?php  
public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}


public function create($nombre,$apellido,$dni,$telefono,$fecha_nac){
	$sql = "INSERT INTO `visitantes` (nombre, apellido, dni, telefono, fecha_nac) VALUES ('$nombre', '$apellido', '$dni', '$telefono', '$fecha_nac')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
?>



 