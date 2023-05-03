<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
<link rel="stylesheet" href="../style.css">
<?php 
 session_start();
 if (!isset($_SESSION['user']))
 {
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
 }

 include_once 'funcoes.php';
 function cripto($senha){
  for($pos=0;$pos<strlen($senha);$pos++){
   $letra = ord($senha[$pos]) + 1;
   return chr($letra);
  }
 }

 function gerarHash($senha){
  $pass = cripto($senha);
  $hash = password_hash($pass, PASSWORD_DEFAULT);
  return $hash;
 }
 
 function testarHash($senha,$hash){
  for($pos=0;$pos<strlen($senha);$pos++){ 
   $senha = ord($senha[$pos]) + 1;
   $senha = chr($senha);
  }
  $teste = password_verify($senha,$hash);
  if(!$teste==1){
   $teste = msg_erro("Senha Incorreta");
  }
  else{
   $teste = "";
  }
  return $teste;
 }



?>