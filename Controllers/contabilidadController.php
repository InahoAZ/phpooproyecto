<?php namespace Controllers;
use Models\AsientosContables as AsientosContables;
use Models\Operaciones as Operaciones;
use Models\DetalleAsiento as DetalleAsiento;



class contabilidadController{

	private $detalleasiento;
	private $asientoscontables;
	private $operaciones;

	public function __construct(){

		$this->detalleasiento = new DetalleAsiento();
		$this->asientoscontables = new AsientosContables();
		$this->operaciones = new Operaciones();


	}

	public function index(){

	}
	public function librodiario(){
		$datos = $this->asientoscontables->listar();
		$datos2 = $this->detalleasiento->listar();
		return $datos = array('asientos' => $datos, 'detalleasiento' => $datos2);
		
		

	}

	public function librodiarioHoy(){
		$datos = $this->asientoscontables->listar();
		$datos2 = $this->detalleasiento->listarHoy();
		return $datos = array('asientos' => $datos, 'detalleasiento' => $datos2);
		
		

	}

	
}

?>