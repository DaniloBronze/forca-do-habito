<?php

declare(strict_types=1);

namespace Dev\Academia\Entity;

class Academia
{
  public readonly int $id;

  public function __construct(
    public readonly string $nome,
    public readonly string $email,
    public readonly string $senha,
    public readonly string $perfil,
  ) {
  }

  public function setId(int $id): void
  {
    $this->id = $id;
  }
}
