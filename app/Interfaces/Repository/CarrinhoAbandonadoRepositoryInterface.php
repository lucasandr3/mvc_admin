<?php

namespace App\Interfaces\Repository;

interface CarrinhoAbandonadoRepositoryInterface
{
    public function carrinhosAbandonados(int $offset, int $limite, string $uuid);

    public function carrinhosAbandonadosQtde(string $uuid);
    
    public function carrinhosAbandonadosTotal(string $uuid);
}