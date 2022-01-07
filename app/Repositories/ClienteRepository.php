<?php
namespace App\Repositories;

use App\Interfaces\Repository\ClienteRepositoryInterface;
use Illuminate\Database\Capsule\Manager as DB;
use App\Models\Cliente;
use App\Models\VendaPagamento;
use App\Models\VendaParcela;
use App\Models\VendaProduto;

class ClienteRepository implements ClienteRepositoryInterface
{
    public function ativos($offset, $limit, $uuid)
    {
        return DB::table('venda_cliente as vc')
            ->addSelect(
                'vc.id_venda_cliente as idLead',
                    'vc.name as nome',
                    'vc.first_name as primeiroNome',
                    'vc.last_name as ultimoNome',
                    'vc.email',
                    'vc.doc as documento',
                    'vc.phone_checkout_local_code as ddd',
                    'vc.phone_number as telefone'
            )
            ->offset($offset)
            ->limit($limit)
            ->where('uuid_user', $uuid)
            ->get()->jsonSerialize();
    }

    public function ativosQtde($uuid)
    {
        return DB::table('venda_cliente as vc')
            ->addSelect(
                'vc.id_venda_cliente as idLead',
                'vc.name as nome',
                'vc.first_name as primeiroNome',
                'vc.last_name as ultimoNome',
                'vc.email',
                'vc.doc as documento',
                'vc.phone_checkout_local_code as ddd',
                'vc.phone_number as telefone'
            )
            ->where('uuid_user', $uuid)
            ->count('vc.id_venda_cliente');
    }

//    public function buscaPagamentoVendas(array $codVendas)
//    {
//        return VendaPagamento::whereIn('id_venda', $codVendas)->get()->toArray();
//    }
//
//    public function buscaParcelasVendas(array $codVendas): array
//    {
//        return VendaParcela::whereIn('id_venda', $codVendas)->get()->toArray();
//    }
//
//    public function buscaParcelasProdutos(array $codVendas): array
//    {
//        return VendaProduto::whereIn('id_venda', $codVendas)
//            ->get()
//        ->toArray();
//    }
}