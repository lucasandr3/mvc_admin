<?php

namespace App\Interfaces\Repository;

interface MarcaRepositoryInterface
{
    public function todosAtivas();

    public function todosInativas();

    public function MarcaId();

    public function adicionar();

    public function editar();

    public function status();
}