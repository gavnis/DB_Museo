<?php  
public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}


public function create($titulo,$fecha,$hora){
	$sql = "INSERT INTO `actividades` (titulo, fecha, hora) VALUES ('$titulo','$fecha', '$hora')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
?>



 