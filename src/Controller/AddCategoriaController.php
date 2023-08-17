<?php

namespace Dev\Academia\Controller;

use Dev\Academia\Repository\AcademiaRepository;

class AddCategoriaController implements Controller
{
  public function __construct(private AcademiaRepository $academiaRepository)
  {
  }

  public function processaRequisicao(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      $categoria = filter_input(INPUT_POST, 'categoria');

      if (empty($categoria)) {
        echo '<script>alert("Por favor, preencha a categoria.");';
        echo 'window.location.href = "/painel";</script>';
        return;
      }

      if ($this->academiaRepository->categoriaExists($categoria)) {
        echo '<script>alert("A categoria já existe.");';
        echo 'window.location.href = "/painel";</script>';
        return;
      }
      $categoria = htmlentities($categoria, ENT_QUOTES, 'UTF-8');
      if ($this->academiaRepository->addCategoria($categoria)) {
        echo '<script>alert("Categoria cadastrada com sucesso!");';
        echo 'window.location.href = "/painel";</script>';
      }
    }
  }
}
