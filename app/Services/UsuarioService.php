<?php

namespace App\Services;

use App\Interfaces\Service\UsuarioServiceInterface;
use App\Repositories\UsuarioRepository;

class UsuarioService implements UsuarioServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new UsuarioRepository;
    }

    public function todosAtivos()
    {
        return $this->repository->todosAtivos();
    }

    public function todosInativos()
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