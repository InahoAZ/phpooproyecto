<?php namespace Models;
	class FacturaTemp{
		private $cod_tmp;
		private $cod_producto;
		private $cantidad_tmp;
		private $precio_tmp;
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
			$sql = "SELECT * FROM m_facturas ORDER BY cod_tmp ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO m_facturas (cod_tmp, cod_producto, cantidad_tmp, precio_tmp) VALUES (NULL, '{$this->cod_producto}, '{$this->cantidad_tmp}, '{$this->precio_tmp}";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_facturas WHERE cod_tmp = '{$this->cod_tmp}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "UPDATE FROM m_facturas SET cod_producto = '{$this->cod_producto}' WHERE cod_tmp = '{$this->cod_tmp}'";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_facturas WHERE cod_tmp = '{$this->cod_tmp}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>