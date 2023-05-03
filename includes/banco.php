<?php 
  $banco = new mysqli("localhost","root","","bd_games");
  if($banco->connect_errno){
   echo "<p>Erro ao se conectar com o banco de dados</p>";
   die();
  }

?>