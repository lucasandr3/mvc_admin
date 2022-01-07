<?php

namespace App\Services;

use App\Interfaces\Service\MarcaServiceInterface;
use App\Repositories\MarcaRepository;

class MarcaService implements MarcaServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new MarcaRepository;
    }

    public function todosAtivas()
    {

    }

    public function todosInativas()
    {

    }

    public function MarcaId()
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