<?php namespace Controllers;
use Models\AsientosContables as AsientosContables;
use Models\AsientosContablesCaja as AsientosContablesCaja;
use Models\Operaciones as Operaciones;
use Models\DetalleAsiento as DetalleAsiento;
use Models\DetalleAsientoCaja as DetalleAsientoCaja;



class contabilidadController{

	private $detalleasiento;
	private $detalleasientocaja;
	private $asientoscontables;
	private $asientoscontablescaja;
	private $operaciones;

	public function __construct(){

		$this->detalleasiento = new DetalleAsiento();
		$this->detalleasientocaja = new DetalleAsientoCaja();
		$this->asientoscontables = new AsientosContables();
		$this->asientoscontablescaja = new AsientosContablesCaja();
		$this->operaciones = new Operaciones();


	}
	public function index(){

	}
	public function librodiario(){
		$datos = $this->asientoscontablescaja->listar();
		if(!isset($_POST['fecha1']) AND !isset($_POST['fecha2']))
			$datos2 = $this->detalleasientocaja->listar();
		else
			$datos2 = $this->detalleasientocaja->listar($_POST['fecha1'], $_POST['fecha2']);			

		return $datos = array('asientos' => $datos, 'detalleasiento' => $datos2);		
		

	}



	public function librodiarioHoy(){
		$datos = $this->asientoscontablescaja->listar();
		$datos2 = $this->detalleasientocaja->listarHoy();
		return $datos = array('asientos' => $datos, 'detalleasiento' => $datos2);
		
		

	}

	
}

?>