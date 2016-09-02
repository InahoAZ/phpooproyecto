<?php namespace Controllers;
use Models\Material as Material;
use Models\Proveedor as Proveedor;
use Models\CostosTemp as CostosTemp;
use Models\UnidadesMedida as UnidadesMedida;
use Models\Operaciones as Operaciones;

class materialesController{
	private $material;
	private $costostemp;
	private $unidadesmedida;
	private $opeaciones;

	public function __construct(){
		$this->material = new Material();
		$this->proveedor = new Proveedor();
		$this->costostemp = new CostosTemp();
		$this->unidadesmedida = new UnidadesMedida();
		$this->operaciones = new Operaciones();

	}

	public function index(){
		$datos = $this->material->listar2();			
		$datos2 = $this->unidadesmedida->listar();
		return array('materiales'=>$datos, 'unidadesmedida'=>$datos2);

	}
	public function agregar(){
		if ($_POST) {
			$this->material->set("descripcion", $_POST['descripcion']);
			$this->material->set("cod_unidad", $_POST['cod_unidad']);
			$this->material->set("precio_unitario", $_POST['precio_unitario']);
			if ($_POST['stock'] == "" || $_POST['stock'] == "0")
				$_POST['stock'] = "null";
			$this->material->set("stock", $_POST['stock']);

			$this->material->set("cod_proveedor", $_POST['cod_proveedor']);				
			$lastId = $this->material->add();
			//print $lastId;
			if($_POST["stock"]!="" || $_POST["stock"]!="0"){
				$this->operaciones->set("cod_material", $lastId);
				$this->operaciones->set("q", $_POST['stock']);
				$this->operaciones->set("cod_tipo_operacion", 1);
				$this->operaciones->add();
			}		

			header("Location: " . URL . "materiales");
		}
	}
	public function reabastecer(){
		$datos = $this->material->listar3();
		return array('materiales'=>$datos);
		if ($_POST) {
			$this->operaciones->set("cod_material", $id);
			$this->operaciones->set("q" , $_POST['stock']);
			$this->operaciones->set("cod_tipo_operacion", 1);
			$this->material->set("stock", $_POST['stock']);
			$this->operaciones->add();

			
			}		

			//header("Location: " . URL . "materiales");
		}
	public function reabastecerAdd($id=""){
		$this->material->set("cod_material", $id);	
		$datos = $this->material->listar3();
		$datos2 = $this->material->view2();		
		$row = mysqli_fetch_assoc($datos);
		$stock = $row['stock']; //Stock antes de agregar
		if ($_POST) {
			$this->operaciones->set("cod_material", $id);
			$this->operaciones->set("q" , $_POST['stock']);
			$this->operaciones->set("cod_tipo_operacion", 1);
			$this->material->set("cod_material", $id);
			$this->material->set("stock", $stock + $_POST['stock']); //Se le suma el stock agregado
			$this->operaciones->add();
			$this->material->updateStock();
			//header("Location: " . URL . "materiales");
			
			}

			return $datos2;
			
		}

	public function reabastecerReport(){
		$datos = $this->material->listar3();
		$datos2 = $this->proveedor->view();
		return array('material' => $datos, 'proveedor' => $datos2);
		
	}

	public function eliminar($id){
		$this->material->set("cod_material", $id);
		$this->material->delete();
		$this->operaciones->set("cod_material", $id);
		$this->operaciones->deleteWhereMat();
		header("Location: " . URL . "materiales");
	}

	public function editar($id){
		if(!$_POST){
			$this->material->set("cod_material", $id);
			$datos = $this->material->view2();
			return $datos;
		}else{				
			$this->material->set("cod_material", $_POST['cod_material']);
			$this->material->set("descripcion", $_POST['descripcion']);
			$this->material->set("cod_unidad", $_POST['cod_unidad']);				
			$this->material->set("precio_unitario", $_POST['precio_unitario']);			
			$this->material->set("cod_proveedor", $_POST['cod_proveedor']);				
			$this->material->edit();
			print URL;
			header("Location: " . URL . "materiales");
		}
	}
	public function buscar(){
		if(is_numeric($_GET['buscar'])){
			$this->material->set("cod_material", $_GET['buscar']);
		}else{	
			$this->material->set("descripcion", $_GET['buscar']);
		}			

		$datos = $this->material->buscar2();
			//print_r($datos);		
		return $datos;
		header("Location: " . URL . "material");

	}

	public function comboBox(){
		$datos = $this->proveedor->comboBox();
		return $datos;
	}

	public function addMaterial($id){
		if($_POST){			
			$this->costostemp->set("cod_producto", 2);
			$this->costostemp->set("cod_material", $id);
			$this->costostemp->set("cantidad", $_POST['cantidad']);
			$this->costostemp->add();
			header("Location: " . URL . "materiales");	
		}		
		
	}

}



?>