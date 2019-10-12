<?php  
public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}


public function create($fecha,$direccion){
	$sql = "INSERT INTO `muestras` (fecha, direccion) VALUES ('$fecha', '$direccion')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
?>



 