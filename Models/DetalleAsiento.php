<?php namespace Models;
	class DetalleAsiento{
		private $cod_detalleasiento;
		private $num_asiento;
		private $debe;
		private $haber;
		private $cod_cuenta;
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
			$sql = "SELECT * FROM m_detalleasiento da, m_asientoscontables a, m_plandecuentas pc WHERE da.num_asiento = a.num_asiento AND da.cod_cuenta = pc.cod_cuenta ORDER BY da.num_asiento, da.cod_cuenta ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function listarHoy(){
			$sql = "SELECT * FROM m_detalleasiento da, m_asientoscontables a, m_plandecuentas pc WHERE da.num_asiento = a.num_asiento AND da.cod_cuenta = pc.cod_cuenta AND a.fecha_asiento = DATE(NOW()) ORDER BY da.num_asiento, da.cod_cuenta ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}


		public function add(){
			$sql = "INSERT INTO m_detalleasiento (cod_detalleasiento, num_asiento, debe, haber, cod_cuenta) VALUES (NULL, '{$this->num_asiento}, '{$this->debe}, '{$this->haber}, '{$this->cod_cuenta}')";
			$this->con->consultaSimple($sql);
		}
		public function delete(){
			$sql = "DELETE FROM m_detalleasiento WHERE cod_detalleasiento = '{$this->cod_detalleasiento}'";
			$this->con->consultaSimple($sql);			
		}
		public function edit(){
			$sql = "";
			$this->con->consultaSimple($sql);
		}
		public function view(){
			$sql = "SELECT * FROM m_detalleasiento WHERE cod_detalleasiento = '{$this->cod_detalleasiento}'";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}

	}

?>