<?php namespace Models;

	class Cliente{

		private $cod_clientes;
		private $apyn;
		private $documento;
		private $fnac;
		private $direccion;
		private $cuit;
		private $telefono;
		private $iva;
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
			$sql = "SELECT c.* FROM m_clientes c ";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function add(){
			$sql = "INSERT INTO m_clientes(cod_clientes, apyn, documento, fnac, direccion, cuit, telefono, iva)
				VALUES (null, '{$this->apyn}', '{$this->documento}', '{$this->fnac}', '{$this->direccion}', '{$this->cuit}', '{$this->telefono}', '{$this->iva}')";
			print $sql;
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_clientes WHERE cod_clientes = '{$this->cod_clientes}'";
			$this->con->consultaSimple($sql);
			//echo $sql;
		}
		public function edit(){
			$sql = "UPDATE m_clientes SET apyn = '{$this->apyn}', documento = '{$this->documento}', fnac = '{$this->fnac}', direccion = '{$this->direccion}', cuit = '{$this->cuit}', telefono = '{$this->telefono}', iva = '{$this->iva}' WHERE cod_clientes = '{$this->cod_clientes}' ";
			$this->con->consultaSimple($sql);
			echo $sql;		
		}
		public function view(){
			$sql = "SELECT c.* FROM m_clientes c WHERE c.cod_clientes = '{$this->cod_clientes}'";
			$datos = $this->con->consultaRetorno($sql);
			//echo $sql;
			$row = mysqli_fetch_assoc($datos);			
			return $row;

		}
		public function buscar(){
			$sql = "SELECT c.* FROM m_clientes c WHERE apyn LIKE '%$this->apyn%' AND documento LIKE '%$this->documento%' ";
			$datos = $this->con->consultaRetorno($sql);
			//print $sql;
			return $datos;
			$row = mysqli_fetch_assoc($datos);

		}



	}

?>