<?php

namespace App\Interfaces\Repository;

interface PontoVendaRepositoryInterface
{
    public function isOpen(string $diaAtual);
}