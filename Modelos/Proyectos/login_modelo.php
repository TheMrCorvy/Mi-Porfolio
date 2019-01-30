<?php 
class LoginModelo extends Modelo{

	public function __construct(){
		parent::__construct();
	}

	public function ValidarEmail($email){

		$stmt = $this->database->MetodoConectar()->prepare("SELECT Email FROM usuarios WHERE email = :email");
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		try{
			$stmt->execute();

		}catch(PDOException $e){
			return false;
			print_r('Error con la base de datos: ' . $e->getMessage());
		}
		if ($stmt->rowCount() > 0) 
		{
			return true;
		}else{
			return false;
		}
	}

	public function Ingresar($email, $pass){
		
		$stmt = $this->database->MetodoConectar()->prepare("SELECT * FROM usuarios WHERE email = :email");
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		try{
			$stmt->execute();
		
		}catch(PDOException $e){
			return false;
			print_r('Error con la base de datos: ' . $e->getMessage());
		}
		$stmt = $stmt->fetch();
				
		if (password_verify($pass, $stmt["Pass"])) 
		{
			session_start();

			$this->email = $stmt["Email"];

			$_SESSION["Usuario"] = $email;

			return true;
		}else{
			return false;
		}
	}

	public function Registrar($email, $hash)
	{
		
		$stmt = $this->database->MetodoConectar()->prepare('INSERT INTO usuarios (email, pass) VALUES (:email, :pass)');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':pass', $hash, PDO::PARAM_STR);

		try{
			$stmt->execute();

			session_start();

			$_SESSION["Usuario"] = $email;
			
			return true;
		}catch(PDOException $e){
			return false;
			print_r('Error con la base de datos: ' . $e->getMessage());
		}
	}

	public function Borrar($email)
	{
		$stmt = $this->database->MetodoConectar()->prepare('DELETE FROM usuarios WHERE email = :email');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		try{
			$stmt->execute();
			return true;

		} catch (PDOException $e) {
			return false;
			print_r('Error con la base de datos: ' . $e->getMessage());
		}
	}
}

 ?>