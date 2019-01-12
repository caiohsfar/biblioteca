<?php
    require_once('../classes/Usuario.class.php');
    require_once('../classes/Database.class.php');
   session_start();

   if(!isset($_SESSION['usuario'])){
       header('Location: index.php?erro=1');
   }

   
   $telefone = $_POST['telefone'];
   $usuario = unserialize($_SESSION['usuario']);
   $id_usuario = $usuario->getId();

   $db = new Db();
   $link = $db->conecta_mysql();	
   $query_usuario = "INSERT INTO telefone_usuario (numero, id_usuario) VALUES ('$telefone','$id_usuario');";
   $resultado_id = mysqli_query($link,$query_usuario);
   if ($resultado_id){
      echo '1';
   }
   else{
       echo '0';
   }

   




?>

