<?php

	/**
	 * 
	 */
	class Cargo{
		
		private $idCargo;
		private $nome;
		private $descricao;

	function getIdCargo(){
		return $this->idCargo;
	}

	function setIdCargo($cargo){
		$this->cargo = $cargo;
	}

	function getDescricao(){
		return $this->descricao;
	}

	function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	
	function getNome(){
		return $this->nome;
	}

	function setNome($nome){
		$this->nome = $nome;
	}

?>