<?php 
   function thumb($arq){
    $caminho = "fotos/$arq";
    if(file_exists($caminho) || is_null($arq)){
     return "fotos/indisponivel.png";
    } else{
     return $caminho;
    }
   }

    function msg_sucesso($msg){
      $resp = "<div class='msg_sucesso'><span class='material-symbols-outlined'>check_circle</span>$msg</div>";
      return $resp;
    }  
    function msg_alerta($msg){
      $resp = "<div class='msg_alerta'><span class='material-symbols-outlined'>info</span>$msg</div>";
      return $resp;
    }
    function msg_erro($msg){
      $resp = "<div class='msg_erro'><span class='material-symbols-outlined'>warning</span>$msg</div>";
      return $resp;
    }

    function is_logado(){
      if(empty($_SESSION['user'])){
        return false;
      }
      else{
        return true;
      }
    }

    function is_admin(){
      $tipo = $_SESSION['tipo'] ?? null;
      if(is_null($tipo)){
        return false;
      } else {
        if($tipo == 'admin'){
          return true;
        } else{
        return false;
        } 
      }
    }
    function is_editor(){
      $tipo = $_SESSION['tipo'] ?? null;
      if(is_null($tipo)){
        return false;
      } else {
        if($tipo == 'editor'){
          return true;
        } else{
        return false;
        } 
      }
    }
 ?>