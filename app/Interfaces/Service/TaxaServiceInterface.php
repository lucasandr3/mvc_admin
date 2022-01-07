<?php

namespace App\Interfaces\Service;

interface TaxaServiceInterface
{
    public function todasAtivas();

    public function taxaId();

    public function adicionar();

    public function editar();

    public function apagar();
}