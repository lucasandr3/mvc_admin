<?php

namespace App\Services;

use App\Interfaces\Service\AjaxServiceInterface;
use App\Repositories\AjaxRepository;

class AjaxService implements AjaxServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new AjaxRepository;
    }

    public function abreCaixa($dados)
    {
        return $this->repository->abreCaixa($dados);
    }

    public function listaProdutos($dados)
    {
        return $this->repository->listaProdutos($dados);
    }

    public function verificaSenhaDesconto($senha, $user)
    {
        return $this->repository->verificaSenhaDesconto($senha, $user);
    }
}