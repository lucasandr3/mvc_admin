<?php
namespace App\Repositories;

use App\Interfaces\Repository\ImpressaoRepositoryInterface;
use App\Models\Impressao;

class ImpressaoRepository implements ImpressaoRepositoryInterface
{
    public function todos()
    {
        return Impressao::all();
    }
}