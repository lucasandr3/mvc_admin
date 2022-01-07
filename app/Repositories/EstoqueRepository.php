<?php
namespace App\Repositories;

use App\Interfaces\Repository\EstoqueRepositoryInterface;
use App\Models\Estoque;

class EstoqueRepository implements EstoqueRepositoryInterface
{
    public function todos()
    {
        return Estoque::all();
    }
}