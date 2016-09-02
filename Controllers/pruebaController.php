<?php namespace Controllers;
	use Models\Prueba as Prueba;

	class pruebaController{
		private $prueba;

		public function __construct(){
			$this->prueba = new prueba();
		}

		public function index(){
			$datos = $this->prueba->listar();			
			return $datos;
		}

		public function agregar(){
			if ($_POST) {
				$this->prueba->set("apyn", $_POST['apyn']);
				$this->prueba->set("documento", $_POST['documento']);
				$this->prueba->set("fnac", $_POST['fnac']);
				$this->prueba->set("direccion", $_POST['direccion']);
				$this->prueba->set("cuit", $_POST['cuit']);
				$this->prueba->set("telefono", $_POST['telefono']);
				$this->prueba->set("iva", $_POST['iva']);
				$this->prueba->add();
				header("Location: " . URL . "pruebas");
			}
		}

		public function eliminar($id){
			$this->prueba->set("cod_pruebas", $id);
			$this->prueba->delete();
			header("Location: " . URL . "pruebas");
		}

		public function editar($id){
			if(!$_POST){
			$this->prueba->set("cod_pruebas", $id);
			$datos = $this->prueba->view();
			return $datos;
			}else{
				$this->prueba->set("cod_pruebas", $_POST['cod_pruebas']);
				$this->prueba->set("apyn", $_POST['apyn']);
				$this->prueba->set("documento", $_POST['documento']);
				$this->prueba->set("fnac", $_POST['fnac']);
				$this->prueba->set("direccion", $_POST['direccion']);
				$this->prueba->set("cuit", $_POST['cuit']);
				$this->prueba->set("telefono", $_POST['telefono']);
				$this->prueba->set("iva", $_POST['iva']);
				$this->prueba->edit();
				header("Location: " . URL . "pruebas");
			}
		}

		public function buscar(){
			if(is_numeric($_GET['buscar'])){
				$this->prueba->set("documento", $_GET['buscar']);
			}else{	
				$this->prueba->set("apyn", $_GET['buscar']);
			}
				
			$datos = $this->prueba->buscar();
			return $datos;
			header("Location: " . URL . "prueba");

		}

	}

?>