<?php namespace Models;
	class Factura{
		private $cod_factura;
		private $cod_tipofactura;
		private $fecha_factura;
		private $cod_cliente;
		private $total_venta;
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
			$sql = "SELECT * FROM m_facturas ORDER BY cod_factura ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO m_facturas (cod_factura, cod_tipofactura, fecha_factura, cod_cliente, total_venta) VALUES (NULL, '{$this->cod_tipofactura}, '{$this->fecha_factura}, '{$this->cod_cliente}, '{$this->total_venta}'";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_facturas WHERE cod_factura = '{$this->cod_factura}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "UPDATE FROM m_facturas SET cod_tipofactura = '{$this->cod_tipofactura}' WHERE cod_factura = '{$this->cod_factura}'";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_facturas WHERE cod_factura = '{$this->cod_factura}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>