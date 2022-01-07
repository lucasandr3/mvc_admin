<?php

namespace App\Interfaces\Service;

interface DespesaServiceInterface
{
    public function todos();

    public function despesaId();

    public function adicionar();

    public function todasParceladas();

    public function adicionarParcelada();
}