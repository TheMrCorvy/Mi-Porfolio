<?php 

class Controlador{

	function __construct(){
		$this->vista = new Vista();
	}

	function MainModelo($modelo)
	{
		$RutaModelo = 'Modelos/' . $modelo . '_modelo.php';

		if (file_exists($RutaModelo)) 
		{
			if (require $RutaModelo) {
				$NombreModelo = $modelo . 'Modelo';/*este es el nomre de la clase del modelo que requerimos
												por ejemplo, el nombre de la clase del modelo para Main seria 
												"MainModelo"*/
				$this->modelo = new $NombreModelo();
			}else{
				$LlamadorDeControladores = new NotFound();
			}
		}else{
			$LlamadorDeControladores = new NotFound();
		}
	}

	function CargarModelo($modelo)
	{
		$RutaModelo = 'Modelos/Proyectos/' . $modelo . '_modelo.php';

		if (file_exists($RutaModelo)) 
		{
			if (require $RutaModelo) 
			{
				$NombreModelo = $modelo . 'Modelo';
				$this->modelo = new $NombreModelo();
			}else{
				$LlamadorDeControladores = new NotFound();
			}
		}else{
			$LlamadorDeControladores = new NotFound();
		}
	}
}

 ?>

