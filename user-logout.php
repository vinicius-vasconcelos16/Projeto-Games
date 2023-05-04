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
 <title>Logout - Listagem de Jogos</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/> 
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <div id="corpo">
        <?php 
         unset($_SESSION['user']);
         unset($_SESSION['nome']);
         unset($_SESSION['tipo']);
         echo msg_sucesso("Usuário deslogado com sucesso!");
        ?>
        <br>
  <a href="index.php" target="_self"><span class="material-symbols-outlined back"  style="zoom: 210%">chevron_left</span></a>
 </div>
 <br>
 <?php 
  include_once "includes/rodape.php";
 ?>
</body>
</html>