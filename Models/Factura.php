<?php namespace Models;
class Factura{
	private $cod_factura;
	private $tipo_factura;
	private $num_factura;
	private $fecha_factura;
	private $cod_clientes;
	private $finalizado;		
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
		$sql = "INSERT INTO m_facturas (cod_factura, tipo_factura, num_factura, fecha_factura, cod_clientes) VALUES (NULL, '{$this->tipo_factura}', '{$this->num_factura}', NOW(), {$this->cod_clientes})";
		$lastId = $this->con->consultaSimple($sql);
		return $lastId;
			//echo $sql;
	}
	public function delete(){
		$sql = "DELETE FROM m_facturas WHERE cod_factura = '{$this->cod_factura}'";
		$this->con->consultaSimple($sql);			
	}
	public function edit(){
		$sql = "UPDATE m_facturas SET cod_tipofactura = '{$this->cod_tipofactura}' WHERE cod_factura = '{$this->cod_factura}'";
		$this->con->consultaSimple($sql);
	}
	public function editFinalizado(){
		$sql = "UPDATE m_facturas SET finalizado = '{$this->finalizado}' WHERE cod_factura = '{$this->cod_factura}'"; 
		echo $sql . "<br>";
		$this->con->consultaSimple($sql);
	}
	public function view(){
		$sql = "SELECT * FROM m_facturas WHERE cod_factura = '{$this->cod_factura}'";
		$datos = $this->con->consultaRetorno($sql);			
		return $datos;
	}
	public function view2(){
		$sql = "SELECT * FROM m_facturas f, m_clientes c WHERE f.cod_factura = '{$this->cod_factura}' AND f.cod_clientes = c.cod_clientes";
		$datos = $this->con->consultaRetorno($sql);
			//echo $sql;			
		return $datos;
	}



	public function ultimoNumFactura($tipo){
		switch ($tipo) {
			case 'a':
			$sql = "SELECT tipo_factura, MAX(num_factura) as ultimoNum FROM m_facturas WHERE tipo_factura = 'A'";
			break;
			case 'b':
			$sql = "SELECT tipo_factura, MAX(num_factura) as ultimoNum FROM m_facturas WHERE tipo_factura = 'B'";
			break;
			case 'c':
			$sql = "SELECT tipo_factura, MAX(num_factura) as ultimoNum FROM m_facturas WHERE tipo_factura = 'C'";
			break;				

		}
		$datos = $this->con->consultaRetorno($sql);
		$row = mysqli_fetch_assoc($datos);			
		return $row;


	}
	public function listarFacturas(){

		$sql = "SELECT * FROM m_clientes c, m_facturas f, m_detalle_factura df WHERE f.num_factura = df.num_factura AND f.cod_clientes = c.cod_clientes AND f.finalizado = 1 ORDER BY fecha_factura DESC";
		$datos = $this->con->consultaRetorno($sql);
		//echo $sql;
		return $datos;
	}


	public function verFacturaDatos(){

		$sql = "SELECT * FROM m_clientes c, m_facturas f, m_detalle_factura df WHERE f.num_factura = df.num_factura AND f.cod_clientes = c.cod_clientes AND f.finalizado = 1 AND f.cod_factura = '{$this->cod_factura}'";
		$datos = $this->con->consultaRetorno($sql);
		//echo $sql;
		return $datos;
	}

	public function verFacturaDetalle(){

		$sql = "SELECT * FROM m_facturas f, m_detalle_factura df, m_productos p WHERE f.num_factura = df.num_factura AND df.cod_producto = p.cod_producto AND f.finalizado = 1 AND f.cod_factura = '{$this->cod_factura}'";
		$datos = $this->con->consultaRetorno($sql);
		//echo $sql;
		return $datos;
	}

}

?>