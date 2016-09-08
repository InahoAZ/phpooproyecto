<?php namespace Controllers;	
	use Models\Costos as Costos;
	use Models\CostosFijos as CostosFijos;
	use Models\CostosTemp as CostosTemp;
	use Models\CostosVariables as CostosVariables;
	use Models\Material as Materiales;
	use Models\Productos as Productos;

	class costosController{
		private $costos;
		private $materiales;
		private $costostemp;
		private $productos;
		private $costosvariables;
		private $costosfijos;

		public function __construct(){			
			$this->costos = new Costos();
			$this->materiales = new Materiales();
			$this->costostemp = new CostosTemp();
			$this->productos = new Productos();
			$this->costosvariables = new CostosVariables();
			$this->costosfijos = new CostosFijos();

		}

		public function index(){
			$datos = $this->materiales->listar3();
			$datos2 = $this->costostemp->listar();
			$contar = $this->productos->contar(); 
					
			return array('materiales'=>$datos, 'costostemp'=>$datos2, 'contar'=>$contar);
			
		}
		public function vercfijos(){
			$datos = $this->costosfijos->listarActual();
			$datos = mysqli_fetch_assoc($datos);
			return $datos;
			
		}
		public function actualizarcfijos(){
			if(!$_POST){
				$datos = $this->costosfijos->listarActual();
				$datos = mysqli_fetch_assoc($datos);
				return $datos;
			}else{					
				$this->costosfijos->set("alquiler",$_POST['alquiler']);
				$this->costosfijos->set("luz",$_POST['luz']);
				$this->costosfijos->set("agua",$_POST['agua']);
				$this->costosfijos->set("herramientas",$_POST['herramientas']);	
				$this->costosfijos->set("porcentaje",$_POST['porcentaje']);				
				$this->costosfijos->set("fecha",$_POST['fecha']);
				$this->costosfijos->add();	
				header("Location: " . URL . "costos/vercfijos");

				}
		}
		
		public function agregar(){
			if($_POST){
				//Crea un nuevo Producto
				$this->productos->set("cod_producto", $_POST['cod_producto']);
				//Agrega los valores del formulario costos a la tabla t_costosvariables
				$this->costosvariables->set("cod_producto", $_POST['cod_producto']);
				$this->costosvariables->set("mano_obra", $_POST['mano_obra']);
				$this->costosvariables->set("total", $_POST['total']);
				$this->costosvariables->set("fecha", date("Y-m-d"));
				$this->costosvariables->add();


				//Calcula el precio sugerido en base al total obtenido de los costos variables y le suma un porcentaje del total de los costos fijos				
				$totalCF = $this->costosfijos->totalCostosFijos();
				$porcentaje = ($totalCF['resultado'] * $totalCF['porcentaje']) /100;
				$totalCV = $_POST['total'];				
				$preciosugerido = $totalCV + $porcentaje;

				$this->productos->set("precio_sugerido", $preciosugerido);
				$this->productos->add();

				//Obtener el Codigo de los Costos fijos
				$cod_costosfijos = $this->costosfijos->listarActual();
				$cod_costosfijos = mysqli_fetch_assoc($cod_costosfijos);
				//print_r($cod_costosfijos['cod_costosfijos']);


				//Cargar todo en la Tabla Costos Generales
				$this->costos->set("cod_producto", $_POST['cod_producto']);
				$this->costos->set("cod_costosfijos", $cod_costosfijos);
				//$this->costos->set("cod_costosvariables", );
				header("Location: " . URL . "productos/agregar");				


			}
			
		}

		public function delMaterial($id){
			$this->costostemp->set("cod_material", $id);
			$this->costostemp->delete();
			header("Location: " . URL . "costos");
		}

		public function editar($id){
			if(!$_POST){
			$this->proveedor->set("cod_proveedor", $id);
			$datos = $this->proveedor->view();
			return $datos;
			}else{
				$this->proveedor->set("cod_proveedor", $_POST['cod_proveedor']);
				$this->proveedor->set("razon_social", $_POST['razon_social']);
				$this->proveedor->set("cuit", $_POST['cuit']);
				$this->proveedor->set("telefono", $_POST['telefono']);	
				$this->proveedor->set("direccion", $_POST['direccion']);			
				$this->proveedor->edit();
				header("Location: " . URL . "proveedores");
			}
		}
		public function buscar(){
			if(is_numeric($_GET['buscar'])){
				$this->proveedor->set("cod_proveedor", $_GET['buscar']);
			}else{	
				$this->proveedor->set("razon_social", $_GET['buscar']);
			}			

			$datos = $this->proveedor->buscar();			
			return $datos;
			header("Location: " . URL . "proveedor");

		}
		
		public function addMaterial($id){
				$producto = $this->productos->contar();
				if($producto == 0)
					$producto = 1;
				$this->costostemp->set("cod_producto", $producto);
				$this->costostemp->set("cod_material", $id);
				$this->costostemp->set("cantidad", $_POST['cantidad']);
				//echo $producto;
				$this->costostemp->add();
				header("Location: " . URL . "costos");				
			
		}
		

	}
	


?>