<?php 
 $q = "select usuario, nome, senha, tipo from usuarios where usuario='".$_SESSION['user']."'";
 $busca = $banco->query($q);
 $reg = $busca->fetch_object();

?>
<h1>Editar Usuário</h1>
<form action="user-edit.php" method="post">
    <table>
      <tr><td> Usuário: <input type="text" name="user" id="txt_user" size="10" maxlength="10" readonly value="<?=$reg->usuario?>">
      <br>
      <tr><td> Nome: <input type="text" name="nome" id="txt_nome" size="30" maxlength="30" value="<?=$reg->nome?>">
      <br>
      <tr><td> Tipo: <input type="text" name="tipo" id="select_tipo" value="<?=$reg->tipo?>" readonly>
      <br>
      <tr><td> Senha: <input type="password" name="senha1" id="txt_senha1" size="10" maxlength="10">
      <br>
      <tr><td> Confirmar Senha: <input type="password" name="senha2" id="txt_senha2" size="10" maxlength="10">
      <br>
      <tr><td> <input type="submit" value="Salvar" class="ok">
    </table>
</form>