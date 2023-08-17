<?php

declare(strict_types=1);
require_once __DIR__ . '/conexao.php';

$email = $argv[1] ?? '';
$password = $argv[2] ?? '';

if (empty($email) || empty($password)) {
    throw new Exception("E-mail e senha devem ser fornecidos como argumentos.");
}

try {
    // Obtenha a conexão PDO do arquivo de conexão
    $pdo = getPdoConnection();

    $sql = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $userExists = (bool) $stmt->fetchColumn();

    if ($userExists) {
        echo "O usuário $email já existe e não pode ser cadastrado novamente." . PHP_EOL;
    } else {
        $hash = password_hash($password, PASSWORD_ARGON2ID);
        $sql = "INSERT INTO usuarios (email, senha) VALUES (?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email, $hash]);

        if ($stmt->rowCount() > 0) {
            echo "Usuário $email cadastrado com sucesso." . PHP_EOL;
        } else {
            echo "Falha ao cadastrar o usuário." . PHP_EOL;
        }

        if (password_verify($password, $hash)) {
            echo "Foi gerado um hash com a sua senha." . PHP_EOL;
            echo "O hash da senha é: $hash" . PHP_EOL;
        } else {
            echo "Senha incorreta!" . PHP_EOL;
        }
    }
} catch (PDOException $e) {
    echo "Erro na conexão ou interação com o banco de dados: " . $e->getMessage() . PHP_EOL;
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage() . PHP_EOL;
}
