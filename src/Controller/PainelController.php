<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class PainelController implements Controller
{
    public function __construct(private AcademiaRepository $academiaRepository)
    {
    }

    public function processaRequisicao(): void
    {
        if (isset($_SESSION['logado']) && $_SESSION['logado'] == true) {
            $academiaRepository = new AcademiaRepository(getPdoConnection());
            $userList = $this->academiaRepository->all();
            require_once __DIR__ . '/../../views/painel.php';
        } else {
            header('Location: /');
        }
    }
}
