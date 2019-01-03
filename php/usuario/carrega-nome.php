<?php
session_start();
require_once('../../classes/Usuario.class.php');
$usuario = unserialize($_SESSION['usuario']);

echo 'Olá, '.$usuario->getNome().'';




?>