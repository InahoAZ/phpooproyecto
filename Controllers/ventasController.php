<?php namespace Controllers;
use Controllers\modalController as Modal;
use Models\Operaciones as Operaciones;
use Models\Cliente as Cliente;

	

	class ventasController{
		
		private $modal;
		private $operaciones;
		private $cliente;

		//Variables para datos
		public $clienteFactura;
		

		public function __construct(){

			$this->modal = new Modal();
			$this->operaciones = new Operaciones();
			$this->cliente = new Cliente();


			
		}

		public function index(){
			$clientes = $this->modal->clientesmodal();
			$productos = $this->modal->productosmodal();
			$clienteFactura = $this->clienteFactura;
			$datos = array('clientes'=>$clientes, 'productos'=>$productos, 'clienteFactura'=>$clienteFactura);
			
			return $datos;
			
			
		}
		
		public function historialventas(){
			
		}

		public function addProductoFactura(){
			if($_POST){			
				

					

			}
		}

		public function addClienteFactura($id){
			$this->cliente->set("cod_clientes", $id);			
			$this->$clienteFactura = $this->cliente->view();
			
						
			//header("Location: " . URL . "ventas");
			
		}
	}

?>