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
		public function create($titulo,$autor){
			$sql = "INSERT INTO `obras` (titulo, autor) VALUES ('$titulo', '$autor')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function read(){
			$sql = "SELECT * FROM obras";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id_obras){
			$sql = "SELECT * FROM obras where id_obras='$id_obras'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		public function update($titulo,$autor,$id_obras){
			$sql = "UPDATE obras SET titulo='$titulo', autor='$autor' WHERE id_obras=$id_obras";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id_obras){
			$sql = "DELETE FROM obras WHERE id_obras=$id_obras";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
	
	

?>	

