<?php

namespace App\Services;

use App\Interfaces\Service\ImpressaoServiceInterface;
use App\Repositories\ImpressaoRepository;

class ImpressaoService implements ImpressaoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ImpressaoRepository;
    }

    public function todos()
    {

    }
}