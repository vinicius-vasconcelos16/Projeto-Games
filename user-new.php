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
 <title>Listagem de Jogos</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/> 
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <div id="corpo">
  <?php 
   if(!is_admin()){
    echo msg_erro("Área Restrita! Você não é Administrador.");
   }else{
    if(!isset($_POST['user'])){
     require_once 'user-new-form.php';
    } else{
     $usuario = $_POST["user"] ?? null;
     $nome = $_POST["nome"] ?? null;
     $senha1 = $_POST['senha1'] ?? null;
     $senha2 = $_POST['senha2'] ?? null;
     $tipo = $_POST["tipo"] ?? null;

     if($senha1 === $senha2){
      $senha = gerarHash($senha1);

      $q = "INSERT INTO `usuarios` VALUES ('$usuario', '$nome', '$senha', '$tipo')";
      $insert = $banco->query($q);
      if($insert){
       echo "Usuário Cadastrado.";
      }
     } else{
      echo msg_erro("As senhas não conferem! Tente Novamente.");
     }
    }
   }
  ?>
 <a href='index.php' target='_self'><span class='material-symbols-outlined back'  style='zoom: 210%'>chevron_left</span></a>
 </div>
 <br>
 <?php 
  include_once "includes/rodape.php";
 ?>
</body>
</html>
