<?php namespace Models;
	class DetalleFactura{
		private $cod_detalle;
		private $cod_factura;
		private $num_factura;
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
			$sql = "INSERT INTO m_facturas (cod_detalle, cod_factura, num_factura, cod_producto, cantidad, precio_venta) VALUES (NULL, '{$this->cod_factura}, '{$this->num_factura}, '{$this->cod_producto}, '{$this->cantidad}, '{$this->precio_venta}'";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_facturas WHERE cod_detalle = '{$this->cod_detalle}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "";
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