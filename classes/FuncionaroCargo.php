<?php

	/**
	 * 
	 */
	class FuncionarioCargo{
		
		private $cargo;
		private $descricao;
		private $idUsuario;

	function getCargo(){
		return $this->cargo;
	}

	function getDescricao(){
		return $this->descricao;
	}

	function getIdUsuario(){
		return $this->idUsuario;
	}

	function setCargo($nome){
		$this->cargo = $cargo;
	}

	function setDescricao($email){
		$this->descricao = $descricao;
	}

	function setIdUsuario($idUsuario){
		$this->idUsuario = $idUsuario;
	}

?>