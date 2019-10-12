<?php
	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="museo";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
		
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
		}
		public function read(){
			$sql = "SELECT * FROM visitantes";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id_visitantes){
			$sql = "SELECT * FROM visitantes where id_visitantes='$id_visitantes'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($nombre,$apellido,$dni,$telefono,$fecha_nac, $id_visitantes){
			$sql = "UPDATE visitantes SET nombre='$nombre', apellido='$apellido', dni='$dni', telefono='$telefono', fecha_nac='$fecha_nac' WHERE id_visitantes=$id_visitantes";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id_visitantes){
			$sql = "DELETE FROM visitantes WHERE id_visitantes=$id_visitantes";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

