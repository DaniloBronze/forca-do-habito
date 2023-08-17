<?php

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class DeleteClientController implements Controller
{
  public function __construct(private AcademiaRepository $repository)
  {
  }

  public function processaRequisicao(): void
  {
    $clienteId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($clienteId === false) {
      echo '<script>alert("Erro no ID");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    }

    $success = $this->repository->removeCliente($clienteId);

    if ($success) {
      echo '<script>alert("Cliente deletado");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    } else {
      echo '<script>alert("Erro ao deletar o cliente");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    }
  }
}
