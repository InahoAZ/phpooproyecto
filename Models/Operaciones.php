<?php namespace Models;

class Operaciones{

	private $cod_operacion;
	private $cod_producto = "null";
	private $cod_material = "null";
	private $q;
	private $cod_tipo_operacion;
	private $cod_venta = "null";
	private $fecha_operacion;
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
		$this->con->consultaSimple($sql);
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
		$sql = "SELECT o.* FROM m_operaciones o WHERE cod_producto LIKE '%$this->cod_producto%' AND cod_operacion LIKE '%$this->cod_operacion%'";
		$datos = $this->con->consultaRetorno($sql);
			//print $sql;			
			//$row = mysqli_fetch_assoc($datos);
		return $datos;

	}
}


?>