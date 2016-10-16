<?php namespace Controllers;
use Models\Productos as Productos;
use Models\Operaciones as Operaciones;
use Models\Cliente as Clientes;



class modalController{

	private $clientes;
	private $productos;
	private $operaciones;

	public function __construct(){

		$this->clientes = new Clientes();
		$this->productos = new Productos();
		$this->operaciones = new Operaciones();


	}

	public function index(){

	}

	public function clientesmodal(){
		$datos = $this->clientes->listar();
		return $datos;

	}

	public function productosmodal(){
		$datos = $this->productos->listar();
		return $datos;
	

	}
}

?>
