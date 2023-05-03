<!DOCTYPE html>
<html lang="pt-br">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Listagem de Jogos</title>
 <link rel="stylesheet" href="style.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"/>
</head>

<body>
 <?php 
   require_once "includes/banco.php";
   require_once 'includes/login.php';
   require_once "includes/funcoes.php";
   
 ?>
 <div id="corpo">
  <?php 
    include_once "includes/topo.php";
    $indice = $_GET["ind"] ?? "nome";
    $buscar = $_GET["buscar"] ?? "";
  ?>
  <h1>Escolha seu jogo</h1>
  <form action="<?= $_SERVER['PHP_SELF']?>" method="get" id="buscar">
    Ordenar: 
    <a href="index.php?ind=nome&buscar=<?=$buscar?>">Nome</a> | 
    <a href="index.php?ind=prod&buscar=<?=$buscar?>">Produtora</a> | 
    <a href="index.php?ind=maior&buscar=<?=$buscar?>">Maior Nota</a> | 
    <a href="index.php?ind=menor&buscar=<?=$buscar?>">Menor Nota</a> | 
    <a href="index.php?">Mostrar Todos</a> | 
    Buscar: <input type="text" name="buscar" id="text-box" maxlength="30" size="10" value="<?=$buscar?>"><input type="submit" value="Ok" id="ok">
  </form>
  <table class="listagem">
    <?php
      $g = "select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod";
      if($buscar!=""){
        $g = "select j.cod, j.nome, g.genero, p.produtora, j.capa from jogos j join generos g on j.genero = g.cod join produtoras p on j.produtora = p.cod where j.nome LIKE '%$buscar%' OR p.produtora like '%$buscar%' or g.genero like '%$buscar%' ";
      }
      switch($indice){
        case "nome":
          $g = $g." order by j.nome";
          break;
        case "prod":
          $g = $g." order by p.produtora";
          break;
        case "maior":
          $g = $g." order by j.nota desc";
          break;
        case "menor":
          $g = $g." order by j.nota";
          break;
       }
      $busca = $banco->query($g);
    ?>
   <?php 
    if(!$busca){
      echo "<tr><td>Busca sem sucesso!";
    } else{
      if($busca->num_rows == 0){
       echo "Nenhum registro encontrado";
      } else{
        while($reg=$busca->fetch_object()){
         echo "<tr><td><img src='fotos/$reg->capa' alt='fotos/indisponivel.png' class='imagem';>";
         echo "<td><a href='detalhes.php?cod=$reg->cod' id='nome_jogo'>$reg->nome</a> [$reg->genero] <br><br><span id='produtora'>$reg->produtora</span>";
         echo "<td>Adm<br>";
        }
     }
    }
   ?>
  </table>
 </div>
 <br>
 <?php 
  include_once "includes/rodape.php";
 ?>
</body>

</html>