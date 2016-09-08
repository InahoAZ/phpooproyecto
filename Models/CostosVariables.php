<?php namespace Models;

	class CostosVariables{

		private $cod_costosvariables;
		private $cod_producto;
		private $mano_obra;
		private $total;
		private $fecha;		
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
			$sql = "SELECT cg.* FROM t_costosvariables cv ";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO t_costosvariables(cod_costosvariables, cod_producto, mano_obra, total, fecha)	VALUES (null, '{$this->cod_producto}', '{$this->mano_obra}', '{$this->total}', '{$this->fecha}')";
			//print $sql;
			$this->con->consultaSimple($sql);

		}
		
		
	}
    

?>