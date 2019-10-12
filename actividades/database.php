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
		public function create($titulo,$fecha,$hora){
			$sql = "INSERT INTO `actividades` (titulo,fecha,hora) VALUES ('$titulo','$fecha','$hora')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM actividades";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id_actividad){
			$sql = "SELECT * FROM actividades where id_actividad='$id_actividad'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($titulo,$fecha,$hora, $id_actividad){
			$sql = "UPDATE actividades SET titulo='$titulo', fecha='$fecha', hora='$hora' WHERE id_actividad=$id_actividad";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id_actividad){
			$sql = "DELETE FROM actividades WHERE id_actividad=$id_actividad";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

