<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class DeleteUserController implements Controller
{
  public function __construct(private AcademiaRepository $academiaRepository)
  {
  }

  public function processaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id === null || $id === false) {
      header('Location: /?sucesso=0');
      return;
    }

    $success = $this->academiaRepository->remove($id);
    if ($success === false) {
      echo '<script>alert("Erro ao deletar o usuário");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    } else {
      echo '<script>alert("Usuário deletado com sucesso");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    }
  }
}
