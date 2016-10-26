<?php namespace Controllers;
use Models\Material as Material;
use Models\Proveedor as Proveedor;
use Models\CostosTemp as CostosTemp;
use Models\UnidadesMedida as UnidadesMedida;
use Models\Operaciones as Operaciones;
use Models\AsientosContables as AsientosContables;
use Models\DetalleAsiento as DetalleAsiento;


class materialesController{
	private $material;
	private $costostemp;
	private $unidadesmedida;
	private $operaciones;
	private $asientoscontables;
	private $detalleasiento;
	private $lastId;

	public function __construct(){
		$this->material = new Material();
		$this->proveedor = new Proveedor();
		$this->costostemp = new CostosTemp();
		$this->unidadesmedida = new UnidadesMedida();
		$this->operaciones = new Operaciones();
		$this->asientoscontables = new AsientosContables();
		$this->detalleasiento = new DetalleAsiento();

	}

	public function index(){
		$datos = $this->material->listar2();			
		$datos2 = $this->unidadesmedida->listar();
		return array('materiales'=>$datos, 'unidadesmedida'=>$datos2);

	}
	
	public function indexcostos(){
		$datos = $this->material->listar2();		
		return array('materiales'=> $datos );

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
	public function reabastecer($id){
		$this->material->set("cod_material", $id);
		$datos = $this->material->view2();
		return array('materiales'=>$datos);
		if ($_POST) {
			$this->operaciones->set("cod_material", $id);
			$this->operaciones->set("q" , $_POST['stock']);
			$this->operaciones->set("cod_tipo_operacion", 1);
			$this->material->set("stock", $_POST['stock']);
			$_SESSION['stock'] = $_POST['stock'];
			$this->lastId = $this->operaciones->add();
			//header("Location: " . URL . "materiales/reabastecerAdd/" . $id);

			
		}		

			
	}
	public function reabastecerAdd($id=""){
		$this->material->set("cod_material", $id);	
		$datos = $this->material->listar3();
		$datos2 = $this->material->view2();		
		//$row = mysqli_fetch_assoc($datos2);
		$stock = $datos2['stock']; //Stock antes de agregar
		$lastNumAsiento = $this->asientoscontables->lastNumAsiento();
		$lastNumAsiento = $lastNumAsiento['num_asiento'];
		if($lastNumAsiento == 0)
			$lastNumAsiento = 1;
		else
			$lastNumAsiento++;

		if (isset($_POST['subt'])) {
			$this->operaciones->set("cod_material", $id);
			$this->operaciones->set("q" , $_POST['cantidad']);
			$this->operaciones->set("cod_tipo_operacion", 1);
			$this->material->set("cod_material", $id);
			$this->material->set("stock", $stock + $_POST['cantidad']); //Se le suma el stock actual + el stock nuevo recibido por el formulario (POST)
			$this->lastId = $this->operaciones->add();

			$this->asientoscontables->set("num_asiento", $lastNumAsiento);
			$this->asientoscontables->set("concepto", "Reabastecimiento");		
			$this->asientoscontables->set("cod_factura", $this->lastId);
			$this->asientoscontables->add();

			$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
			$this->detalleasiento->set("debe", 0);
			$this->detalleasiento->set("haber", 0);
			$this->detalleasiento->set("cod_cuenta", "0"); //Se crea un detalle con cuenta 0 para iniciar el asiento
			$this->detalleasiento->set("orden", 0);			
			$this->detalleasiento->add();

			$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
			$this->detalleasiento->set("debe", $_POST['subt']);
			$this->detalleasiento->set("haber", 0);
			$this->detalleasiento->set("cod_cuenta", "1.3.2"); //1.3.2 corresponde a la cuenta Materia Prima.
			$this->detalleasiento->set("orden", 1);	
			$this->detalleasiento->add();

			$iva =($_POST['subt']*21)/100;

			$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
			$this->detalleasiento->set("debe", $iva);
 			$this->detalleasiento->set("haber", 0);
			$this->detalleasiento->set("cod_cuenta", "1.5.1"); //1.5.1 corresponde a la cuenta IVA Crédito Fiscal.
			$this->detalleasiento->set("orden", 2);	
			$this->detalleasiento->add();

			$efectivo = $_POST['efectivo'] - $_POST['vuelto'];

			$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
			$this->detalleasiento->set("debe", 0);
			$this->detalleasiento->set("haber", $efectivo);
			$this->detalleasiento->set("cod_cuenta", "1.1.1"); //1.1.1 corresponde a la cuenta Caja.
			$this->detalleasiento->set("orden", 3);	
			$this->detalleasiento->add();


			$this->material->updateStock();
		//header("Location: " . URL . "materiales/reabastecerComprobante/" . $this->lastId);

	}
	return $datos2;
}

	public function reabastecerComprobante($id=""){ //Aca la wea que se imprime

		if ($id =="")
			$this->operaciones->set("cod_operacion", $this->lastId);
		$this->operaciones->set("cod_operacion", $id);

		$datos = $this->operaciones->view2();
		return $datos;
		
		
	}

	public function historial($id=""){
		if($id != ""){
			$this->operaciones->set("cod_material", $id);
			$datos = $this->operaciones->buscar();
			//$datos = mysqli_fetch_assoc($datos);
			if($_POST){
				$this->operaciones->set("desde", $_POST['fecha1']);
				$this->operaciones->set("hasta", $_POST['fecha2']);			
				$datos = $this->operaciones->buscarFecha();
				return $datos;
			}
			return $datos;
		} else{
			$datos = $this->operaciones->listar2();
			if($_POST){
				$this->operaciones->set("desde", $_POST['fecha1']);
				$this->operaciones->set("hasta", $_POST['fecha2']);			
				$datos = $this->operaciones->buscarFecha();
				return $datos;
			}
			return $datos;
		}		
	}

	public function materialesFrecuentes(){
		$datos = $this->operaciones->materialesFrecuentes();
		return $datos;

	}

	public function materialesGastos(){
		$datos = $this->operaciones->materialesGastos();
		return $datos;

	}

	public function eliminar($id){
		$this->material->set("cod_material", $id);
		$this->material->delete();
		$this->operaciones->set("cod_material", $id);
		$this->operaciones->deleteWhereMat(); //Al eliminar un material tambien todo su historial de operaciones. (Eliminar != Dejar Inactivo)
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
			$this->costostemp->set("cod_producto", $_SESSION['lastIdProducto']);
			$this->costostemp->set("cod_material", $id);
			$this->costostemp->set("cantidad", $_POST['cantidad']);
			$this->costostemp->add();
			//header("Location: " . URL . "materiales");	
		}		
		
	}

}



?>
