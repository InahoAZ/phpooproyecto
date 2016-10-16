<?php namespace Models;

class Operaciones{

	private $cod_operacion;
	private $cod_producto = "null";
	private $cod_material = "null";
	private $q;
	private $cod_tipo_operacion;
	private $cod_venta = "null";
	private $fecha_operacion;
	private $desde;
	private $hasta;
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
		$sql = "SELECT o.* FROM m_operaciones o ";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}
	public function add(){

		$sql = "INSERT INTO m_operaciones(cod_operacion, cod_producto, cod_material, q, cod_tipo_operacion, cod_venta, fecha_operacion)	VALUES (null, {$this->cod_producto}, {$this->cod_material}, '{$this->q}', '{$this->cod_tipo_operacion}', {$this->cod_venta}, NOW())";
			//print $sql;
		$lastId = $this->con->consultaSimple($sql);
		return $lastId;
	}
	public function delete(){
		$sql = "DELETE FROM m_operaciones WHERE cod_operacion = '{$this->cod_operacion}'";
		$this->con->consultaSimple($sql);
			//echo $sql;
	}
	public function deleteWhereMat(){
		$sql = "DELETE FROM m_operaciones WHERE cod_material = '{$this->cod_material}'";
		$this->con->consultaSimple($sql);
			//echo $sql;
	}
	public function edit(){
		$sql = "UPDATE m_operaciones SET cod_producto = '{$this->cod_producto}', q = '{$this->q}', cod_tipo_operacion = '{$this->cod_tipo_operacion}', cod_venta = '{$this->cod_venta}', fecha_operacion = '{$this->fecha_operacion}' WHERE cod_operacion = '{$this->cod_operacion}' ";
		$this->con->consultaSimple($sql);
			//echo $sql;		
	}
	public function view(){
		$sql = "SELECT o.* FROM m_operaciones o WHERE p.cod_operacion = '{$this->cod_operacion}'";
		$datos = $this->con->consultaRetorno($sql);
		$row = mysqli_fetch_assoc($datos);
		return $row;
	}
	public function buscar(){
		$sql = "SELECT * FROM m_materiales m, m_operaciones o, m_proveedores pr, m_unidadesmedida u WHERE o.cod_material = m.cod_material AND o.cod_tipo_operacion = 1 AND m.cod_unidad = u.cod_unidad AND m.cod_proveedor = pr.cod_proveedor AND o.cod_material = '{$this->cod_material}' ";
		$datos = $this->con->consultaRetorno($sql);
			//print $sql;			
			//$row = mysqli_fetch_assoc($datos);
		return $datos;

	}
	public function listar2(){			
		$sql = "SELECT * FROM m_materiales m, m_operaciones o, m_proveedores pr, m_unidadesmedida u WHERE o.cod_material = m.cod_material AND o.cod_tipo_operacion = 1 AND m.cod_unidad = u.cod_unidad AND m.cod_proveedor = pr.cod_proveedor ORDER BY o.fecha_operacion DESC";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}
	public function view2(){
		$sql = "SELECT * FROM m_materiales m, m_operaciones o, m_proveedores pr, m_unidadesmedida u WHERE o.cod_material = m.cod_material AND o.cod_tipo_operacion = 1 AND m.cod_unidad = u.cod_unidad AND m.cod_proveedor = pr.cod_proveedor AND o.cod_operacion = '{$this->cod_operacion}'";
		$datos = $this->con->consultaRetorno($sql);
		$row = mysqli_fetch_assoc($datos);
		return $row;
	}

	public function buscarFecha(){
		$sql = "SELECT * FROM m_materiales m, m_operaciones o, m_proveedores pr WHERE o.fecha_operacion BETWEEN '$this->desde' AND '$this->hasta 23:59:59' AND o.cod_tipo_operacion = 1 AND o.cod_material = m.cod_material AND m.cod_proveedor = pr.cod_proveedor" ;
			//print $sql;
		$datos = $this->con->consultaRetorno($sql);			
		return $datos;

	}
	public function materialesFrecuentes(){
		$sql = "SELECT COUNT(*) AS veces, o.cod_material, m.descripcion, m.precio_unitario, SUM(o.q) AS pedidos FROM m_operaciones o, m_materiales m WHERE o.cod_material = m.cod_material GROUP BY cod_material ORDER BY veces DESC LIMIT 0,5";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}

	public function materialesGastos(){
		$sql = "SELECT COUNT(*) AS veces, o.cod_material, m.descripcion, m.precio_unitario, SUM(o.q) AS pedidos FROM m_operaciones o, m_materiales m WHERE o.cod_material = m.cod_material GROUP BY cod_material ORDER BY veces DESC ";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}

}


?>