<?php namespace Controllers;	
	use Models\Proveedor as Proveedor;

	class proveedoresController{
		private $proveedor;

		public function __construct(){			
			$this->proveedor = new Proveedor();
		}

		public function index(){
			$datos = $this->proveedor->listar();
			return $datos;
		}

		public function agregar(){
			if ($_POST) {
				$this->proveedor->set("razon_social", $_POST['razon_social']);
				$this->proveedor->set("cuit", $_POST['cuit']);
				$this->proveedor->set("telefono", $_POST['telefono']);
				$this->proveedor->set("direccion", $_POST['direccion']);						
				$this->proveedor->add();
				header("Location: " . URL . "proveedores");
			}
		}

		public function eliminar($id){
			$this->proveedor->set("cod_proveedor", $id);
			$this->proveedor->delete();
			header("Location: " . URL . "proveedores");
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

		

	}
	


?>