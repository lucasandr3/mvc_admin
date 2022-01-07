<?php

namespace App\Services;

use App\Interfaces\Service\PixServiceInterface;
use App\Repositories\PixRepository;
use Support\Paginacao;
use Utils\Utils;

class PixService implements PixServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PixRepository;
    }

    public function pixAguardando($uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $pix = $this->repository->pixAguardando($offset, QUANTIDADE_REGISTROS, $uuid);
        $qtdRegistros = $this->repository->pixAguardandoQtde($uuid);
        
        $pix = array_map(function ($p) {
            $p->status = 'Aguardando Pagamento';
            $p->purchase_date = Utils::formataData($p->purchase_date);
            $p->full_price = Utils::formataPreco($p->full_price);
            return $p;
        }, $pix);

        $paginacao = Paginacao::montaPaginacao('vendas/pix_aguardando', $qtdRegistros);
        
        return ['pix' => $pix, 'paginacao' => $paginacao];

    }

    public function pixAprovados($uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $pix = $this->repository->pixAprovados($offset, QUANTIDADE_REGISTROS, $uuid);
        $qtdRegistros = $this->repository->pixAprovadosQtde($uuid);

        $pix = array_map(function ($p) {
            $p->status = 'Aguardando Aprovado';
            $p->purchase_date = Utils::formataData($p->purchase_date);
            $p->full_price = Utils::formataPreco($p->full_price);
            return $p;
        }, $pix);

        $paginacao = Paginacao::montaPaginacao('vendas/pix_aprovados', $qtdRegistros);

        return ['pix' => $pix, 'paginacao' => $paginacao];

    }
}