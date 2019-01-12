<?php
	session_start();
	require_once('../../classes/Usuario.class.php');
	require_once('../../classes/Aluno.class.php');
	$usuario = unserialize($_SESSION['usuario']);
	$aluno = unserialize($_SESSION['aluno']);
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

	echo '<strong class="margem-linha-modal">Matrícula</strong>';
	echo '<br/>';
	echo ($aluno->getMatricula());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Curso</strong>';
	echo '<br/>';
	echo ($aluno->getCurso());
	echo '<br/>';

	echo '<strong class="margem-linha-modal">Id</strong>';
	echo '<br/>';
	echo ($usuario->getId());
	echo '<br/>';
	echo '<strong class="margem-linha-modal">Telefones</strong>';
	echo '<span> <button id="btn_add_telefone_usuario" data-id_usuario"'.$usuario->getId().'" data-toggle="modal" data-target="#add_telefone_modal_aluno" class="btn btn-link btn-detalhes" >Adicionar</button></span>';
	echo '<ul id="lista_telefones" class="list-group">';
	$usuario->getTelefones($usuario->getId());


?>