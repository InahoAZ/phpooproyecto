<?php namespace Models;

class Costos{

	private $cod_costos;
	private $cod_producto;		
	private $cod_costosfijos;
	private $cod_costosvariables;
	private $total;
	private $con;

	
	public function __construct(){
		$this->con = new Conexion();
	}

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;
	}
	public function get($atributo){
		return $this->atributo;
	}

	public function listar(){			
		$sql = "SELECT cg.* FROM m_costos cg ";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}

	public function listar2(){			
		$sql = "SELECT m.* FROM m_materiales m ";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}
	
	
}


?>