<?php namespace Models;
 	
 	class Material{
 		private $cod_producto; // uso especial xd
 		private $cod_material;
 		private $descripcion;
 		private $cod_unidad;
 		private $precio_unitario;
 		private $stock = "null";
 		private $fecha_stock;
 		private $cod_proveedor;
 		private $desde;
 		private $hasta;
 		private $con;

 		public function __construct(){
 	 		$this->con = new Conexion();
 	 		if(isset($_SESSION['lastIdProducto'])) 
 	 			$this->cod_producto = $_SESSION['lastIdProducto'];
 	 		else 
 	 			$this->cod_producto = 0;

 	 	}

 	 	public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		public function get($atributo){
			return $this->$atributo;
		}

		public function listar(){			
			$sql = "SELECT m.* FROM m_materiales m ";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function listar2(){			
			$sql = "SELECT m.*, pr.razon_social, u.* FROM m_materiales m, m_proveedores pr, m_unidadesmedida u WHERE m.cod_proveedor = pr.cod_proveedor AND u.cod_unidad = m.cod_unidad ";
			$datos = $this->con->consultaRetorno($sql);

			return $datos;
		}
		public function listar3(){			
			$sql = "SELECT m.*, pr.razon_social, u.* FROM m_materiales m, m_proveedores pr, m_unidadesmedida u WHERE m.cod_proveedor = pr.cod_proveedor AND u.cod_unidad = m.cod_unidad AND NOT EXISTS (SELECT 1 FROM t_costostemp t2 WHERE t2.cod_material = m.cod_material AND t2.cod_producto = '{$this->cod_producto}')";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}
		public function add(){
			$sql = "INSERT INTO m_materiales(cod_material,descripcion, cod_unidad , precio_unitario, stock, fecha_stock, cod_proveedor)	VALUES (null, '{$this->descripcion}','{$this->cod_unidad}' , '{$this->precio_unitario}', {$this->stock}, NOW() , '{$this->cod_proveedor}')";
			//print $sql;
			$lastId = $this->con->consultaSimple($sql); 
			return $lastId;			
			

		}
		public function addMaterial(){
			$sql = "INSERT INTO t_costostemp(cod_producto, cod_material) VALUES (2, '{$this->cod_material}')";
			//print $sql;
			$this->con->consultaSimple($sql);
			//echo "AAAAAAAAAAAAA";			
		}
		public function delete(){
			$sql = "DELETE FROM m_materiales WHERE cod_material = '{$this->cod_material}'";
			$this->con->consultaSimple($sql);
			//echo $sql;
		}
		public function edit(){
			$sql = "UPDATE m_materiales SET descripcion = '{$this->descripcion}', cod_unidad = '{$this->cod_unidad}',  precio_unitario = '{$this->precio_unitario}',cod_proveedor = '{$this->cod_proveedor}' WHERE cod_material = '{$this->cod_material}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}
		public function updateStock(){
			$sql = "UPDATE m_materiales SET stock = '{$this->stock}', fecha_stock = NOW() WHERE cod_material = '{$this->cod_material}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}
		public function view(){
			$sql = "SELECT m.* FROM m_materiales m WHERE m.cod_material = '{$this->cod_material}'";
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);			
			return $row;
		}
		public function view2(){
			$sql = "SELECT m.*, pr.* FROM m_materiales m, m_proveedores pr WHERE m.cod_material = '{$this->cod_material}' AND m.cod_proveedor = pr.cod_proveedor";
			//print $sql;
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);			
			return $row;
		}
		public function buscar(){
			$sql = "SELECT m.* FROM m_materiales m WHERE descripcion LIKE '%$this->descripcion%' AND cod_material LIKE '%$this->cod_material%'";
			$datos = $this->con->consultaRetorno($sql);
			//print $sql;			
			//$row = mysqli_fetch_assoc($datos);
			return $datos;

		}
		public function buscar2(){
			$sql = "SELECT m.*, pr.razon_social, me.* FROM m_materiales m, m_proveedores pr, m_unidadesmedida me WHERE descripcion LIKE '%$this->descripcion%' AND cod_material LIKE '%$this->cod_material%' AND me.cod_unidad = m.cod_unidad AND pr.cod_proveedor = m.cod_proveedor";
			$datos = $this->con->consultaRetorno($sql);			
			return $datos;

		}

		




 	}

?>