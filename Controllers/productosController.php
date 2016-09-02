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
		if($_POST){
			$this->productos->set("cod_producto", $_POST['cod_producto']);
			$this->productos->set("descripcion", $_POST['descripcion']);
			$this->productos->set("stock", $_POST['stock']);
			$this->productos->set("precio_unitario", $_POST['precio_unitario']);
			$this->productos->set("fecha_alta", date("Y-m-d"));
			$this->productos->edit();
			print_r($_POST['cod_producto']);			
		}
		else{
			$coso = $this->costostemp->listar();
			$coso = mysqli_fetch_assoc($coso);
			print_r($coso);
			if(!empty($coso)){
			$datos = $this->productos->listar();
			$row = mysqli_fetch_assoc($datos);
			return $row;
			}
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