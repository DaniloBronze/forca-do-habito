<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<div class="container">
  <div class="box-init">
    <h3>Categorias Cadastradas</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">Categoria</th>
          <th scope="col">Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $categorias = $academiaRepository->getAllCategorias();
        foreach ($categorias as $categoria) { ?>
          <tr>
            <th><?php echo $categoria['id']; ?></th>
            <td><?php echo $categoria['nome_categoria']; ?></td>
            <td>
              <a class="btn btn-primary" href="/editar-categoria?id=<?= $categoria['id'] ?>"><i class='bx bx-edit-alt'></i></a>
              <a actionBtn="delete" class="btn btn-danger" href="/remover-categoria?id=<?= $categoria['id'] ?>"><i class='bx bx-x'></i></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>