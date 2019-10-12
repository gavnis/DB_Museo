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
		public function create($dni,$nombre,$apellido){
			$sql = "INSERT INTO `empleados` (dni,nombre,apellido) VALUES ('$dni','$nombre','$apellido')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM empleados";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id_empleados){
			$sql = "SELECT * FROM empleados where id_empleados='$id_empleados'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($dni,$nombre,$apellido,$id_empleados){
			$sql = "UPDATE empleados SET dni='$dni', nombre='$nombre', apellido='$apellido' WHERE id_empleados=$id_empleados";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id_empleados){
			$sql = "DELETE FROM empleados WHERE id_empleados=$id_empleados";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}

	
	

?>	

