<?php

namespace App\Services;

use App\Interfaces\Service\FornecedorServiceInterface;
use App\Repositories\FornecedorRepository;

class FornecedorService implements FornecedorServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new FornecedorRepository;
    }

    public function todos()
    {

    }
}