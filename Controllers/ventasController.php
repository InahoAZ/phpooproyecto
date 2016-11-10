<?php namespace Controllers;
use Controllers\modalController as Modal;
use Models\Operaciones as Operaciones;
use Models\Cliente as Cliente;
use Models\Factura as Factura;
use Models\DetalleFactura as DetalleFactura;
use Models\Productos as Productos;
use Models\AsientosContables as AsientosContables;
use Models\DetalleAsiento as DetalleAsiento;
use Models\AsientosContablesCaja as AsientosContablesCaja;
use Models\DetalleAsientoCaja as DetalleAsientoCaja;





class ventasController{

	private $modal;
	private $operaciones;
	private $cliente;
	private $factura;
	private $detallefactura;
	private $productos;
	private $asientoscontables;
	private $detalleasiento;
	private $asientoscontablescaja;
	private $detalleasientocaja;


		//Variables para datos
	public $clienteFactura;


	public function __construct(){

		$this->modal = new Modal();
		$this->operaciones = new Operaciones();
		$this->cliente = new Cliente();
		$this->factura = new Factura();
		$this->detallefactura = new DetalleFactura();
		$this->productos = new Productos();
		$this->asientoscontables = new AsientosContables();
		$this->detalleasiento = new DetalleAsiento();
		$this->asientoscontablescaja = new AsientosContablesCaja();
		$this->detalleasientocaja = new DetalleAsientoCaja();


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
		$datos = $this->factura->listarFacturas();
		return $datos;

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
	public function finalizarventa(){ // Esto se va a encargar de terminar la factura 100%ezreal, osea que en la tabla Factura, finalizado = 1
		$lastIdFactura = 0;
		if(isset($_SESSION['lastIdFactura']))
			$lastIdFactura = $_SESSION['lastIdFactura']; //Toma el id de la factura con la que se esta trabajan2		
		$this->factura->set("cod_factura", $lastIdFactura);
		$datosFactura = $this->factura->view();
		$this->detallefactura->set("cod_factura", $lastIdFactura);
		$datosDetalleFactura = $this->detallefactura->view2();		
		$haber = 0;
		while ($producto = mysqli_fetch_assoc($datosDetalleFactura)) {			
			//echo $haber . "<br>";
			$this->productos->set("cod_producto", $producto['cod_producto']);
			$this->operaciones->set("cod_producto", $producto['cod_producto']);
			$this->operaciones->set("cod_factura", $lastIdFactura);
			$this->operaciones->set("q", $producto['cantidad']);
			$this->operaciones->set("cod_tipo_operacion", 2); // 2 corresponde a una operacion de Salida.
			$this->operaciones->add();
			$datosActualProducto = $this->productos->view(); //Recibe la cantidad actual del producto, antes de vender.
			//echo $datosActualProducto['stock'];
			//echo $producto['cantidad'];
			$stockDespues = $datosActualProducto['stock'] - $producto['cantidad'];//Le resta la cantidad vendida			
			$this->productos->set("stock", $stockDespues);
			$this->productos->updateStock();
			$aux = $producto['precio_venta'] * $producto['cantidad'];
			$auxiva = ($aux*21)/100;
			$aux += $auxiva;			
			$haber += $aux;	//Todos los productos que se vendieron en esa factura. (5.1 Ventas)	
			//echo $haber . "<br>";	
			
		}
		//echo $haber ."<br>";
		$iva = $haber - ($haber/1.21);
		//echo $iva . "<br>";
		$haber = $haber/1.21;
		//echo $haber . "<br>";
		
		$this->factura->set("finalizado", 1);		
		$this->factura->editFinalizado();
		$lastNumAsiento = $this->asientoscontablescaja->lastNumAsiento();
		$lastNumAsiento = $lastNumAsiento['num_asiento'];
		if($lastNumAsiento == 0)
			$lastNumAsiento = 1;
		else
			$lastNumAsiento++;

		$debe = $_POST['efectivo'] - $_POST['vuelto']; //Lo que se recibio en efectivo. (1.1.1 Caja)
		 
		//LIBRO  Diario

		$this->asientoscontablescaja->set("num_asiento", $lastNumAsiento);
		$this->asientoscontablescaja->set("concepto", "Venta");		
		$this->asientoscontablescaja->set("cod_factura", $lastIdFactura);
		$this->asientoscontablescaja->add();

		$this->detalleasientocaja->set("num_asiento", $lastNumAsiento);		
		$this->detalleasientocaja->set("debe", 0);
		$this->detalleasientocaja->set("haber", 0);
		$this->detalleasientocaja->set("cod_cuenta", "0"); //Se crea un detalle con cuenta 0 para iniciar el asiento
		$this->detalleasientocaja->set("orden", 0);	
		$this->detalleasientocaja->add();	

		$this->detalleasientocaja->set("num_asiento", $lastNumAsiento);		
		$this->detalleasientocaja->set("debe", $debe);
		$this->detalleasientocaja->set("haber", 0);
		$this->detalleasientocaja->set("cod_cuenta", "1.1.1"); //1.1.1 corresponde a la cuenta Caja.
		$this->detalleasientocaja->set("orden", 1);	
		$this->detalleasientocaja->add();

		$this->detalleasientocaja->set("num_asiento", $lastNumAsiento);		
		$this->detalleasientocaja->set("debe", 0);
		$this->detalleasientocaja->set("haber", $iva );
		$this->detalleasientocaja->set("cod_cuenta", "2.2.1"); //2.2.1 corresponde a la cuenta IVA Débito Fiscal.
		$this->detalleasientocaja->set("orden", 2);	
		$this->detalleasientocaja->add();		

		$this->detalleasientocaja->set("num_asiento", $lastNumAsiento);
		$this->detalleasientocaja->set("debe", 0);
		$this->detalleasientocaja->set("haber", $haber);
		$this->detalleasientocaja->set("cod_cuenta", "5.1"); //5.1 Corresponde a la cuenta Ventas
		$this->detalleasientocaja->set("orden", 3);	
		$this->detalleasientocaja->add();

		/*//LIBRO DIARIO

		$stemen = $this->asientoscontables->listarUlt();
		$stemen = mysqli_fetch_array($stemen);
		print_r($stemen);

		$this->asientoscontables->set("num_asiento", $lastNumAsiento);
		$this->asientoscontables->set("concepto", "Venta");		
		$this->asientoscontables->set("cod_factura", $lastIdFactura);

		$lastNumAsiento = $stemen['num_asiento'];
		if($lastNumAsiento == '')
			$lastNumAsiento = 1;
		


		if($stemen['num_asiento'] == ""){
			$this->asientoscontables->add();
		}else{			
			$fechaantes = date_create($stemen['fecha_asiento']);
			$fechash = date_format($fechaantes, "Y-m-d");
			print_r($fechash);
			echo date('d-m-Y');
			if($fechash != date('Y-m-d') && $stemen['concepto'] == 'Venta'){
				$lastNumAsiento++;								
				$this->asientoscontables->add();
				echo "AAAAAAAAAAA";
			}
		}

		

		$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
		$this->detalleasiento->set("debe", 0);
		$this->detalleasiento->set("haber", 0);
		$this->detalleasiento->set("cod_cuenta", "0"); //Se crea un detalle con cuenta 0 para iniciar el asiento
		$this->detalleasiento->set("orden", 0);			
		$this->detalleasiento->add();	

		$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
		$this->detalleasiento->set("debe", $debe);
		$this->detalleasiento->set("haber", 0);
		$this->detalleasiento->set("cod_cuenta", "1.1.1"); //1.1.1 corresponde a la cuenta caja.
		$this->detalleasiento->set("orden", 1);	
		$this->detalleasiento->add();

		$this->detalleasiento->set("num_asiento", $lastNumAsiento);		
		$this->detalleasiento->set("debe", 0);
		$this->detalleasiento->set("haber", $iva );
		$this->detalleasiento->set("cod_cuenta", "2.2.1"); //2.2.1 corresponde a la cuenta IVA Débito Fiscal.
		$this->detalleasiento->set("orden", 2);	
		$this->detalleasiento->add();		

		$this->detalleasiento->set("num_asiento", $lastNumAsiento);
		$this->detalleasiento->set("debe", 0);
		$this->detalleasiento->set("haber", $haber);
		$this->detalleasiento->set("cod_cuenta", "5.1"); //5.1 Corresponde a la cuenta Ventas
		$this->detalleasiento->set("orden", 3);	
		$this->detalleasiento->add();
*/
		header("Location:" . URL . "ventas/verfactura/" . $lastIdFactura);

	}
	public function verfactura($id){ //Esto simplemente hace la consulta completa de la factura y la muestra. Segun su codigo.
		$this->factura->set("cod_factura", $id);
		$datos = $this->factura->verFacturaDatos();
		$datos2 = $this->factura->verFacturaDetalle();	
		$datos3 = $this->factura->verFacturaDatosC();	
		return $datos = array('factura' => $datos, 'detalle' => $datos2, 'facturc' => $datos3);
		
	}
}

?>