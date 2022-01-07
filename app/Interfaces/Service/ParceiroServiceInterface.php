<?php

namespace App\Interfaces\Service;

interface ParceiroServiceInterface
{
    public function todosAtivos();

    public function parceiroId();

    public function adicionar();

    public function editar();

    public function apagar();

    public function comissao();
}