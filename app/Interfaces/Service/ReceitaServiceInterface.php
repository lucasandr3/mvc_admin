<?php

namespace App\Interfaces\Service;

interface ReceitaServiceInterface
{
    public function todas();

    public function receitaId();

    public function adicionar();

    public function todasParceladas();

    public function adicionarParcelada();
}