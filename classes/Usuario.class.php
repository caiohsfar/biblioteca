<?php

	/**
	 * 
	 */
	class Usuario{
		
		private $nome;
		private $email;
		private $senha;
		private $id;

		function getNome(){
		return $this->nome;
	}

	function getEndereco(){
		return $this->endereco;
	}

	function getEmail(){
		return $this->email;
	}

	function getSenha(){
		return $this->senha;
	}

	function getId(){
		return $this->id;
	}

	function setNome($nome){
		$this->nome = $nome;
	}

	function setEmail($email){
		$this->email = $email;
	}

	function setSenha($senha){
		$this->senha = $senha;
	}

	function setId($id){
		$this->id = $id;
	}

	function setEndereco($endereco){
		$this->endereco = $endereco;
	}


	}







?>