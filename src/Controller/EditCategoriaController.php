<?php

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class EditCategoriaController implements Controller
{
  public function __construct(private AcademiaRepository $repository)
  {
  }

  public function processaRequisicao(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
      $nomeCategoria = filter_input(INPUT_POST, 'categoria');

      if (empty($nomeCategoria)) {
        echo '<script>alert("Preencha todos os campos");</script>';
        echo '<script>window.location.href = "/painel";</script>';
        return;
      }

      $success = $this->repository->updateCategoria($id, $nomeCategoria);

      if ($success) {
        echo '<script>alert("Categoria editada com sucesso");</script>';
        echo '<script>window.location.href = "/painel";</script>';
      } else {
        echo '<script>alert("Erro ao editar a categoria");</script>';
        echo '<script>window.location.href = "/painel";</script>';
      }
    }
  }
}
