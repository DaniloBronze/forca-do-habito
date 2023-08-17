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
      $nome = filter_input(INPUT_POST, 'nome');
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      $senha = filter_input(INPUT_POST, 'senha');
      $perfil = filter_input(INPUT_POST, 'perfil', FILTER_VALIDATE_INT);

      // Verificar se todos os campos estão preenchidos
      if (empty($nome) || empty($email) || empty($senha) || $perfil === false) {
        echo '<script>alert("Por favor, preencha todos os campos corretamente.");</script>';
        echo '<script>window.location.href = "/painel";</script>';
      } else {
        // Criar uma nova instância de Academia com os dados do formulário
        $user = new Academia($nome, $email, $senha, $perfil);

        // Tenta adicionar o usuário
        if ($this->academiaRepository->add($user)) {
          // Usar JavaScript para exibir a mensagem em um alert e redirecionar
          echo '<script>alert("Usuário cadastrado com sucesso!");';
          header('Location: /painel');
        }
      }
    }
  }
}

// Instanciar a classe de repositório e passá-la para o controlador
$academiaRepository = new AcademiaRepository(getPdoConnection()); // Use a função getPdoConnection()
$addUserController = new AddUserController($academiaRepository);
