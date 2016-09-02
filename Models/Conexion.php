<?php namespace Models;
	
	class Conexion{

		private $datos = array(
			"host" => "localhost",
			"user" => "root",
			"pass" => "alumno",
			"db" => "proyecto"
			);
		private $con;

		public function __construct(){
			$this->con = new \mysqli($this->datos['host'], 
				$this->datos['user'], $this->datos['pass'], 
				$this->datos['db']);

		}
		public function consultaSimple($sql){
			$this->con->query($sql);
			$lastId = $this->con->insert_id;
			return $lastId;
		}
		public function consultaRetorno($sql){
			$datos = $this->con->query($sql);
			return $datos;
		}
	}


?>