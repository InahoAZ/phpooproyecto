<?php namespace Models;
 	
 	class Productos{
 		private $cod_producto;
 		private $descripcion;
 		private $precio_sugerido;
 		private $precio_unitario; 		
 		private $stock;
 		private $fecha_alta;
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
			$sql = "SELECT p.* FROM m_productos p  ORDER BY cod_producto ASC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function add(){
			$sql = "INSERT INTO m_productos(cod_producto, descripcion, precio_sugerido, precio_unitario, stock, fecha_alta)	VALUES (null, '{$this->descripcion}',null ,null, null, null)";
			print $sql;
			$lastId = $this->con->consultaSimple($sql);
			return $lastId;
		}
		public function delete(){
			$sql = "DELETE FROM m_productos WHERE cod_producto = '{$this->cod_producto}'";
			$this->con->consultaSimple($sql);
			//echo $sql;
		}
		public function edit(){
			$sql = "UPDATE m_productos SET descripcion = '{$this->descripcion}', precio_unitario = '{$this->precio_unitario}' WHERE cod_producto = '{$this->cod_producto}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}
		public function edit2(){
			$sql = "UPDATE m_productos SET precio_unitario = '{$this->precio_unitario}', stock = '{$this->stock}', fecha_alta = NOW() WHERE cod_producto = '{$this->cod_producto}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}
		public function addPrecioSugerido(){
			$sql = "UPDATE m_productos SET precio_sugerido = '{$this->precio_sugerido}' WHERE cod_producto = '{$this->cod_producto}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}

		public function view(){
			$sql = "SELECT m.* FROM m_productos m WHERE m.cod_producto = '{$this->cod_producto}'";
			$datos = $this->con->consultaRetorno($sql);
			//echo $sql;
			$row = mysqli_fetch_assoc($datos);			
			return $row;
		}

		

		public function buscar(){
			$sql = "SELECT m.* FROM m_materiales m WHERE descripcion LIKE '%$this->descripcion%' AND cod_producto LIKE '%$this->cod_producto%'";
			$datos = $this->con->consultaRetorno($sql);
			//print $sql;			
			//$row = mysqli_fetch_assoc($datos);
			return $datos;

		}
		
		public function contar(){
		$sql = "SELECT p.cod_producto FROM m_productos p WHERE p.cod_producto ORDER BY cod_producto DESC LIMIT 1 ";		
		$datos = $this->con->consultaRetorno($sql);
		$row = mysqli_fetch_assoc($datos);
		if($row['cod_producto'] == 0)
			$i = 1;
		else
			$i = $row['cod_producto'] + 1;
		return $i;
		/*$i = ++$row['cod_producto'];
		if($i == 0)
			$i = 1;		
		return $i;*/
		}

		public function updateStock(){
			$sql = "UPDATE m_productos SET stock = '{$this->stock}', fecha_stock = NOW() WHERE cod_producto = '{$this->cod_producto}' ";
			$this->con->consultaSimple($sql);
			echo $sql;		
		}


 	}

?>