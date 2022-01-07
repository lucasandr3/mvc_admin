<?php

namespace App\Interfaces\Service;

interface AjaxServiceInterface
{
    public function abreCaixa($dados);

    public function listaProdutos($dados);

    public function verificaSenhaDesconto($senha, $user);

}