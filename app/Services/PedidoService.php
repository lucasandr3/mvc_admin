<?php

namespace App\Services;

use App\Interfaces\Service\PedidoServiceInterface;
use App\Repositories\PedidoRepository;

class PedidoService implements PedidoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PedidoRepository;
    }

    public function todos()
    {

    }
}