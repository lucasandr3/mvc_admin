<?php

namespace App\Services;

use App\Interfaces\Service\DespesaServiceInterface;
use App\Repositories\DespesaRepository;

class DespesaService implements DespesaServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new DespesaRepository;
    }

    public function todos()
    {

    }

    public function despesaId()
    {

    }

    public function adicionar()
    {

    }

    public function todasParceladas()
    {

    }

    public function adicionarParcelada()
    {

    }
}