<?php namespace Models;
	class PlanDeCuentas{
		private $cod_cuenta;
		private $detalle;
		private $tipo;		
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
			$sql = "SELECT * FROM m_asientoscontables ORDER BY cod_cuenta ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO m_asientoscontables (cod_cuenta, detalle, tipo) VALUES (NULL, '{$this->detalle}, '{$this->tipo})";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_asientoscontables WHERE cod_cuenta = '{$this->cod_cuenta}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_asientoscontables WHERE cod_cuenta = '{$this->cod_cuenta}'";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}

	}

?>