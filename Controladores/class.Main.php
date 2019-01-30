<?php 
/*
$stratfor = $_POST['durpa'];

if (!empty($stratfor)) 
{
	$this->variable = new Main();
	$variable->CargarImpresora();
	echo json_encode($variable);
}
*/
class Main extends Controlador{

	function __construct(){
		parent::__construct();
		$this->vista->clow = [];
	}

	function render(){
		$clow = $this->modelo->ImprimirObjetos();
		$this->vista->clow = $clow;

		$this->vista->MainRender('header');
		
		$validante = true;

		$i = 1;

		while ($validante) 
		{
			if (file_exists('Vista/Secciones/section' . $i . '.php')) 
			{
				$this->vista->MainRender('Secciones/section' . $i);
				//para que funcione la consulta a la base de datos, si o si hay q pasar por MainRender
				$i++;
				
			}else{
				$i = null;
				$validante = false;
				$this->vista->MainRender('footer');
				return $validante;
			}//if
		}//while

	}//render

	/*function CargarImpresora(){
		$clow = $this->modelo->ImprimirObjetos();
		$this->vista->clow = $clow;
		return json_encode($clow);
	}*/
}

 ?>