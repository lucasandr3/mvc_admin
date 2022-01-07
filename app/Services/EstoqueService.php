<?php

namespace App\Services;

use App\Interfaces\Service\EstoqueServiceInterface;
use App\Repositories\EstoqueRepository;

class EstoqueService implements EstoqueServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new EstoqueRepository;
    }

    public function todos()
    {

    }
}