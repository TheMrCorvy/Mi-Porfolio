<?php 

class Conexion{

	private $host;
	private $database;
	private $user;
	private $pass;
	private $charset;

	public function __construct(){
		$this->host 	= constant("HOST");
		$this->database = constant("DATABASE");
		$this->user 	= constant("USER");
		$this->pass 	= constant("PASS");
		$this->charset  = constant("CHARSET");
	}

	function MetodoConectar()
	{
		try{
			$opciones = 
			[
				PDO::ATTR_ERRMODE			=> PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_EMULATE_PREPARES  => false,
			];

			$pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database . ";charset=" . $this->charset, $this->user, $this->pass, $opciones);
			//por algun motivo que desconozco, el new PDO solo se puede hacer de esta forma....
			return $pdo;
		}catch(PDOException $e)
		{/*
			$mensaje = 'Error conectando a la base de datos: ' . $e->getMessage();
			$this->vista->mensaje = $mensaje;

			esta parte va a codificarse a json para poder mostrarse en pantalla dinamicamente
			la parte importante es esta:
				$mensaje = 'Error conectando a la base de datos: ' . $e->getMessage();
		*/
		}//aca termina el try&catch
	}
}

 ?>