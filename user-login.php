<!DOCTYPE html>
<html lang="pt-br">
<?php 
   require_once "includes/banco.php";
   require_once "includes/funcoes.php";
   require_once 'includes/login.php';
?>
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Login - Listagem de Jogos</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/> 
 <link rel="stylesheet" href="style.css">
 <style>
  div#corpo{
   width: 15vw;
   margin: auto; 
   text-align: center;
   font-size: 1.3em;
  }

 </style>
</head>

<body>
 <div id="corpo">
  <?php 
   $user = $_POST['usuario'] ?? null;
   $senha = $_POST['senha'] ?? null;
   if(is_null($user) || is_null($senha)){
    require "user-login-form.php";   
   } 
   else{
    $query = "SELECT usuario,nome,senha,tipo FROM usuarios WHERE usuario = '$user' LIMIT 1";
    $busca = $banco->query($query);
    if(!$busca){
     echo msg_erro("Falha ao acessar o banco!");
    }else{
      if($busca->num_rows > 0){
       $reg = $busca->fetch_object();
       if(testarHash($senha,$reg->senha)){
        echo msg_sucesso("Logado com Sucesso!");
        $_SESSION['user'] = $reg->usuario;
        $_SESSION['nome'] = $reg->nome;
        $_SESSION['tipo'] = $reg->tipo;
       } else{
        echo msg_erro("Usuário ou Senha inválido(s)!");
       }
      } else{
       echo "Usuário não cadastrado!";
      }
    }
   }
  ?>
  <a href="index.php" target="__self"><span class="material-symbols-outlined"  style="zoom: 210%">chevron_left</span></a>
 </div>
</body>
</html>