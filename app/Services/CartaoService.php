<?php

namespace App\Services;

use App\Interfaces\Service\CartaoServiceInterface;
use App\Repositories\CartaoRepository;
use Support\Paginacao;
use Utils\Utils;

class CartaoService implements CartaoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CartaoRepository;
    }

    public function cartoes($uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $cartoes = $this->repository->cartao($offset, QUANTIDADE_REGISTROS, $uuid);

        $cartoes = array_map(function ($cartao) {
            $cartao->status = 'Pagamento Aprovado';
            $cartao->purchase_date = Utils::formataData($cartao->purchase_date);
            $cartao->full_price = Utils::formataPreco($cartao->full_price);
            return $cartao;
        }, $cartoes);

        $qtdRegistros = $this->repository->cartaoQtde($uuid);

        $paginacao = Paginacao::montaPaginacao('vendas/cartao', $qtdRegistros);
        
        return ['cartoes' => $cartoes, 'paginacao' => $paginacao];

    }
}