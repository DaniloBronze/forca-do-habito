<?php

namespace Dev\Academia\Controller;

use PDO;

class LoginController implements Controller
{
    private $pdo;
    public function __construct()
    {
        require_once __DIR__ . '/../../conexao.php';
        $this->pdo = getPdoConnection();
    }

    public function processaRequisicao(): void
    {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        if (!$email || !$password) {
            header('Location: /login?sucesso=0');
            exit();
        }

        $sql = 'SELECT * FROM usuarios WHERE email = :email';
        $stm = $this->pdo->prepare($sql);
        $stm->bindValue(':email', $email);
        $stm->execute();

        $userData = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$userData) {
            header('Location: /login?sucesso=0');
            exit();
        }

        $storedPassword = password_hash('', PASSWORD_ARGON2ID);
        if ($storedPassword = password_verify($password, $userData['senha'])) {
            $_SESSION['logado'] = true;
            $_SESSION['nome'] = $userData['nome'];
            $_SESSION['perfil'] = $userData['perfil'];
            header('Location: painel');
        } else {
            password_verify($password, $storedPassword);
            header('Location: /login?sucesso=0');
        }

        //Logica para mudar o hash do usuarios
        if (password_needs_rehash($userData['senha'], PASSWORD_ARGON2ID)) {
            $stm = $this->pdo->prepare("UPDATE usuarios SET senha = ? WHERE id = ?");
            $stm->bindValue(1, password_hash($password, PASSWORD_ARGON2ID));
            $stm->bindValue(2, $userData['id']);
            $stm->execute();
        }
    }
}
