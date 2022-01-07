<?php

namespace App\Repositories;

use App\Interfaces\Repository\VendaRepositoryInterface;
use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Venda;
use App\Models\VendaPagamento;
use App\Models\VendaParcela;
use App\Models\VendaProduto;

class VendaRepository implements VendaRepositoryInterface
{
    public function buscaVendas(): array
    {
        return Venda::all()->toArray();
//        return Venda::with(['vendas_produtos'])->get();
    }

    public function salvaDadosIniciaisVenda($dadosIniciaisVenda)
    {
        $venda = Venda::create($dadosIniciaisVenda);
        return $venda->id_venda;
    }

    public function salvaPagamentoVenda($dadosPagamento)
    {
        return VendaPagamento::insert($dadosPagamento);
    }

    public function salvaCrediarioLoja($dadosParcelamento)
    {
        foreach ($dadosParcelamento as $parcelamento) {
            VendaParcela::insert($parcelamento);
        }
    }

    public function salvaProdutosVenda($produtosVenda)
    {
        foreach ($produtosVenda as $produto) {
            VendaProduto::insert($produto);
        }
    }

    public function deletaVenda($idVenda)
    {
        Venda::find($idVenda)->delete();
        VendaPagamento::where('id_venda', $idVenda)->delete();
        $vendaParcelada = VendaParcela::where('id_venda', $idVenda)->get();

        if($vendaParcelada) {
            VendaParcela::where('id_venda', $idVenda)->delete();
        }

        $produtosVenda = VendaProduto::where('id_venda', $idVenda)->get();
        $estoque = Estoque::all();
        $produtosEstoque = [];

        for ($i = 0; $i < sizeof($produtosVenda); $i++) {
            $produtosEstoque[$i]['id_produto'] = $produtosVenda[$i]->id_produto;
            $produtosEstoque[$i]['quantidade'] = $produtosVenda[$i]->quantidade;
        }

        for ($p = 0; $p < sizeof($produtosEstoque); $p++) {
            for ($e = 0; $e < sizeof($estoque); $e++) {
                if ($estoque[$e]['id_produto'] == $produtosEstoque[$p]['id_produto']) {
                    DB::table('estoque')
                        ->where('id_produto', $produtosEstoque[$p]['id_produto'])
                    ->update(['qtd' => $estoque[$e]['qtd'] + $produtosEstoque[$p]['quantidade']]);
                }
            }
        }

        VendaProduto::where('id_venda', $idVenda)->delete();

        return true;
    }

    public function buscaPagamentoVendas(array $codVendas)
    {
        return VendaPagamento::whereIn('id_venda', $codVendas)->get()->toArray();
    }

    public function buscaParcelasVendas(array $codVendas): array
    {
        return VendaParcela::whereIn('id_venda', $codVendas)->get()->toArray();
    }

    public function buscaParcelasProdutos(array $codVendas): array
    {
        return VendaProduto::whereIn('id_venda', $codVendas)
            ->get()
            ->toArray();
    }

    public function totaisVendas(string $uuid)
    {
        return DB::table('venda_pagamento')
            ->addSelect(DB::raw('payment_type, sum(price) AS total'))
                ->where('uuid_user', $uuid)
                ->groupBy('payment_type')
            ->get();
    }
}