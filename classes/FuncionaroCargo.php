<?php

	/**
	 * 
	 */
	class FuncionarioCargo{
		
		private $idCargo;
		private $idFuncionario;
		private $data;

	function getIdCargo(){
		return $this->idCargo;
	}

	function setIdCargo($idCargo){
		$this->idCargo = $idCargo;
	}

	function getIdFuncionario(){
		return $this->idFuncionario;
	}

	function setIdFuncionario($idFuncionario){
		$this->idFuncionario = $idFuncionario;
	}

	function getData(){
		return $this->data;
	}

	function setData($data){
		$this->data = $data;
	}
}

?>