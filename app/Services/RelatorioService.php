<?php

namespace App\Services;

use App\Interfaces\Service\RelatorioServiceInterface;
use App\Repositories\RelatorioRepository;

class RelatorioService implements RelatorioServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new RelatorioRepository;
    }

    public function todos()
    {

    }
}