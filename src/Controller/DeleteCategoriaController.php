<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class DeleteCategoriaController implements Controller
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

    $success = $this->academiaRepository->removeCategoria($id);
    if ($success === false) {
      echo '<script>alert("Erro ao deletar categoria");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    } else {
      echo '<script>alert("Categoria deletada com sucesso");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    }
  }
}
