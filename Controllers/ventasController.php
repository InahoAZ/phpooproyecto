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
		$datos2 = $this->factura->view2();
		$this->productos->set("cod_factura", $lastIdFactura);
		$datos = $this->productos->listar3();
		$this->detallefactura->set("cod_factura", $lastIdFactura);
		$datos3 = $this->detallefactura->listarDetalleA();

		return $datos = array('productos' => $datos , 'factura' => $datos2, 'detallefactura' => $datos3);

	}

	public function facturb(){
		$lastIdFactura = 0;
		if (isset($_SESSION['lastIdFactura']))
			$lastIdFactura = $_SESSION['lastIdFactura'];			
		$this->factura->set("cod_factura", $lastIdFactura);
		$datos2 = $this->factura->view2();
		$this->productos->set("cod_factura", $lastIdFactura);
		$datos = $this->productos->listar3();
		$this->detallefactura->set("cod_factura", $lastIdFactura);
		$datos3 = $this->detallefactura->listarDetalleB();

		return $datos = array('productos' => $datos , 'factura' => $datos2, 'detallefactura' => $datos3);


	}

	public function facturc(){
		$lastIdFactura = 0;
		if (isset($_SESSION['lastIdFactura']))
			$lastIdFactura = $_SESSION['lastIdFactura'];			
		$this->factura->set("cod_factura", $lastIdFactura);
		$datos2 = $this->factura->view();
		$this->productos->set("cod_factura", $lastIdFactura);
		$datos = $this->productos->listar3();
		$this->detallefactura->set("cod_factura", $lastIdFactura);
		$datos3 = $this->detallefactura->listarDetalleC();

		return $datos = array('productos' => $datos , 'factura' => $datos2, 'detallefactura' => $datos3);

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
			$this->detallefactura->set("cod_factura",  $_SESSION['lastIdFactura']);
			$this->detallefactura->set("cod_producto", $_POST['cod_producto'] );
			$this->detallefactura->set("cantidad", $_POST['cantidad'] );
			$this->detallefactura->set("precio_venta", $_POST['precio_unitario'] );
			$this->factura->set("cod_factura", $_SESSION['lastIdFactura']);
			$lastIdFactura = $this->factura->view();
			$lastIdFactura = mysqli_fetch_assoc($lastIdFactura);
			$tipofactura = $lastIdFactura['tipo_factura'];
			$lastIdFactura = $lastIdFactura['num_factura'];
			//echo "lastIdFactura: " . $lastIdFactura;
			$this->detallefactura->set("num_factura", $lastIdFactura);				
			$this->detallefactura->add();

			switch ($tipofactura) {
				case 'A':
					header("Location: " . URL . "ventas/factura");
				break;

				case 'B':
					header("Location: " . URL . "ventas/facturb");
				break;

				case 'C':
					header("Location: " . URL . "ventas/facturc");
				break;				
			}
		}
	}

	public function delProductoFactura($id){
		$this->detallefactura->set("cod_producto", $id);
		$this->detallefactura->delete();
		$this->factura->set("cod_factura", $_SESSION['lastIdFactura']);
		$lastIdFactura = $this->factura->view();
		$lastIdFactura = mysqli_fetch_assoc($lastIdFactura);
		$tipofactura = $lastIdFactura['tipo_factura'];
		switch ($tipofactura) {
				case 'A':
					header("Location: " . URL . "ventas/factura");
				break;

				case 'B':
					header("Location: " . URL . "ventas/facturb");
				break;

				case 'C':
					header("Location: " . URL . "ventas/facturc");
				break;				
			}



	}

	public function addClienteFactura($id){
		$this->cliente->set("cod_clientes", $id);			
		$_SESSION['clienteFactura'] = $this->cliente->view();			

		header("Location: " . URL . "ventas");

	}

	public function pagoefectivo(){
		
	}
}

?>