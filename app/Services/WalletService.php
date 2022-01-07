<?php

namespace App\Services;

use App\Interfaces\Service\WalletServiceInterface;
use App\Repositories\WalletRepository;
use Support\Paginacao;
use Utils\Utils;

class WalletService implements WalletServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new WalletRepository;
    }

    public function wallet($uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $wallet = $this->repository->wallet($offset, QUANTIDADE_REGISTROS, $uuid);

        $wallet = array_map(function ($w) {
            $w->status = 'Pagamento Aprovado';
            $w->purchase_date = Utils::formataData($w->purchase_date);
            $w->full_price = Utils::formataPreco($w->full_price);
            return $w;
        }, $wallet);

        $qtdRegistros = $this->repository->walletQtde($uuid);

        $paginacao = Paginacao::montaPaginacao('vendas/wallet', $qtdRegistros);
        
        return ['wallet' => $wallet, 'paginacao' => $paginacao];

    }
}