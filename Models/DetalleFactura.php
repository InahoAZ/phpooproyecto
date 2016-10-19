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
			$sql = "SELECT * FROM m_detalle_factura ORDER BY cod_detalle ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function add(){
			$sql = "INSERT INTO m_detalle_factura (cod_detalle, cod_factura, num_factura, cod_producto, cantidad, precio_venta) VALUES (NULL, '{$this->cod_factura}', '{$this->num_factura}', '{$this->cod_producto}', '{$this->cantidad}', '{$this->precio_venta}')";
			//echo $sql;
			$this->con->consultaSimple($sql);

		}
		public function delete(){
			$sql = "DELETE FROM m_detalle_factura WHERE cod_producto = '{$this->cod_producto}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_detalle_factura WHERE cod_detalle = '{$this->cod_detalle}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			return $row;
		}
		public function view2(){
			$sql = "SELECT * FROM m_detalle_factura WHERE cod_factura = '{$this->cod_factura}'";
			$datos = $this->con->consultaRetorno($sql);
			//echo $sql;
			return $datos;
		}

		public function listarDetalleA(){
			$sql = "SELECT * FROM m_facturas f, m_detalle_factura df, m_productos p WHERE f.num_factura = df.num_factura AND df.cod_producto = p.cod_producto AND f.tipo_factura = 'A' AND df.cod_factura = '{$this->cod_factura}'";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function listarDetalleB(){
			$sql = "SELECT * FROM m_facturas f, m_detalle_factura df, m_productos p WHERE f.num_factura = df.num_factura AND df.cod_producto = p.cod_producto AND f.tipo_factura = 'B' AND df.cod_factura = '{$this->cod_factura}'";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function listarDetalleC(){
			$sql = "SELECT * FROM m_facturas f, m_detalle_factura df, m_productos p WHERE f.num_factura = df.num_factura AND df.cod_producto = p.cod_producto AND f.tipo_factura = 'C' AND df.cod_factura = '{$this->cod_factura}'";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}



	}

?>