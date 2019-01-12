<?php
	session_start();
	require_once('../../classes/Usuario.class.php');
	require_once('../../classes/Funcionario.class.php');
	$usuario = unserialize($_SESSION['usuario']);
	$funcionario = unserialize($_SESSION['funcionario']);
	echo '<strong class="margem-linha-modal">Nome</strong>';
	echo '<br/>';
	echo ($usuario->getNome());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Endereço</strong>';
	echo '<br/>';
	echo ($usuario->getEndereco());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Email</strong>';
	echo '<br/>';
	echo ($usuario->getEmail());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Senha</strong>';
	echo '<br/>';
	echo ($usuario->getSenha());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Siape</strong>';
	echo '<br/>';
	echo ($funcionario->getSiape());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Id</strong>';
	echo '<br/>';
	echo ($usuario->getId());
	echo '<br/>';
	echo '<strong class="margem-linha-modal">Telefones</strong>';
	echo '<span> <button id="btn_add_telefone_usuario" data-id_usuario"'.$usuario->getId().'" data-toggle="modal" data-target="#add_telefone_modal_funcionario" class="btn btn-link btn-detalhes" >Adicionar</button></span>';
	echo '<ul id="lista_telefones" class="list-group">';
	$usuario->getTelefones($usuario->getId());


?>