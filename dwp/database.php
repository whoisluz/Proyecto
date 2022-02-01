<?php 

class Database{
	private $con;
	private $dbhost="localhost";
	private $dbuser = "root";
	private $dbpass="";
	private $dbname="proyecto";

	function __construct(){
		$this->connect_db();
	}


	public function connect_db(){

		$this->con=mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
		if(mysqli_connect_error()){
			die("Error en la base de datos". mysqli_connect_error().mysqli_connect_errno());
		}
	}

	public function sanitize($var){
		$return=mysqli_real_escape_string($this->con,$var);
		return $return;
	}

	public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico){
		$sql="INSERT INTO `clientes` (nombres,apellidos, telefono, direccion, correo_electronico) VALUES ('$nombres','$apellidos','$telefono','$direccion','$correo_electronico')";
		$res=mysqli_query($this->con,$sql);
		if($res){
			return true;
		}
		else
		{
			return false;
		}

	}

	public function listadoclientes(){

		$sql="SELECT * FROM clientes";
		$res= mysqli_query($this->con, $sql);
		return $res;

	}
}

?>