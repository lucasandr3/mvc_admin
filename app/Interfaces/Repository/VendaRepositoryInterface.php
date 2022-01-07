<?php


namespace App\Interfaces\Repository;


interface VendaRepositoryInterface
{
    public function buscaVendas(): array;

    public function salvaDadosIniciaisVenda($dadosIniciaisVenda);

    public function salvaPagamentoVenda($dadosPagamento);

    public function salvaCrediarioLoja($dadosParcelamento);

    public function salvaProdutosVenda($produtosVenda);

    public function deletaVenda(int $idVenda);

    public function buscaPagamentoVendas(array $codVendas);

    public function buscaParcelasVendas(array $codVendas): array;

    public function buscaParcelasProdutos(array $codVendas): array;

    public function totaisVendas(string $uuid);
}