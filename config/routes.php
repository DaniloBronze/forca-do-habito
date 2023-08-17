<?php

declare(strict_types=1);

return [
    'GET|/' => \Dev\Academia\Controller\AcademiaListController::class,
    'GET|/login' => \Dev\Academia\Controller\LoginFormController::class,
    'POST|/login' => \Dev\Academia\Controller\LoginController::class,
    'GET|/painel' => \Dev\Academia\Controller\PainelController::class,
    'POST|/inserir-usuario' => \Dev\Academia\Controller\AddUserController::class,
    'POST|/inserir-categoria' => \Dev\Academia\Controller\AddCategoriaController::class,
    'POST|/inserir-clientes' => \Dev\Academia\Controller\AddClientesController::class,
    'GET|/editar-usuario' => \Dev\Academia\Controller\EditFormController::class,
    'POST|/editar-usuario' => \Dev\Academia\Controller\EditUserController::class,
    'GET|/remover-usuario' => \Dev\Academia\Controller\DeleteUserController::class,
    'GET|/remover-categoria' => \Dev\Academia\Controller\DeleteCategoriaController::class,
    'GET|/editar-cliente' => \Dev\Academia\Controller\FormClientController::class,
    'POST|/editar-cliente' => \Dev\Academia\Controller\EditClientController::class,
    'GET|/remover-cliente' => \Dev\Academia\Controller\DeleteClientController::class,
    'GET|/editar-categoria' => \Dev\Academia\Controller\CategoriaFormController::class,
    'POST|/editar-categoria' => \Dev\Academia\Controller\EditCategoriaController::class,
    'GET|/logout' => \Dev\Academia\Controller\LogoutController::class,
];
