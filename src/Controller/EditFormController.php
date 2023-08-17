<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Entity\Academia;
use Dev\Academia\Repository\AcademiaRepository;

class EditFormController implements Controller
{
  public function __construct(private AcademiaRepository $repository)
  {
  }

  public function processaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    /** @var ?Academia $academia */
    $academia = null;
    if ($id !== false && $id !== null) {
      $academia = $this->repository->find($id);
    }

    require_once __DIR__ . '/../../views/pages/edit-usuario.php';
  }
}
