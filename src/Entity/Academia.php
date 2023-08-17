<?php

declare(strict_types=1);

namespace Dev\Academia\Entity;

class Academia
{
  public readonly int $id;
  public readonly string $nome;
  public readonly string $email;
  public readonly string $senha;
  public readonly string $perfil; 

  public function __construct(string $nome, string $email, string $senha, string $perfil)
  {
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->perfil = $perfil;
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }
}
