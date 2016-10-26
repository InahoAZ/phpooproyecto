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
		$sql = "SELECT * FROM m_plandecuentas ORDER BY cod_cuenta ASC";
		$datos = $this->con->consultaRetorno($sql);
		return $datos;
	}

	public function add(){
		$sql = "INSERT INTO m_plandecuentas(cod_cuenta, detalle, tipo) VALUES ( '{$this->cod_cuenta}' , '{$this->detalle}' , '{$this->tipo}')";
		print $sql;
		$this->con->consultaSimple($sql);

	}

	public function delete(){
		$sql = "DELETE FROM m_plandecuentas WHERE cod_cuenta = '{$this->cod_cuenta}'";
		$this->con->consultaSimple($sql);
	}

	public function view(){
		$sql = "SELECT pdc.* FROM m_plandecuentas pdc WHERE pdc.cod_cuenta = '{$this->cod_cuenta}'";
		$datos = $this->con->consultaRetorno($sql);
			//echo $sql;
		$row = mysqli_fetch_assoc($datos);			
		return $row;
	}

	public function edit(){
		$sql = "UPDATE m_plandecuentas SET detalle ='{$this->detalle}', tipo = '{$this->tipo}' WHERE cod_cuenta ='{$this->cod_cuenta}'";
		$this->con->consultaSimple($sql);
		echo $sql;

	}

}

?>