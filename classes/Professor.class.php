<?php

	/**
	 * 
	 */
	class Professor{
		
		private $idUsuario;
		private $siape;
		private $lates;


	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getSiape(){
		return $this->siape;
	}

	function getLates(){
		return $this->lates;
	}


	function setSiape($siape){
		$this->siape = $siape;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}
	function setLates($lates){
		$this->lates = $lates;
	}


	}







?>