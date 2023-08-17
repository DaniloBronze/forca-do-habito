<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Entity\Academia;
use Dev\Academia\Repository\AcademiaRepository;

class FormClientController implements Controller
{
  public function __construct(private AcademiaRepository $repository)
  {
  }

  public function processaRequisicao(): void
  {
    $clienteId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($clienteId === false) {
      header('Location: /?erro=1');
      return;
    }

    $clientes = $this->repository->getAllClientes();
    $categorias = $this->repository->getAllCategorias();
    $cliente = null;

    foreach ($clientes as $client) {
      if ($client['id'] === $clienteId) {
        $cliente = $client;
        break;
      }
    }

    if ($cliente === null) {
      header('Location: /?erro=2');
      return;
    }

    require_once __DIR__ . '/../../views/pages/edit-clientes.php';
  }
}