<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class AcademiaListController implements Controller
{
    public function __construct(private AcademiaRepository $academiaRepository)
    {
    }

    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../views/academia-list.php';
    }
}
