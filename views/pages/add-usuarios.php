<div class="container">
  <h3>Cadastrar Usuário</h3>
  <form action="/inserir-usuario" method="post">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
      <label for="nome">Nome Completo</label>
    </div>
    <div class="form-floating mb-3">
      <input type="email" class="form-control" name="email" placeholder="Email">
      <label for="email">Email</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" name="senha" placeholder="Senha">
      <label for="senha">Senha</label>
    </div>
    <div class="form-floating mb-3">
      <select class="form-select" name="perfil" aria-label="Floating label select example">
        <option value="0" selected>Selecione</option>
        <option value="1">Visualizador</option>
        <option value="2">Operador</option>
      </select>
      <label for="perfil">Perfil</label>
    </div>
    <div class="submit-login">
      <input class="btn btn-primary" type="submit" value="Cadastrar" name="acao">
    </div>
  </form>
</div>