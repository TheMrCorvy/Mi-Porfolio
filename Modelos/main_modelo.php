<?php 

class MainModelo extends Modelo{

	function __construct(){
		parent::__construct();
	}

	function ImprimirObjetos()
	{
		$daru = [];
		try 
		{
			$stmt = $this->database->MetodoConectar()->prepare("SELECT * FROM timealter");
			
			if ($stmt->execute()) 
			{
				while ($cards = $stmt->fetch()) 
				{
					$clow = new Main();//aca va una clase cualquiera siempre y cuando no rompa todo
					$clow->ClaseIcono = $cards['ClaseIcono'];
					$clow->Titulo = $cards['Titulo'];
					$clow->Info = $cards['Info'];
					$clow->Nivel = $cards['Nivel'];

					array_push($daru, $clow);
				}
				return $daru;

			}else{
				$daru = ['ClaseIcono' => "no funciona"];
			}
		}catch(PDOException $e){
			$daru = [];
		}
	}
}
 ?>