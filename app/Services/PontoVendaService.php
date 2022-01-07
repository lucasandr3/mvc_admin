<?php

namespace App\Services;

use App\Interfaces\Service\PontoVendaServiceInterface;
use App\Repositories\PontoVendaRepository;

class PontoVendaService implements PontoVendaServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PontoVendaRepository;
    }

    public function isOpen()
    {
        $diaAtual = date('Y-m-d');
        return $this->repository->isOpen($diaAtual);
    }
}