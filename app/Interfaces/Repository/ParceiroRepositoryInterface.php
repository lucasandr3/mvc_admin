<?php

namespace App\Interfaces\Repository;

interface ParceiroRepositoryInterface
{
    public function todosAtivos();

    public function parceiroId();

    public function adicionar();

    public function editar();

    public function apagar();

    public function comissao();
}