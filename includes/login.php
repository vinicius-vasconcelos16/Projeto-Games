<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
<link rel="stylesheet" href="../style.css">
<?php 
 
 include_once 'funcoes.php';
 session_start();
 if (!isset($_SESSION['user']))
 {
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
 }

 function cripto($senha){
   $c = '';
   for($pos=0;$pos<strlen($senha);$pos++){
   $letra = ord($senha[$pos]) + 1;
   $c .= chr($letra);
  }
  return $c;
 }

 function gerarHash($senha){
  $pass = cripto($senha);
  $hash = password_hash($pass, PASSWORD_DEFAULT);
  return $hash;
 }
 
 function testarHash($senha, $hash){
   $ok = password_verify(cripto($senha), $hash);
   return $ok;
 }

?>