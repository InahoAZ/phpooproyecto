<?php namespace Models;

	class Proveedor{

		private $cod_proveedor;
		private $razon_social;
		private $cuit;
		private $telefono;
		private $direccion;
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
			$sql = "SELECT p.* FROM m_proveedores p ";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}
		public function add(){
			$sql = "INSERT INTO m_proveedores(cod_proveedor, razon_social, cuit, telefono, direccion)	VALUES (null, '{$this->razon_social}', '{$this->cuit}', '{$this->telefono}', '{$this->direccion}')";
			//print $sql;
			$this->con->consultaSimple($sql);			
		}
		public function delete(){
			$sql = "DELETE FROM m_proveedores WHERE cod_proveedor = '{$this->cod_proveedor}'";
			$this->con->consultaSimple($sql);
			//echo $sql;
		}
		public function edit(){
			$sql = "UPDATE m_proveedores SET razon_social = '{$this->razon_social}', cuit = '{$this->cuit}', telefono = '{$this->telefono}', direccion = '{$this->direccion}' WHERE cod_proveedor = '{$this->cod_proveedor}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}
		public function view(){
			$sql = "SELECT p.* FROM m_proveedores p WHERE p.cod_proveedor = '{$this->cod_proveedor}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			
			return $row;
		}
		public function buscar(){
			$sql = "SELECT p.* FROM m_proveedores p WHERE razon_social LIKE '%$this->razon_social%' AND cod_proveedor LIKE '%$this->cod_proveedor%'";
			$datos = $this->con->consultaRetorno($sql);
			//print $sql;			
			//$row = mysqli_fetch_assoc($datos);
			return $datos;

		}

		public function comboBox(){
			$sql = "SELECT p.cod_proveedor, p.razon_social FROM m_proveedores p";
			//echo $sql;
			$datos = $this->con->consultaRetorno($sql);
			//$row = mysqli_fetch_assoc($datos);			
			return $datos;

		}
	}


?>