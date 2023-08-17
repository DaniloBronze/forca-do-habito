<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

class LoginFormController implements Controller
{

    public function processaRequisicao(): void
    {

        if (array_key_exists('logado', $_SESSION) && $_SESSION['logado'] === true) {
            header('Location: painel');
            return;
        }
        require_once __DIR__ . '/../../views/login-admin.php';
    }
}
