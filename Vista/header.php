<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<!--jquery y ajax-->
	<script src="https://code.jquery.com/jquery-3.3.1.js" 
	integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!--para el responsive design-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!--fuentes de letra-->
	<link rel="stylesheet" href="<?php echo constant('PROYECTO'); ?>Vista/ArchivosPublicos/font-mfizz-2.4.1/font-mfizz.css">
	<link rel="stylesheet" href="<?php echo constant('PROYECTO'); ?>Vista/ArchivosPublicos/fontawesome-free-5.6.1/css/all.css">

	<!--mis archivos de css-->
	<link rel="stylesheet" type="text/css" href="<?php echo constant('PROYECTO'); ?>Vista/ArchivosPublicos/CSS/multiusos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo constant('PROYECTO'); ?>Vista/ArchivosPublicos/CSS/sections.css">
	<link rel="stylesheet" type="text/css" href="<?php echo constant('PROYECTO'); ?>Vista/ArchivosPublicos/CSS/nav.css">
	<link rel="stylesheet" type="text/css" href="<?php echo constant('PROYECTO'); ?>Vista/ArchivosPublicos/CSS/queries.css">

	<title>Porfolio Web</title>
</head>
<body>


<nav class="topnav">

	<div>
		<a href="#" id="CasterGil">Cuáles son mis Conocimientos</a>
  		<a href="#" id="Ishtar">Descargar Curriculum Vitae</a>
  		<a href="#" id="EreshChan">Planes a Futuro</a>
	</div>

	<div>

		<?php if (!isset($_SESSION['Usuario'])):  ?>
		<input type="button" class="nav-btn" id="summon" value="Mostrar Formularios">

  		<?php else: ?>

			<button class="nav-btn" onclick="logout()">Cerrar Sesión</button>

			<button class="nav-btn" id="emiya">Cancelar Cuenta</button>
			
		<?php endif ?>

	</div>

</nav>

<?php if (isset($_SESSION['Usuario'])):  ?>

<div class="bg-light Unlimited ">
	<div class="formulario alineacionCentro Blades">
		<h3 class="title cero">Cancelar Cuenta</h3>

		<form id="Works">
			<input type="email" placeholder="Confirme Su Email" class="unset input" id="RealityMarble">
			<input type="submit" value="Borrar" class="unset boton sub-btn">
		</form>
		<span>Solo se podrá cancelar la cuenta cuya sesión esté abierta actualmente.</span>
	</div>
</div>
<?php else: ?>
<div class="fuzetsu bg-light">

	<div class="alineacionCentro formulario" id="foreigner">

		<div>

			<h3 class="title cero">Registrarse</h3>

			<form id="SignUpForm">	
				<input type="email" placeholder="Su Email" id="RegEmail" class="unset input">
      			<input type="password" placeholder="Su Password" id="RegPass" class="unset input">

   				<input id="RealReg" type="submit" value="Registrarse" class="unset boton sub-btn">
   				<input id="FakeReg" type="button" value="Registrarse" class="unset boton sub-btn">
    		</form>

		</div>
		
	</div>

	<div class="alineacionCentro formulario" id="alterego">
		
		<div>
			
			<h3 class="title cero">Ingresar</h3>

			<form id="LoginForm">
				<input type="email" placeholder="Su Email" id="LogEmail" class="unset input" class="input">
      			<input type="password" placeholder="Su Password" id="LogPass" class="unset input" class="input">

      			<input id="RealLog" type="submit" value="Ingresar" class="unset boton sub-btn">
      			<input id="FakeLog" type="button" value="Ingresar" class="unset boton sub-btn">
    		</form>
		</div>

	</div>
</div>
<?php endif ?>