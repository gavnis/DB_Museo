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
		public function create($fecha,$direccion){
			$sql = "INSERT INTO `muestras` (fecha, direccion) VALUES ('$fecha', '$direccion')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM muestras";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id_muestra){
			$sql = "SELECT * FROM muestras where id_muestra='$id_muestra'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($fecha,$direccion,$id_muestra){
			$sql = "UPDATE muestras SET fecha='$fecha', direccion='$direccion' WHERE id_muestra=$id_muestra";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id_muestra){
			$sql = "DELETE FROM muestras WHERE id_muestra=$id_muestra";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

