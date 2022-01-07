<?php

namespace App\Services;

use App\Interfaces\Service\CategoriaServiceInterface;
use App\Repositories\CategoriaRepository;

class CategoriaService implements CategoriaServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CategoriaRepository;
    }

    public function todosAtivas()
    {

    }

    public function todosInativas()
    {

    }

    public function categoriaId()
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