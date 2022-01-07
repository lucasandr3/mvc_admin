<?php


namespace App\Interfaces\Repository;


interface ClienteRepositoryInterface
{
    public function ativos(int $offset, int $limit, string $uuid);

    public function ativosQtde(string $uuid);
//
//    public function buscaPagamentoVendas(array $codVendas);
//
//    public function buscaParcelasVendas(array $codVendas): array;
//
//    public function buscaParcelasProdutos(array $codVendas): array;
}