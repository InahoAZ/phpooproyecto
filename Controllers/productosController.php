<?php namespace Controllers;	
use Models\Productos as Productos;
use Models\Costos as Costos;
use Models\CostosFijos as CostosFijos;
use Models\CostosVariables as CostosVariables;
use Models\CostosTemp as CostosTemp;


class productosController{
	private $productos;
	private $costos;
	private $costosfijos;
	private $costosvariables;
	private $costostemp;

	public function __construct(){			
		$this->productos = new Productos();
		$this->costos = new Costos();
		$this->costosfijos = new CostosFijos();
		$this->costosvariables = new CostosVariables();
		$this->costostemp = new CostosTemp();
	}

	public function index(){
		$datos = $this->productos->listar();
		$datos2 = $this->costostemp->listar();
		return array('productos'=>$datos, 'costostemp'=>$datos2);		
	}

	public function agregar(){
		
	//Si se presiona Calcular äct = 1, si se presiona Registrar act = 2 
		if(isset($_POST['act']) && $_POST['act'] == 1){
			//Paso 1: se crea un nuevo producto con su nombre y se pasa a la vista de costos para calcularlo.
			$this->productos->set("descripcion", $_POST['descripcion']);
			$_SESSION['lastIdProducto'] = $this->productos->add();
			header("Location: " . URL . "costos");
			
		}
		if(isset($_POST['act']) && $_POST['act'] == 2){
			
		}
		

		
	}

	public function eliminar($id){
		$this->productos->set("cod_producto", $id);
		$this->productos->delete();
		header("Location: " . URL . "productos");
	}

	public function editar($id){

	}
	public function buscar(){
		if(is_numeric($_GET['buscar'])){
			$this->productos->set("cod_producto", $_GET['buscar']);
		}else{	
			$this->productos->set("razon_social", $_GET['buscar']);
		}			

		$datos = $this->productos->buscar();			
		return $datos;
		header("Location: " . URL . "productos");

	}

	public function calcular(){
		$this->costosfijos->listarActual();



	}



}



?>