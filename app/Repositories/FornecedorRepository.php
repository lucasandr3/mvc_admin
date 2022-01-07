<?php
namespace App\Repositories;

use App\Interfaces\Repository\FornecedorRepositoryInterface;
use App\Models\Fornecedor;

class FornecedorRepository implements FornecedorRepositoryInterface
{
    public function todos()
    {
        return Fornecedor::all();
    }
}