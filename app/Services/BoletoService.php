<?php

namespace App\Services;

use App\Interfaces\Service\BoletoServiceInterface;
use App\Repositories\BoletosRepository;
use Support\Paginacao;

class BoletoService implements BoletoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new BoletosRepository;
    }

    public function boletosGerados(string $uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $boletos = $this->repository->boletosGerados($offset, QUANTIDADE_REGISTROS, $uuid);
        $qtdRegistros = $this->repository->boletosQtdeGerados($uuid);

        $paginacao = Paginacao::montaPaginacao('vendas/boleto_gerados', $qtdRegistros);
        
        return ['boletosGerados' => $boletos, 'paginacaoGerado' => $paginacao];

    }

    public function boletosAprovados(string $uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $boletos = $this->repository->boletosAprovados($offset, QUANTIDADE_REGISTROS, $uuid);
        $qtdRegistros = $this->repository->boletosQtdeAprovados($uuid);

        $paginacao = Paginacao::montaPaginacao('vendas/boleto_aprovados', $qtdRegistros);

        return ['boletosAprovados' => $boletos, 'paginacaoAprovado' => $paginacao];

    }
}