<?php namespace Controllers;
	use Models\Estudiante as Estudiante;

	class estudiantesController{
		private $estudiante;

		public function __construct(){
			$this->estudiante = new Estudiante();
		}

	public function index(){

		$datos = $this->estudiante->listar();
		return $datos;
		

	} 

	public function agregar(){

		if($_POST){
			//print_r($this->estudiante);
			
			$this->estudiante->set("nombre", $_POST['nombre'] );
			$this->estudiante->set("edad", $_POST['edad'] );
			$this->estudiante->set("curso", $_POST['curso'] );
			$this->estudiante->add();
		}
	
		
	}
}


?>