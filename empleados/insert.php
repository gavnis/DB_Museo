<?php  
public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}


public function create($dni,$nombre,$apellido){
	$sql = "INSERT INTO `empleados` (dni,nombre, apellido) VALUES ('$dni','$nombre','$apellido')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
?>



 