<?php

namespace App\Interfaces\Service;

interface CarrinhoAbandonadoServiceInterface
{
    public function carrinhosAbandonados(string $uuid);
    
    public function carrinhosAbandonadosTotal(string $uuid);
    
    public function carrinhosAbandonadosCsv(string $uuid);
}
