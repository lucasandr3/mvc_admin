<?php

namespace App\Services;

use App\Interfaces\Service\PlanoServiceInterface;
use App\Repositories\PlanoRepository;
use Support\Paginacao;
use Utils\Utils;

class PlanoService implements PlanoServiceInterface
{
    private $repository;

    public function __construct()
    {
        $this->repository = new PlanoRepository;
    }

    public function planos($uuid)
    {
        $offset = Paginacao::getOffset('boleto');

        $planos = $this->repository->getPlanos($offset, QUANTIDADE_REGISTROS, $uuid);
        $planosFormatados = [];

        foreach ($planos as $key => $value) {
            $planosFormatados[$key]['dadosTroca']['data'] = Utils::formataData(json_decode($value->plan)->switchPlanDate);

            $planosFormatados[$key]['novoPlano']['nome'] = json_decode($value->plan)->newSubscriptionPlan->name;
            $planosFormatados[$key]['novoPlano']['valor'] = Utils::formataPreco(json_decode($value->plan)->newSubscriptionPlan->value);
            $planosFormatados[$key]['novoPlano']['qtdCiclos'] = json_decode($value->plan)->newSubscriptionPlan->maxChargeCycles;
            $planosFormatados[$key]['novoPlano']['periodoRecorrencia'] = json_decode($value->plan)->newSubscriptionPlan->recurrencyPeriod;

            $planosFormatados[$key]['antigoPlano']['nome'] = json_decode($value->plan)->previousSubscriptionPlan->name;
            $planosFormatados[$key]['antigoPlano']['valor'] = Utils::formataPreco(json_decode($value->plan)->previousSubscriptionPlan->value);
            $planosFormatados[$key]['antigoPlano']['qtdCiclos'] = json_decode($value->plan)->previousSubscriptionPlan->maxChargeCycles;
            $planosFormatados[$key]['antigoPlano']['periodoRecorrencia'] = json_decode($value->plan)->previousSubscriptionPlan->recurrencyPeriod;

        }

        $qtdRegistros = $this->repository->planosQtde($uuid);
        $paginacao = Paginacao::montaPaginacao('evento/troca_plano', $qtdRegistros);

        return ['planos' => $planosFormatados, 'paginacao' => $paginacao];

    }
}