<?php

namespace App\Interfaces\Repository;

interface BoletoRepositoryInterface
{
    public function boletosGerados(int $offset, int $limite, string $uuid);

    public function boletosQtdeGerados(string $uuid);

    public function boletosAprovados(int $offset, int $limite, string $uuid);

    public function boletosQtdeAprovados(string $uuid);
}