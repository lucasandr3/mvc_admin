<?php

namespace App\Interfaces\Repository;

interface WalletRepositoryInterface
{
    public function wallet(int $offset, int $limite, string $uuid);

    public function walletQtde(string $uuid);
}