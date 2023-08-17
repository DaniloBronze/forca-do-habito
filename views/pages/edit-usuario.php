<?php

/** @var Dev\Academia\Entity\Academia|null $academia */
?>
<!doctype html>
<html lang="en">

<head>
  <title>Painel CRM</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary" aria-label="Third navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="/painel">CRM CLIENTS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample03"
          aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExample03">
          <ul class="navbar-nav me-auto mb-2 mb-sm-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown"
                aria-expanded="false">Cadastros</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown03">
                <li><a class="dropdown-item" href="/painel?page=add-usuarios">Cadastrar Usuários</a></li>
                <li><a class="dropdown-item" href="/painel?page=add-categoria">Cadastrar Categoria</a></li>
                <li><a class="dropdown-item" href="/painel?page=add-clientes">Cadastrar Cliente</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-bs-toggle="dropdown"
                aria-expanded="false">Relatório</a>
              <ul class="dropdown-menu" aria-labelledby="dropdown03">
                <li><a class="dropdown-item" href="/painel?page=listar-usuarios">Listar Usuários</a></li>
                <li><a class="dropdown-item" href="/painel?page=listar-categoria">Listar Categoria</a></li>
                <li><a class="dropdown-item" href="/painel?page=listar-clientes">Listar Clientes</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-success"><a style="color: white; text-decoration:none;"
            href="/logout">Sair</a></button>
      </div>
    </nav>
  </header>
  <main class="container" style="margin-top:30px">
    <div class="container">
      <h3>Editar Usuário</h3>
      <form method="post">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" value="<?= $academia->nome ?>" name="nome"
            placeholder="Nome Completo">
          <label for="nome">Nome Completo</label>
        </div>
        <div class="form-floating mb-3">
          <input type="email" class="form-control" value="<?= $academia->email ?>" name="email" placeholder="Login">
          <label for="login">Login</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" value="" name="senha" placeholder="Senha">
          <label for="senha">Senha</label>
        </div>

        <div class="form-floating mb-3">
          <select class="form-select" id="perfil" name="perfil" aria-label="Floating label select example">
            <option value="0" selected>Selecione</option>
            <option value="1">Visualizador</option>
            <option value="2">Operador</option>
          </select>
          <label for="perfil">Perfil</label>
        </div>
        <div class="submit-login">
          <input class="btn btn-primary" type="submit" value="Atualizar" name="acao">
        </div>
      </form>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>