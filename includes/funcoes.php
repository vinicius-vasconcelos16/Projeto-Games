<?php 
   function thumb($arq){
    $caminho = "fotos/$arq";
    if(file_exists($caminho) || is_null($arq)){
     return "fotos/indisponivel.png";
    } else{
     return $caminho;
    }
   }
 ?>