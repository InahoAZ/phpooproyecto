<?php namespace Controllers;
	use Models\PlanDeCuentas as PlanDeCuentas;

	class cuentasController{
		private $cuenta;

		public function __construct(){
			$this->cuenta = new PlanDeCuentas();
		}

		public function index(){
			$datos = $this->cuenta->listar();
			return $datos;
		}

		public function agregar(){
			if ($_POST) {
				$this->cuenta->set("cod_cuenta", $_POST['cod_cuenta']);
				$this->cuenta->set("detalle", $_POST['detalle']);
				$this->cuenta->set("tipo", $_POST['tipo']);
				$this->cuenta->add();
				//header("Location: " . URL . "cuentas");
			}
		}

		public function eliminar($id){
			$this->cuenta->set("cod_cuenta", $id);
			$this->cuenta->delete();
			header("Location: " . URL . "cuentas");
}

		public function editar($id){
			if(!$_POST){
			$this->cuenta->set("cod_cuenta", $id);
			$datos = $this->cuenta->view();
			return $datos;
			}else{
				$this->cuenta->set("cod_cuenta", $_POST['cod_cuenta']);
				$this->cuenta->set("detalle", $_POST['detalle']);
				$this->cuenta->set("tipo", $_POST['tipo']);
				$this->cuenta->edit();
				header("Location: " . URL . "cuentas");
			}
		}

	

	}