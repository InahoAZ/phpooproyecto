<?php namespace Models;

	class UnidadesMedida{

		private $cod_unidad;
		private $nombre_unidad;
		private $abreviatura_unidad;
		private $cantidad_unidad;	
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
			$sql = "SELECT u.* FROM m_unidadesmedida u ";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		
		
		
	}
    

?>