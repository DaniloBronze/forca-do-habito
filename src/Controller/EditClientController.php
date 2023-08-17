<?php

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class EditClientController implements Controller
{
  public function __construct(private AcademiaRepository $repository)
  {
  }

  public function processaRequisicao(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
      $nome = filter_input(INPUT_POST, 'nome');
      $idCategoria = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

      if (empty($nome) || $idCategoria === false || $idCategoria === null) {
        echo '<script>alert("Preencha todos os campos");</script>';
        echo '<script>window.location.href = "/painel";</script>';
        return;
      }

      $success = $this->repository->updateCliente($id, $nome, $idCategoria);

      if ($success) {
        echo '<script>alert("Cliente editado com sucesso");</script>';
        echo '<script>window.location.href = "/painel";</script>';
      } else {
        echo '<script>alert("Erro ao editar o cliente");</script>';
        echo '<script>window.location.href = "/painel";</script>';
      }
    }
  }
}
