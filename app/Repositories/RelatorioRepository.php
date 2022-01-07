<?php
namespace App\Repositories;

use App\Interfaces\Repository\RelatorioRepositoryInterface;
use App\Models\Relatorio;

class RelatorioRepository implements RelatorioRepositoryInterface
{
    public function todos()
    {
        return Relatorio::all();
    }
}