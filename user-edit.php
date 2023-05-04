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
 <title>Edição de Usuário - Listagem de Jogos</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/> 
 <link rel="stylesheet" href="style.css">
</head>
<body>
 <div id="corpo">
   <?php 

    if(!is_logado()){
     echo "Faça login para alterar algum dado!";
    } else{
      if(!isset($_POST['user'])){
       include_once 'user-edit-form.php';
      } else{
        $usuario = $_POST["user"] ?? null;
        $nome = $_POST["nome"] ?? null;
        $senha1 = $_POST['senha1'] ?? null;
        $senha2 = $_POST['senha2'] ?? null;
        $tipo = $_POST["tipo"] ?? null;

        $q = "update usuarios set usuario = '$usuario', nome = '$nome'";

        if(empty($senha1) || is_null($senha1)){
         echo msg_alerta("Sua senha antiga foi mantida.");
        } else{
          if($senha1 === $senha2){
           $senha = gerarHash($senha1);
           $q .= ", senha ='$senha'";
          } else{
           echo msg_erro("Senhas não conferem.");
          }
        }

        $q .= "where usuario = '".$_SESSION['user']."'";
        if($banco->query($q)){
         echo msg_sucesso("Usuário alterado com sucesso!");
         unset($_SESSION['user']);
         unset($_SESSION['nome']);
         unset($_SESSION['tipo']);
         echo msg_alerta("Por segurança, efetue o <a href='user-login.php'>login</a> novamente.");

        } else{
         echo msg_erro("Não foi possível alterar os dados.");
        }
      }
   }




   ?>
   <a href="index.php" target="_self"><span class="material-symbols-outlined back"  style="zoom: 210%">chevron_left</span></a>
 </div>
 <?php 
  include_once "includes/rodape.php";
 ?>
</body>
</html>
