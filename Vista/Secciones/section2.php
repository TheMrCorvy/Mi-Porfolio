	<section class="padding-ver text-center bg-light" id="section2">
		
		<h3 class="title cero-top">¿Qué es lo que he estudiado hasta ahora?</h3>

		<div class="container grid-3" id="papel">
			
			<?php foreach ($this->clow as $cards)
			{ 
				$imprimir = new Controlador();/*aca de vuelta, tiene q ser una clase cualquiera para ser 
				considerado un ojbeto*/
				$imprimir = $cards;
			 ?>

			<div class="clow-card">
				<i class="<?php echo $cards->ClaseIcono ?> fa-5x"></i>
				<div>
					<h3><?php echo $cards->Titulo ?></h3>
					<p><?php echo $cards->Info ?></p>
					<p>Nivel: <?php echo $cards->Nivel ?>.</p>
				</div>
			</div>
			<?php } ?>

		</div>

	</section>

<!--
	
-->