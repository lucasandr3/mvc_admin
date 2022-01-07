<?php
namespace App\Repositories;

use App\Interfaces\Repository\ProdutoRepositoryInterface;
use App\Models\Produto;

class ProdutoRepository implements ProdutoRepositoryInterface
{
    public function todosAtivos()
    {

    }

    public function todosId($produtosId)
    {
        return Produto::select('id_prod','cost')->whereIn('id_prod', $produtosId)->get()->toArray();
    }

    public function todosInativos()
    {

    }

    public function vencidos()
    {

    }

    public function validade()
    {

    }

    public function clienteId()
    {

    }

    public function adicionar()
    {

    }

    public function editar()
    {

    }

    public function status()
    {

    }
}