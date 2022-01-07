<?php

namespace App\Services;

use App\Interfaces\Service\ConfiguracaoServiceInterface;
use App\Repositories\ConfiguracaoRepository;

class ConfiguracaoService implements ConfiguracaoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ConfiguracaoRepository;
    }

    public function todos()
    {

    }
}