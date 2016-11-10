<?php namespace Models;

	class CostosTemp{

		private $cod_producto;
		private $cod_material;	
		private $cantidad;
		private $fecha;

		
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
			$sql = "SELECT ct.*, m.* FROM t_costostemp ct, m_materiales m WHERE ct.cod_material = m.cod_material AND ct.cod_producto = '{$this->cod_producto}'";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;
		}
		
		public function materialesProducto(){
			$sql = "SELECT ct.*, m.* FROM t_costostemp ct, m_materiales m WHERE ct.cod_material = m.cod_material AND ct.cod_producto = '{$this->cod_producto}'";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;

		}
		
		public function add(){
			$sql = "INSERT INTO t_costostemp(cod_producto, cod_material, cantidad, fecha) VALUES ('{$this->cod_producto}', '{$this->cod_material}', '{$this->cantidad}', NOW())";			
			$this->con->consultaSimple($sql);
			echo $sql;
						
		}
		
		public function delete(){
			$sql = "DELETE FROM t_costostemp WHERE cod_material = '{$this->cod_material}'";
			$this->con->consultaSimple($sql);
			//echo $sql;
		}
		
		public function deleteCancelar(){
			$sql = "DELETE FROM t_costostemp WHERE cod_producto = '{$this->cod_producto}'";
			$this->con->consultaSimple($sql);
			//echo $sql;
		}
		
		
		
	}
    

?>
