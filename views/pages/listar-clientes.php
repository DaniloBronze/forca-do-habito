<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<h3>Clientes Cadastrados</h3>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Categoria</th>
      <th scope="col">Menu</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $clientes = $academiaRepository->getAllClientes();
    $categorias = $academiaRepository->getAllCategorias();
    foreach ($clientes as $key => $cliente) { ?>
      <tr class="">
        <th scope="row"><?php echo $cliente['nome']; ?></th>
        <td>
          <?php foreach ($categorias as $key => $categoria) {
            if ($cliente['id_categoria'] == $key + 1) {
              echo $categoria['nome_categoria'];
            };
          } ?></td>
        <td>
          <a class="btn btn-success" href="\editar-cliente?id=<?php echo $cliente['id']; ?>"><i class='bx bx-edit-alt'></i></a>
          <a actionBtn="delete" class="btn btn-danger" href="\remover-cliente?id=<?php echo $cliente['id']; ?>"><i class='bx bx-x'></i></a>
        </td>
      </tr>
    <?php } ?>

  </tbody>
</table>