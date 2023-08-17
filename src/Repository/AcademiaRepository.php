<?php

declare(strict_types=1);

namespace Dev\Academia\Repository;

use Dev\Academia\Entity\Academia;
use PDO;

class AcademiaRepository
{
  public function __construct(private PDO $pdo)
  {
  }


  public function add(Academia $academia): bool
  {
    $email = $academia->email;

    $sqlCheck = "SELECT COUNT(*) FROM usuarios WHERE email = ?";
    $stmtCheck = $this->pdo->prepare($sqlCheck);
    $stmtCheck->execute([$email]);
    $userExists = (bool) $stmtCheck->fetchColumn();

    if ($userExists) {
      echo '<script>alert("O usuário já existe e não pode ser cadastrado novamente.");</script>';
      echo '<script>window.location.href = "/painel";</script>';
      return false;
    } else {
      $hash = password_hash($academia->senha, PASSWORD_ARGON2ID);
      $sqlInsert = "INSERT INTO usuarios (nome, email, senha, perfil) VALUES (?, ?, ?, ?)";
      $stmtInsert = $this->pdo->prepare($sqlInsert);
      $stmtInsert->bindValue(1, $academia->nome);
      $stmtInsert->bindValue(2, $academia->email);
      $stmtInsert->bindValue(3, $hash);
      $stmtInsert->bindValue(4, $academia->perfil);

      $result = $stmtInsert->execute();

      if ($result) {
        $id = $this->pdo->lastInsertId();
        $academia->setId(intval($id));
      }

      return $result;
    }
  }

  public function addCategoria(string $categoria): bool
  {
    $sqlCheckCategoria = "SELECT COUNT(*) FROM categorias WHERE nome_categoria = ?";
    $stmtCheckCategoria = $this->pdo->prepare($sqlCheckCategoria);
    $stmtCheckCategoria->execute([$categoria]);
    $categoriaExists = (bool) $stmtCheckCategoria->fetchColumn();

    if ($categoriaExists) {
      echo '<script>alert("A categoria já existe.");';
      echo 'window.location.href = "/painel";</script>';
      return false;
    } else {
      $sqlInsertCategoria = "INSERT INTO categorias (nome_categoria) VALUES (?)";
      $stmtInsertCategoria = $this->pdo->prepare($sqlInsertCategoria);
      $stmtInsertCategoria->bindValue(1, $categoria);

      return $stmtInsertCategoria->execute();
    }
  }

  public function categoriaExists(string $categoria): bool
  {
    $sqlCheckCategoria = "SELECT COUNT(*) FROM categorias WHERE nome_categoria = ?";
    $stmtCheckCategoria = $this->pdo->prepare($sqlCheckCategoria);
    $stmtCheckCategoria->execute([$categoria]);
    $categoriaExists = (bool) $stmtCheckCategoria->fetchColumn();

    return $categoriaExists;
  }

  public function addCliente(string $nome, int $idCategoria): bool
  {
    $sqlInsertCliente = "INSERT INTO clientes (nome, id_categoria) VALUES (?, ?)";
    $stmtInsertCliente = $this->pdo->prepare($sqlInsertCliente);
    $stmtInsertCliente->bindValue(1, $nome);
    $stmtInsertCliente->bindValue(2, $idCategoria);

    return $stmtInsertCliente->execute();
  }

  public function updateCliente(int $id, string $nome, int $idCategoria): bool
  {
    $sql = 'UPDATE clientes SET nome = ?, id_categoria = ? WHERE id = ?';
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([$nome, $idCategoria, $id]);
  }

  public function removeCliente(int $clienteId): bool
  {
    $sql = 'DELETE FROM clientes WHERE id = ?';
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $clienteId);

    return $statement->execute();
  }

  public function getAllClientes(): array
  {
    $sql = "SELECT * FROM clientes";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $clientes;
  }

  public function getAllCategorias(): array
  {
    $sql = "SELECT * FROM categorias";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $categorias;
  }

  public function updateCategoria(int $id, string $nomeCategoria): bool
  {
    $sql = "UPDATE categorias SET nome_categoria = ? WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);

    return $stmt->execute([$nomeCategoria, $id]);
  }

  public function remove(int $id): bool
  {
    $sql = 'DELETE FROM usuarios WHERE id = ?';
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $id);

    return $statement->execute();
  }

  public function removeCategoria(int $id): bool
  {
    $sql = 'DELETE FROM categorias WHERE id = ?';
    $statement = $this->pdo->prepare($sql);
    $statement->bindValue(1, $id);

    return $statement->execute();
  }

  public function update(Academia $academia): bool
  {
    $hash = password_hash($academia->senha, PASSWORD_ARGON2ID);
    $sql = 'UPDATE usuarios SET nome = :nome, email = :email, senha = :senha, perfil = :perfil WHERE id = :id;';
    $statement = $this->pdo->prepare($sql);

    $statement->bindValue(':nome', $academia->nome);
    $statement->bindValue(':email', $academia->email);
    $statement->bindValue(':senha', $hash);
    $statement->bindValue(':perfil', $academia->perfil);
    $statement->bindValue(':id', $academia->id, PDO::PARAM_INT);

    return $statement->execute();
  }
  /**
   * @return Academia[]
   */
  public function all(): array
  {
    $academiaList = $this->pdo
      ->query('SELECT * FROM usuarios ORDER BY id DESC;')
      ->fetchAll(PDO::FETCH_ASSOC);

    return array_map([$this, 'hydrateAcademia'], $academiaList);
  }

  public function getCategoriaById(int $categoriaId): ?array
  {
    $sql = "SELECT * FROM categorias WHERE id = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$categoriaId]);
    $categoria = $stmt->fetch(PDO::FETCH_ASSOC);

    return $categoria ?: null;
  }

  public function find(int $id)
  {
    $statement = $this->pdo->prepare('SELECT * FROM usuarios WHERE id = ?;');
    $statement->bindValue(1, $id, PDO::PARAM_INT);
    $statement->execute();

    return $this->hydrateAcademia($statement->fetch(PDO::FETCH_ASSOC));
  }

  public function hydrateAcademia(array $academiaData): Academia
  {
    $academia = new Academia($academiaData['nome'], $academiaData['email'], $academiaData['senha'], $academiaData['perfil']);
    $academia->setId($academiaData['id']);
    return $academia;
  }
}