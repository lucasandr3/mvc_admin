<?php

namespace App\Interfaces\Service;

interface ProdutoServiceInterface
{
    public function todosAtivos();

    public function todosInativos();

    public function vencidos();

    public function validade();

    public function clienteId();

    public function adicionar();

    public function editar();

    public function status();
}