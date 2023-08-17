<div class="container">
  <h3>Cadastrar Clientes</h3>
  <form action="/inserir-clientes" method="post">
    <div class="form-floating mb-3">
      <input type="text" class="form-control" name="nome" placeholder="Nome Completo">
      <label for="nome">Nome Completo</label>
    </div>
    <div class="form-floating mb-3">
      <select class="form-select" id="categoria" name="categoria" aria-label="Floating label select example">
        <option value="0" selected>Selecione</option>
        <?php
        $categorias = $academiaRepository->getAllCategorias();
        foreach ($categorias as $categoria) {
          echo '<option value="' . $categoria['id'] . '">' . $categoria['nome_categoria'] . '</option>';
        }
        ?>
      </select>
      <label for="categoria">Categoria</label>
    </div>


    <div class="submit-login">
      <input class="btn btn-primary" type="submit" value="Cadastrar" name="acao">
    </div>
  </form>
</div>