<?php

namespace App\Repositories;

use App\Interfaces\Repository\CartaoRepositoryInterface;
use App\Models\Cartao;
use Illuminate\Database\Capsule\Manager as DB;


class CartaoRepository implements CartaoRepositoryInterface
{
    public function cartao(int $offset, int $limit, string $uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->offset($offset)
            ->limit($limit)
            ->where('vp.payment_type', 'credit_card')
            ->where('v.status', 'approved')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->jsonSerialize();
    }

    public function cartaoQtde($uuid)
    {
        return DB::table('venda as v')
            ->join('venda_afiliado as va', 'v.transaction', '=', 'va.transaction')
            ->join('venda_cliente as vc', 'v.transaction', '=', 'vc.transaction')
            ->join('venda_pagamento as vp', 'v.transaction', '=', 'vp.transaction')
            ->select('v.*', 'va.*', 'vc.*', 'vp.*')
            ->where('vp.payment_type', 'credit_card')
            ->where('v.status', 'approved')
            ->where('v.uuid_user', $uuid)
            ->get()
            ->count();
    }
}