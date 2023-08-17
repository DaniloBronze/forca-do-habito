<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class CategoriaFormController implements Controller
{
  public function __construct(private AcademiaRepository $repository)
  {
  }

  public function processaRequisicao(): void
  {
    $categoriaId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $academia = null;
    if ($categoriaId !== false && $categoriaId !== null) {
      $categoria = $this->repository->getCategoriaById($categoriaId);
    }

    require_once __DIR__ . '/../../views/pages/editar-categoria.php';
  }
}
