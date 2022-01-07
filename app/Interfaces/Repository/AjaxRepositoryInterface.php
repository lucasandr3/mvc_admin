<?php

namespace App\Interfaces\Repository;

interface AjaxRepositoryInterface
{
    public function abreCaixa($dados);

    public function listaProdutos($dados);

    public function verificaSenhaDesconto($senha, $user);
}