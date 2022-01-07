<?php
namespace App\Interfaces\Service;


interface VendaServiceInterface
{
    public function buscaTodasVendas();

    public function salvaVenda($dadosVenda);

    public function excluirVenda(int $idVenda);

    public function totaisVendas(string $uuid);
}