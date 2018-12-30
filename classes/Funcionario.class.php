<?php

	/**
	 * 
	 */
	class Funcionario{
		
		private $idUsuario;
		private $siape;


	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getSiape(){
		return $this->siape;
	}


	function setSiape($siape){
		$this->siape = $siape;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}


	}







?>