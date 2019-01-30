<?php 

class Login extends Controlador{
	function __construct(){
		parent::__construct();
		require 'class.Mensajes.php';
	}
	
	function MetodoSanitizar($email, $pass)
	{
		if (preg_match('/^[_a-zA-Z0-9.@-]+$/', $email) && preg_match('/^[a-zA-Z0-9.@-_]+$/', $pass)) 
		{
			if ( strpos($email, '@') !== false ) 
			{
	    		$split = explode('@', $email);

				if (strpos($split['1'], '.')) 
	    		{
	      			return false;
				} else {
		      		return true;
	   			}//aca termina el segundo if

			} else {
	  			return true;
			}//aca termina el primer if

		}else{
			return true;
		}//preg match
		return false;
	}

	function Login($email, $pass)
	{
		$mensaje = new Mensajes(0, '');

		if(Self::MetodoSanitizar($email, $pass))
		{
			$mensaje->mensaje = 'El email, o la conraseña contienen caracteres no permitidos.';
		}else{
			if ($this->modelo->ValidarEmail($email))
			{
				if ($this->modelo->Ingresar($email, $pass)) 
				{
					$mensaje->cod_mensaje = -1;
					$mensaje->mensaje = 'login correcto';
				}else{
					$mensaje->mensaje = 'password o contra incorrectos';
				}
			}else{
				$mensaje->mensaje = 'los datos ingresados no existen';
			}
		}
		return json_encode($mensaje);
	}

	function Registro($email, $pass)
	{
		$mensaje = new Mensajes(0, '');

		if(Self::MetodoSanitizar($email, $pass))
		{
			$mensaje->mensaje = 'El email, o la contraseña contienen caracteres no permitidos.';
		}else{
			if (!$this->modelo->ValidarEmail($email)) 
			{
				$hash = password_hash($pass, PASSWORD_DEFAULT);

				if ($this->modelo->Registrar($email, $hash)) 
				{
					$mensaje->cod_mensaje = -1;
					$mensaje->mensaje = 'Registro correcto.';
				}else{
					$mensaje->mensaje = 'hubo un error conectando a la base de datos';
				}
			}else{
				$mensaje->mensaje = 'el mail ya existe';
			}
		}
		return json_encode($mensaje);
	}

	function Borrar($email)
	{
		$mensaje = new Mensajes(0, '');

		if (preg_match('/^[_a-zA-Z0-9.@-]+$/', $email)) 
		{
			if ( strpos($email, '@') !== false ) 
			{
	    		$split = explode('@', $email);

				if (strpos($split['1'], '.')) 
	    		{
					session_start();

					$sesion = $_SESSION["Usuario"];

					if ($email == $sesion) 
					{
						if ($this->modelo->ValidarEmail($email)) 
						{
							if ($this->modelo->Borrar($email)) 
							{
								setcookie(session_name(), '', time() - 42000, '/'); 
								unset( $_SESSION );
								session_destroy();

								$mensaje->cod_mensaje = -1;
								$mensaje->mensaje = 'Cuenta cancelada con éxito.';
							}else{
								$mensaje->mensaje = 'algo salio mal contactando a la base de datos';
							}
						}else{
							$mensaje->mensaje = 'deje de hacer trampas, el email coincide con la sesion, pero no existe en la base de datos >:/';
						}
					}else{
						$mensaje->mensaje = 'El email ingresado no coincide con la sesión.';
					}//si la sesion y el mai ingresado son distintos

				} else {
		      		$mensaje->mensaje = 'email incorrecto';
	   			}//aca termina el segundo if de validacion del mail
			} else {

	  			$mensaje->mensaje = 'email incorrecto';
			}//aca termina el primer if de validacion del mail

		}else{
			$mensaje->mensaje = 'El email contiene caracteres no permitidos.';
		}//preg match

		return json_encode($mensaje);
	}

	function Logout()
	{
		session_start();
		setcookie(session_name(), '', time() - 42000, '/'); 
		unset( $_SESSION );
		session_destroy();

		$mensaje = new Mensajes(-1, 'Logout correcto.');
		return json_encode( $mensaje );
	}
}

 ?>