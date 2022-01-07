<?php

namespace App\Services;

use App\Interfaces\Service\ReceitaServiceInterface;
use App\Repositories\ReceitaRepository;

class ReceitaService implements ReceitaServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ReceitaRepository;
    }

    public function todas()
    {

    }

    public function receitaId()
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