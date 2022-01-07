<?php

namespace App\Interfaces\Repository;

interface CartaoRepositoryInterface
{
    public function cartao(int $offset, int $limite, string $uuid);

    public function cartaoQtde($uuid);
}