<?php namespace Controllers;
use Controllers\modalController as Modal;
use Models\Operaciones as Operaciones;
use Models\Cliente as Cliente;
use Models\Factura as Factura;
use Models\DetalleFactura as DetalleFactura;
use Models\Productos as Productos;



	

	class ventasController{
		
		private $modal;
		private $operaciones;
		private $cliente;
		private $factura;
		private $detallefactura;
		private $productos;


		//Variables para datos
		public $clienteFactura;
		

		public function __construct(){

			$this->modal = new Modal();
			$this->operaciones = new Operaciones();
			$this->cliente = new Cliente();
			$this->factura = new Factura();
			$this->detallefactura = new DetalleFactura();
			$this->productos = new Productos();


			
		}

		public function index(){
			$clientes = $this->modal->clientesmodal();
			$productos = $this->modal->productosmodal();
			if (isset($_SESSION['clienteFactura'])) {
				$clienteFactura = $_SESSION['clienteFactura'];
			}else
				$clienteFactura = "";

			
			$datos = array('clientes'=>$clientes, 'productos'=>$productos, 'clienteFactura'=>$clienteFactura);
			
			return $datos;
			
		}
		
		public function historialventas(){
			
		}

		public function factura(){			
			$lastIdFactura = 0;
			if (isset($_SESSION['lastIdFactura']))
				$lastIdFactura = $_SESSION['lastIdFactura'];
			
			$this->factura->set("cod_factura", $lastIdFactura);
			$datosFactura = $this->factura->view2();
			$datosProductos = $this->productos->listar();
			$datos = array('factura' => $datosFactura, 'productos' => $datosProductos );
			return $datos;
			
		}

		public function facturb(){
			
		}

		public function facturc(){
			
		}


		public function comprobarTipoFactura(){
			unset($_SESSION['clienteFactura']);
			//FACTURA C	
			if($_POST['apyn'] == "" OR 0){	
				$num_factura = $this->factura->ultimoNumFactura('c');
					
					if($num_factura['ultimoNum'] == 0 OR $num_factura['ultimoNum'] == "")
						$num_factura_actual = 1;
					$num_factura_actual = $num_factura['ultimoNum'] + 1;

					$this->factura->set("tipo_factura", "C");
					$this->factura->set("num_factura", $num_factura_actual);
					$this->factura->set("cod_clientes", 'NULL');					
					$_SESSION['lastIdFactura'] = $this->factura->add();

				header("Location: " . URL . "ventas/facturc");
			}

			

			else{	
			//FACTURA A			
				

				if ($_POST['iva'] == 'Responsable Inscripto') {
					$num_factura = $this->factura->ultimoNumFactura('a');
					
					if($num_factura['ultimoNum'] == 0 OR $num_factura['ultimoNum'] == "")
						$num_factura_actual = 1;
					$num_factura_actual = $num_factura['ultimoNum'] + 1;
					
					$this->factura->set("tipo_factura", "A");
					$this->factura->set("num_factura", $num_factura_actual);
					$this->factura->set("cod_clientes", $_POST['cod_clientes']);					
					$_SESSION['lastIdFactura'] = $this->factura->add();

					header("Location: " . URL . "ventas/factura");
						
				}

			//FACTURA B

				elseif ($_POST['iva'] == 'Consumidor Final' OR 'Monotributista') {
					$num_factura = $this->factura->ultimoNumFactura('b');
					
					if($num_factura['ultimoNum'] == 0 OR $num_factura['ultimoNum'] == "")
						$num_factura_actual = 1;
					$num_factura_actual = $num_factura['ultimoNum'] + 1;

					$this->factura->set("tipo_factura", "B");
					$this->factura->set("num_factura", $num_factura_actual);
					$this->factura->set("cod_clientes", $_POST['cod_clientes']);					
					$_SESSION['lastIdFactura'] = $this->factura->add();
					header("Location: " . URL . "ventas/facturb");

					
					
				}
			}
		
			
		}
		public function cancelarCliente(){
			unset($_SESSION['clienteFactura']);
			header("Location: " . URL . "ventas");

		}

		public function addProductoFactura(){
			if($_POST){			
				

					

			}
		}

		public function addClienteFactura($id){
			$this->cliente->set("cod_clientes", $id);			
			$_SESSION['clienteFactura'] = $this->cliente->view();			
						
			header("Location: " . URL . "ventas");
			
		}
	}

?>