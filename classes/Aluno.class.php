<?php

	/**
	 * 
	 */
	class Aluno{
		
		private $idUsuario;
		private $curso;
		private $matricula;


	function getIdUsuario(){
		return $this->idUsuario;
	}

	function getCurso(){
		return $this->curso;
	}

	function getMatricula(){
		return $this->matricula;
	}

	function setCurso($curso){
		$this->curso = $curso;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

	function setMatricula($matricula){
		$this->matricula = $matricula;
	}


	}







?>