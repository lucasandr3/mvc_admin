<?php

namespace App\Interfaces\Repository;

interface ReceitaRepositoryInterface
{
    public function todas();

    public function receitaId();

    public function adicionar();

    public function todasParceladas();

    public function adicionarParcelada();
}