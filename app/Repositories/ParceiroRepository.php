<?php
namespace App\Repositories;

use App\Interfaces\Repository\ParceiroRepositoryInterface;
use App\Models\Parceiro;

class ParceiroRepository implements ParceiroRepositoryInterface
{
    public function todosAtivos()
    {
        return Parceiro::all();
    }

    public function parceiroId()
    {

    }

    public function adicionar()
    {

    }

    public function editar()
    {

    }

    public function apagar()
    {

    }

    public function comissao()
    {

    }
}