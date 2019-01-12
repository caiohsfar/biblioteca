<?php
	require_once("Database.class.php");

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
	
	function getTelefones($id_usuario){
        $db = new Db();
        $link = $db->conecta_mysql();

        $sql = "SELECT * FROM telefone_usuario WHERE id_usuario = '$id_usuario'";
        $resultado_busca = mysqli_query($link,$sql);
        if($resultado_busca){
            while($registro = mysqli_fetch_array($resultado_busca, MYSQLI_ASSOC)){
                echo '<li class="list-group-item d-flex justify-content-between align-items-center">'.$registro['numero'].''; 
                echo '<span> <button style="color:red;" data-id_telefone_usuario="'.$registro['id_telefone'].'" class="btn btn-link btn_rem_telefone_usuario" >Remover</button></span>';
                echo '</li>';   
            }
            echo '</ul>';
        }else{
            return false;
        }
	

	}
}







?>