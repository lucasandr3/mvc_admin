<?php

namespace App\Interfaces\Service;

interface UnidadeServiceInterface
{
    public function todosAtivas();

    public function todosInativas();

    public function UnidadeId();

    public function adicionar();

    public function editar();

    public function status();
}