<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
<link rel="stylesheet" href="../style.css">
<?php 
include_once "funcoes.php";
  $banco = new mysqli("localhost","root","","bd_games");
  if($banco->connect_errno){
   echo "<p>".msg_erro("Erro ao se conectar com o banco de dados")."</p>";
   die();
  }
?>