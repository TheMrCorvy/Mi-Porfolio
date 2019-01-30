<?php 

require_once 'Controladores/class.Error.php';

class App{

	function __construct(){
		//las variable proyecto se llaman asi, por q en htaccess esta configurado asi
		if (isset($_GET['proyecto'])) 
		{
			$url = $_GET['proyecto'];
		}else{
			$url = null;
		}
		//al ingresarsolo al url sin definir ningun controlador
		if (empty($url[0])) 
		{
			require_once 'Controladores/class.Main.php';
			$LlamadorDeControladores = new Main();
			$LlamadorDeControladores->MainModelo('main');
			$LlamadorDeControladores->render();
			return false;
		}//aca termina si la url esta vacia

		$url = rtrim($url, '/');

		$url = explode('/', $url);

		$PanelDeControl = 'Controladores/Proyectos/proyecto.' . $url[0] . '.php';

		if (file_exists($PanelDeControl)) 
		{
			require_once $PanelDeControl;
			$LlamadorDeControladores = new $url[0];
			$LlamadorDeControladores->CargarModelo($url[0]);

			//para pasar parametros a un metodo--(numero de parametros)
			$NumParam = sizeof($url);

			if ($NumParam > 1) 
			{
				if ($NumParam > 2) 
				{
					$parametro = [];
					#se pone i=2 por que la posicion 0 es el controlador, y la 1 es el metodo
					for ($i=2; $i < $NumParam; $i++) 
					{ 
						array_push($parametro, $url[$i]);
					}
					$LlamadorDeControladores->{$url[1]}($parametro);

				}elseif(isset($_POST['action'])){
					switch ($_POST['action']) 
					{
						case 'Registro':
							$email    = $_POST['email'];
							$pass     = $_POST['pass'];
							echo $LlamadorDeControladores->{$url[1]}($email, $pass);
							//return $mensaje;
						break;

						case 'Login':
							$email    = $_POST['email'];
							$pass     = $_POST['pass'];
							echo $LlamadorDeControladores->{$url[1]}($email, $pass);
						break;

						case 'Logout':
							echo $LlamadorDeControladores->{$url[1]}();
						break;

						case 'Borrar':
							$email    = $_POST['email'];
							echo $LlamadorDeControladores->{$url[1]}($email);
						break;
					}//aca termina el switch
				}else{
					echo $LlamadorDeControladores->{$url[1]}();
				}//NumParam > 2
			}else{
				$LlamadorDeControladores->render();//aca esta llamando al render del proyecto en la url
			}//NumParam > 1

		}else{
			$LlamadorDeControladores = new NotFound();
		}
	}
}

 ?>