<?php 
  $data = date("d-M-Y");
  $ano = date("Y");
  echo "<footer id='footer'>";
  echo "Acessado por ".$_SERVER['REMOTE_ADDR']." em $data<br>";
  echo "Vinicius Vasconcelos &copy; $ano";
  echo "</footer>";
  $banco->close();
?>