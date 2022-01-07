<?php

namespace App\Services;

use App\Interfaces\Service\CancelamentoServiceInterface;
use App\Repositories\CancelamentoRepository;
use Support\Paginacao;
use Utils\Utils;

class CancelamentoService implements CancelamentoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new CancelamentoRepository;
    }

    public function cancelamentos($uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $cancelamentos = $this->repository->getCancelamentos($offset, QUANTIDADE_REGISTROS, $uuid);

        $cancelamentos = array_map(function ($cancelamento) {
            $cancelamento->valor_atual_assinatura = Utils::formataPreco($cancelamento->valor_atual_assinatura);
            return $cancelamento;
        }, $cancelamentos);

        $qtdRegistros = $this->repository->getCancelamentosQtde($uuid);

        $paginacao = Paginacao::montaPaginacao('evento/cancelamento_assinatura', $qtdRegistros);
        
        return ['cancelamentos' => $cancelamentos, 'paginacao' => $paginacao];

    }
}