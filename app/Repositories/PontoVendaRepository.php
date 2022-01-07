<?php
namespace App\Repositories;

use App\Interfaces\Repository\PontoVendaRepositoryInterface;
use App\Models\PontoVenda;

class PontoVendaRepository implements PontoVendaRepositoryInterface
{
    public function isOpen(string $diaAtual)
    {
        return PontoVenda::where('day', $diaAtual)->first();
    }
}