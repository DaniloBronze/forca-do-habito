<?php

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class AddClientesController implements Controller
{
  public function __construct(private AcademiaRepository $academiaRepository)
  {
  }

  public function processaRequisicao(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      $nome = filter_input(INPUT_POST, 'nome');
      $categoriaId = filter_input(INPUT_POST, 'categoria', FILTER_VALIDATE_INT);

      if (empty($nome)) {
        echo '<script>alert("Por favor, preencha o nome completo.");';
        echo 'window.location.href = "/painel";</script>';
        return;
      }

      if ($categoriaId === 0) {
        echo '<script>alert("Por favor, selecione uma categoria.");';
        echo 'window.location.href = "/painel";</script>';
        return;
      }

      if ($this->academiaRepository->addCliente($nome, $categoriaId)) {

        echo '<script>alert("Cliente cadastrado com sucesso!");';
        echo 'window.location.href = "/painel";</script>';
      }
    }
  }
}
