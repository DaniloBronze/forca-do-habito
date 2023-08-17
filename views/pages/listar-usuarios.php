<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class="container">
  <h3>Usuários Cadastrados</h3>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Login</th>
        <th scope="col">Perfil</th>
        <th scope="col">Menu</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($userList as $usuario) { ?>
      <tr>
        <th scope="row"><?= $usuario->nome ?></th>
        <td><?= $usuario->email ?></td>
        <td><?= ($usuario->perfil === '1') ? 'OPERADOR' : 'VISUALIZADOR' ?></td>
        <td>
          <a class="btn btn-primary" href="/editar-usuario?id=<?= $usuario->id ?>"><i class='bx bx-edit-alt'></i></a>
          <a actionBtn="delete" class="btn btn-danger" href="/remover-usuario?id=<?= $usuario->id ?>"><i
              class='bx bx-x'></i></a>
        </td>
      </tr>
      <?php } ?>

    </tbody>
  </table>
</div>