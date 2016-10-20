<?php namespace Models;
	class AsientosContables{
		private $cod_asiento;
		private $num_asiento;
		private $fecha_asiento;
		private $concepto;
		private $cod_factura;
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
			$sql = "SELECT * FROM m_asientoscontables ORDER BY cod_asiento ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO m_asientoscontables (cod_asiento, num_asiento, fecha_asiento, concepto, cod_factura) VALUES (NULL, '{$this->num_asiento}, '{$this->fecha_asiento}, '{$this->concepto}, '{$this->cod_factura}')";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_asientoscontables WHERE cod_asiento = '{$this->cod_asiento}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_asientoscontables WHERE cod_asiento = '{$this->cod_asiento}'";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}

	}

?>