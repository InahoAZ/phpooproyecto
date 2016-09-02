<?php namespace Controllers;

	use Models\Costos as Costos;	
	
	class estadisticasController {
	
		private $costos;
		
		public function __construct(){
					
		$this->costos = new Costos();
			
		}
		
		public function index() {
		
		}

		public function estadisticasInv() {
			echo "Wea";

		}
		
		public function estadisticasVen() {
		
		}
		
		


	}




?>