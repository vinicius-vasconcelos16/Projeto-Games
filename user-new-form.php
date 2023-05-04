<h1>Cadastro Novo Usuário</h1>
<form action="user-new.php" method="post">

    <table>
      <tr><td> Usuário: <input type="text" name="user" id="txt_user" size="10" maxlength="10" required>
      <br>
      <tr><td> Nome: <input type="text" name="nome" id="txt_nome" size="30" maxlength="30" required>
      <br>
      <tr><td> Tipo: <select name="tipo" id="select_tipo" required>
              <option value="admin">Administrador</option>
              <option value="editor">Editor</option>
      </select>
      <br>
      <tr><td> Senha: <input type="password" name="senha1" id="txt_senha1" size="10" maxlength="10" required>
      <br>
      <tr><td> Confirmar Senha: <input type="password" name="senha2" id="txt_senha2" size="10" maxlength="10" required>
      <br>
      <tr><td> <input type="submit" value="Salvar" class="ok">
    </table>
</form>