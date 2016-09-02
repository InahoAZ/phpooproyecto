<?php namespace Models;

class TipoOperacion{

	private $cod_tipo_operacion;
	private $nombre;		
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
		$sql = "SELECT to.* FROM m_tipo_operacion to ";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}
	
	
	
}


?>