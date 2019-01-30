<?php 

class Vista{

	function __construct(){
	}

	function render($nombre){
		require 'Vista/Proyectos/proyecto.' . $nombre . '.php';
	}
	
	function MainRender($nombre){
		require 'Vista/' . $nombre . '.php';
	}
}

 ?>