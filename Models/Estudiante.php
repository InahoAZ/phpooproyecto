<?php namespace Models;

class Estudiante{

	private $id;
	private $nombre;
	private $edad;
	private $curso;

	private $con;

	public function __construct(){

		$this->con = new Conexion();


	}

	public function set($atributos, $valor){
		$this->$atributos = $valor;

	}
	public function get($atributos){
		return $this->$atributos; 
		
	}

	public function add(){

		$sql = "INSERT INTO estudiante(id, nombre, edad, curso) VALUES (null, '{$this->nombre}',{$this->edad},{$this->curso})";
		echo $sql;
		$this ->con->consultaSimple($sql);
	}


	public function listar(){

		$sql = "SELECT * FROM estudiante";
		$datos= $this ->con->consultaRetorno($sql);
		return $datos;


	}
}




?>