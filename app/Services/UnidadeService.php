<?php

namespace App\Services;

use App\Interfaces\Service\UnidadeServiceInterface;
use App\Repositories\UnidadeRepository;

class UnidadeService implements UnidadeServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UnidadeRepository;
    }

    public function todosAtivas()
    {

    }

    public function todosInativas()
    {

    }

    public function UnidadeId()
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