<?php

namespace Dev\Academia\Controller;

use Dev\Academia\Entity\Academia;
use Dev\Academia\Repository\AcademiaRepository;

class AddUserController implements Controller
{
  public function __construct(private AcademiaRepository $academiaRepository)
  {
  }

  public function processaRequisicao(): void
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao'])) {
      $nome = trim(filter_input(INPUT_POST, 'nome'));
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      $senha = filter_input(INPUT_POST, 'senha');
      $perfil = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT);

      if (empty($nome) || empty($email) || empty($senha) || $perfil === false) {
        echo '<script>alert("Por favor, preencha todos os campos corretamente.");</script>';
        echo '<script>window.location.href = "/painel";</script>';
      } else {

        $nome = htmlentities($nome, ENT_QUOTES, 'UTF-8');
        $user = new Academia($nome, $email, $senha, $perfil);

        if ($this->academiaRepository->add($user)) {
        }
      }
    }
  }
}

// Instanciar a classe de repositório e passá-la para o controlador
$academiaRepository = new AcademiaRepository(getPdoConnection()); // Use a função getPdoConnection()
$addUserController = new AddUserController($academiaRepository);
