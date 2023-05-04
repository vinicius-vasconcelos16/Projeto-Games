<!DOCTYPE html>
<html lang="pt-br">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Listagem de Jogos</title>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/> 
 <link rel="stylesheet" href="style.css">
 <style>
  div#corpo{
    width: 90vw;
  }
 </style>
</head>

<body>
 <?php 
   require_once 'includes/login.php';
   require_once "includes/banco.php";
   require_once "includes/funcoes.php";
 ?>
 <div id="corpo">
  <?php
    $cod = $_GET["cod"] ?? 0;
    $busca = $banco->query("select * from jogos where cod='$cod'");
    include_once "includes/topo.php";
  ?>
  <h1>Detalhes do Jogo</h1>
  <table class="detalhes">
   <?php 
    if(!$busca){
        echo "A busca não obteve resultado! $banco->error";
    } else{
        if($busca->num_rows == 1){
          $reg = $busca->fetch_object();
          echo "<tr>";
          echo "<td rowspan='3' style='vertical-align: top;'><img src='fotos/$reg->capa' alt='fotos/indisponivel.png' width='280vw' height='320vh' style='margin-right: 20px;'>";
          echo "<td><h2>$reg->nome</h2>";
          echo "<h3 style='margin-bottom: 10px;'><strong>Nota: ".number_format($reg->nota,1)." / 10</strong></h3>";
          if (is_admin()){
            echo "<span id='editors' style='float: left;'><span class='material-symbols-outlined'>add_circle</span><span class='material-symbols-outlined'>edit</span><span class='material-symbols-outlined'>delete</span></span>";
          } elseif(is_editor()){
            echo "<span id='editors'><span class='material-symbols-outlined'>edit</span></span>";
           }
          echo "<tr>";
          echo "<td style='font-size: 1.1em;'>$reg->descricao";
          echo "<tr>";
          echo "<td>Adm";
        } else{
          echo "<tr><td>Nenhum registro encontrado";
        }
      }
      
   ?>
  </table>
  <br>
  <a href="index.php" target="_self"><span class="material-symbols-outlined back"  style="zoom: 210%">chevron_left</span></a>
 </div>
 <br>
 <?php 
  include_once "includes/rodape.php";
 ?>
</body>

</html>