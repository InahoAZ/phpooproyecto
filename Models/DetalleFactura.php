<?php namespace Models;
	class DetalleFactura{
		private $cod_detalle;
		private $numero_factura;
		private $cod_producto;
		private $cantidad;
		private $precio_venta;
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
			$sql = "SELECT * FROM m_facturas ORDER BY cod_detalle ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO m_facturas (cod_detalle, numero_factura, cod_producto, cantidad, precio_venta) VALUES (NULL, '{$this->numero_factura}, '{$this->cod_producto}, '{$this->cantidad}, '{$this->precio_venta}'";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_facturas WHERE cod_detalle = '{$this->cod_detalle}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "UPDATE FROM m_facturas SET numero_factura = '{$this->numero_factura}' WHERE cod_detalle = '{$this->cod_detalle}'";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_facturas WHERE cod_detalle = '{$this->cod_detalle}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}

	}

?>