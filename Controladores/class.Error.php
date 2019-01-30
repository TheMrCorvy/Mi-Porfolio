<?php 
require_once 'Controlador.php';

class NotFound extends Controlador{

	function __construct(){
		parent::__construct();
		$this->vista->MainRender('Error/index');	
	}
}

 ?>