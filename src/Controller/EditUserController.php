<?php

declare(strict_types=1);

namespace Dev\Academia\Controller;

use Dev\Academia\Entity\Academia;
use Dev\Academia\Repository\AcademiaRepository;

class EditUserController implements Controller
{
  public function __construct(private AcademiaRepository $academiaRepository)
  {
  }

  public function processaRequisicao(): void
  {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($id === false || $id === null) {
      header('Location: /painel?sucesso=0');
      return;
    }

    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $senha = filter_input(INPUT_POST, 'senha');
    $perfil = filter_input(INPUT_POST, 'perfil'); // Removendo o uso do FILTER_VALIDATE_INT

    // Verificar se algum campo obrigatório está vazio
    if (empty($nome) || empty($email) || empty($senha) || empty($perfil)) {
      echo '<script>alert("Preencha todos os campos");</script>';
      echo '<script>window.location.href = "/painel";</script>';
      return;
    }

    // Remova o trim dos valores aqui, pois não faz sentido usar trim em valores que não são strings

    $academia = new Academia($nome, $email, $senha, $perfil);
    $academia->setId($id);

    $success = $this->academiaRepository->update($academia);

    if ($success === false) {
      echo '<script>alert("Erro ao editar o usuário");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    } else {
      echo '<script>alert("Usuário editado com sucesso");</script>';
      echo '<script>window.location.href = "/painel";</script>';
    }
  }
}
