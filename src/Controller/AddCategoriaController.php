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
      $categoria = filter_input(INPUT_POST, 'categoria'); // Sanitize input

      // Verificar se a categoria foi preenchida
      if (empty($categoria)) {
        echo '<script>alert("Por favor, preencha a categoria.");';
        echo 'window.location.href = "/painel";</script>';
        return; // Saia da função para evitar a execução do restante do código
      }

      // Verificar se a categoria já existe
      if ($this->academiaRepository->categoriaExists($categoria)) {
        echo '<script>alert("A categoria já existe.");';
        echo 'window.location.href = "/painel";</script>';
        return; // Saia da função
      }

      // Tentar adicionar a categoria
      if ($this->academiaRepository->addCategoria($categoria)) {
        echo '<script>alert("Categoria cadastrada com sucesso!");';
        echo 'window.location.href = "/painel";</script>';
      }
    }
  }
}
