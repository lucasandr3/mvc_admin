<?php

namespace App\Interfaces\Repository;

interface CancelamentoRepositoryInterface
{
    public function getCancelamentos(int $offset, int $limite, string $uuid);

    public function getCancelamentosQtde(string $uuid);
}