<?php  
public function sanitize($var){
  $return = mysqli_real_escape_string($this->con, $var);
  return $return;
}


public function create($titulo,$autor){
	$sql = "INSERT INTO `obras` (titulo, autor) VALUES ('$titulo', '$autor')";
	$res = mysqli_query($this->con, $sql);
	if($res){
	  return true;
	}else{
	return false;
 }
?>



 