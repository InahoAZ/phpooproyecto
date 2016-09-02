<?php namespace Models;

	class CostosFijos{

		private $cod_costosfijos;
		private $alquiler;
		private $luz;
		private $agua;
		private $herramientas;
		private $porcentaje;
		private $fecha;
		private $con;

		
		public function __construct(){
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido){
			$this->$atributo = $contenido;
		}
		public function get($atributo){
			return $this->$atributo;
		}

		public function add(){			
			$sql = "INSERT INTO m_costosfijos (alquiler, luz, agua, herramientas, fecha, porcentaje) VALUES ('{$this->alquiler}', '{$this->luz}', '{$this->agua}', '{$this->herramientas}', '{$this->fecha}', '{$this->porcentaje}')";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function edit(){
			$sql = "UPDATE m_costosfijos SET alquiler = '{$this->alquiler}', luz = '{$this->luz}',  agua = '{$this->agua}',  stock = '{$this->stock}', herramientas = '{$this->herramientas}', porcentaje = '{$this->fecha}' WHERE cod_material = '{$this->cod_material}' ";
			$this->con->consultaSimple($sql);
			//echo $sql;		
		}


		public function listar(){			
			$sql = "SELECT cg.* FROM m_costosfijos cg ";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}

		public function listarActual(){
			
			$sql = "SELECT * FROM m_costosfijos ORDER BY fecha DESC LIMIT 1";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
			


		}
		public function totalCostosFijos(){
			
			$sql = "SELECT alquiler, luz, agua, herramientas, porcentaje FROM m_costosfijos ORDER BY fecha DESC LIMIT 1"; 
			$datos = $this->con->consultaRetorno($sql);
			$row = mysqli_fetch_assoc($datos);
			$porcentaje = $row['porcentaje'];			
			unset($row['porcentaje']);
			$resultado = array_sum($row);				
			return array('resultado'=>$resultado, 'porcentaje'=>$porcentaje);
			


		}

		
		
	}
    

?>