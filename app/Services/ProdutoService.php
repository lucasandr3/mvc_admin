<?php

namespace App\Services;

use App\Interfaces\Service\ProdutoServiceInterface;
use App\Repositories\ProdutoRepository;

class ProdutoService implements ProdutoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ProdutoRepository;
    }

    public function todosAtivos()
    {

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