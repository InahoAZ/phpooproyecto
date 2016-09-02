<?php namespace Controllers;
	use Models\Cliente as Cliente;

	class clientesController{
		private $cliente;

		public function __construct(){
			$this->cliente = new Cliente();
		}

		public function index(){
			$datos = $this->cliente->listar();
			return $datos;
		}

		public function agregar(){
			if ($_POST) {
				$this->cliente->set("apyn", $_POST['apyn']);
				$this->cliente->set("documento", $_POST['documento']);
				$this->cliente->set("fnac", $_POST['fnac']);
				$this->cliente->set("direccion", $_POST['direccion']);
				$this->cliente->set("cuit", $_POST['cuit']);
				$this->cliente->set("telefono", $_POST['telefono']);
				$this->cliente->set("iva", $_POST['iva']);
				$this->cliente->add();
				header("Location: " . URL . "clientes");
			}
		}

		public function eliminar($id){
			$this->cliente->set("cod_clientes", $id);
			$this->cliente->delete();
			header("Location: " . URL . "clientes");
		}

		public function editar($id){
			if(!$_POST){
			$this->cliente->set("cod_clientes", $id);
			$datos = $this->cliente->view();
			return $datos;
			}else{
				$this->cliente->set("cod_clientes", $_POST['cod_clientes']);
				$this->cliente->set("apyn", $_POST['apyn']);
				$this->cliente->set("documento", $_POST['documento']);
				$this->cliente->set("fnac", $_POST['fnac']);
				$this->cliente->set("direccion", $_POST['direccion']);
				$this->cliente->set("cuit", $_POST['cuit']);
				$this->cliente->set("telefono", $_POST['telefono']);
				$this->cliente->set("iva", $_POST['iva']);
				$this->cliente->edit();
				header("Location: " . URL . "clientes");
			}
		}

		public function buscar(){
			if(is_numeric($_GET['buscar'])){
				$this->cliente->set("documento", $_GET['buscar']);
			}else{	
				$this->cliente->set("apyn", $_GET['buscar']);
			}
				
			$datos = $this->cliente->buscar();
			return $datos;
			header("Location: " . URL . "cliente");

		}

	}

?>